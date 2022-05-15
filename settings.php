<?php
  session_start();
  $isAdmin = $_SESSION["isAdmin"];
  $mysql_dsn = $_SESSION["mysql_dsn"];
  $mysql_username = $_SESSION["mysql_username"];
  $mysql_password = $_SESSION["mysql_password"];
?>

<html>
<head>
  <title>hot</title>
  <meta charset = "UTF-8" />
  
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css"
     integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="main.css">

</head>
<body>

<?php
	
	try {
        $con= new PDO($mysql_dsn, $mysql_username, $mysql_password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT  *
		          FROM    settings 
				  WHERE   rcdNbr > 0  ";
        
        //first pass just gets the column names
        $result = $con->query($query);
        //return only the first row (we only need field names)
        $row = $result->fetch(PDO::FETCH_ASSOC);

        foreach ($row as $field => $value){
        } // end foreach
 
        //second query gets the data
        $data = $con->query($query);
        $data->setFetchMode(PDO::FETCH_ASSOC);		

        foreach($data as $row){
          foreach ($row as $name=>$value){              
						
			if ($name == 'lowLeftPhoto')    $groupPhoto = $value;
			if ($name == 'lowLeftText')     $groupText =  $value;
			if ($name == 'lowRightPhoto')   $eventPhoto =  $value;
			if ($name == 'lowRightText')    $eventText =   $value;
			
          } // end field loop
		  
        } // end record loop

    } catch(PDOException $e) {
          echo 'ERROR: ' . $e->getMessage();
    } // end try
	
    if (filter_has_var(INPUT_POST, "eventPhoto"))
	{
        $eventPhoto = filter_input(INPUT_POST, "eventPhoto");

		if (filter_has_var(INPUT_POST, "eventText")) {
			$eventText = filter_input(INPUT_POST, "eventText");
			$eventText = strtr($eventText,"'"," ");               //strip out ' and " (so that SQL is happy)
			$eventText = strtr($eventText,'"',' ');
			$eventText = trim($eventText);
		}

		if (filter_has_var(INPUT_POST, "groupPhoto"))
			$groupPhoto = filter_input(INPUT_POST, "groupPhoto");
		
		if (filter_has_var(INPUT_POST, "groupText")) {
			$groupText = filter_input(INPUT_POST, "groupText");
			$groupText = strtr($groupText,"'"," ");               //strip out ' and " (so that SQL is happy)
			$groupText = strtr($groupText,'"',' ');
			$groupText = trim($groupText);
	    }
                                              // update SQL record
		try {
        
        $con= new PDO($mysql_dsn, $mysql_username, $mysql_password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
                                                           // then update SQL record
			
	        $result = $con->prepare("UPDATE settings
		                              SET lowLeftPhoto = '$groupPhoto',
					                      lowLeftText  = '$groupText',
					                      lowRightPhoto= '$eventPhoto',
						                  lowRightText = '$eventText'
					                  WHERE rcdNbr > 0 ");
			$result->execute();
					 
        }		 //end of try
 	
        catch(PDOException $e) {
          echo 'ERROR: ' . $e->getMessage();
	    }
		
    } //end if

?>

<?php
  if ($isAdmin) {
    include("navAdmin.html");
  }
  else {
	include("nav.html");
  }
?> 
  <h1> <strong><span style='margin-left:12em'>First Page Settings </strong></h1>
			 
  <div class = "setting"> 
  <style type = "text/css">
          fieldset {
            width: 650px;
            background-color: #eeeeee;
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
            display: block;
            margin-left: auto;
            margin-right: auto;
            clear: both;
          }
		  
		  p {
			margin-left: 100px;
		  }
		  
		  #submit {
			margin-left: 450px;
		    background-color: lightyellow;
		  }
  </style>
  
<?php
$isAdmin = $_SESSION["isAdmin"]; 
if ($isAdmin) {
print <<<HERE

    <form action = "settings.php" method= "post">
      <fieldset> <br>
	  
        <label>Special Event Photo is </label>
        <input type="text" value="$eventPhoto" id="txt_eventPhoto" name="eventPhoto"> <br><br>
		
		<label>Special Event Text is </label>
        <textarea id="txt_eventText" 
				  name="eventText"
				  rows= "8"
				  columns="60"> $eventText </textarea><br><br>
				  
		<label>Group Photo is </label>
        <input type="text" value="$groupPhoto" id="txt_groupPhoto" name="groupPhoto"> <br><br>
		
        <label>Group Text is </label>
        <textarea id="txt_groupText" 
				  name="groupText"
				  rows= "7"
				  columns="60"> $groupText </textarea><br>
		
        <input type="submit" value = "submit" id = "submit"/> <br>
      </fieldset>
    </form>
HERE;
}         // end if admin
?>

  </div>  

</body>
</html>
