<?php
	session_start();
      try {
	    $mysql_dsn = $_SESSION["mysql_dsn"];
	    $mysql_username = $_SESSION["mysql_username"];
        $mysql_password = $_SESSION["mysql_password"];
		
        $con= new PDO($mysql_dsn, $mysql_username, $mysql_password);
        $con->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $query = "SELECT printerName
		                 FROM printers  
						 ORDER BY printerName ";
        
        //first pass just gets the column names

        $result = $con->query($query);
        $row = $result->fetch(PDO::FETCH_ASSOC);
        print " <option value = '' selected disabled hidden> </option> ";
        foreach ($row as $field => $value){ 		  
        } // end foreach
 
        //second query gets the data
        $data = $con->query($query);
        $data->setFetchMode(PDO::FETCH_ASSOC);		

        foreach($data as $row){
          foreach ($row as $name=>$value){              

		    if ($name == "printerName") {
			  $printerName = $value;
			  print "<option value = '$printerName'> $printerName </option>";
            }
          } // end field loop

        } // end record loop

      } catch(PDOException $e) {
          echo 'ERROR: ' . $e->getMessage();
      } // end try
	  
?>
