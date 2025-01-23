<?php
	include("mysql_connect.php");
		$result = mysql_query("SELECT * FROM foghcms_cmsinfo WHERE cmsinfo_name = 'cmsname'");
			$row = mysql_fetch_array($result);
			$cmsname = $row['cmsinfo_value'];
		$result2 = mysql_query("SELECT * FROM foghcms_cmsinfo WHERE cmsinfo_name = 'createrURL'");
			$row2 = mysql_fetch_array($result2);
			$createrURL = $row2['cmsinfo_value'];
	mysql_close($con);
echo "
	<div id=\"footer_box\">
		<p style=\"color:#666;\">Tak for at du har valgt <a href=\"" . $createrURL . "\" title=\"Created By Peter Fogh freelancer\">" . $cmsname . "</a></p>
	</div>";
			
?>