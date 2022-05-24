<?php
    if (isset($_SESSION["isAdmin"])) $isAdmin = $_SESSION["isAdmin"];
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