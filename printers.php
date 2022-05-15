<?php
  session_start();
  $emailAddress = $_SESSION["mbrID"];
  $mbrID = $emailAddress;
  $isAdmin = $_SESSION["isAdmin"];
  $isMbr = $_SESSION["isMbr"];
  
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
	$isAdmin = $_SESSION["isAdmin"];
		
//                                                          load printers array to determine max printer nbr
    $printerNumber = array();
	
	try {
	    $mysql_dsn = $_SESSION["mysql_dsn"];
	    $mysql_username = $_SESSION["mysql_username"];
        $mysql_password = $_SESSION["mysql_password"];
		
        $con= new PDO($mysql_dsn, $mysql_username, $mysql_password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT printerName, printerNbr 
		           FROM printers
                   ORDER BY printerNbr ";  
        
        //first pass just gets the column names

        $result = $con->query($query);
        $row = $result->fetch(PDO::FETCH_ASSOC);

        foreach ($row as $field => $value){
        } // end foreach
 
        //second query gets the data
        $data = $con->query($query);
        $data->setFetchMode(PDO::FETCH_ASSOC);
        $i = 0;
		
        foreach($data as $row){
          foreach ($row as $name=>$value){  
			if ($name == 'printerNbr' && $value != 0) {
				$printerNumber[$i] = $value;
				$i = $i + 1;
            } // end field loop	
		  }
        } // end record loop
 
		$newPrinterNbr = max($printerNumber) + 1;
	
      } catch(PDOException $e) {
          echo 'ERROR: ' . $e->getMessage();
      } // end try
//                                                      if new printer	
    if (filter_has_var(INPUT_POST, "addPrinter")){
        $printer = filter_input(INPUT_POST, "addPrinter");
		
	  if ($printer != "") {
        try {
        
	    $mysql_dsn = $_SESSION["mysql_dsn"];
	    $mysql_username = $_SESSION["mysql_username"];
        $mysql_password = $_SESSION["mysql_password"];
		
        $con= new PDO($mysql_dsn, $mysql_username, $mysql_password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		                                                   // first delete in case of duplicate
			$result = $con->prepare("DELETE FROM printers 
			   WHERE printerName = '$printer' ");
			   
			$result->execute();
                                                           // then add SQL record
			 
	        $result = $con->prepare("INSERT INTO printers 
			            (printerName, printerNbr)			
			     VALUES
			            ('$printer', '$newPrinterNbr') ");

			$result->execute();
					 
        }		 //end of try
 	
        catch(PDOException $e) {
          echo 'ERROR: ' . $e->getMessage();
	    }
	  } //end if
    }   //end if
 	
    if (filter_has_var(INPUT_POST, "deletePrinter")){
        $printer = filter_input(INPUT_POST, "deletePrinter");
		
        try {
        
	    $mysql_dsn = $_SESSION["mysql_dsn"];
	    $mysql_username = $_SESSION["mysql_username"];
        $mysql_password = $_SESSION["mysql_password"];
		
        $con= new PDO($mysql_dsn, $mysql_username, $mysql_password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
                                                           // then update SQL record
			 
	        $result = $con->prepare("DELETE FROM printers 
			   WHERE printerName = '$printer' ");
			   
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
if ($isMbr) {
print <<<HERE
  <div id = "all">
    <div id = "main">
      <div id = "nav"></div>
      <div id = "resources"> <br>
		<div id="myform">
  
    <form action = "" method= "post">
      <fieldset> <br>	  
        <label>Add this printer</label>
        <input type="text" value="" id="txt_addPrinter" name="addPrinter" > <br>
		<label>Delete this printer</label>
        <input type="text" value="" id="txt_deletePrinter" name="deletePrinter"> <br> 
        	
        <input type="submit" value = "submit" id = "submit"/> <br>
      </fieldset>
    </form>
	
	
		</div><br>
	  </div>
	</div>
  </div>
HERE;
}         // end if
?>
  
  <div id = "myList"> 
  <style type = "text/css">
		  
	#myList {
		margin: 100px;
		margin-top:2px;
	}
  </style>
	   
<?php      
	  print " <h2><strong> The 3D printers currently in use by vhot3dprint members are: </strong></h2>";
	   
      try {
	    $mysql_dsn = $_SESSION["mysql_dsn"];
	    $mysql_username = $_SESSION["mysql_username"];
        $mysql_password = $_SESSION["mysql_password"];
		
        $con= new PDO($mysql_dsn, $mysql_username, $mysql_password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT  printerName as 'Printer Make/Model' 		
		            FROM printers 					
					ORDER BY printerName ";
        
        //first pass just gets the column names
        print "<table> \n";

        $result = $con->query($query);
        //return only the first row (we only need field names)
        $row = $result->fetch(PDO::FETCH_ASSOC);

        print "  <tr> \n";
        foreach ($row as $field => $value){
          print "    <th><u>$field</u> <span style='margin-left:6em'></th> \n";
        } // end foreach
        print "  </tr> \n";
 
        //second query gets the data
        $data = $con->query($query);
        $data->setFetchMode(PDO::FETCH_ASSOC);

        foreach($data as $row){
          print "  <tr> \n";
          foreach ($row as $name=>$value){  
            if ($value != '*none') print "    <td>$value</td> \n"; 
          } // end field loop	

          print "  </tr> \n";
        } // end record loop

        print "</table> \n";

      } catch(PDOException $e) {
          echo 'ERROR: ' . $e->getMessage();
      } // end try

?>

   </div> 
   
</body>
</html>
