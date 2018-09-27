<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Login</title>
</head>
<body class="login_bg">
<?php
session_start ();
?>
<div class="loginField">
<h1>Login</h1>
<form action="controller.php" method="GET">
<div style="text-align: center;">Username:<input name="USER" type="text" id="user" required></div>
<br><br><br>
<div style="text-align: center;">Password:<input name="PASSWORD" type="password" id="password" required></div>
<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<input type="submit" value="Login">&nbsp;&nbsp;&nbsp;<a href="index.php">Back to Home</a>
<div id="toChange"><?php
if(isset($_SESSION['loginError']))
    echo $_SESSION['loginError'];
?>
</div>
</form>
</div>>
</body>
</html>