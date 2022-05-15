<?php
  session_start();
  $groupName = $_SESSION["groupName"];
  $emailAddress = $_SESSION["mbrID"];
  $mbrID = $emailAddress;
  $status = "A"
?> 
<!DOCTYPE html>
<html>
<head>
  <title>hot</title>
  <meta charset = "UTF-8" />
  
  <link href='//fonts.googleapis.com/css?family=Montserrat:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css' />
  <link rel="stylesheet" type="text/css" href="hot-1col.css">

</head>
<body>

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
  
  <div id = "myList"> 
  <style type = "text/css">
		  
	#myList {
		margin: 100px;
		margin-top:2px;
	}
  </style>
  
	  <br><br><h2><strong> Ownership Report</strong></h2>  
       
<?php

      $stopPrint = false;		
      try {
		
        $mysql_dsn = $_SESSION["mysql_dsn"];
	    $mysql_username = $_SESSION["mysql_username"];
        $mysql_password = $_SESSION["mysql_password"];
		
        $con= new PDO($mysql_dsn, $mysql_username, $mysql_password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT firstName, lastName, printersOwned 
		          FROM members
                  WHERE printersOwned != ''
				  AND status != 'D'
				  ORDER BY printersOwned DESC";
        
        //first pass just gets the column names
        print "<table> \n";

        $result = $con->query($query);
        //return only the first row (we only need field names)
        $row = $result->fetch(PDO::FETCH_ASSOC);

        print "  <tr> \n";
        foreach ($row as $field => $value){
		  if ($field == "firstName") print " <th> <u>Member Name</u>  <span style='margin-left:1em'></th> \n";		  
		  if ($field == "lastName") print " <th>  <span style='margin-left:1em'></th> \n";
          if ($field == "printersOwned") print " <th> <u>3D Printers Owned</u> </th> \n"; 
          	  
        } // end foreach
        print "  </tr> \n";
 
        //second query gets the data
        $data = $con->query($query);
        $data->setFetchMode(PDO::FETCH_ASSOC);		

        foreach($data as $row){			
		  if ($stopPrint == true) break;
		  
          print "  <tr> \n";

          foreach ($row as $name=>$value){
			if ($stopPrint == true) break;
			
		    if ($name == 'firstName') {
			  $firstName = $value;
			  print " <td> $firstName </td> \n";
            }
			
			if ($name == 'lastName') {
			  $lastName = $value;
			  print " <td> $lastName  </td> \n";
            }
			
			if ($name == 'printersOwned') {
			  $printersOwned = $value;
 			  if ($printersOwned == "" ) {
 				  $stopPrint = true;
 			  }
			  print " <td> <span style='margin-left:5em'>$printersOwned  </td> \n";
            }
			
          } // end field loop
	  
          print "  </tr> \n";		  
		  
        } // end record loop

        print "</table> \n";

      } catch(PDOException $e) {
          echo 'ERROR: ' . $e->getMessage();
      } // end try

?>   
   
</body>
</html>
