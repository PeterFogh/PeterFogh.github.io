<?php session_start();
$activemenu_name = "Dashboard";
$activesubmenu_name = "Guide";

// header contains: CSS-stylesheets fonts & master, Jquery, Title '$activesubmenu_name ‹ Fogh CMS' 
	include("header.php");
	
// usermenu
	include("usermenu.php");
	
// GLOBEL BODY
	echo "
	<div id=\"globalcontentbody\">";
// side menu
	include("menu.php");
	
// CONTANT BODY
	echo "		
		<div id=\"contentbody\">
		</div>
	</div>
	";

// FOOT BODY
//	include("footer.php");
?>
</body>
</html>