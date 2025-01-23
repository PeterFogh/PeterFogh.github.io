<?php	
// Script for Loged in User
include("mysql_connect.php");
	$result = mysql_query("SELECT * FROM foghcms_webinfo WHERE webinfo_siteowner = 'customer'");
		$row = mysql_fetch_array($result);
		$webinfo_siteaddress_customer = $row['webinfo_siteaddress'];
		$webinfo_sitename_customer = $row['webinfo_sitename'];
	$result = mysql_query("SELECT * FROM foghcms_webinfo WHERE webinfo_siteowner = 'foghcms'");
		$row = mysql_fetch_array($result);
		$webinfo_siteaddress_foghcms = $row['webinfo_siteaddress'];
		$webinfo_sitename_foghcms = $row['webinfo_sitename'];
mysql_close($con);
echo "
<div class=\"userbar\">
	<div class=\"usermenu_bg\">
		<h3 class=\"usermenu_text\">Velkommen tilbage " . $_SESSION['userfullname'] . ".</h3>
			<div class=\"usermenu_break\"></div>
		<a href=\"" . $webinfo_siteaddress_foghcms . "\" title=\"Om Fogh CMS\" class=\"under_none\">
			<h3 class=\"usermenu_buttons\"><img src=\"images/cms_logo-thumbnail.png\"><h3>
		</a>
			<div class=\"usermenu_break\"></div>
		<a href=\"" . $webinfo_siteaddress_customer . "\" class=\"under_none\">
			<h3 class=\"usermenu_buttons\">" . $webinfo_sitename_customer . "<h3>
		</a>
			<div class=\"usermenu_break\"></div>
		<a href=\"user-edit.php\" class=\"under_none\">
			<h3 class=\"usermenu_buttons\">Rediger Konto<h3>
		</a>
			<div class=\"usermenu_break\"></div>
		<a href=\"../cms/?loggedout=true\" class=\"under_none\">
			<h3 id=\"logout_button\">Log Ud<h3>
		</a>
	</div>
</div>";
?>