<?php
  session_start();
  include("session.php");
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
$today = date("Y-m-d H:i:s");
$asofDate = '';
$thisDate = '';
	
// Process member groups: vhotsmcomp and vhot3dprint
// First, vhotsmcomp: csv file created from google group

$vhotsmcomp = array();
$i = 0;
if (($handle = fopen('https://thevillages.duckdns.org/HOT/vhotsmcomp.csv', 'r')) !== FALSE) {      
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {         
        $vhotsmcomp[$i] = $data[0];
		if (isset($data[6]) && is_numeric($data[6]) && is_numeric($data[7]) && is_numeric($data[8])) $thisDate = $data[6]."-".$data[7]."-".$data[8];		
		if (strtotime($thisDate) > strtotime($asofDate)) $asofDate = $thisDate;
		$i++;
    }
    fclose($handle);
}	

// Second, process vhot3dprint:	csv file created from google group

$vhot3dprint = array();
$i = 0;
if (($handle = fopen('https://thevillages.duckdns.org/HOT/vhot3dprint.csv', 'r')) !== FALSE) {      
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {          
        $vhot3dprint[$i] = $data[0];
		if (isset($data[6]) && is_numeric($data[6]) && is_numeric($data[7]) && is_numeric($data[8])) $thisDate = $data[6]."-".$data[7]."-".$data[8];
		if (strtotime($thisDate) > strtotime($asofDate)) $asofDate = $thisDate;		
		$i++;
    }
    fclose($handle);
}
		
// Third step, process questionaire spreadsheet: csv file of all members created from member spreadsheet

$vhotBoth = array();
$i = 0;
if (($handle = fopen('https://thevillages.duckdns.org/HOT/HOTmembers.csv', 'r')) !== FALSE) {      
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { 
		$HOTmember = $data[1];
		if ( in_array($HOTmember, $vhotsmcomp) && in_array($HOTmember, $vhot3dprint) && ! in_array($HOTmember, $vhotBoth) ) $vhotBoth[$i] = $HOTmember;                              
		$i++;
    }
    fclose($handle);
}

// Final step, determine questionnaire count

$hot = array();
$i = 0;
if (($handle = fopen('https://thevillages.duckdns.org/HOT/HOTmembers.csv', 'r')) !== FALSE) {      
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {          
        $hot[$i] = $data[0];                      
		$i++;
    }
    fclose($handle);
}
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
  
	  <h1> Member Stats </h1>  
 
	
    <form action = "stats.php" method= "post">
      <fieldset> <br>

		<label>Stats Complete</label>			  
			 
        <input type="submit" id = "submit" value = "Rerun"/> <br>
		
      </fieldset>
    </form>
<?php

	$vhotMemberSize = sizeof($vhotsmcomp) + sizeof($vhot3dprint) - sizeof($vhotBoth) - 4;
	$vhotsmcompMemberSize = sizeof($vhotsmcomp)-2;
	$vhot3dprintMemberSize = sizeof($vhot3dprint)-2;
	$vhotBothMemberSize = sizeof($vhotBoth);
	$questionaireCount = sizeof($hot);
	$growthCount = 0;
	
	print "<br><br>&emsp; As of date = $asofDate ";
	print "<br><br>&emsp; Total number of questionaires processed = $questionaireCount ";	
	print "<br><br>&emsp; HandsOnTech member count = $vhotMemberSize";
	print "<br><br>&emsp; vhotsmcomp member count = $vhotsmcompMemberSize ";
 	print "<br><br>&emsp; vhot3dprint member count = $vhot3dprintMemberSize ";
	print "<br><br>&emsp; Members in both vhotsmcomp and vhot3dprint = $vhotBothMemberSize ";


	
// Print stats by year
	print "<br><br><strong>Below are active member counts by join year.  Each line is an exclusive set (no overlap). </strong> ";
	print "<br><strong>e.g. To find the number of currently active members who joined the club in 2017,  add the first three lines. </strong> ";
	print "<br><br> ";
      try {
		
        $mysql_dsn = $_SESSION["mysql_dsn"];
	    $mysql_username = $_SESSION["mysql_username"];
        $mysql_password = $_SESSION["mysql_password"];
		
        $con= new PDO($mysql_dsn, $mysql_username, $mysql_password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT DATE_FORMAT(timestamp,'%Y') as year, groupsJoined, COUNT(*) as count
		                 FROM members
						 WHERE status = 'A'
						 GROUP BY year, groupsJoined 
						 ORDER BY year, groupsJoined 
				 ";
        
        //first pass just gets the column names 
        print "<table> \n";

        $result = $con->query($query);
        //return only the first row (we only need field names)
        $row = $result->fetch(PDO::FETCH_ASSOC);
		
        //second query gets the data
        $data = $con->query($query);
        $data->setFetchMode(PDO::FETCH_ASSOC);		

        foreach($data as $row){
          print "  <tr> \n";

          foreach ($row as $name=>$value){
			
		    if ($name=='year') {
			    $timestamp = $value;	
			    print "    <td>&emsp;<strong>$timestamp</strong></td> \n";			 
            }						
			
			if ($name == 'groupsJoined') {
                $groupsJoined = $value;
				print "    <td><strong>$groupsJoined </strong></td> \n";
			}
			
		    if ($name=='count') {
			    $count = $value;
				$growthCount = $growthCount + $count;
			    print "    <td><strong> = $count </strong></td> \n";			 
            }
			
          } // end field loop
		  
          print "  </tr> \n";
        } // end record loop

        print "</table> \n";

      } catch(PDOException $e) {
          echo 'ERROR: ' . $e->getMessage();
      } // end try
?>
</body>
</html>