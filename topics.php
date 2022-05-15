<?php
  session_start();
  $groupName = $_SESSION["groupName"];
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

	if (filter_has_var(INPUT_POST, "group")){
        $group = filter_input(INPUT_POST, "group");
	}
	
	if (filter_has_var(INPUT_POST, "search")){
        $search = filter_input(INPUT_POST, "search");
	}
		
    if (filter_has_var(INPUT_POST, "addTopic")){
        $topic = filter_input(INPUT_POST, "addTopic");
		
	  if ($topic != "") {
        try {
        
            $con= new PDO($mysql_dsn, $mysql_username, $mysql_password);
            $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		                                                   // first delete in case of duplicate
			$result = $con->prepare("DELETE FROM topics 
			   WHERE topicDescription = '$topic' ");
			   
			$result->execute();
                                                           // then add SQL record
			 
	        $result = $con->prepare("INSERT INTO topics 
			            (groupName, topicDescription, topicQualifiedSearch)			
			     VALUES
			            ('$group','$topic', '$search') ");

			$result->execute();
					 
        }		 //end of try
 	
        catch(PDOException $e) {
          echo 'ERROR: ' . $e->getMessage();
	    }
	  } //end if
    }   //end if
 	
    if (filter_has_var(INPUT_POST, "deleteTopic")){
        $topic = filter_input(INPUT_POST, "deleteTopic");
		
        try {
        
            $con= new PDO($mysql_dsn, $mysql_username, $mysql_password);
			$con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
                                                           // then update SQL record
			 
	        $result = $con->prepare("DELETE FROM topics 
			   WHERE topicDescription = '$topic' ");
			   
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

<?php
if ($isAdmin) {
print <<<HERE
  <div class = "member"> 
  <style type = "text/css">
            fieldset {
            width: 700px;
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
            display: block;
            margin-left: auto;
            margin-right: auto;
            clear: both;
          }
		  
		  p {
			margin-left: 100px;
		  }
		  
		  #submit {
			margin-left: 430px;
		    background-color: lightyellow;
		  }
  </style>
  
    <form action = "" method= "post">
      <fieldset> <br>	  
        <label>Add this topic</label>
        <input type="text" value="" id="txt_addTopic" name="addTopic" > <br>
		<label>Delete this topic</label>
        <input type="text" value="" id="txt_deleteTopic" name="deleteTopic"> <br><br>
        <label>Group</label>
        <input type="text" value="" id="txt_group" name="group"> <br>
        <label>Topic Qualified Search</label>
        <input type="text" value="" id="txt_search" name="search"> <br>		
        	
        <input type="submit" value = "submit" id = "submit"/> <br>
      </fieldset>
    </form>
	
    </div>
HERE;
}         // end if
?>
  
  <div id = "memberList"> 
  <style type = "text/css">
		  
	#memberList {
		margin: 100px;
		margin-top:2px;
	}
  </style>
	   
<?php      
	  print " <h2><strong> Pre-set topics </strong></h2>";
	   
      try {
        $con= new PDO($mysql_dsn, $mysql_username, $mysql_password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT  topicDescription as 'Topic', topicQualifiedSearch as 'Qualified Search'		
		            FROM topics 					
				 ";
        
        //first pass just gets the column names
        print "<table> \n";

        $result = $con->query($query);
        //return only the first row (we only need field names)
        $row = $result->fetch(PDO::FETCH_ASSOC);

        print "  <tr> \n";
        foreach ($row as $field => $value){
          print "    <th><u>$field </u><span style='margin-left:6em'></th> \n";
        } // end foreach
        print "  </tr> \n";
 
        //second query gets the data
        $data = $con->query($query);
        $data->setFetchMode(PDO::FETCH_ASSOC);

        foreach($data as $row){
          print "  <tr> \n";
          foreach ($row as $name=>$value){  
            print "    <td>$value</td> \n"; 
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
