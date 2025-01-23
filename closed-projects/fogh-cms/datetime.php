<?php
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

date_default_timezone_set("Europe/Copenhagen");
$date = date($settings_dateformat);
$time =  date($settings_timeformat);
$datetime = $date . " " . $time;
// test
//echo $datetime;
?>