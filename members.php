<?php
  session_start();
  $_SESSION["logging"] = true;            // flag to indicate if email logging is turned on
  $logging = $_SESSION["logging"];
  $emailAddress = $_SESSION["mbrID"];
  $mbrID = $emailAddress;
  $isAdmin = $_SESSION["isAdmin"];
  $isMbr = $_SESSION["isMbr"];
  $login = $_SESSION["login"];
 
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
?>

<!DOCTYPE html>
<html>
<head>
  <title>hot</title>
  <meta charset = "UTF-8" />
  
  <link href='//fonts.googleapis.com/css?family=Montserrat:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css' />
  <link rel="stylesheet" type="text/css" href="hot-1col.css">

  <link rel = "stylesheet"
        type = "text/css"
        href = "jquery-ui-1.10.3.custom.css" />

  <style type = "text/css">
	#myform 
	  fieldset {
		width: 700px;
		height: 100px;
		background-color: red;
		margin-left: 0px;;
		margin-right: auto;
		box-shadow: 5px 5px 5px gray;
	  }
	  
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
		  autoOpen: false,	
          draggable: false,
          position: [$(window).width() * .65, 100]					 
	  }); 
	  
    } // end init
	
	var githubID = " ";
	var line1 = " ";
	var line2 = " ";
	var line3 = " ";
	var line4 = " ";
	var line5 = " ";
	var line6 = " ";
	var line7 = " ";
	
    function openDialog()
	{		
       $("#dialog").dialog("open");   
    } // end openDialog
	
    function closeDialog(){
      $("#dialog").dialog("close");
    } // end closeDialog
	
	function showPhoto(githubID, line1, line2, line3, line4, line5, line6, line7)	
	{
        HTMLdata = 	"<img src = " + "'" + "https://github.com/" + githubID + ".png'" + 
		            " height = 250 width = 250" +					
					" alt = 'member photo'> " +
					" <p></p> " + "<span style='margin-left:.5em'>" +
					 line1 + "<br>" + "<span style='margin-left:.5em'>" +
					 line2 + "<br>" + "<span style='margin-left:.5em'>" + 
					 line3 + "<br>" + "<span style='margin-left:.5em'>" +
					 line4 + "<br>" + "<span style='margin-left:.5em'>" +
					 line5 + "<br>" + "<span style='margin-left:.5em'>" +
					 line6 + "<br>" + "<span style='margin-left:.5em'>" +
					 line7 + "<br>";
	   $("#dialog").html(HTMLdata);
       $("#dialog").dialog("open");	
	   $("#dialog").click(closeDialog);
    } // end showPhoto

    </script>
</head>
<body>
   
<div id = "dialog" title = "H.O.T. " >	
</div>

<?php
    $setMbr = '';
	$isAdmin = $_SESSION["isAdmin"];
	$mbrID = $_SESSION["mbrID"];
    if (filter_has_var(INPUT_POST, "setMbr"))
		$setMbr = strtolower(trim(filter_input(INPUT_POST, "setMbr")));	
    if (filter_has_var(INPUT_POST, "addMbr")){
		$addMbr = strtolower(trim(filter_input(INPUT_POST, "addMbr")));
		
	  if ($addMbr != "" && $addMbr != " ") {
        try {
        
        $mysql_dsn = $_SESSION["mysql_dsn"];
	    $mysql_username = $_SESSION["mysql_username"];
        $mysql_password = $_SESSION["mysql_password"];
		
        $con= new PDO($mysql_dsn, $mysql_username, $mysql_password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			 
	        $result = $con->prepare("INSERT INTO members 
			           (emailAddress,
						firstName,
						lastName,
						yourVillage,
						githubID,
						printersOwned,
						groupsJoined)
			
			     VALUES
			            ('$addMbr',
						' ',
						' ',
						' ',
						' ',
						' ',
						' ') ");

			$result->execute();			
			changeLog("add",$addMbr,"","");
		
        }		 //end of try
 	
        catch(PDOException $e) {
          echo 'ERROR: ' . $e->getMessage();
	    }
	  } //end if
    }   //end if
 	
    if (filter_has_var(INPUT_POST, "deleteMbr")){
		$deleteMbr = strtolower(trim(filter_input(INPUT_POST, "deleteMbr")));
		
	  if ($deleteMbr != "" && $deleteMbr != " ") {
        try {
        
        $mysql_dsn = $_SESSION["mysql_dsn"];
	    $mysql_username = $_SESSION["mysql_username"];
        $mysql_password = $_SESSION["mysql_password"];
		
        $con= new PDO($mysql_dsn, $mysql_username, $mysql_password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			 
	        $result = $con->prepare("DELETE FROM members 
			   WHERE emailAddress = '$deleteMbr' ");
			   
			$result->execute();
			changeLog("delete",$deleteMbr,"","");
		
        }		 //end of try
 	
        catch(PDOException $e) {
          echo 'ERROR: ' . $e->getMessage();
	    }
      } //end if		
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
</navi>

</div><!--end wrapper-->
  
<?php
if ($isAdmin) {
print <<<HERE
  <div id = "all">
    <div id = "main">
	  <div id = "nav"></div>
      <div id = "resources"> <br>
		<div id="myform">
  
    <form action = "" method= "post">
      <fieldset> <br>
	  
        <label>Add this Member (Email) </label>
        <input type="text" value="" id="txt_addMbr" name="addMbr" > <br>
		<label>Delete this Member (Email)</label>
        <input type="text" value="" id="txt_deleteMbr" name="deleteMbr" > <br>
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
		position: fixed;
		overflow-y: scroll;
		max-height: 100%;
		top: 220px;
		left: 5px;
		right: 1px;
		bottom: 0%;
		margin: 50px;
		margin-top:2px;
		margin-bottom: 1px;
		font-size:190%;
	}

  </style>
  
<?php

if ($login) {
print"	 <h2><strong>Active members of the Hands On Technology club are: </strong> </h2>";  
      try {
        $mysql_dsn = $_SESSION["mysql_dsn"];
	    $mysql_username = $_SESSION["mysql_username"];
        $mysql_password = $_SESSION["mysql_password"];
		
        $con= new PDO($mysql_dsn, $mysql_username, $mysql_password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT *
		                 FROM members
						 WHERE status != 'D'
						 ORDER BY firstName, lastname "
						 ;
        
        //first pass just gets the column names
        print "<table> ";

        $result = $con->query($query);
        //return only the first row (we only need field names)
        $row = $result->fetch(PDO::FETCH_ASSOC);

        print "  <tr> ";
        foreach ($row as $field => $value){			
          if ($field == "firstName") print " <th> <u>Name</u>  </th> "; 
          if ($field == "lastName") print " <th>  </th> \n";		  
        } // end foreach
		print " <th><span style='margin-left:2em'> <u>Email Address</u> </th> ";
        print "  </tr> \n";
 
        //second query gets the data
        $data = $con->query($query);
        $data->setFetchMode(PDO::FETCH_ASSOC);		

        foreach($data as $row){
          print "  <tr> \n";
		       
          $showFirstName = '"' . ' ' . '"';
          $showLastName = '"' . ' ' . '"';
		  $showStreetAddress = '"' . ' ' . '"';
		  $showVillage = '"' . ' ' . '"';
		  $showPrimaryPhone = '"' . ' ' . '"';
		  $showECName = '"' . ' ' . '"';
		  $showECPhone = '"' . ' ' . '"';
		  $showTimestamp = '"' . ' ' . '"';

          foreach ($row as $name=>$value){              
		    if ($name=='emailAddress') {
			  $saveaddress = $value;
            }			
			if ($name=='firstName') {
			  print "    <td>$value</td> \n";			  
            }
			if ($name=='lastName') {
			  print "    <td>$value</td> \n";
			  print "    <td><span style='margin-left:2em'>$saveaddress</td> \n";			  
            }
			if ($name=='githubID') {
			  $githubID = $value;
			  $isMore = false;
			  if ($githubID != '' && $githubID != ' ') {				  
					$saveID = $githubID;
					$isMore = true;
              }				  
            }
			if ($name == 'yourVillage' && $value != '') $showVillage =  '"' . 'Village of ' . $value . '"';
			if ($name == 'timestamp' && $value != '') $showMemberSince = '"' . $value . '"';
			if ($name == 'firstName' && $value != '') $showFirstName = '"' . $value . '"';
			if ($name == 'lastName' && $value != '') $showLastName = '"' . $value . '"';
			if ($name == 'streetAddr' && $value != '') $showStreetAddress = '"' . $value . '"';
			if ($name == 'ecName' && $value != '') $showECName = '"' . 'Emergency Contact is ' . $value . '"';
			if ($name == 'ecPhone' && $value != '') $showECPhone = '"' . ' at ' . $value . '"';	
			if ($name == 'timestamp' && $value != '') $showTimestamp = '"' . 'Member since ' . substr($value,0,4) . '"';
			if ($name == 'phonePrimary' && $value != '') $showPrimaryPhone = '"' . 'Phone ' . $value . '"';
          } // end field loop
		  
		  if ($isMore) {
			  $showID = '"' . $saveID . '"';
			  $showName = $showFirstName ;
 
			  print "<td style='font-size:50%'><strong><input type = 'button'
                     value = 'Photo'
                     onclick = 'showPhoto($showID, $showName, $showTimestamp, $showStreetAddress, $showVillage, $showPrimaryPhone, $showECName, $showECPhone)'>
					            </strong></td> \n";
		  }
          print "  <span style='margin-left:3em'></tr> \n";

        } // end record loop

        print "</table> \n";

      } catch(PDOException $e) {
            echo 'ERROR: ' . $e->getMessage();
      } // end try
	  	  
}   // endif
else print "Login is required";
?>
 
   </div> 
	

</body>
</html>
