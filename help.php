<!DOCTYPE html>
<html>
<head>
  <title>hot</title>
  <meta charset="utf-8"/>
  <link rel="stylesheet" type="text/css" href="bootstrap.css">
  <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,700' rel='stylesheet' type='text/css'>
  <link rel="stylesheet" type="text/css" href="main.css">
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
		</li>
		<li><a href="#">Projects &raquo;</a>
			<ul>	
				<li><a href="projectSearch.php">Project Search</a></li>
			</ul>				
		</li>
		<li><a href="#">MoreHelp &raquo;</a>
			<ul>
				<li><a href="readme.php">README.md</a></li>				
			</ul>				
		</li>
	</ul>
</nav>

</div><!--end wrapper-->
</header>

<body>

<section class="col-md-6">
      <h4><u>Library Entry Page (The login page)</u></h4>
	  <h5>Individual login credentials are provided by the database administrator. Look for the Help menu item on the Library Entry page.  It initiates a program
	  that outputs your personal credentials given your first and last name. This special program is only present during the library signup period.  
	  </h5>
	  <br>
	  
	  <h4><u>Member Profile Page</u></h4>
	  <h5>
	  Your current member profile information appears at the bottom of the Member Profile page.  Any of the information 
	  can be changed by entering the changes in the appropriate fields of the change form and pressing the submit button.  
	  Data can be cleared from a field by entering a period (.) in the appropriate field of the change form.  
	  Do not enter data in those fields that have correct information listed at the bottom of the page. <br> <br>

      Both the group field and the 3D printer field allow multiple entries.  In Windows, multiple entries are made by pressing down the ctrl 
      key while making the selections. <br> <br>
	  
	  Password security is enabled by submitting a non-blank entry in the password field.<br><br>
	  
	  All personal data can be removed from the library by setting the status field to 'Delete'.  Be advised that setting the status to 'Delete' does not 
	  remove you from the Hands on Technology club; it only removes your personal information from the library.  
	  </h5>	<br> 
	  
	  <h4><u>Member Search Page</u></h4>
	  <h5>
	  Modeled like a Google search, there is only one entry field on the page.  Enter a character string to search for printer names, member names
	  or village names.
	  </h5><br>	  
	  
	  <h4><u>Email Menu Selection</u></h4>
	  <h5>
	  There is an email menu selection available on the Member Search page whose purpose is to create a distribution list (from the search results) that 
	  can be cut and pasted into the To field of an email app.
	  </h5><br>
	  
	  <h4><u>Member List Page</u></h4>
	  <h5>
	  This is a list of all active Hands On Technology members in first name order.  This page is primarily used to identify the preferred email address 
	  for contacting a member. <br> <br>

      Optionally, entry fields might be displayed for adding and deleting member email addresses. (Only available with admin rights.).  Care must be exercised in using these 
	  fields lest a member be permanently locked out of the library.
	  </h5><br>
 	  
	  <h4><u>Printer List</u></h4>
	  <h5>
	  The Printer List page displays all of the 3D printers currently in use by vhot3dprint group members.  Printers can be added or deleted 
	  on this page.
	  </h5><br>
	  
	  <h4><u>Printer Detail</u></h4>
	  <h5>
	  The Printer Detail page displays detailed information about a selectd 3D printer.  It is <strong>normally maintained by a club facilitator</strong> with cut-and-paste. 
	  That is, it's expected that the printer description text will be copied from a separate document and pasted into the Change Printer Description 
	  field. Pressing the submit button triggers end-of-line and carriage-return character conversion to HTML; bold text, underline and hypertext do
	  not convert.
	  </h5><br>	
	  
	  <h4><u>Printers Owned</u></h4>
	  <h5>
	  The Printers Owned page identifies all of the Hands On Technology members who currently own 3D printers.  
	  </h5><br>	  
	  
	  <h4><u>Project Search</u></h4>
	  <h5>
	  The Project Search page displays search fields used for locating GitHub repositories and Forum discussions of topics specified in the 
	  search fields. The submit button must be pressed after entering or changing the search field. Be advised that it might take some practice 
	  in choosing optimal search strings for locating projects.
	  </h5><br>	
	  
	  <h4><u>Admin</u></h4>
	  <h5>
	  The Admin menu should only be used by trained club facilitarors.
	  </h5><br>
	  
</section>

</body>
</html>  
