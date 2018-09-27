<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Insert title here</title>
</head>
<body>
<?php
session_start ();
?>

<?php 
if(isset($_SESSION['login']))
{
    $var = $_SESSION['login'].".jpg";
    if(file_exists("../avatar/".$var))
        echo "<img src=\"../avatar/".$var."\" alt=\"avtar\" style=\"width:100px; height:100px;\">";
    else 
        echo "<img src=\"../avatar/default_avatar.jpg\" alt=\"avtar\" style=\"width:100px; height:100px;\">";
    echo "<h3>Username:</h3> ";
    echo "&nbsp&nbsp&nbsp".$_SESSION['login'];
    echo "<h3>Email Address:</h3> ";
    echo "";
    echo "<h3>Phone Number:<h3>";
    echo "";
}
?>
<div>
<?php 
?>
</div>
</body>
</html>