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
<br><br><br><br>
<h4>Notice that the uploaded image used for avatar will be renamed as <?php echo $_SESSION['login'].".jpg"?> 
automatically, <br>and will override the previous one!</h4>
<form action="../upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>

</body>
</html>
