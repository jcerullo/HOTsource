<?php

  session_start();
  include("session.php");
  $_SESSION["logging"] = true;            // flag to indicate if email address change logging is turned on
  $logging = $_SESSION["logging"];        
  $emailAddress = $_SESSION["mbrID"];
  $mbrID = $emailAddress;
  $isMbr = $_SESSION["isMbr"];
  $login = $_SESSION["login"];            // flag to indicate a successful login
  $memberPassword = $_SESSION["password"];
  
	function changeLog($action,$fileID,$fieldID,$fieldValue)
	{
		global $logging;
		if ($logging != true) return;
		$date = date("Y-m-d H:i:s");			
		$fileConnected = fopen("changeLog", "a");
		if ($fileConnected ) {
			$newLine = $date.",".$action.",".$fileID.",".$fieldID.",".$fieldValue.PHP_EOL;
			fwrite($fileConnected, $newLine );
			fclose ($fileConnected);
		}  
	}

	function validLogin($mbr, $pwd)
	{
	  try {
		$mysql_dsn = $_SESSION["mysql_dsn"];
	    $mysql_username = $_SESSION["mysql_username"];
        $mysql_password = $_SESSION["mysql_password"];
		
        $con= new PDO($mysql_dsn, $mysql_username, $mysql_password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		  
        $query = "SELECT *
		                 FROM members 
						 WHERE emailAddress = '$mbr'
                         AND password = '$pwd' ";
						 
        $result = $con->query($query);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        if ($row) {
            return true;
		}
        else {			
			return false;
		}
	  }		 //end of try
 	
      catch(PDOException $e) {
          echo 'ERROR: ' . $e->getMessage();
	  }
	}

		
  if ($login != true ) {                                // if not yet logged in, process url
	  
	if (isset($_GET['mbrID']) && $_GET['mbrID'] != '') {
		$mbrID = $_GET['mbrID'];                        // mbrID is set in URL
		$mbrID = strtolower(trim($mbrID));
		$_SESSION["mbrID"] = $mbrID;		
	}
     
	if (isset($_GET['pwd'])) {
		$enteredPassword = $_GET['pwd'];                   // password is set in URL
		$enteredPassword = trim($enteredPassword);		
		if (validLogin($mbrID, $enteredPassword)) {
			$_SESSION["login"] = true;                     // login successful
			$login = true;
			$_SESSION["password"]	= $enteredPassword; 
		}
		else {
			$mbrID = "Guest";                              // login unsuccessful
		}
    }		
  }
  
?> 
<!DOCTYPE html>
<html>
<head>
  <title>HOT</title>
  <meta charset = "UTF-8" />
  <link href='//fonts.googleapis.com/css?family=Montserrat:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css' />
  <link rel="stylesheet" type="text/css" href="hot-1col.css">
  <script type="text/javascript" src = "jquery-3.3.1.js"> </script>
  <script type="text/javascript">
  
  $(init);
  
  function init() {
	  // load up 3D printers list from DB
	  $("#groupList").load("groupList.php");
	  $("#printersList").load("printersList.php");
  }  //end init
  
  </script>
</head>
<body>

<?php
  function init() {

	global $mbrID;
	global $isAdmin;
	global $isMbr;
	global $isActive;
	global $password;
	global $firstName;
    global $lastName;
	global $yourVillage;
	global $emailAddress;
	global $gitHubID;
	global $printersOwned;
	global $groupsJoined;	
	global $status;
    global $groupName;
    global $moderatedBy;
  }               // end function init
  
  $groupArray = array();
  $printerArray = array();
  init();
  $date = date("Y-m-d H:i:s");
  
    if (filter_has_var(INPUT_POST, "selGroups")) {
        $values = $_POST['selGroups'];
		$i = 0;
		foreach ($values as $selGroups ) {
			$groupArray[$i] = $selGroups;
			$i = $i + 1;
		}
	}
	
	if (filter_has_var(INPUT_POST, "selPrinters")) {
        $values = $_POST['selPrinters'];
		$i = 0;
		foreach ($values as $selPrinters ) {
			$printerArray[$i] = $selPrinters;
			$i = $i + 1;
		}
	}

	if ($mbrID != "Guest") {
        $firstName = trim(filter_input(INPUT_POST, "firstName"));	  
        $lastName = trim(filter_input(INPUT_POST, "lastName"));		
        $emailAddress = strtolower(trim(filter_input(INPUT_POST, "emailAddress")));
		$confirmEmail = strtolower(trim(filter_input(INPUT_POST, "confirmEmail")));
        $yourVillage = trim(filter_input(INPUT_POST, "yourVillage"));
        $githubID = trim(filter_input(INPUT_POST, "githubID"));
        $enteredPassword = trim(filter_input(INPUT_POST, "password"));
		$status = trim(filter_input(INPUT_POST, "status"));
		
		if (filter_var($emailAddress, FILTER_VALIDATE_EMAIL)) {}
		else {
          $emailAddress = $mbrID;  // do not change email address if invalid format
		}
		  	
		for ($i=0; $i < sizeof($groupArray); $i++) {
          $groupsJoined .= "$groupArray[$i] " ;
		}
		
		for ($i=0; $i < sizeof($printerArray); $i++) {
          $printersOwned .= "$printerArray[$i], " ;
		}

		try {       
		$mysql_dsn = $_SESSION["mysql_dsn"];
	    $mysql_username = $_SESSION["mysql_username"];
        $mysql_password = $_SESSION["mysql_password"];
		
			$con= new PDO($mysql_dsn, $mysql_username, $mysql_password);
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			
			if ($firstName != "") {
				if ($firstName == '.') $firstName = '';
				$result = $con->prepare("UPDATE members 
                      SET 	firstName = '$firstName', changestamp = '$date'  			
			          WHERE emailAddress = '$mbrID'  ");
				$result->execute();				
			}
			
			if ($lastName != "") {
				if ($lastName == '.') $lastName= '';
				$result = $con->prepare("UPDATE members 
                      SET 	lastName = '$lastName', changestamp = '$date' 			
			          WHERE emailAddress = '$mbrID'  ");
				$result->execute();
			}
		
			if ($emailAddress != "" && $emailAddress == $confirmEmail ) {
				$result = $con->prepare("UPDATE members 
                      SET 	emailAddress = '$emailAddress', changestamp = '$date' 			
			          WHERE emailAddress = '$mbrID'  ");
				$result->execute();	
				changeLog("change",$mbrID,"emailAddress",$emailAddress);    // log email change
				$mbrID = $emailAddress;                                     // reset member ID
				$_SESSION["mbrID"] = $mbrID;				
			}
			
			if ($yourVillage != "") {
				if ($yourVillage == '.') $yourVillage = '';
				$result = $con->prepare("UPDATE members 
                      SET 	yourVillage = '$yourVillage', changestamp = '$date' 			
			          WHERE emailAddress = '$mbrID'  ");
				$result->execute();
			}
			
			if ($githubID != "") {
				if ($githubID == '.') $githubID = '';
				$result = $con->prepare("UPDATE members 
                      SET 	githubID = '$githubID', changestamp = '$date' 			
			          WHERE emailAddress = '$mbrID'  ");
				$result->execute();
			}
			
			if ($enteredPassword != "" && $enteredPassword != " ") {
				if ($enteredPassword == ".") $enteredPassword = '';           // allow member to disable password entry
				$result = $con->prepare("UPDATE members 
                      SET 	password = '$enteredPassword', changestamp = '$date' 			
			          WHERE emailAddress = '$mbrID'  ");
				$result->execute();
				$_SESSION["password"] = $enteredPassword;                     // set member password
			}			
			
			
			if ($printersOwned != "") {
				if ($printersOwned == '*none, ') $printersOwned = '';
				$result = $con->prepare("UPDATE members 
                      SET 	printersOwned = '$printersOwned', changestamp = '$date' 			
			          WHERE emailAddress = '$mbrID'  ");
				$result->execute();
			}
			
			if ($groupsJoined != "") {
				$result = $con->prepare("UPDATE members 
                      SET 	groupsJoined = '$groupsJoined', changestamp = '$date' 			
			          WHERE emailAddress = '$mbrID'  ");
				$result->execute();
			}
			
			if ($status != "") {
				$result = $con->prepare("UPDATE members 
                      SET 	status = '$status', changestamp = '$date' 			
			          WHERE emailAddress = '$mbrID'  ");
				$result->execute();
				changeLog("change",$mbrID,"status",$status);    // log user's library status
			}			
							 
		}		 //end of try
			
        catch(PDOException $e) {
          echo 'ERROR: ' . $e->getMessage();
	    }		

    }  //end if
?>
<span style='margin-left:2em'><a href = "index.html"><img src = "images/hot-org-logo.png"></a>
<div id="wrapper"><!--start menu-->
	<navi id="navi"> 
	<ul id="navigation">
		<li><a href="library.php">Login</a></li>
		<li><a href="#">Members &raquo;</a>
			<ul>
				<li><a href="mbrProfile.php">Extended Profile</a></li>
                <li><a href="memberSearch.php">Member Search</a></li>	
				<li><a href="members.php">Member List</a></li>				
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

  <div id = "all">
    <div id = "main">
	<div id = "nav">
	        <br><br>
        <ul>
          <li><a href = "mbrProfile.php"> Extended Profile</a></li><br>
        </ul>
	</div>	
      <div id = "resources"> <br>
		<div id="myform">  
			<form action = "member.php" method = "post" >
			  <fieldset> <br>
				<center> CHANGE FORM </center><br>  <center>Press the submit button after entering changes: </center><br>
				<label>Change First Name</label>
				<input type="text" id="txt_firstName" name="firstName" ><br>
				<label>Change Last Name</label>
				<input type="text" id="txt_lastName" name="lastName" > <br>
				<label>Change Email Address</label>
				<input type="text" id="txt_emailAddr" name="emailAddress" > <br>		
				<label>Confirm Email Address</label>
				<input type="text" id="txt_confirmEmail" name="confirmEmail" > <br>		
				
				<label>Change Village</label>
				<input type="text"  id="txt_yourVillage" name="yourVillage" > <br>
				
				<label >Change Groups Joined</label>
				<select id="groupList" name="selGroups[]" multiple size=2>
				</select><br><br>		
						
				<label >Change Printers Owned</label>
				<select id="printersList" name="selPrinters[]" multiple size=4 >		  
				</select>
				
				<label>Change GitHub ID</label>
				<input type="text" id="txt_githubID" name="githubID" > <br>
				
				<label>Change Password</label>
				<input type="text" id="txt_password" name="password" > <br>
				
				<label >Change Status </label>
				<select id="txt_status" name="status" >
				  <option value = "A"> Active </option>	
				  <option value = "I"> Inactive </option>
				  <option value = "D"> Delete </option>		  
				</select>
	
				<input type="submit" id = "submit"  value = "submit"> <br>
			  </fieldset>
			</form></center>
		</div><br>
	  </div>
	</div>
  </div>

<div id = "contentCenter"> 
  
	  <h3><strong> Current Member Profile Information </strong></h3>  
       
<?php

    if ($mbrID != "Guest") { 

      try {
		
        $mysql_dsn = $_SESSION["mysql_dsn"];
	    $mysql_username = $_SESSION["mysql_username"];
        $mysql_password = $_SESSION["mysql_password"];
		
        $con= new PDO($mysql_dsn, $mysql_username, $mysql_password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT *
		                 FROM members
						 WHERE emailAddress = '$mbrID'
						 AND   status != 'D' ";
        
        //first pass just gets the column names
        print "<table> \n";

        $result = $con->query($query);
        //return only the first row (we only need field names)
        $row = $result->fetch(PDO::FETCH_ASSOC);
        if (is_array($row) == true) {
        print "  <tr> \n";
        foreach ($row as $field => $value){

		  if ($field == "firstName") print " <th><u> First Name</u> <span style='margin-left:1em'></th> \n";
		  if ($field == "lastName") print " <th><u> Last Name</u> <span style='margin-left:1em'></th> \n"; 
		  if ($field == "emailAddress") print " <th><u> Email Address </u><span style='margin-left:8em'></th> \n";
          if ($field == "yourVillage") print " <th><u> Village </u><span style='margin-left:2em'></th> \n";
          if ($field == "githubID") print " <th><u> GitHub ID </u><span style='margin-left:2em'></th> \n"; 
		  if ($field == "groupsJoined") print " <th><u> Groups Joined </u><span style='margin-left:5em'></th> \n";
          if ($field == "printersOwned") print " <th><u> Printers Owned </u><span style='margin-left:5em'></th> \n";
  		  
        } // end foreach
        print "  </tr> \n";
		}
		else {
		print "<u><strong>Email Address</strong></u> <br> $mbrID";  // if member is inactive
		}
        //second query gets the data
        $data = $con->query($query);
        $data->setFetchMode(PDO::FETCH_ASSOC);		

        foreach($data as $row){
          print "  <tr> \n";

          foreach ($row as $name=>$value){
			
		    if ($name=='firstName') {
			    $firstName = $value;	
			    print "    <td><strong>$firstName</strong></td> \n";			 
            }
	
		    if ($name=='lastName') {
			    $lastName = $value;
			    print "    <td><strong>$lastName</strong></td> \n";
			  
            }			
						  
			if ($name=='emailAddress') {
				$_SESSION["isMbr"] = true;                                     // set member exists if email found
			    $emailAddress = $value;
			    print "    <td><strong>$emailAddress</strong></td> \n";			  
            }
			
			if ($name == 'yourVillage') {
                $yourVillage = $value;
				print "    <td><strong>$yourVillage</strong></td> \n";
			}			
			
			if ($name == 'githubID') {
                $githubID = $value;
				print "    <td><strong>$githubID</strong></td> \n";
			}

			if ($name == 'printersOwned') {
                $printersOwned = $value;
				print "    <td><strong>$printersOwned</strong></td> \n";
			}
			
			if ($name == 'groupsJoined') {
                $groupsJoined = $value;
				print "    <td><strong>$groupsJoined</strong></td> \n";
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
		print "LOGIN REQUIRED ";            // if Guest
	}
?>  
</div>   
</body>
</html>
