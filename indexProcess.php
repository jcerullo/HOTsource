<?php 
header('Cache-Control: no cache'); 
session_cache_limiter('private_no_expire');
session_start();
	
    $mbrID = $_SESSION["mbrID"];
    $_SESSION["login"] = false;          // indicates a successful login
    $_SESSION["password"] = '';
    $_SESSION["status"] = 'A';           // default member status to active
?>

<html>
<head>
  <title>HOT</title>
  <meta charset="utf-8"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
     integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="main.css">
  <link rel = "stylesheet"
        type = "text/css"
        href = "jquery-ui-1.10.3.custom.css" />
  <style type = "text/css">
 
    h1 {
      text-align: center;
    }
    #selectable .ui-selecting {
      background-color: gray;
    }
    #selectable .ui-selected {
      background-color: black;
      color: white;
    }
	img {
	  float: left;
	}
  </style>
  <script type = "text/javascript"
          src = "jquery-1.9.1.js"></script>
  <script type = "text/javascript"
          src = "jquery-ui-1.10.3.custom.min.js"></script>
  <script type = "text/javascript">

    $(init);
    function init(){
	  
      $("#dialog").dialog({
		  autoOpen : false,         		  
	  }); 
	  
    } // end init
	
	var text = " ";
	
    function openDialog()
	{		
       $("#dialog").dialog("open");	   
    } // end openDialog
	
    function closeDialog(){
      $("#dialog").dialog("close");
    } // end closeDialog
	
	function showDialog(text)	
	{
        HTMLdata = 	"<p>" + text + "</p>"; 
	   $("#dialog").html(HTMLdata);
       $("#dialog").dialog("open");
	   $("#dialog").click(closeDialog);	   
    } // end showDialog

    </script>
</head>
<body>

<?php
  function init() {
	  
    global $mbrID;
	global $status;
	global $isAdmin;
	global $isMbr;
	global $isActive;
	global $password;
	global $lowLeftPhoto;
	global $lowLeftText;
	global $lowRightPhoto;
	global $lowRightText;
	global $groupPeriodPosition;
	global $eventPeriodPosition;
	
    if (filter_has_var(INPUT_POST, "mbrID")){
        $mbrID = strtolower(trim(filter_input(INPUT_POST, "mbrID")));
		$_SESSION["mbrID"] = $mbrID;
	}
	$enteredPassword = '';
	if (filter_has_var(INPUT_POST, "password")){
        $enteredPassword = trim(filter_input(INPUT_POST, "password"));
	}

	$_SESSION["isMbr"] = false;
	$memberPassword = '';

	if (isSet($_SESSION["mbrID"]) && $_SESSION["mbrID"] != NULL && $_SESSION["mbrID"] != " ")		
	{
        $mbrID =   $_SESSION["mbrID"];
	    $isAdmin = $_SESSION["isAdmin"];
		$isMbr = $_SESSION["isMbr"];
		$status = $_SESSION["status"];
	}
	else 
	{  
		$mbrID = "Guest";
		$isMbr = false;
		$isAdmin = false;
		$status = "D";
		
		$_SESSION["mbrID"] = "Guest";
		$_SESSION["password"] = "xxxxxx";
		$_SESSION["isAdmin"] = false; 
		$_SESSION["status"] = "I"; 
		$_SESSION["isActive"] = false;
		$_SESSION["isMbr"] = false;
		$_SESSION["emailAddress"] = '';
	}
																  
	try {                                                
	    $mysql_dsn = $_SESSION["mysql_dsn"];
	    $mysql_username = $_SESSION["mysql_username"];
        $mysql_password = $_SESSION["mysql_password"];
		
        $con= new PDO($mysql_dsn, $mysql_username, $mysql_password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
        $result = $con->query("SELECT * FROM members WHERE emailAddress = '$mbrID' ");
		$result->setFetchMode(PDO::FETCH_ASSOC);

		foreach ($result as $row) {
		  foreach ($row as $name =>$value ) {                              // populate SESSION variables
			if ($name == 'emailAddress')  $emailAddress = $value;
			if ($name == 'status') {
				$_SESSION["status"] = $value;
				$status = $value;
			}
		    if (isset($emailAddress )) { 
			  $_SESSION["isMbr"] = true;              // set isMbr
			  $_SESSION["mbrID"] = $emailAddress;     // set member ID
			}
			if ($name == 'firstName')  $firstName = $value;
			if ($name == 'lastName')   $lastName  = $value;
            if ($name == 'password') {
				$memberPassword = $value;
                $_SESSION["password"] = $value;      // set member password
            }				
		  }		 		  
	    }           		   		
    }		 //end of try
 	
    catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
	
	$mbrID = $_SESSION["mbrID"];                                                                  // initialize mbrID
    $_SESSION["login"] = true;                                                                    // initialize to successful login                                       
	if ($_SESSION["status"] == '' || $_SESSION["status"] == ' ') $_SESSION["status"] = 'A';       // initialize member status
	if ($_SESSION["isMbr"] == false) {
		$mbrID = "Guest";                                            // reset if not member
		$status = 'I';
		$_SESSION["login"] = false;
        $_SESSION["password"] = "xxxxxx";		
	}
	if ($_SESSION["status"] != 'A') $status = 'I';                            
	if ($enteredPassword != $memberPassword && ($memberPassword != '' || $memberPassword != ' ')) {
		$mbrID = "Guest";											// reset if not authorized                                                                         
		$_SESSION["mbrID"] = "Guest";																		 
		$_SESSION["isMbr"] = false;
        $status = 'I'; 
		$_SESSION["login"] = false;
		$_SESSION["password"] = "xxxxxx";
    }

	try {                                                
	    $mysql_dsn = $_SESSION["mysql_dsn"];
	    $mysql_username = $_SESSION["mysql_username"];
        $mysql_password = $_SESSION["mysql_password"];
		
        $con= new PDO($mysql_dsn, $mysql_username, $mysql_password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
        $result = $con->query("SELECT * FROM settings WHERE rcdNbr > 0 ");
		$result->setFetchMode(PDO::FETCH_ASSOC);

		foreach ($result as $row) {
		  foreach ($row as $name =>$value ) {                         
		    if ($name == 'lowLeftPhoto')  $lowLeftPhoto = $value;          
			if ($name == 'lowLeftText')  $lowLeftText = $value;
			if ($name == 'lowRightPhoto')   $lowRightPhoto  = $value;
			if ($name == 'lowRightText')   $lowRightText  = $value;
		  }		 		  
	    }
		
		if ($lowRightPhoto != "") {
        $lowRightPhoto = trim($lowRightPhoto);                                          // copy event image
		$fileConnected = fopen("$lowRightPhoto.jpg", "r");
			if ($fileConnected == true) {				
				$shellCmd = "sudo " . "cp " . "$lowRightPhoto.jpg " . "event.jpg" ;
				shell_exec("$shellCmd");
				fclose($fileConnected);
			}
		}
		
		if ($lowLeftPhoto != "") {
        $lowLeftPhoto = trim($lowLeftPhoto);                                          // copy group image
		$fileConnected = fopen("$lowLeftPhoto.jpg", "r");
			if ($fileConnected == true) {								
				$shellCmd = "sudo " ."cp " . "$lowLeftPhoto.jpg " . "group.jpg" ;
				shell_exec("$shellCmd");
				fclose($fileConnected);
			}
		}

        $groupPeriodPosition = (int) stripos( $lowLeftText, "." );
        $eventPeriodPosition = (int) stripos( $lowRightText, "." );	
		
//                                                                                   set isAdmin
        $_SESSION["isAdmin"] = false;
		$result = $con->query("SELECT * FROM groups WHERE adminEmail = '$mbrID' ");
		$result->setFetchMode(PDO::FETCH_ASSOC);
		foreach ($result as $row) {
		  foreach ($row as $name =>$value ) {            // test for isAdmin
			if ( $value == $mbrID) {
				$isAdmin = true;
                $_SESSION["isAdmin"] = true;				
            }
			If ($name == 'masterKey')  $_SESSION["masterKey"] = $value;
		  }		 		  
	    }   		
    }		 //end of try
 	
    catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }
	

	if ($status == "A") 
	{
		$_SESSION["status"] = $status;
		$_SESSION["isActive"] = true;		
	}
	else
	{
		$_SESSION["status"] = $status;
		$_SESSION["isActive"] = false;
	}	
  }    //end init function
  
  init();
?>
	
<?php
  if ($isAdmin) {
    include("navAdmin.html");
  }
  else {
	include("nav.html");
  }
?>  

<?php

switch ($status) {
case "A":	
print <<<HERE
<section class="jumbotron">
  <div class="container">
    <div class="row text-center">
	
      <form action="member.php" method= "post">
	  <h4><p> You are logged into the Library as</p></h4>
      <h4><p> $mbrID </p></h4>										       
	  <h4><input class="btn btn-primary" type="submit" autofocus value = "Continue" autofocus/></h4>
	</form>
	
    </div>
  </div>
</section>
HERE;
break;

case "I": 
print <<<HERE
<section class="jumbotron">
  <div class="container">
    <div class="row text-center">
	
      <form action="member.php" method= "post">
      <h4><p> Logged in as</p></h4>
      <h4><p> $mbrID </p></h4>		
	  <h4><input class="btn btn-primary" type="submit" autofocus value = "Continue"/></h4>	  	
	  </form>
	
    </div>
  </div>
</section>

HERE;
break;

default:
print <<<HERE
<section class="jumbotron">
  <div class="container">
    <div class="row text-center">
	
      <form action="member.php" method= "post">
      <h4><p> Logged in as</p></h4>
      <h4><p> $mbrID </p></h4>		
	  <h4><input class="btn btn-primary" type="submit" value = "Continue"/></h4>
	</form>
	
    </div>
  </div>
</section>
HERE;
}
?>

<?php

if ($groupPeriodPosition != 0 ) {
	$groupButtonText = "New HOT Info is available. Press Here";
print <<<HERE
    <style type = "text/css">            
        .group  {
		  background-color: pink;
		} 		  
    </style>
HERE;
}
else {
	$groupButtonText = "H.O.T. Announcements";
}

if ($eventPeriodPosition != 0 ) {
	$eventButtonText = "New Scheduled Event Info is available. Press Here";
print <<<HERE
    <style type = "text/css">            
        .event  {
		  background-color: pink;
		} 		  
    </style>
HERE;
}
else {
	$eventButtonText = "Scheduled Events";
}

$showGroupText = '"' . $lowLeftText . '"';
$showEventsText = '"' . $lowRightText . '"';
 
print <<<HERE
  
<section class='container'>
 <div class='row'>
   <figure class='col-sm-6'>
    <input type = 'button' class='group'
			  value = '$groupButtonText'
			  onclick = 'showDialog($showGroupText)' /><br><br>
    <img src='group.jpg' alt= 'court photo'/>
    </figure>
   
    <figure class='col-sm-6'>
	 <input type = 'button' class='event'
              value = '$eventButtonText'
              onclick = 'showDialog($showEventsText)' /><br><br>
     <img src = 'event.jpg' alt= 'restaurant photo'/>
    </figure>  
 </div>
</section>
HERE;
?>

  <footer class="container">
  <div class="row">
    <p class="col-sm-4">&copy; 2017 Site design by jcerullo@yahoo.com</p>
    <ul class="col-sm-8">
      
      <li class="col-sm-1">
       <img src="https://s3.amazonaws.com/codecademy-content/projects/make-a-website/lesson-4/twitter.svg">
      </li>
      
     <li class="col-sm-1"> 
       <img src="https://s3.amazonaws.com/codecademy-content/projects/make-a-website/lesson-4/facebook.svg">
      </li>
      
     <li class="col-sm-1"> 
       <img src="https://s3.amazonaws.com/codecademy-content/projects/make-a-website/lesson-4/instagram.svg">
      </li>
      
     <li class="col-sm-1"> 
       <img src="https://s3.amazonaws.com/codecademy-content/projects/make-a-website/lesson-4/medium.svg">
      </li>
      
    </ul>
  </div>
  </footer>
  
<div id = "dialog"
    title = "HOT" >
</div>

</body>
</html>
