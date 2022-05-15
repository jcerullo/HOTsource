<?php 
session_start();
	$mbrID = $_SESSION["mbrID"];
	$charSearch = $_SESSION["charSearch"];
	
	$mysql_dsn = $_SESSION["mysql_dsn"];
	$mysql_username = $_SESSION["mysql_username"];
    $mysql_password = $_SESSION["mysql_password"];

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
		height: 100px;
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
</navi>
</div><!--end wrapper-->
  
<?php
print <<<HERE
  <div id = "all">
    <div id = "main">
	<div id = "nav"></div>
      <div id = "resources"> <br>
		<div id="myform">
  
    <form action = "" method= "post">
      <fieldset> <br>
	  
        <label>Single character string search (Name,village,or printer make) </label>
        <input type="text" id="txt_charSearch" name=charSearch value="$charSearch"> <br><br><br>

        <input type="submit" value = "Create Distribution List" id = "submit"/> <br>
      </fieldset>
    </form>
	
		</div><br>
	  </div>
	</div>
  </div>
HERE;
?>
  
  <div id = "myList"> 
  <style type = "text/css">
		  
	#myList {
		margin: 100px;
		font-size:100%;
		margin-top:10px;
	}
  </style>
  
<?php
    if ($charSearch != ''){
      try {
		$con= new PDO($mysql_dsn, $mysql_username, $mysql_password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT firstName, lastName, emailAddress
		                 FROM members 
						 WHERE (status != 'D' && status != 'I')
                         AND ( firstName LIKE '%$charSearch%'
						 OR    lastName LIKE '%$charSearch%'
						 OR    yourVillage LIKE '%$charSearch%'
						 OR    groupsJoined LIKE '%$charSearch%'
						 OR    printersOwned LIKE '%$charSearch%')
						 ";
        print "<br><strong>Distribution List (ready for cut and paste):</strong>";
        //first pass just gets the column names
        print "<table> \n";

        $result = $con->query($query);
        //return only the first row (we only need field names)
        $row = $result->fetch(PDO::FETCH_ASSOC);

        print "  <tr> \n";
        foreach ($row as $field => $value){
          if ($field == "firstName") print " <th>  <span style='margin-left:2em'> </th> "; 
          if ($field == "lastName") print " <th>  <span style='margin-left:1em'></th> ";	
		  if ($field == "emailAddress") print " <th>  <span style='margin-left:6em'></th> ";			  
        } // end foreach
        print "  </tr> ";
 
        //second query gets the data
        $data = $con->query($query);
        $data->setFetchMode(PDO::FETCH_ASSOC);		

        foreach($data as $row){
          print "  <tr> \n";

          foreach ($row as $name=>$value){              
			
			if ($name=='firstName') {
			  print "<td>$value </td> \n";			  
            }
			
			if ($name=='lastName') {
			  print "<td>$value</td> \n";			  
            }
			
			if ($name=='emailAddress') {
			  print "<td>&#60 $value &#62,</td> \n";
            } 			
			
          } // end field loop

          print "  </tr> \n";
        } // end record loop

        print "</table> \n";

      } catch(PDOException $e) {
          echo 'ERROR: ' . $e->getMessage();
      } // end try
    }   // end if
?>
 
</div> 
   
</body>
</html>
