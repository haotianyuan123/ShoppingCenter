<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Shopping Cart</title>
</head>
<body background="./images/checkout.jpg">
<?php
session_start ();
?>
<a href="index.php">Back to Home</a>
<a href="default.php">Use my default address</a>
<div class="information" id="tochange">
<h1>Shipping Information</h1>
<form action="controller.php" method="GET">
First Name
<input name="firstName"  type="text" id="firstname" required><br><br>
Last Name
<input name="lastName" pattern="[A-Z a-z]*" type="text" id="lastname" required><br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
Street <input name="street" type="text" id="street" required><br><br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
City <input name="city" pattern="[A-Z a-z]*" type="text" id="city" required><br><br>
State <select name="state" id="state" required>
<option selected>Arizona</option> 
<option>Indiana</option> 
<option>Colorado</option> 
<option>California</option>
</select>
<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
ZIP <input name="zip" pattern="[0-9]{5}" type="text" id="zip" required>
<br><br>
<input type="submit" name="continueButton" value="Continue">
</form>
</div>

</body>
</html>