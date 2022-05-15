<?php
  session_start();
  include("session.php");
  $isAdmin = $_SESSION["isAdmin"];
  $isMbr = $_SESSION["isMbr"];
  $printerName = $_SESSION["printerName"];
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
	#myform
	  input {
        float: right;
	    background-color: lightyellow;
	}	  
  </style>
  <script type="text/javascript" src = "jquery-3.3.1.js"> </script>

  <script> type = "text/javascript">
  
  $(init);
  
  function init() {
	  // load up printers list from DB
	  $("#printersList").load("printersList.php");
  }  //end init
  
  </script>
</head>

<body>

<?php

    $printerName = '';
	if (filter_has_var(INPUT_POST, "printerName")) {
		$printerName = $_POST['printerName'];
		$printerName = trim($printerName);
		$_SESSION["printerName"] = $printerName;
    }
	$printerText = '';
	if (filter_has_var(INPUT_POST, "printerText")) {
		$printerText = $_POST['printerText'];
		$printerText = trim($printerText);		
        $printerText = nl2br($printerText);                       // convert Windows end of lines
				
		$printerText = strtr($printerText,"'"," ");               //strip out ' and " (so that SQL is happy)
		$printerText = strtr($printerText,'"',' ');

	    
    }
	
	if ($printerName != '' && $printerName != ' ' && $printerText != '' && $printerText != ' ') {
	
		try {
        
        $mysql_dsn = $_SESSION["mysql_dsn"];
	    $mysql_username = $_SESSION["mysql_username"];
        $mysql_password = $_SESSION["mysql_password"];
		
        $con= new PDO($mysql_dsn, $mysql_username, $mysql_password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
                                                           // then update SQL record
			
	        $result = $con->prepare("UPDATE printers
		                              SET printerDescription = '$printerText'
					                  WHERE printerName = '$printerName' ");
			$result->execute();
					 
        }		 //end of try
 	
        catch(PDOException $e) {
          echo 'ERROR: ' . $e->getMessage();
	    }
		
    } //end if
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
if ($isAdmin) {
print <<<HERE
  <div id = "all">
    <div id = "main">
	<div id = "nav"></div>
      <div id = "resources"> <br>
		<div id="myform">
			<form action = "printer.php" method= "post">
			  <fieldset> <br>
			  
				<label>Select 3D Printer</label>
				<select id="printersList" name="printerName" >
				</select><br><br>
				
				<label>Change Printer Description </label>
				<textarea id="txt_printerText" 
						  name="printerText"
						  rows= "2"
						  columns="2"> </textarea><br>

				<input type="submit" value = "submit" id = "submit"/> 
				
			  </fieldset>
			</form>
		</div><br>
	  </div>
	</div>
  </div>
HERE;
}         // end if
else {
print <<<HERE
  <div id = "all">
    <div id = "main"> 
	<div id = "nav"></div>
      <div id = "resources"> <br>
		<div id="myform">
			<form action = "printer.php" method= "post">
			  <fieldset> <br>
			  
				<label>Select 3D Printer</label>
				<select id="printersList" name="printerName" >
				</select><br><br>

				<input type="submit" value = "submit" id = "submit" />
				
			  </fieldset>
			</form>
		</div><br>
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
		margin-top: 2px;
	}
  </style> 
       
<?php
	print "<h3><strong> $printerName Printer Description </strong></h3> ";
    if ($printerName != '' ) {
      try {
		
        $mysql_dsn = $_SESSION["mysql_dsn"];
	    $mysql_username = $_SESSION["mysql_username"];
        $mysql_password = $_SESSION["mysql_password"];
		
        $con= new PDO($mysql_dsn, $mysql_username, $mysql_password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT *
		                 FROM printers
						 WHERE printerName = '$printerName'";
        
        //first pass just gets the column names
        print "<table> \n";

        $result = $con->query($query);
        //return only the first row (we only need field names)
        $row = $result->fetch(PDO::FETCH_ASSOC);

        print "  <tr> \n";
        foreach ($row as $field => $value){
        } // end foreach
        print "  </tr> \n";
 
        //second query gets the data
        $data = $con->query($query);
        $data->setFetchMode(PDO::FETCH_ASSOC);		

        foreach($data as $row){
          print "  <tr> \n";

          foreach ($row as $name=>$value){

			
		    if ($name=='printerDescription') {
			    $printerDescription = $value;	
			    print "    <td>$printerDescription</td> \n";			 
            }
			
          } // end field loop
		  
          print "  </tr> \n";
        } // end record loop

        print "</table> \n";

      } catch(PDOException $e) {
          echo 'ERROR: ' . $e->getMessage();
      } // end try
    }   // end if
?>  	
</div>  

</body>
</html>
