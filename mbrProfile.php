<?php

  session_start();
   	include("session.php");
	    $mysql_dsn = $_SESSION["mysql_dsn"];
	    $mysql_username = $_SESSION["mysql_username"];
        $mysql_password = $_SESSION["mysql_password"];	
        $emailAddress = $_SESSION["mbrID"];
        $mbrID = $emailAddress;
        $isMbr = $_SESSION["isMbr"];
		
	function formatPhoneNumber($phoneNumber)
	{
		global $phone;
		$phoneArrayIn = array();
		$phoneArrayOut = array();
		$phoneArrayIn = str_split($phoneNumber);
		$phone = '';
		$j = 0;
		for ($i=0; $i < sizeof($phoneArrayIn); $i++) {
			if (is_numeric( $phoneArrayIn[$i] )) {
				if ($j == 0) {
					$phoneArrayOut[$j] = '(';
					$j++;
					$phoneArrayOut[$j] = $phoneArrayIn[$i];
					$j++;
				}
				elseif ($j == 3) {
					$phoneArrayOut[$j] = $phoneArrayIn[$i];
					$j++;
					$phoneArrayOut[$j] = ') ';
					$j++;
				}
				elseif ($j == 7) {
					$phoneArrayOut[$j] = $phoneArrayIn[$i];
					$j++;
					$phoneArrayOut[$j] = '-';
					$j++;
				}
				else {
					$phoneArrayOut[$j] = $phoneArrayIn[$i];
					$j++;
				}
			}
		}
		for ($i=0; $i < sizeof($phoneArrayOut); $i++) {
			$phone .= $phoneArrayOut[$i];
		}
	}  
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
<?php
    // Process form if already displayed
	if ($mbrID != "Guest" && $mbrID != "guest" && $mbrID != '' && filter_has_var(INPUT_POST, "lastName")) {
        $firstName = trim(filter_input(INPUT_POST, "firstName"));	  
        $lastName = trim(filter_input(INPUT_POST, "lastName"));		
        $yourVillage = trim(filter_input(INPUT_POST, "yourVillage"));
        $githubID = trim(filter_input(INPUT_POST, "githubID"));
		$streetAddr = trim(filter_input(INPUT_POST, "streetAddr"));
		$phonePrimary = trim(filter_input(INPUT_POST, "phonePrimary"));
		$ecPhone = trim(filter_input(INPUT_POST, "ecPhone"));
		$ecName = trim(filter_input(INPUT_POST, "ecName"));
		
		formatPhoneNumber($phonePrimary);
		$phonePrimary = $phone;
		formatPhoneNumber($ecPhone);
		$ecPhone = $phone;		

		try {       
		$mysql_dsn = $_SESSION["mysql_dsn"];
	    $mysql_username = $_SESSION["mysql_username"];
        $mysql_password = $_SESSION["mysql_password"];
		
			$con= new PDO($mysql_dsn, $mysql_username, $mysql_password);
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	        $result = $con->prepare("UPDATE members
		              SET 
					      lastName = '$lastName',					      
					      yourvillage = '$yourVillage',
					      streetAddr = '$streetAddr',					      
						  githubID = '$githubID',
						  phonePrimary = '$phonePrimary',
					      ecName = '$ecName',
						  ecPhone = '$ecPhone'
					  WHERE emailAddress = '$mbrID' ");
			$result->execute();
									
		}		 //end of try
			
        catch(PDOException $e) {
          echo 'ERROR: ' . $e->getMessage();
	    }		

    }  //end if
?>
<?php
		$firstName = '';          //initialize display values
		$lastName = '';
		$memberSince = '';
		$phonePrimary = '';
		$yourVillage = '';
		$streetAddr = '';
        $groupsJoined  = '';
		$printersOwned  = '';
		$githubID = '';
		$status = '';
		$ecPhone = '';
		$ecName = '';
		$streetAddr = '';

	try {                                                
			$con= new PDO($mysql_dsn, $mysql_username, $mysql_password);
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
        $result = $con->query("SELECT * FROM members WHERE emailAddress = '$mbrID'  ");
		$result->setFetchMode(PDO::FETCH_ASSOC);

		foreach ($result as $row) {
		  foreach ($row as $name =>$value ) {                               // populate form values for form display
			if ($name == 'firstName' && $value != "")  $firstName = $value;
			if ($name == 'lastName' && $value != "")   $lastName  = $value;
			if ($name == 'timestamp' && $value != "")   $memberSince  = $value;
			if ($name == 'phonePrimary' && $value != "")   $phonePrimary  = $value;			
			if ($name == 'yourVillage' && $value != "")   $yourVillage  = $value;
			if ($name == 'groupsJoined' && $value != "")   $groupsJoined  = $value;
			if ($name == 'printersOwned' && $value != "")   $printersOwned  = $value;
			if ($name == 'githubID' && $value != "")   $githubID  = $value;
			if ($name == 'status' && $value != "")   $status  = $value;
			if ($name == 'ecPhone' && $value != "")   $ecPhone  = $value; //emergency contact phone number
			if ($name == 'ecName' && $value != "")   $ecName  = $value;   //emergency contact first name
			if ($name == 'streetAddr' && $value != "")   $streetAddr = $value;
		  }		 		  
	    }        		
    }		 //end of try
 	
    catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
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
</navi><br><br><br>

</div><!--end wrapper-->

<?php
print <<<HERE
  <div id = "all">
    <div id = "main">
	<div id = "nav">
	    <br><br>
        <ul>
          <li><a href = "member.php"> Basic Profile</a></li><br>
        </ul></div>
      <div id = "resources"> <br>
		<div id="myform">
   
    <form action = "" method = "post" >
      <fieldset> <br>
		<p><span style='margin-left:2em'><img src = "https://github.com/$githubID.png" alt = "photo" height="100" width="100" />
		<span style='margin-left:10em'><strong>Extended Member Profile</strong></p>
		<center>
        <label>First Name</label>
        <input type="text" id="txt_firstName" name="firstName" value="$firstName" disabled><br>
		<label>Last Name</label>
        <input type="text" id="txt_lastName" name="lastName" value="$lastName"> <br>
		<label>Member Since</label>
        <input type="text" id="txt_memberSince" name="memberSince" value="$memberSince" disabled> <br>
		<label>Email Address</label>
        <input type="text" id="txt_emailAddr" name="emailAddress" value="$emailAddress" disabled> <br>				
		
        <label>Village</label>
        <input type="text"  id="txt_yourVillage" name="yourVillage" value="$yourVillage"> <br>
		<label>Street Address</label>
        <input type="text" id="txt_street" name="streetAddr" value="$streetAddr"> <br>		
		
		<label >Groups Joined</label>
        <input type="text"  id="txt_groupsJoined" name="groupsJoined" value="$groupsJoined" disabled><br>		
		
        <label>GitHub ID</label>
        <input type="text" id="txt_githubID" name="githubID" value="$githubID"> <br>
		
        <label>Primary Phone</label>
        <input type="text" id="txt_phonePrimary" name="phonePrimary" value="$phonePrimary"> <br>
		
        <label>Emergency Contact Phone</label>
        <input type="text" id="txt_ecPhone" name="ecPhone" value="$ecPhone"> <br>
		
        <label>Emergency Contact Name</label>
        <input type="text" id="txt_ecName" name="ecName" value="$ecName"> <br>
		
        <input type="submit" id = "submit"  value = "submit">
      </fieldset>
	  
			</form></center>
		</div><br>
	  </div>
	</div>
  </div>
HERE;
?> 

</div>   
</body>
</html>
