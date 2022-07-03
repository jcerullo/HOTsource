<?php
  session_start();
  $validUntilDate = "2022-12-31";
  $today = date("Y-m-d");
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
		width: 680px;
		height: 100px;
		background-color: red;
		margin-left: 0px;
		margin-right: auto;
		box-shadow: 5px 5px 5px gray;
	  }	  
  </style>
</head>

<body>
<?php
if ($today > $validUntilDate) $validDate = FALSE;
else $validDate = TRUE;

//                                                              First name analysis
    $firstNames = array();
	$lastNames = array();
	$emailAddresses = array();
	$passwords = array();
	
    if (filter_has_var(INPUT_POST, "firstName")){
        $firstNameEntered = filter_input(INPUT_POST, "firstName");
		
	  if ($firstNameEntered != "") {
        try {
        
	    $mysql_dsn = $_SESSION["mysql_dsn"];
	    $mysql_username = $_SESSION["mysql_username"];
        $mysql_password = $_SESSION["mysql_password"];
		
        $con= new PDO($mysql_dsn, $mysql_username, $mysql_password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
        $query = "SELECT firstName, lastName, emailAddress, password
		                 FROM members
						 WHERE firstName = '$firstNameEntered'";
        
        //first pass just gets the column names

        $result = $con->query($query);
        //return only the first row (we only need field names)
        $row = $result->fetch(PDO::FETCH_ASSOC);
        if (is_array($row) == true) {
        foreach ($row as $field => $value){ 		  
        } // end foreach
		}
		
        //second query gets the data
        $data = $con->query($query);
        $data->setFetchMode(PDO::FETCH_ASSOC);		

        foreach($data as $row){
          print "  <tr> \n";

          foreach ($row as $name=>$value){
			
		    if ($name=='firstName') {
			    $firstName = $value;	
			    $firstNames[] = $firstName;			 
            }
	
		    if ($name=='lastName') {
			    $lastName = $value;
			    $lastNames[] = $lastName;
			  
            }			
						  
			if ($name=='emailAddress') {
			    $emailAddress = $value;
			    $emailAddresses[] = $emailAddress;			  
            }
			
			if ($name=='password') {
			    $password = $value;
			    $passwords[] = $password;			  
            }
			
          } // end field loop
		 
        } // end record loop

		} catch(PDOException $e) {
				echo 'ERROR: ' . $e->getMessage();
		} // end try
	  
    }   // end ifs
	}

//                                                                  Last name analysis
    $LastfirstNames = array();
	$LastlastNames = array();
	$LastemailAddresses = array();
	$Lastpasswords = array();
	
    if (filter_has_var(INPUT_POST, "lastName")){
        $lastNameEntered = filter_input(INPUT_POST, "lastName");
		
	  if ($lastNameEntered != "") {
        try {
        
	    $mysql_dsn = $_SESSION["mysql_dsn"];
	    $mysql_username = $_SESSION["mysql_username"];
        $mysql_password = $_SESSION["mysql_password"];
		
        $con= new PDO($mysql_dsn, $mysql_username, $mysql_password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
        $query = "SELECT firstName, lastName, emailAddress, password
		                 FROM members
						 WHERE lastName = '$lastNameEntered'";
        
        //first pass just gets the column names

        $result = $con->query($query);
        //return only the first row (we only need field names)
        $row = $result->fetch(PDO::FETCH_ASSOC);
        if (is_array($row) == true) {
        foreach ($row as $field => $value){ 		  
        } // end foreach
		}
		
        //second query gets the data
        $data = $con->query($query);
        $data->setFetchMode(PDO::FETCH_ASSOC);		

        foreach($data as $row){
          print "  <tr> \n";

          foreach ($row as $name=>$value){
			
		    if ($name=='firstName') {
			    $firstName = $value;	
			    $LastfirstNames[] = $firstName;			 
            }
	
		    if ($name=='lastName') {
			    $lastName = $value;
			    $LastlastNames[] = $lastName;
			  
            }			
						  
			if ($name=='emailAddress') {
			    $emailAddress = $value;
			    $LastemailAddresses[] = $emailAddress;			  
            }
			
			if ($name=='password') {
			    $password = $value;
			    $Lastpasswords[] = $password;			  
            }
			
          } // end field loop
		 
        } // end record loop

		} catch(PDOException $e) {
				echo 'ERROR: ' . $e->getMessage();
		} // end try
	  
    }   // end ifs
	}
	
//                                                          Entered email address analysis
	$enteredAddrisOK = FALSE;
    if (filter_has_var(INPUT_POST, "emailAddr")){
		$emailEntered = strtolower(trim(filter_input(INPUT_POST, "emailAddr")));
	  if ($emailEntered != "") {
        try {
        
	    $mysql_dsn = $_SESSION["mysql_dsn"];
	    $mysql_username = $_SESSION["mysql_username"];
        $mysql_password = $_SESSION["mysql_password"];
		
        $con= new PDO($mysql_dsn, $mysql_username, $mysql_password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
        $query = "SELECT emailAddress
		                 FROM members
						 WHERE emailAddress = '$emailEntered'";
        
        //first pass just gets the column names

        $result = $con->query($query);
        //return only the first row 
        $row = $result->fetch(PDO::FETCH_ASSOC);
        if (is_array($row) == true) $enteredAddrisOK = TRUE;
		} catch(PDOException $e) {
				echo 'ERROR: ' . $e->getMessage();
		} // end try
	  }
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
if ($validDate) {
print <<<HERE
  <div id = "all">
    <div id = "main">
    <div id = "nav"></div>	
      <div id = "resources"> <br>
		<div id="myform">
  
    <form action = "" method= "post">
      <fieldset> <br>
        <label>Enter Your First Name </label>
        <input type="text" value="" id="txt_firstName" name="firstName" > <br>
		<label>Enter Your Last Name </label>
        <input type="text" value="" id="txt_lastName" name="lastName"> <br> 
		<label>Enter Your Email Address</label>
        <input type="text" value="" id="txt_emailAddr" name="emailAddr"> <br>
		<input type="submit" value = "submit" id = "submit"/>		
      </fieldset>
    </form>
	
	
		</div><br>
	  </div>
	</div>
  </div>
HERE;
}

if (! $validDate) {
print <<<HERE
  <div id = "all">
    <div id = "main"> 
      <div id = "resources"> <br>
  
<center> This page is date sensitive and only available during the library signup period. <br>
	Please email the database administrator at jcerullo@yahoo.com for library admission 
	outside of the signup period. <br><br></center>
	

	  </div>
	</div>
  </div>
HERE;
}
?>
  
  <div id = "myList"> 
  <style type = "text/css">
		  
	#myList {
		margin: 100px;
		margin-top:2px;
	}
  </style>
	   
<?php      
print " <h2><strong> Library Login Credentials are displayed below during the library signup period.<br>
		If nothing is displayed after pressing the submit button, then check your spelling and try again. <br>
		If all else fails, please email the database administrator at jcerullo@yahoo.com</strong></h2>";

if (sizeof($LastlastNames) == 0 && sizeof($lastNames) == 1) {
	print "<p> Email Address = <strong> $emailAddresses[0] </strong></p>";
	$displayedpwd = $passwords[0];
	if ($displayedpwd != 'changeme') $displayedpwd = '*******';
	print "<p> Password = <strong>$displayedpwd </strong> </p>";
}

if (sizeof($LastlastNames) == 1) {
	print "<p> Email Address = <strong> $LastemailAddresses[0] </strong></p>";
	$displayedpwd = $Lastpasswords[0];
	if ($displayedpwd != 'changeme') $displayedpwd = '*******';
	print "<p> Password = <strong>$displayedpwd </strong> </p>";
}

$logins =  sizeof($LastlastNames);
if ($logins > 1) {
	print "<p> $logins possible logins found with last name, $lastNameEntered. Select one of these: </p>";
	for ($i=0; $i<sizeof($LastlastNames); $i++) {
			if (strtolower($LastfirstNames[$i]) == strtolower($firstNameEntered) && strtolower($LastlastNames[$i]) == strtolower($lastNameEntered)) {
				print " Email Address = $LastemailAddresses[$i] <br>";
				$displayedpwd = $Lastpasswords[$i];
				if ($displayedpwd != 'changeme') $displayedpwd = '*******';
				print " Password = $displayedpwd  <br><br>";
			}
	}
}

if ($emailEntered != '') {
	if ($enteredAddrisOK) print "The entered email address, $emailEntered, is valid.";
	else print "The entered email address, $emailEntered, is NOT valid.";
}	
?>

</div> 
   
</body>
</html>
