<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Account Setting</title>
</head>
<body>
<?php
session_start ();
?>
<div class="ac_set_bg">
<div class="container">
<div class="leftArial">
	<dl class="ac_set_left">
		<dt><span style="cursor:pointer;" onclick="changeTo('profile')"><strong>PROFILE</strong></span></dt>
		<dd><br></dd> 

	  	<dt><br><span style="cursor:pointer;" onclick="changeTo('contact')">
				<strong>CONTACT INFO</strong></span></dt>
    	<dd><br></dd>

		<dt><br><span style="cursor:pointer;" onclick="changeTo('upload')">
				<strong>UPLOAD AVATAR</strong></span></dt>
			<dd><br></dd>
		<dt><br><span style="cursor:pointer;" onclick="changeTo('custom')">
				<strong>UPLOAD BACKGROUND</strong></span></dt>
			<dd><br></dd>
		<dt><br><span style="cursor:pointer;" onclick="changeTo('resetPwd')">
				<strong>RESET PASSWORD</strong></span></dt>
			<dd><br></dd>
		<dt><br><a href="index.php" style="text-decoration:none;"><strong>BACK TO HOME PAGE</strong></a></dt>
			<dd></dd>
	</dl>
</div>
	<iframe class="iframeContent" id="section" src="iframes/profile.php"> </iframe>
</div>	
</div>
<script>
function changeTo(str)
{
	if(str === "upload")
		document.getElementById("section").src = "iframes/uploadAvatar.php";
	else if(str === "profile")
		document.getElementById("section").src = "iframes/profile.php";
	else if(str === "resetPwd")
		document.getElementById("section").src = "iframes/resetPwd.php";
	else if(str ==="custom")
		document.getElementById("section").src = "iframes/uploadBackground.php";
	else if(str ==="contact")
		document.getElementById("section").src = "iframes/contactInfo.php";
}
</script>
</body>
</html>