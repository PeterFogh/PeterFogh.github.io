<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Frameset//EN" "http://www.w3.org/TR/html4/frameset.dtd">
<!--
Created by Peter Fogh – www.peterfogh.dk
All copyrights to Peter Fogh © 2010
Language: Danish
-->
<html>
<head>
	<title>Peter Fogh - Velkommen</title>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<meta name="Adtomatik-tag" content="MTMxOQ=="/>
	<link rel="icon" type="image/ico" href="favicon.ico"></link> 
	<link rel="shortcut icon" href="favicon.ico"></link>
	<?php include ("mate_search.html");?>
	<link rel="stylesheet" type="text/css" href="CSSmaster.css" />
	
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/mouseover.js"></script>
	<script type="text/javascript" src="js/imageslide.js"></script>
</head>
<body leftmargin="0" topmargin="0px" marginwidth="0" marginheight="0"><div align="center" border="0px">
<div id="logo">
	<a href="index.php"><div id="webdesigner"><img src="image/menu/webdesigner_over.png"></div></a>
	<a href="om_mig.php"><div id="om_mig"><img src="image/menu/om_mig.png" onmouseOver="MouseOverRoutine(this, 'menu/om_mig_over.png')" onmouseOut="MouseOutRoutine(this, 'menu/om_mig.png')"></div></a>
	<a href="kompetencer.php"><div id="kompetencer"><img src="image/menu/kompetencer.png" onmouseOver="MouseOverRoutine(this, 'menu/kompetencer_over.png')" onmouseOut="MouseOutRoutine(this, 'menu/kompetencer.png')"></div></a>
	<a href="referencer.php"><div id="referencer"><img src="image/menu/referencer.png" onmouseOver="MouseOverRoutine(this, 'menu/referencer_over.png')" onmouseOut="MouseOutRoutine(this, 'menu/referencer.png')"></div></a>
	<a href="kontakt.php"><div id="kontakt"><img src="image/menu/kontakt.png" onmouseOver="MouseOverRoutine(this, 'menu/kontakt_over.png')" onmouseOut="MouseOutRoutine(this, 'menu/kontakt.png')"></div></a>
</div>
<div id="top"></div>
<div><script type="text/javascript">
	<!------------------------------------------------------------------> 
	<!--                                                              --> 
	<!-- Millennial Media JSP Ad Coding, v.7.4.20                     --> 
	<!-- Copyright Millennial Media, Inc. 2006                        --> 
	<!--                                                              --> 
	<!------------------------------------------------------------------> 

	<!------------------------------------------------------------------> 
	<!-- Import libraries necessary for ad calls.                     --> 
	<!------------------------------------------------------------------> 
	<%@ page import="java.io.BufferedReader" %> 
	<%@ page import="java.io.InputStream" %> 
	<%@ page import="java.io.InputStreamReader" %> 
	<%@ page import="java.net.Socket" %> 
	<%@ page import="java.net.URL" %> 
	<%@ page import="java.net.URLConnection" %> 
	<%@ page import="java.net.URLEncoder" %> 

	<!------------------------------------------------------------------> 
	<!-- Publisher Specific Section.                                  --> 
	<!------------------------------------------------------------------> 
	<% 
	String mm_placementid      = "178018"; 
	String mm_adserver         = "ads.mp.mydas.mobi"; 
	String mm_default_response = ""; 
	%> 

	<!------------------------------------------------------------------> 
	<!-- PLEASE DO NOT EDIT BELOW THIS LINE.                          --> 
	<!------------------------------------------------------------------> 
	<% 
	String mm_ua = request.getHeader( "User-Agent" ); 
	String mm_ip = request.getRemoteAddr(); 
	String mm_id = request.getRemoteAddr(); 
	if( request.getHeader( "x-up-subno" ) != null ) 
	  mm_id = request.getHeader( "x-up-subno" ); 
	if( request.getHeader( "clientid" ) != null ) 
	  mm_id = request.getHeader( "clientid" ); 
	else if( request.getHeader( "xid" ) != null ) 
	  mm_id = request.getHeader( "xid" ); 

	try { 
	  mm_ua = URLEncoder.encode( mm_ua, "UTF-8" ); 
	  mm_id = URLEncoder.encode( mm_id, "UTF-8" ); 
	  mm_ip = URLEncoder.encode( mm_ip, "UTF-8" ); 
	} catch( Exception e ) { } 

	String mm_url = "http://" + mm_adserver + "/getAd.php5" + "?apid=" + mm_placementid+ "&auid=" + mm_id + "&ua=" + mm_ua + "&uip=" + mm_ip; 

	StringBuilder contents = new StringBuilder(); 
	try { 

	  URL url = new URL( mm_url ); 

	  // Set the connection timeout 
	  int timeout = 5000; 
	  URLConnection connection = url.openConnection(); 
	  connection.setConnectTimeout( timeout ); 
	  connection.setReadTimeout( timeout ); 

	  InputStream in = connection.getInputStream(); 
	  InputStreamReader isr = new InputStreamReader( in ); 
	  BufferedReader br = new BufferedReader( isr ); 
	  String line; 

	  while((line = br.readLine()) != null) { 
	    contents.append(line).append("
	"); 
	  } 
	} catch( Exception e ) { contents.append(mm_default_response); } 

	out.println( contents ); 
	%>
	</script>
</div>
<table  height="300" border="0" cellpadding="0" cellspacing="0">
	<tr>
		<td id="left">
		</td>
<!-- Submenu START-->
		<td id="body_bg">
			<h1 class="margin">Din Webdesigner</h1>
			<h3 class="margin">“Hvis du ønsker det”.</h3>
			<a href="referencer.php">
				<div id="siteimage">		
					<div id="slideshow">
						<img src="image/display/1.png" class="active">
						<img src="image/display/2.png">
						<img src="image/display/3.png">
					</div>
						<p id="display_image_text"><a href="referencer.php">Se flere eksempler</a></p>
				</div>
			</a>
			<p class="margin">Mit navn er Peter Fogh, og jeg kan tilbyde dig en flot og billig hjemmeside. Om du er erhversdrivende eller gerne vil have en flot familiehjemmeside, kan jeg stå til din rådighed.</p>
			<h2 class="margin"><br />Priser</h2>
			<p class="margin">Da mine kompetencer indenfor webdesign og -programmering er selvlærte, kan du forvente en ufattelig billig hjemmeside. Selvom mine kompetencer er selvlærte kan jeg stadig garantere dig en højkvalitets hjemmeside, som kan leve op til dine forventninger.<br />Hvad selve prisen bliver for din hjemmeside, kommer an på flere ting, fx. om du vil have et integreret CM-System, så du selv kan updatere din hjemmeside. <a href="kontakt.php">Kontakt mig</a> venligst så vi kan snakke om, hvordan din hjemmeside skal blive.</p>
		</td>
<!-- text body END-->
		<td id="right">
		</td>
	</tr>
</table>
<?php include ("bottom.php");?>
</div>
<div class="ad">dsfsf
	<!-- BEGIN STANDARD TAG - 728x90 - DO NOT MODIFY --><SCRIPT TYPE="text/javascript" SRC="http://ads.yahoo.com/st?ad_type=ad&ad_size=728x90&section=6311678&CACHEBUSTER&pub_url=${PUB_URL}&pub_redirect_unencoded=1&pub_redirect=INSERT_CLICK_MACRO"></SCRIPT><!-- END TAG -->
</div>
</body>
</html>