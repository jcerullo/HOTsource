<?php
	session_start();
   	include("session.php");
	    $mysql_dsn = $_SESSION["mysql_dsn"];
	    $mysql_username = $_SESSION["mysql_username"];
        $mysql_password = $_SESSION["mysql_password"];
		$logedin = false;
		$date = date("Y-m-d H:i:s");
?> 
<!DOCTYPE html>
<html>
<head>
  <title>HOT</title>
  <meta charset="utf-8"/>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
     integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="main.css">
  <script type="text/javascript" src = "jquery-3.3.1.js"> </script>
</head>
<body>

<?php
    $userNbr = '';
	$userName = '';
	$password = '';
	$newUser = '';
	$newPassword = '';
	$currentRcdNbr = '';
	$currentTimestamp = '';			  
	$currentUserName = '';
	$currentUserNbr = '';
    $currentPassword = '';
    if (filter_has_var(INPUT_POST, "usernum")) {
        $userNbr = filter_input(INPUT_POST, "usernum");
    }	
    if (filter_has_var(INPUT_POST, "uname")) {
        $userName = filter_input(INPUT_POST, "uname");
    }		
    if (filter_has_var(INPUT_POST, "passwd")) {
        $password = filter_input(INPUT_POST, "passwd");
    }
	
if ($logedin == false) {
	try {                                                
        $con= new PDO($mysql_dsn, $mysql_username, $mysql_password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
        $result = $con->query("SELECT * FROM credentials 
							   ORDER BY rcdNbr ");
		$result->setFetchMode(PDO::FETCH_ASSOC);

		foreach ($result as $row) {
		  foreach ($row as $name =>$value ) {
			if ($name == 'rcdNbr')    $currentRcdNbr = $value;
			if ($name == 'timestamp') $currentTimestamp = $value;			  
			if ($name == 'userName')  $currentUserName = $value;
			if ($name == 'userNbr')   $currentUserNbr = $value;
            if ($name == 'password')  $currentPassword = $value;
			if ($name == 'url')       $currentURL = $value;
		  }		 		  
	    }           		   		
    }		 //end of try
 	
    catch(PDOException $e) {
        echo 'ERROR: ' . $e->getMessage();
    }	
}

if ($userNbr == $currentUserNbr && $userName == $currentUserName && $password == $currentPassword) {
	$logedin = true;
}
		
?>	
  
<?php
if ($logedin) {
print <<<HERE
  <div class = "member"> 
  <style type = "text/css">
  
          fieldset {
            width: 600px;
			color: white;
            background-color: black;
            margin-left: auto;
            margin-right: auto;
            box-shadow: 5px 5px 5px gray;
          }
		  
          label {
            float: left;
            clear: left;
            width: 250px;
            text-align: right;
            padding-right: 1em;
          }
                   
          input {
            float: left;
          }
		  
		  select {
			  float:left;
		  }
          
          :required {
            border: 1px solid red;
          }
          
          :invalid {
            color: white;
            background-color: red;
          }
          
          button {
		    text-align: center;
            display: block;
            margin-left: auto;
            margin-right: auto;
            clear: both;
          }
		  
		  #submit {
			color: black;
		    background-color: white;
			margin-left: 30px;
		  }
  </style>

    <form id="myform" action = "$currentURL" method= "get">
      <fieldset> <br>

		<label>Login Sucessful!</label>			  
			 
        <input type="submit" id = "submit" name = "submit" value = "Continue"/> <br>
		
      </fieldset>
    </form>
	
    <script type="text/javascript">
		window.onload = function() {
			document.getElementById("myform").submit.click();
		}
	</script>
        
HERE;
}         // end if

else {
print <<<HERE
  <div class = "member"> 
  <style type = "text/css">
  
          fieldset {
            width: 600px;
			color: white;
            background-color: black;
            margin-left: auto;
            margin-right: auto;
            box-shadow: 5px 5px 5px gray;
          }
		  
          label {
            float: left;
            clear: left;
            width: 250px;
            text-align: right;
            padding-right: 1em;
          }
                   
          input {
            float: left;
          }
		  
		  select {
			  float:left;
		  }
          
          :required {
            border: 1px solid red;
          }
          
          :invalid {
            color: white;
            background-color: red;
          }
          
          button {
		    text-align: center;
            display: block;
            margin-left: auto;
            margin-right: auto;
            clear: both;
          }
		  
		  #submit {
			color: black;
		    background-color: white;
			margin-left: 30px;
		  }
  </style>
	
    <form action = "login.html" method= "post">
      <fieldset> <br>

		<label>Login Failed!</label>			  
			 
        <input type="submit" id = "submit" value = "Retry"/> <br>
		
      </fieldset>
    </form>
HERE;
}         // end if


?> 
</body>
</html>