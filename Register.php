<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Register</title>
</head>
<body class="RegisterBody">
<?php
session_start ();
?>
<div class="loginField">
<h1>Register</h1>
<form  action="controller.php" method="GET">
<div style="text-align: center;">Username<input name="user" type="text" id="user" pattern=".{4,}" title="length at least 4" required></div>
<br>
<div style="text-align: center;">Password<input name="password" type="password" id="password" title="length at least 6" pattern=".{6,}" required></div>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" value="Register">&nbsp;&nbsp;&nbsp;<a href="index.php">Back to Home</a>
<div id="toChange"><?php
if(isset($_SESSION['registerError']))
    echo $_SESSION['registerError'];
?>
</div>
</form>
</div>>
</body>
</html>