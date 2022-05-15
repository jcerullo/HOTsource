<?php
header('Cache-Control: no cache'); 
session_cache_limiter('private_no_expire'); 
 
session_start();
	$topicSearch = $_SESSION["topicSearch"];
	$qualSearch = $_SESSION["qualSearch"];
	$newMemberSearch = '';
	$group = $_SESSION["groupName"];
?>	

<html>
<head>
  <title>hot</title>
  <meta charset="utf-8"/>
  <link href='//fonts.googleapis.com/css?family=Montserrat:400,700&subset=latin,latin-ext' rel='stylesheet' type='text/css' />
  <link rel="stylesheet" type="text/css" href="hot-1col.css">
  <style>
	#myform 
	  fieldset {
		width: 680px;
		height: 250px;
		background-color: red;
		margin-left: 0px;
		margin-right: auto;
		box-shadow: 5px 5px 5px gray;
	  }	  
  </style>  
  <script type="text/javascript" src = "jquery-3.3.1.js"> </script>
  <script type="text/javascript">
  
  $(init);
  
  function init() {
	  // load up topic list from DB
	  $("#topicList").load("topicList.php");
  }  //end init
  
  </script>  
</head>
<body>

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

<body>

<?php
    if (filter_has_var(INPUT_POST, "group")){
		$group = strtolower(trim(filter_input(INPUT_POST, "group")));
		if ($group != 'vhot3dprint') $group = 'vhotsmcomp';  // set default group 
		$_SESSION["groupName"] = $group;
	}
	
    if (filter_has_var(INPUT_POST, "topicSearch")){
		$topicSearch = strtolower(trim(filter_input(INPUT_POST, "topicSearch")));
		$_SESSION["topicSearch"] = $topicSearch;
	} 
	
    if (filter_has_var(INPUT_POST, "qualSearch")){
		$qualSearch = strtolower(trim(filter_input(INPUT_POST, "qualSearch")));
		$_SESSION["qualSearch"] = $qualSearch;
	} 
	
    if (filter_has_var(INPUT_POST, "newMemberSearch")){
		$newMemberSearch = strtolower(trim(filter_input(INPUT_POST, "newMemberSearch")));
		$_SESSION["newMemberSearch"] = $newMemberSearch;
	}

?>

<?php
print <<<HERE
   <div id = "all">
    <div id = "main">
	<div id = "nav">
	    <br><br>
        <ul>
          <li><a href = "memberSearch.php"> Member Search</a></li><br>
        </ul></div>
      <div id = "resources"> <br>
		<div id="myform"> 
    <form action = "" method= "post">
      <fieldset> <br>
		<p> <strong>PROJECT SEARCH<br><br> </strong> </p>
		<label >Group (vhotsmcomp or vhot3dprint)</label>
		<input type="text" id="txt_group" placeholder="vhotsmcomp" name=group value="$group"> <br>	  
        <label>Topic search (e.g. water leaks) </label>
        <input type="text" id="txt_topicSearch" name=topicSearch value="$topicSearch"> <br>
		<label>New Member Topics </label> 
        <select id="topicList" name="newMemberSearch" >		  
		</select><br>
        <input type="submit" value = "submit" id = "submit"/> <br>
      </fieldset>
    </form>	
		</div><br>
	  </div>
	</div>
  </div>
HERE;
?>

  <div id = "myList"> 
  <style type = "text/css">
		  
	#myList {
		margin: 9em;
		font-size:125%;
		margin-top:50px;
	}
  </style>
  
<?php
//  Currently, only the Small Computer group has github repositories.  So $group is not used in the github topic search:

    if ($newMemberSearch != '' && $newMemberSearch != ' '){
			print "<h4><span style='margin-left:10em'><strong>Forum $newMemberSearch discussion:</strong><span style='margin-left:1em'> ";
			print " <a href='https://groups.google.com/g/$group/search?q= $newMemberSearch ' target='_blank'><u>Click Here</u></a></h4><br><br>";
    }   // end if
	else {
		if ($qualSearch != '' && $qualSearch != ' '){
			print "<strong>FOUND!</strong><span style='margin-left:2em'> Select from: <a href='https://github.com/search?q=topic:vhotsmcomp $qualSearch 
			      in:readme' target='_blank'><u><strong>Finished Projects</strong></u></a>";
			print " and/or <a href='https://groups.google.com/g/$group/search?q= $qualSearch ' target='_blank'><u>Forum Discussions</u></a><br><br>";
		}   // end if
		else {
			if ($topicSearch != '' && $topicSearch != ' '){
				print "<h4><span style='margin-left:10em'><strong>FOUND!<br><br></strong><span style='margin-left:10em'> Select from:  <a href='https://github.com/search?q=topic:vhotsmcomp $topicSearch 
				      in:readme' target='_blank'><u><strong>Finished Projects</strong></u></a>";
				print "<br><span style='margin-left:10em'> and/or <a href='https://groups.google.com/g/$group/search?q= $topicSearch' target='_blank'><u>Forum Discussions</u></a></h4><br><br>";
			}   // end if
		}       // end else
	}
?>

</div>
</body>
</html>  
