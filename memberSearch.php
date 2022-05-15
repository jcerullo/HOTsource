<?php 
	session_start();
   	include("session.php");
?>
<!DOCTYPE html>
<html>
<head>
  <title>hot</title>
  <meta charset = "UTF-8" /> 
  <link href='//fonts.googleapis.com/css?family=Montserrat:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css' />
  <link rel="stylesheet" type="text/css" href="hot-1col.css">
  <style>
	#myform 
	  fieldset {
		width: 700px;
		height: 150px;
		background-color: red;
		margin-left: 0px;
		margin-right: auto;
		box-shadow: 5px 5px 5px gray;
	  }
	#myform #submit {
      float: right;
	  background-color: lightyellow;
	}
  </style>
</head>
<body>

<?php	
    if (filter_has_var(INPUT_POST, "charSearch")){
		$charSearch = strtolower(trim(filter_input(INPUT_POST, "charSearch")));
		$_SESSION["charSearch"] = $charSearch;
	} 
    else {
		$charSearch = $_SESSION["charSearch"];
	}
?>

<span style='margin-left:2em'><a href = "index.html"><img src = "images/hot-org-logo.png"></a>
<div id="wrapper"><!--start menu-->
<navi id="navi"> 
	<ul id="navigation">
		<li><a href="library.php">Login</a></li>
		<li><a href="#">Members &raquo;</a>
			<ul>
				<li><a href="member.php">MemberProfile</a></li>
                <li><a href="memberSearch.php">Member Search</a></li>	
				<li><a href="members.php">MemberList</a></li>				
			</ul>
		</li>
		<li><a href="#">3D Printers &raquo;</a>
			<ul>
				<li><a href="printers.php">Printer List</a></li>
                <li><a href="printer.php">Printer Detail</a></li>
                <li><a href="printersOwned.php">Printer Owners</a></li>				
			</ul>				
		</li>
		<li><a href="#">Email &raquo;</a>
			<ul>	
				<li><a href="distributionList.php">Distribution List</a></li>
			</ul>				
		</li>
		<li><a href="#">Projects &raquo;</a>
			<ul>	
				<li><a href="projectSearch.php">Project Search</a></li>
			</ul>				
		</li>
		<li><a href="#">Help &raquo;</a>
			<ul>
				<li><a href="help.php">Menu Guide</a></li>
				<li><a href="readme.php">User Guide</a></li>
			</ul>				
		</li>
	</ul>
</navi><br><br><br>

</div><!--end wrapper-->
  
<?php
print <<<HERE
  <div id = "all">
    <div id = "main">
	<div id = "nav">
	    <br><br>
        <ul>
          <li><a href = "projectSearch.php"> Project Search</a></li><br>
        </ul>
	</div>
	
      <div id = "resources"> <br>
		<div id="myform">
 
    <form action = "" method= "post">
      <fieldset><br> 
		<p><span style='margin-left:1em'> MEMBER SEARCH</p>  	  
        <label>Character string search (no spaces) [member name, village, or printer]</label>
		<input type="text" id="txt_charSearch" name=charSearch value="$charSearch"><br><br>
        <input type="submit" value = "submit" id = "submit"> <br>
      </fieldset>
	</form>
			
		</div><br>
	  </div>
	</div>
  </div>
HERE;
?>
  
  <div id = "memberList"> 
  <style type = "text/css">
		  
	#memberList {
		margin: 100px;
		font-size:100%;
		margin-top:10px;
	}
  </style>
  
<?php

    if ($charSearch != '' && $mbrID != 'Guest' && $mbrID != ''){
//  if ($charSearch != '' ){                                          // Temporarily allow all users access so that members can find their email address
      try {
	    $mysql_dsn = $_SESSION["mysql_dsn"];
	    $mysql_username = $_SESSION["mysql_username"];
        $mysql_password = $_SESSION["mysql_password"];
		
        $con= new PDO($mysql_dsn, $mysql_username, $mysql_password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT *
		                 FROM members 
						 WHERE (status != 'D' && status != 'I')
                         AND ( firstName LIKE '%$charSearch%'
						 OR    lastName LIKE '%$charSearch%'
						 OR    yourVillage LIKE '%$charSearch%'
						 OR    groupsJoined LIKE '%$charSearch%'
						 OR    printersOwned LIKE '%$charSearch%')
						 ";
        
        //first pass just gets the column names
        print "<table> \n";

        $result = $con->query($query);
        //return only the first row (we only need field names)
        $row = $result->fetch(PDO::FETCH_ASSOC);
        if (is_array($row) == true) {
        print "  <tr> \n";
        foreach ($row as $field => $value){
          if ($field == "firstName") print " <th><u>FirstName</u> <span style='margin-left:2em'> </th> "; 
          if ($field == "lastName") print " <th> <u>LastName</u> <span style='margin-left:2em'></th> ";	
		  if ($field == "emailAddress") print " <th> <u>Email Address</u> <span style='margin-left:6em'></th> ";	
		  if ($field == "yourVillage") print " <th> <u>Village</u> <span style='margin-left:2em'></th> ";
		  if ($field == "githubID") print " <th> <u>GitHubID</u> <span style='margin-left:2em'></th> ";
		  if ($field == "groupsJoined") print " <th> <u>Groups Joined</u> <span style='margin-left:6em'></th> ";
		  if ($field == "printersOwned") print " <th> <u>3D Printers Owned</u> <span style='margin-left:2em'></th> ";		  
        } // end foreach
        print "  </tr> \n";
        }
        //second query gets the data
        $data = $con->query($query);
        $data->setFetchMode(PDO::FETCH_ASSOC);		

        foreach($data as $row){
          print "  <tr> \n";

          foreach ($row as $name=>$value){              
			
			if ($name=='firstName') {
			  print "    <td>$value</td> \n";			  
            }
			
			if ($name=='lastName') {
			  print "    <td>$value</td> \n";			  
            }
			
			if ($name=='emailAddress') {
			  print "    <td>$value</td> \n";
            }
			
			if ($name=='yourVillage') {
			  print "    <td>$value</td> \n";
			} 			
			
			if ($name=='githubID') {
			  print "    <td>$value</td> \n";
			} 			
			
			if ($name=='groupsJoined') {
			  print "    <td>$value</td> \n";
			} 			
			
			if ($name=='printersOwned') {
			  print "    <td>$value</td> \n";
			} 			
			
          } // end field loop

          print "  </tr> \n";
        } // end record loop

        print "</table> \n";

      } catch(PDOException $e) {
          echo 'ERROR: ' . $e->getMessage();
      } // end try
    }   // end if
	else {
		if ($mbrID == 'Guest' || $mbrID == '') print "Login Required";		
	}
?>
 
</div> 
   
</body>
</html>
