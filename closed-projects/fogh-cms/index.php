<?php
session_start();
// date and time GET
	// get variabel $datetime = "yyyy-mm-dd hh:mm:ss"
	include("datetime.php");
	//echo $datetime;
	
// login session
	if (isset($_POST['email']) && isset($_POST['pass'])){
		$logintry = true;
		$email = strtolower($_POST['email']);
	include("mysql_connect.php");
		$result = mysql_query("SELECT * FROM foghcms_users WHERE user_email = '$email'");
		$row = mysql_fetch_array($result);
		$userid = $row['user_ID'];
		$userpass = $row['user_pass'];
		$useremail = $row['user_email'];
		$userfullname = $row['user_fullname'];
		// kryptering af kode ved login
		// ny kryptering     
		$crypass = $_POST['pass'];
		//md5(strrev(md5($_POST['pass'])));
		if ($email == $useremail && $crypass == $userpass)
		{		
			// create new login info
			mysql_query("INSERT INTO foghcms_login (login_email, login_in) VALUES ('$useremail', '$datetime')");
		//	mysql_query("INSERT INTO Persons (FirstName, LastName, Age) VALUES ('Peter', 'Griffin',35)");
			// THE login sissions!!
				$_SESSION['login'] = true;
				$_SESSION['logindato'] = $datetime;
				$_SESSION['userid'] = $userid;
				$_SESSION['useremail'] = $useremail;
				$_SESSION['userfullname'] = $userfullname;
			header("location:" . "dashboard.php");
		}
	mysql_close($con);
	}
		
// Logout save datetime		
	if ($_GET['loggedout'] == true) {
	include("mysql_connect.php");
		mysql_query ("UPDATE foghcms_login SET login_out='$datetime' WHERE login_in ='$_SESSION[logindato]'");
		unset($_SESSION['login']);
		unset($_SESSION['logindato']);
		unset($_SESSION['userid']);
		unset($_SESSION['useremail']);
		unset($_SESSION['userfullname']);
	mysql_close($con);
		if ($_GET['why'] == "time") {
			header("location:" . "../cms/?logoutbox=true&why=time");
		}else {
			header("location:" . "../cms/?logoutbox=true");
		}
	}
	
// if loged in sent to dashbord
	if($_SESSION['login'] == true) {
		header("location:" . "dashboard.php");
	}

// lostpassword send email
	if (isset($_POST['fullname_email'])){
		if (substr_count($_POST['fullname_email'],"@") == 1){	$fullname_email = strtolower($_POST['fullname_email']);	}
		else{	$fullname_email = $_POST['fullname_email'];	}
	include("mysql_connect.php");
		$result = mysql_query("SELECT * FROM foghcms_users WHERE user_email = '$fullname_email' OR user_fullname = '$fullname_email'");
			$row = mysql_fetch_array($result);
			$mail_useremail = $row['user_email'];
			$mail_fullname = $row['user_fullname'];
			$mail_pass = $row['user_pass'];
		$result = mysql_query("SELECT * FROM foghcms_webinfo");
			$row = mysql_fetch_array($result);
			$webinfo_siteaddress = $row['webinfo_siteaddress'];
			$webinfo_sitename = $row['webinfo_sitename'];
		if($mail_useremail != null) {
			$mail_modtager = $mail_useremail;
				$emne = "[" . $mail_fullname . "] Nulstilling af kode";
				$body = "<p>Der er kommet en eftersp&oslash;rgsel om en nulstilling af koden til din konto p&aring;:</br><br>
				<a href=\"" . $webinfo_siteaddress . "/CMS\">" . $webinfo_siteaddress . "/CMS</a><br><br>
				Hvis dette er en misforst&aring;else, kan du blot ignorere denne email og intet vil ske ved din kode.</br><br>
				For at nulstille din kode skal du bes&oslash;ge det f&oslash;lgende link:</br><br>
				<a href=\"" . $webinfo_siteaddress . "/CMS?action=reset&pass=" . $mail_pass . "&email=" . $mail_useremail . "\">Link til nulstilling af kode</a><br><br></p>";
				$header='MIME-Version: 1.0' . "\r\n";
				$header .= 'Content-type: text/html;charset=iso-8859-1' . "\r\n";
				$header .= "From: Peter Fogh CMS<freelancer@peterfogh.dk>\r\n";
			mail($mail_modtager, $emne, $body, $header);
			header("location:" . "?sendemail=true");
		}
	mysql_close($con);
	}

// Resetpassword
	// check for right password
	if ($_GET['action'] == "reset"){
	include("mysql_connect.php");
		$result = mysql_query("SELECT * FROM foghcms_users WHERE user_email = '$_GET[email]'");
		$row = mysql_fetch_array($result);
		$userpass = $row['user_pass'];
			if($_GET['pass'] != $userpass){ header("location:" . "?action=lostpassword&error=invalidkey");}
	mysql_close($con);
	}	
	// reset password
	if (isset($_POST['newpass']) && isset($_POST['newpass2']) && $_POST['newpass'] == $_POST['newpass2']){
		if($_POST['newpass'] == null) {
			$newpasstry = true;}
		else {
		include("mysql_connect.php");
			mysql_query("UPDATE foghcms_users SET user_pass = '$_POST[newpass]' WHERE user_email = '$_GET[email]' AND user_pass = '$_GET[pass]'");
				header("location:" . "?action=done");
		mysql_close($con);
		}
	}
// login session END
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
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
	<link rel="stylesheet" type="text/css" href="CSSlogin.css">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
	<script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js"></script>

	<script type="text/javascript" language="JavaScript">
		$(document).ready(function()
		{
			// focus on input delete hint.
			swapValue = [];
			$(".swap-value").each(function(i){
			   swapValue[i] = $(this).val();
			   $(this).focus(function(){
			      if ($(this).val() == swapValue[i]) {
			         $(this).val("");
			      }
			      $(this).addClass("focus");
			   }).blur(function(){
			      if ($.trim($(this).val()) == "") {
			         $(this).val(swapValue[i]);
				 $(this).removeClass("focus");
			      }
			   });
			});
			
			// focus on input on click at title
			$(".head1").click(function(){	
				$(".input1").focus();
			});
			$(".head2").click(function(){	
				$(".input2").focus();
			});
			
		});
	</script>
	<title>Log Ind ‹ Fogh CMS</title>
</head>
<body>
<?php 

// login screen
	if($_SESSION['login'] != true) {
		echo "<div id=\"login_screen\">";
		include("mysql_connect.php");
			$result = mysql_query("SELECT * FROM foghcms_webinfo WHERE webinfo_siteowner = 'customer'");
				$row = mysql_fetch_array($result);
				$webinfo_siteaddress_customer = $row['webinfo_siteaddress'];
				$webinfo_sitename_customer = $row['webinfo_sitename'];
			$result = mysql_query("SELECT * FROM foghcms_webinfo WHERE webinfo_siteowner = 'foghcms'");
				$row = mysql_fetch_array($result);
				$webinfo_siteaddress_foghcms = $row['webinfo_siteaddress'];
				$webinfo_sitename_foghcms = $row['webinfo_sitename'];
//------------------------------------------------------------ LOST PASSWORD  --------------------------------------//			
		if ($_GET['action'] == "lostpassword"){
			echo "
			<div id=\"login_logo\">	
				<a href=\"" . $webinfo_siteaddress_foghcms . "\" title=\"Created By Peter Fogh freelancer\"><img src=\"images/cms_logo-small.png\"></a>
			</div>
			<div id=\"message_login_box\">
				<p class=\"error_message\">Please enter your username or email address. You will receive a link to create a new password via email.</p>	
			</div>";
			// Fullname/Email Errors
			if ($_POST['fullname_email'] != null) {
				// Shake login_box on error
				?><script>$(document).ready(function(){	$("#login_box").effect("shake", { times:3 }, 80);	});</script><?php
				echo "
				<div id=\"error_login_box\">
					<p><b>FEJL</b>: Ukendt navn eller email.</p>
				</div>";
			}
			if ($_POST['fullname_email'] == null && $lostpasstry == true) {
				// Shake login_box on error
				?><script>$(document).ready(function(){	$("#login_box").effect("shake", { times:3 }, 80);	});</script><?php
				echo "
				<div id=\"error_login_box\">
					<p><b>FEJL</b>: Feltet er tomt. Udfyld feltet.</p>
				</div>";
			}
			
			//  invalidkey error
			if ($_GET['error'] == "invalidkey") {
				// Shake login_box on error
				?><script>$(document).ready(function(){	$("#login_box").effect("shake", { times:3 }, 80);	});</script><?php
				echo "
				<div id=\"error_login_box\">
					<p><b>FEJL</b>: Koden til kontoen er allerede blevet ændret.</p>	
				</div>";
			}
			echo"
			<div id=\"shake_box_lostpass\">
				<div id=\"login_box\">	
					<form action=\"?action=lostpassword\" method=\"post\">
						<div class=\"login_input_head head1\">
							Fulde navn eller email:
						</div>
						<input class=\"swap-value watermark input1\" name=\"fullname_email\" type=\"text\" value=\"Dit navn eller email\" alt=\"Dit navn eller email\"/></p>
						</br>
						<div>
						<input type=\"submit\" id=\"login_button\" value=\"Ny Kode\"/>
						</div>
					</form>
				</div>
			</div>
			
			<div id=\"login_textunder\">
				<p>
					<a href=\"" . $webinfo_siteaddress_customer . "/cms/\" title=\"Log In\">Log In</a>
						</br></br>
					<a href=\"" . $webinfo_siteaddress_customer . "\" title=\"Tilbage til hjemmeside\"> &larr; Tilbage til " . $webinfo_sitename_customer . "</a>
				</p>
			</div>";
		}
//------------------------------------------------------------ MAKE NEW PASSWORD  ---------------------------------//	
		elseif($_GET['action'] == "reset"){
			echo "
			<div id=\"login_logo\">	
				<a href=\"" . $webinfo_siteaddress_foghcms . "\" title=\"Created By Peter Fogh freelancer\"><img src=\"images/cms_logo-small.png\"></a>
			</div>
			<div id=\"message_login_box\">
				<p>Skriv venligst din nye kode i de to feltet nedenunder.</p>
			</div>";
			// Reset Password Errors
			if ($_POST['newpass'] != $_POST['newpass2']) {
				// Shake login_box on error
				?><script>$(document).ready(function(){	$("#login_box").effect("shake", { times:3 }, 80);	});</script><?php
				echo "
				<div id=\"error_login_box\">
					<p><b>FEJL</b>: De to koder var ikke ens. Prøv igen</p>
				</div>";
			}
			if ($_POST['newpass'] == null && $newpasstry == true) {
				// Shake login_box on error
				?><script>$(document).ready(function(){	$("#login_box").effect("shake", { times:3 }, 80);	});</script><?php
				echo "
				<div id=\"error_login_box\">
					<p><b>FEJL</b>: De to feltet til koden er tomme.</p>	
				</div>";
			}
			echo"
			<div id=\"shake_box_newpass\">
				<div id=\"login_box\">	
					<form action=\"?action=reset&pass=" .$_GET['pass'] . "&email=" . $_GET['email'] . "\" method=\"post\">
						<div class=\"login_input_head head1\">
							 Ny kode:
						</div>
						<input class=\"watermark input1\" name=\"newpass\" type=\"password\" value=\"\" alt=\"Din nye kode\"/></p>
						</br>
						<div class=\"login_input_head head2\">
							Bekræft koden:
						</div>
						<input class=\"watermark input2\" name=\"newpass2\" type=\"password\" value=\"\" alt=\"Din nye kode igen\"/></p>
						</br>
						<input type=\"submit\" id=\"login_button\" value=\"Nulstil koden\"/>
					</form>
				</div>
			</div>
			
			<div id=\"login_textunder\">
				<p>
					<a href=\"" . $webinfo_siteaddress_customer . "/cms/\" title=\"Log In\">Log In</a>
						</br></br>
					<a href=\"" . $webinfo_siteaddress_customer . "\" title=\"Tilbage til hjemmeside\"> &larr; Tilbage til " . $webinfo_sitename_customer . "</a>
				</p>
			</div>";
		}
//------------------------------------------------------------ LOGIN SITE & ERRORS/MASSAGES -----------------------//	
		else {
			echo "
				<div id=\"login_logo\">
					<a href=\"" . $webinfo_siteaddress_foghcms . "\" title=\"Created By Peter Fogh freelancer\"><img src=\"images/cms_logo-small.png\"></a>
				</div>";
			// loggedout message
			if ($_GET['logoutbox'] == true) {
				echo "
				<div id=\"message_login_box\">";
					if ($_GET['why'] == "time") {
						echo "<p>Du er blevet logget ud, fordi du ikke har været aktiv i 15 min.</p>";
					}else {
						echo "<p>Du er blevet logget ud.</p>";
					}echo"
				</div>";
			}
			if ($_GET['sendemail'] == true) {
				echo "
				<div id=\"message_login_box\">
					<p>Tjek din email for at bekræfte linket.</p>
				</div>";
			}
			if ($_GET['action'] == "done") {
				echo "
				<div id=\"message_login_box\">
					<p>Din nye kode af godkendt og klar til brug. Du kan nu log ind.</p>
				</div>";
			}
			// Login Errors
			if ($_POST['email'] == "Din emailadresse" && isset($_POST['pass']) ) {
				// Shake login_box on error
				?><script>$(document).ready(function(){	$("#login_box").effect("shake", { times:3 }, 80);	});</script><?php
				echo "
				<div id=\"error_login_box\">
					<p><b>FEJL</b>: Feltet til emailen er tomt.</p>
				</div>";
			}
			elseif (isset($_POST['email']) && $_POST['pass'] == null) {
				// Shake login_box on error
				?><script>$(document).ready(function(){	$("#login_box").effect("shake", { times:3 }, 80);	});</script><?php
				echo "
				<div id=\"error_login_box\">
					<p><b>FEJL</b>: Feltet til koden er tomt.</p>
				</div>";
			}
			elseif ($useremail == null && $logintry == true) {
				// Shake login_box on error
				?><script>$(document).ready(function(){	$("#login_box").effect("shake", { times:3 }, 80);	});</script><?php
				echo "
				<div id=\"error_login_box\">
					<p><b>FEJL</b>: Denne email bruges ikke af nogen bruger.</p>
				</div>";
			}
			elseif ($useremail != null) {
			// Shake login_box on error
			?><script>$(document).ready(function(){	$("#login_box").effect("shake", { times:3 }, 80);	});</script><?php
			// get nickname on user
			$result = mysql_query("SELECT * FROM foghcms_users WHERE user_email = '$_POST[email]'");
			$row = mysql_fetch_array($result);
			$userfullname = $row['user_fullname'];
			echo "
			<div id=\"error_login_box\">
				<p><b>FEJL</b>: Koden du tastede passede ikke til brugerens navn <b>" . $userfullname . "</b>. <a href=\"index.php?lostpass=1\" title=\"Har du glemt koden\">Glemt koden?</a></p>
			</div>";
		   	}
			echo "
			<div id=\"shake_box\">
				<div id=\"login_box\">
					<form action=\"\" method=\"post\">
						<div class=\"login_input_head head1\">
							Email:
						</div>
						<input class=\"swap-value watermark input1\" name=\"email\" type=\"text\" value=\"Din emailadresse\" alt=\"Din E-mail\"/><br>
						</br>
						<div class=\"login_input_head head2\">
							Kode:
						</div>
						<input class=\"swap-value watermark input2\" name=\"pass\" type=\"password\" value=\"\" alt=\"Din kode\"/></p>
						</br>
						<input type=\"submit\" id=\"login_button\" value=\"Log Ind\"/>
					</form>
				</div>
			</div>
			
			<div id=\"login_textunder\">
				<p>
					<a href=\"?action=lostpassword\" title=\"Har du glemt koden\">Glemt koden?</a>
						</br></br>
					<a href=\"" . $webinfo_siteaddress_customer . "\" title=\"Tilbage til hjemmeside\"> &larr; Tilbage til " . $webinfo_sitename_customer . "</a>
				</p>
			</div>";
		}
		mysql_close($con);
		// </div> = login_screen end 
		echo "</div>";
	}
// login screen END
?>
</body>
</html>