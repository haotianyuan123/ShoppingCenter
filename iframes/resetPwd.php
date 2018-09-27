<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link rel="stylesheet" type="text/css" href="../style.css" />
<title>Insert title here</title>
</head>
<body>
<?php
session_start ();
?>

<br><br><br><br>
<div class="oneField">
<form action="../controller.php" method="post">
   <strong>Username</strong>:&nbsp;<?php echo $_SESSION['login']?><br><br>
   OldPassword:&nbsp;&nbsp; <input type="password" name="UserEnterPwd" pattern=".{6,}" required 
   oninvalid="setCustomValidity('Minimum length is 6 characters')" 
   oninput="setCustomValidity('')"><br><br>
   NewPassword:&nbsp;<input type="password" name="NewPwd" pattern=".{6,}" required 
   oninvalid="setCustomValidity('Minimum length is 6 characters')"
   oninput="setCustomValidity('')"><br><br>
   &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type="submit" name="ChangePassword" value="Change Password"> <br> <br>
</form>
</div>
</body>
</html>
