# **HOT Reference Library**
This project started as an answer to the question of how HandsOnTechnology (HOT) members could best stay informed of each other's 3D printer purchases.
It evolved into a general search and personal data maintenance system.

The HOT Reference Library is a web-based application to help members find club-related information (persons, places and things).  

Features:

1. You can remove yourself from the Reference Library System and it has no effect on your HOT membership or Discussion Group participation.
2. The system is initialized with some of the information provided in the new member questionnaire, which may or may not be currently accurate.
3. Members have total control over the data stored in the System.  So, for purposes of information search, members can change or delete their name, email address, village, 3D printers, or any other information that has been collected or might be collected in the future.
4. A member is initially identified in the Search System with the email address originally entered in the new member questionnaire.  A member is allowed to change the email address used by the Search System and it has no effect on any Discussion Group email addresses.
5. The Reference Library is typically hosted on a Raspberry Pi with latest raspian OS running a LAMP stack. 

## **Direct Callable Web Pages:**
       
```
Library Entry:
	 https://thevillages.duckdns.org/HOT/library.php	
 
Project Search Engine (requires pre-login to the vhotsmcomp or vhot3dprint google group):
	 https://thevillages.duckdns.org/HOT/projectSearch.php
	 
Personal Data Change Form (requires your email address):
	https://thevillages.duckdns.org/HOT/member.php?mbrID=YourEmailAddress&pwd=[YourPassword or Blank]
```

## **FAQ:**

How do I find my current email address and password for access to the Reference Library?<br>
[Individual login credentials are provided by the database administrator. Look for the Help menu item on the Library Entry page.  It is only present during the Libary signup period.]

Can I remove myself from the Reference Library without affecting my membership?<br>
[Yes, set Status=Delete in the Personal Data Change Form and press Enter.]

Can I resign my membership through the Reference Library?<br>
[No.  Members can be added and removed from the HandsOnTech club only by the group facilitators.]

Can I change my email address as reported in the Reference Library?<br>
[Yes, set the new email address *and* the confirmation email address in the Personal Data Change Form; then press Submit.]

Can I remove or change my last name for reporting purposes?<br>
[Yes, you can change your first or last name with the Personal Data Change Form.  To remove a name enter the period character, '.']

If I purchase a new 3D printer, should I enter that information into the Reference Library?<br>
[Yes, that information might be helpful to those members who share your make and model.]

If I join GitHub, should I enter my GitHub username into the Reference Library?<br>
[Yes, the Reference Library has been expanded to search for member projects on GitHub.  Your GitHub username will include your projects in the search data.] 

## **Advanced Features**

The following features are beta released:
- Security/password activation
- Adding 3D printer manufacturers and models
- 3D printer reference material
- GitHub integration and project search
- Forum itegration and topic search
- System settings
- HOT announcements and special events
- Logging
- Email distribution lists
- HOT membership statistics
