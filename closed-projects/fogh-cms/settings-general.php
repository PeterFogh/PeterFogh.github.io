<?php
$activemenu_name = "indstillinger";
$activesubmenu_name = "generelle";

// date and time GET
	// get variabel $datetime = "yyyy-mm-dd hh:mm:ss"
	// Get geneal-settings from DB
	include("mysql_connect.php");
		$result = mysql_query("SELECT * FROM foghcms_settings WHERE settings_ID = '1'");
		$row = mysql_fetch_array($result);
			$settings_timezone = $row['settings_timezone'];
			$settings_dateformat = $row['settings_dateformat'];
			$settings_timeformat = $row['settings_timeformat'];
	mysql_close($con);

	// User time plus
	//$localtime = localtime();
	//$user_t=date("O");
	//$user_time_ptwo=substr($user_t,0,3) + 2;

	date_default_timezone_set("$settings_timezone");
	$date = date($settings_dateformat);
	$time =  date($settings_timeformat);
	$datetime = $date . " " . $time;
	// test
	//echo $datetime;

	
// database output to content
include("mysql_connect.php");
	$result = mysql_query ("SELECT * FROM foghcms_settings WHERE settings_ID = '1'");
	$row = mysql_fetch_array($result);
		$settings_sitename = $row['settings_sitename'];
		$settings_siteURL = $row['settings_siteURL'];	// Can't not be edit
		$settings_timezone = $row['settings_timezone'];
		$settings_dateformat = $row['settings_dateformat'];
		$settings_timeformat = $row['settings_timeformat'];
mysql_close($con);

// Save change geneal settings
	if (isset($_POST['sitename']) && $settings_sitename != $_POST['sitename'] ||
		isset($_POST['timezone']) && $settings_sitename != $_POST['timezone'] ||
		isset($_POST['dateformat']) && $settings_sitename != $_POST['dateformat'] ||
		isset($_POST['timeformat']) && $settings_sitename != $_POST['timeformat']) {
		include("mysql_connect.php");
			mysql_query("UPDATE foghcms_settings SET settings_sitename = '$_POST[sitename]', settings_timezone = '$_POST[timezone]',
						settings_dateformat = '$_POST[dateformat]', settings_timeformat = '$_POST[timeformat]' WHERE settings_ID = '1'");
		
		$result = mysql_query ("SELECT * FROM foghcms_settings WHERE settings_ID = '1'");
		$row = mysql_fetch_array($result);
			$settings_sitename = $row['settings_sitename'];
			$settings_timezone = $row['settings_timezone'];
			$settings_dateformat = $row['settings_dateformat'];
			$settings_timeformat = $row['settings_timeformat'];
		mysql_close($con);
		
		$settings_saved = true;
	}
	
	

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
		<img class=\"head_icon\" src=\"blok.png\">
		<h2 class=\"head\">" . ucfirst($activesubmenu_name) . " " . ucfirst($activemenu_name) . "</h2>";
?>
<script type="text/javascript" language="JavaScript">
	$(document).ready(function()
	{
		// focus on input on click at title
		$(".head1").click(function(){	
			$(".input1").focus();
		});
		$(".head2").click(function(){	
			$(".input2").focus();
		});
		
	});
</script>
<style type="text/css" media="screen">
	.form-table {
		border-collapse: collapse;
		margin-top: .5em;
		width: 100%;
		margin-bottom: -8px;
		clear: both;
	}
	.form-table th {
		font-family:Helvetica, Arial, Verdana, sans-serif;
		font-size:12px;
		font-weight:normal;
		color:#000;
		vertical-align: top;
		text-align: left;
		padding: 10px;
		width: 150px;
	}
	.watermark {
		font-family:Helvetica, Arial, Verdana, sans-serif;
	    font-size:12px;
	    font-weight:normal;
	    color:#000;
	}
	input {
		background:#fbfbfb;
		border:1px solid #e5e5e5;
		height:21px;
		display: inline-block;
		-khtml-border-radius:3px; -ms-border-radius:3px; -o-border-radius:3px; -moz-border-radius:3px; -webkit-border-radius:3px; border-radius:3px;
	}
	:focus {
		outline: 0;
		border:1px solid #bbb;
	}
	input[type="text"]{width:25em; padding:0 5px}
	.description {
		font-family:Helvetica, Arial, Verdana, sans-serif;
	    font-size:12px;
	    font-weight:normal;
		font-style:italic;
	    color:#666;
	}
	span {
		font-family:Helvetica, Arial, Verdana, sans-serif;
	    font-size:12px;
	    font-weight:normal;
	    color:#000;
		vertical-align: middle;
	}
	label {
		vertical-align: middle; 
	}
	fieldset {
		padding: 10px 0;
	}
	#timezone_string option{margin-left:1em; display: inline-block;}
	#utc-time, #local-time {padding-left:25px;font-style:italic;font-family:sans-serif;display: inline-block;}
	abbr {display: inline-block;}
	.screen-reader-text,.screen-reader-text span{position:absolute;left:-1000em;height:1px;width:1px;overflow:hidden;}
</style>
<?php
// CONTENT gennelle instillinger	
if ($settings_saved == "time") {
echo"
	<div id=\"message_box\">
		<p>Dine ændringer blev gemt</p>
	</div>";
}
echo "
<form action=\"\" method=\"post\"> 	
	<table class=\"form-table\">
		<tr valign=\"top\">
			<th scope=\"row\">
				<label for=\"sitename\">Hjemmesids navn</label>
			</th>
			<td>
				<input name=\"sitename\" type=\"text\" id=\"blogname\" value=\"". $settings_sitename . "\" class=\"regular-text\">
			</td>
		</tr>
		<tr>
			<th scope=\"row\">
				<label for=\"timezone\">Timezone</label>
			</th>
			<td>
				<select id=\"timezone_string\" name=\"timezone\">
					<optgroup label=\"UTC\">
						<option value=\"UTC\"";
						if ($settings_timezone == "UTC"){echo "selected=\"selected\"";} 
						echo ">UTC</option>
					</optgroup>
					<optgroup label=\"Lokal Tid\">
						<option value=\"localtime\"";
						if ($settings_timezone == "localtime"){echo "selected=\"selected\"";} 
						echo ">Lokal Tid</option>

					</optgroup>
					<optgroup label=\"UTC Standarder\">";
					// array all UTC Manuelle Standarder
					/*
					$UTC = array("UTC-12","UTC-11:30","UTC-11","UTC-10:30","UTC-10","UTC-9:30","UTC-9","UTC-8:30","UTC-8","UTC-7:30","UTC-7",
					"UTC-6:30","UTC-6","UTC-5:30","UTC-5","UTC-4:30","UTC-4","UTC-3:30","UTC-3","UTC-2:30","UTC-2","UTC-1:30","UTC-1","UTC-0:30",
					"UTC+0","UTC+0:30","UTC+1","UTC+1:30","UTC+2","UTC+2:30","UTC+3","UTC+3:30","UTC+4","UTC+4:30","UTC+5","UTC+5:30","UTC+5:45","UTC+6","UTC+6:30",
					"UTC+7","UTC+7:30","UTC+8","UTC+8:30","UTC+8:45","UTC+9","UTC+9:30","UTC+10","UTC+10:30","UTC+11","UTC+11:30",
					"UTC+12","UTC+12:45","UTC+13","UTC+13:45","UTC+14");
					*/
					$UTC = array("-12","-11","-10","-9","-8","-7","-6","-5","-4","-3","-2","-1","+0",
						"+1","+2","+3","+4","+5","+6","+7","+8","+9","+10","+11","+12");
					for ($x=0; $x<=count($UTC)-1; $x++) {
					echo "
						<option value=\"" . $UTC[$x] . "\""; 
							if ($settings_timezone == $UTC[$x]){echo "selected=\"selected\"";} 
					echo ">" . $UTC[$x] . "</option>";
					}echo "
					</optgroup>
				</select>
				<span id=\"utc-time\"><abbr title=\"Coordinated Universal Time\">UTC</abbr> tiden er  <code>" .gmdate("d-m-Y H:i:s") . "</code></span>
				<span id=\"local-time\">Din lokale tid er  <code>" . date("d-m-Y H:i:s") . "</code></span>
			</td>
		</tr>
		<tr>
			<th scope=\"row\">Dato Visning</th>
			<td>
				<fieldset>
					<legend class=\"screen-reader-text\">
						<span>Date Format</span>
					</legend>";
					// array all date Manuelle Standarder
					$date = array("F j, Y","Y/m/d","m/d/Y","d/m/Y");
					for ($x=0; $x<=count($date)-1; $x++) {
					echo "
						<label title=\"" . date("$date[$x]") . "\">
						<input type=\"radio\" name=\"dateformat\" value=\"" . $date[$x] . "\""; 
							if ($settings_dateformat == $date[$x]){echo "checked=\"checked\"";} 
					echo "><span>" . date($date[$x]) . "</span></label></br>";
					}echo "
				</fieldset>
			</td>
		</tr>
		<tr>
			<th scope=\"row\">Time Visning</th>
			<td>
				<fieldset>
					<legend class=\"screen-reader-text\">
						<span>Time Format</span>
					</legend>";
					// array all date Manuelle Standarder
					$time = array("g:i a","g:i A","H:i");
					for ($x=0; $x<=count($time)-1; $x++) {
					echo "
						<label title=\"" . date("$time[$x]") . "\">
						<input type=\"radio\" name=\"timeformat\" value=\"" . $time[$x] . "\""; 
							if ($settings_timeformat == $time[$x]){echo "checked=\"checked\"";} 
					echo "><span>" . date($time[$x]) . "</span></label></br>";
					}echo "
				</fieldset>
			</td>
		</tr>
	</table>".
	$datetime."
	<input type=\"submit\" id=\"save_button\" value=\"Gem ændringer\"/>
</form>";
	
	// contentbody /div END
	echo "	
	</div>";
	// FOOT BODY
		include("footer.php");
	// globalcontentbody /div END
	echo "
</div>
	";


?>
</body>
</html>