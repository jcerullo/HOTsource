<?php
	session_start();
	$mbrID = '';
	$password = '';
	if (isset($_SESSION["password"])) $password = $_SESSION["password"];
	$db_setup = FALSE;
	include("session.php");                                                                  // Temporary override of session variables
	if ($db_setup != TRUE) {	
		$file = fopen ("https://thevillages.duckdns.org/HOT/remote_session.source", "r");    // Check DB server availability
		if (! $file) $db_setup = FALSE;			
		else {
			fclose($file);
			include("https://thevillages.duckdns.org/HOT/remote_session.source");            // Set session variables for DB access
		}
	}
// 	$db_setup = FALSE;                                                                       // Simulate Library Closed
?>	  
<html>
<head>
  <title>HOT</title>
  <meta charset = "UTF-8" />
  <link href='//fonts.googleapis.com/css?family=Lora:300,700,400italic,700italic&subset=latin,latin-ext' rel='stylesheet' type='text/css' />
  <link href='//fonts.googleapis.com/css?family=Montserrat:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css' />
  <link rel="stylesheet" type="text/css" href="hot-3col.css">
  <style>
	#myform 
	  fieldset {
		width: 350px;
		height: 100px;
		background-color: red;
		margin-left: auto;
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

  <div id = "menu">
        <ul>
		  <li><a href = "index.html"><img src = "images/hot-org-logo.png"></a></li>
          <li><a href = "libraryCredentials.php">HELP </a></li>                                                  
        </ul><br><br>
  </div>
<?php
if ($db_setup == TRUE) {
print <<<HERE
  <div id = "all">
    <div id = "main"> 
	<div id = "nav"></div>
		<div id = "resources">
  
   <br>
   <center><h1>Welcome to the Hands On Technology</h1>
		   <h1>Reference Library</h1></center><br></center>
    
    <div id="myform">	  
    <form action = "indexProcess.php" method= "post">
      <fieldset><br>
        <input  type="text" Placeholder="Enter Email Address" value="$mbrID" name="mbrID" > <br>	
        <input  type = "password"
	                    id = "password" 
						name = "password"
						value = "$password"
						placeholder="Enter Password"><br>	
        <input  type="submit" value = "Continue" id = "submit"/>  <br>		
      </fieldset>
    </form>	
    </div>
	
	  </div>
	</div>
  </div>
HERE;
}

if ($db_setup == FALSE) {
print <<<HERE
  <div id = "all">
    <div id = "main">
	 <div id = "nav"></div>	
      <div id = "resources">
  
   <br>

      <br><h2>The Hands On Technology</h2>
      <h2>Reference Library Is Closed!<br><br></h2>

	  
	  <h4>The library is normally open 24/7.  Please email John Cerullo at jcerullo@yahoo.com <br>
	  to determine if a problem exists on the server end.</h4><br><br>
	  	
      </div>
    </div>
  </div>
</section>
HERE;
}
?>

<div id = "content">
   <div id = "contentLeft">
    <p><span style='margin-left:2em'>Members Section</p>
    <img src="images/hot4.jpg" alt= "members photo"/>
    </div>
   
   <div id = "contentCenter">
     <p><span style='margin-left:2em'>3D Printers Section</p>
     <img src = "images/printable-designs-module-2.jpg" alt= "printers photo"/>
    </div>
	
   <div id = "contentRight">
     <p><span style='margin-left:2em'>Projects Section</p>
     <img src = "images/small-computers-in-hand-338x257_orig.jpg" alt= "projects photo"/>
    </div>
	
</div>
 
  <footer>
      <br><br>
	  <p>Copyright (c) 2020 HandsOnTech.Org <span style='margin-left:6em'>  <a href = "contact.html"> Contact Us </a> </p>
	  <br><br>
	     HOT website – self-hosted beta version 1.4 <a href = "library.php"><img src = "images/blackHand.ico"</a>
	  <br><br><br>
  </footer>

</body>
</html>
