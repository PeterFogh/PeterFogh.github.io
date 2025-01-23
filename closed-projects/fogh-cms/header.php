<?php session_start();
// login protection
if ($_SESSION['login'] == true) {
	// definate last login_update
		// get variabel $datetime = "yyyy-mm-dd hh:mm:ss"
		include("datetime.php");

include("mysql_connect.php");
	mysql_query("UPDATE foghcms_login SET login_update='$datetime' WHERE login_in = '$_SESSION[logindato]'");
	// auto logout after 15 min ?>
	<script type="text/javascript">
	setTimeout("AutoLogout()", 9000000000);
	function AutoLogout()
	  {
	  window.location.assign("../cms/?loggedout=true&why=time")
	  }
	</script>
<?php
mysql_close($con);
}
else {
	// direkt logout?
	header("location:" . "../cms/?loggedout=true");
}
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<!--[if IE 8]> <html xmlns="http://www.w3.org/1999/xhtml" class="ie8" dir="ltr" lang="en-US"> <![endif]-->
<!--[if !(IE 8) ]><!-->
<html>
<!--
This CM-system is created by Peter Fogh – www.peterfogh.dk 
All copyrights to Peter Fogh Freelancer © 2012
Language: Danish
Sohngårdsholmsvej - 9000 Ålborg  - Denmark
Phone: +45 27642263 - Email: freelancer@peterfogh.dk
-->
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<link rel="stylesheet" type="text/css" href="CSSmaster.css">
	<link rel="stylesheet" type="text/css" href="CSSfonts.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

	<script type="text/javascript" language="JavaScript">
		$(document).ready(function()
		{
			
		});
	</script>
	<title><?php if ($activesubmenu_name != null) {
		echo ucfirst($activesubmenu_name) . " ‹ "; }
		echo ucfirst($activemenu_name) . " ‹ Fogh CMS";?></title>
</head>
<body>