<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Receipt</title>
</head>
<body class="checkout">
<a href="index.php">Back to Home</a>
<?php
session_start ();
date_default_timezone_set( 'America/Phoenix' );  // If you want the correct date
$mydate = date ( "d-M-Y" );
?>

<div class="information">
<h1>Receipt</h1>
 <?php 
 echo 'Purchase date: ' . $mydate . ' <br>' ;
 ?>
</div>

</body>
</html>
