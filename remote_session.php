<?php
//  Select only one DB host from below by uncommenting the global IP address of the database location
//  $_SESSION["mysqlhost"] = "database";         // This is for docker access to its own DB
//  $_SESSION["mysqlhost"] = "76.29.155.44";     // This is for remote access to HOME-FL
    $_SESSION["mysqlhost"] = "75.67.111.220";    // This is for remote access to HOME-NH 
//  $_SESSION["mysqlhost"] = "localhost";        // This is the master host
	$_SESSION["mysql_username"] = 'root';
	$_SESSION["mysql_password"] = 'jjc003';
	$mysqlhost = $_SESSION["mysqlhost"];
	$_SESSION["mysql_dsn"] = "mysql:host=$mysqlhost;dbname=hot;port=3306";
	$db_setup = TRUE;
	
	if ( isset($_SESSION["mbrID"]) && $_SESSION["mbrID"] != 'Guest') $mbrID = $_SESSION["mbrID"];
	else {		
		$mbrID = '';
		$charSearch = '';
		$qualSearch = '';
		$printerName = '';
		$isAdmin = false;
		$_SESSION["mbrID"] = "Guest";
		$_SESSION["password"] = "xxxxxx";
		$_SESSION["isAdmin"] = false; 
		$_SESSION["status"] = "I"; 
		$_SESSION["isActive"] = false;
		$_SESSION["isMbr"] = false;
		$_SESSION["groupName"] = '';
		$_SESSION["login"] = false;
		$_SESSION["password"] = '';
		$_SESSION["charSearch"] = '';
		$_SESSION["printerName"] = '';
		$_SESSION["topicSearch"] = '';
	    $_SESSION["qualSearch"] = '';
	}
?>