<?php
  session_start();
  $logedin = false;
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
    if (filter_has_var(INPUT_POST, "usernum")) {
        $userNbr = filter_input(INPUT_POST, "usernum");
    }	
    if (filter_has_var(INPUT_POST, "uname")) {
        $userName = filter_input(INPUT_POST, "uname");
    }		
    if (filter_has_var(INPUT_POST, "passwd")) {
        $password = filter_input(INPUT_POST, "passwd");
    }
	
	if ($userName == 'admin' && $password == 'password') $logedin = true;
		
?>	
  
<?php
if ($logedin) {

// create a new cURL resource
$ch = curl_init();

// set URL and other appropriate options
curl_setopt($ch, CURLOPT_URL, "https://handsontechorg.weebly.com/facilitators.html?");
curl_setopt($ch, CURLOPT_HEADER, 0);

// grab URL and pass it to the browser
curl_exec($ch);

// close cURL resource, and free up system resources
curl_close($ch);

}         // end if

else {
print <<<HERE
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
		  
		  #submit {
		    background-color: lightyellow;
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