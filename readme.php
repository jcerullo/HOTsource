<?php
header("Content-Type: text/html;charset=utf-8" );
require 'parsedown.php';

$contents = file_get_contents('README.md');
 
?>
<!DOCTYPE html>

<html>
    <head>
        <title>Readme</title>
		<link rel="stylesheet" type="text/css" href="bootstrap.css">
		<link href='https://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
		<link rel="stylesheet" type="text/css" href="main.css">
        <script src="https://cdn.rawgit.com/google/code-prettify/master/loader/run_prettify.js"></script>
        <link rel="stylesheet" href="./github-markdown.css">
        <style>
            .markdown-body {
                box-sizing: border-box;
                min-width: 200px;
                max-width: 980px;
                margin: 0 auto;
                padding: 45px;
            }
        </style>
    </head>
    <body>
<header class="container">
<div id="wrapper">

<nav id="nav">
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
				<li><a href="printers.php">PrinterList</a></li>
                <li><a href="printer.php">PrinterDetail</a></li>				
			</ul>				
		</li>
		<li><a href="#">Help &raquo;</a>
			<ul>
				<li><a href="help.php">Menu Guide</a></li>
				<li><a href="readme.php">User Guide</a></li>
			</ul>				
		</li>
	</ul>
</nav>

</div><!--end wrapper-->
</header>	
		
        <article class="markdown-body">
        <?php
            # Put HTML content in the document
            $Parsedown = new Parsedown();
			echo $Parsedown->text($contents); 
        ?>
        </article>
    </body>
</html>
