<?php
  session_start();
  $isAdmin = $_SESSION["isAdmin"];
  $mysql_dsn = $_SESSION["mysql_dsn"];
  $mysql_username = $_SESSION["mysql_username"];
  $mysql_password = $_SESSION["mysql_password"];
?>

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
	$date = date("Y-m-d H:i:s");	
	
    if (filter_has_var(INPUT_POST, "fromDate")) {
        $fromDate = filter_input(INPUT_POST, "fromDate");
        if ($fromDate == "") $fromDate = "0000-00-00";		
	} 
    else {
		$fromDate = "0000-00-00";
	}
//  Process the new member questionaire
		
$timestamp = array();
$emailAddress = array();
$firstName = array();
$lastName = array();
$yourVillage = array();
$i = 0;
if (($handle = fopen('HOTmembers.csv', 'r')) !== FALSE) {      
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { 
			$spreadsheetDate = strtotime($data[0]);
			$timestamp[$i] = date('Y-m-d',$spreadsheetDate);			
			$emailAddress[$i] = strtolower($data[1]);
			$firstName[$i] = $data[2];
			$lastName[$i] = str_replace("'","",$data[3]);
			$yourVillage[$i] = str_replace("'","",$data[5]);
			$i++;
    }
fclose($handle);
}
	
$con= new PDO($mysql_dsn, $mysql_username, $mysql_password);
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
for ($i=0; $i < sizeof($timestamp); $i++) {
	      try {  		  		  
            $prep = $con->prepare("INSERT INTO members 
			            (timestamp,
						 changestamp,
						 emailAddress,
						 firstName,
						 lastName,
						 yourVillage,
						 status
						)			
			     VALUES
			            ('$timestamp[$i]',
						 '$timestamp[$i]',
						 '$emailAddress[$i]',
						 '$firstName[$i]',
						 '$lastName[$i]',
						 '$yourVillage[$i]',
						 'I'
                        )                ");

		    $prep->execute();
          }		 //end of try
											// do not replace the existing record
											// unless a new questionaire is replacing an old one
          catch(PDOException $e) {
			  
			$prep = $con->prepare("UPDATE members 							 
							SET		firstName =	   '$firstName[$i]',
						            lastName =     '$lastName[$i]',
						            yourVillage =  '$yourVillage[$i]',
									changestamp =  '$timestamp[$i]'
							WHERE   emailAddress = '$emailAddress[$i]' 
							AND		changestamp <  '$timestamp[$i]'
							     ");

			$prep->execute();			  
		  }   
		  
}        // end of for 

// Now process member groups: vhotsmcomp and vhot3dprint
// First, vhotsmcomp:

$vhotsmcompMember = array();
$i = 0;
if (($handle = fopen('vhotsmcomp.csv', 'r')) !== FALSE) {      
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {         
        $vhotsmcompMember[$i] = $data[0];                      
		$i++;
    }
    fclose($handle);
}	

$con= new PDO($mysql_dsn, $mysql_username, $mysql_password);
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


for ($i=0; $i < sizeof($vhotsmcompMember); $i++) {
	$emailAddress  = strtolower($vhotsmcompMember[$i]);

	try {  		  		  
        $prep = $con->prepare("INSERT INTO members 
			            ( timestamp,
						  changestamp,
						  emailAddress,
						  groupsJoined,
						  status
						)			
		VALUES
			            ('$date',
					  	 '$date',
						 '$emailAddress',
						 'vhotsmcomp',
						 'A'
                        )                ");

		$prep->execute();
    }		 //end of try		  
    catch(PDOException $e) {

		$prep = $con->prepare("UPDATE members 
			            SET 	groupsJoined = 'vhotsmcomp'
                        WHERE   emailAddress = '$emailAddress'  ");

		$prep->execute();
	}	
}

// Second, process vhot3dprint:	

$vhot3dprintMember = array();
$i = 0;
if (($handle = fopen('vhot3dprint.csv', 'r')) !== FALSE) {      
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {          
        $vhot3dprintMember[$i] = $data[0];                      
		$i++;
    }
    fclose($handle);
}

$con= new PDO($mysql_dsn, $mysql_username, $mysql_password);
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

for ($i=0; $i < sizeof($vhot3dprintMember); $i++) {
	$emailAddress  = strtolower($vhot3dprintMember[$i]);
	
	try {  		  		  
        $prep = $con->prepare("INSERT INTO members 
			            ( timestamp,
						  changestamp,
						  emailAddress,
						  groupsJoined,
						  status
						)			
		VALUES
			            ('$date',
						 '$date',
						 '$emailAddress',
						 'vhot3dprint',
						 'A'
                        )                ");

		$prep->execute();
    }		 //end of try		  
    catch(PDOException $e) {
		
		$prep = $con->prepare("UPDATE members 
			            SET 	groupsJoined = 'vhotsmcomp vhot3dprint'
                        WHERE   emailAddress = '$emailAddress'
						AND 	groupsJoined = 'vhotsmcomp' ");

		$prep->execute();
		
		$prep = $con->prepare("UPDATE members 
			            SET 	groupsJoined = 'vhot3dprint'
                        WHERE   emailAddress = '$emailAddress'
						AND 	groupsJoined = ''  ");

		$prep->execute();
	}	
}
		
// Third step, process non-members (neither vhotsmcomp nor vhot3dprint) by setting status = 'D'.

$con= new PDO($mysql_dsn, $mysql_username, $mysql_password);
$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$prep = $con->prepare("UPDATE members 
			            SET 	status = 'D'
                        WHERE   firstName IS NULL
						OR		groupsJoined IS NULL
						");
		$prep->execute();

// change remaining inactive members to active 		
		$prep = $con->prepare("UPDATE members 
			            SET 	status = 'A'
                        WHERE   status = 'I'
						or		status = ''
						");
		$prep->execute();
?>
		
<?php
  if ($isAdmin) {
    include("navAdmin.html");
  }
  else {
	include("nav.html");
  }
?>

  <div class = "member"> 
  <style type = "text/css">
  
          fieldset {
            width: 600px;
            background-color: #d0f2f2;
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
		  
		  p {
			margin-left: 100px;
			text-align: center;
		  }
		  
		  h1 {
			margin-left: 100px;
            margin-right:100px;
			text-align: center;
		  }
		  
		  h2 {
			margin-left: 100px;
            margin-right:100px;
			text-align: center;
		  }
		  
		  #submit {
		    background-color: lightyellow;
			margin-left: 30px;
		  }
  </style>
  
	  <h1> Import Spreadsheet </h1>  
 
	
    <form action = "import.html" method= "post">
      <fieldset> <br>

		<label>Import Complete</label>			  
			 
        <input type="submit" id = "submit" value = "Continue"/> <br>
		
      </fieldset>
    </form>
 
</body>
</html>