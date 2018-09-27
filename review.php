<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Order History</title>
<script src="./ckeditor/ckeditor.js"/></script>
<script src="./ckfinder/ckfinder.js"></script>
</head>
<body class="review">
<?php
session_start ();
if(isset($_GET["itemhistory"])){
   $item=$_GET['itemhistory'];
}

?>
<a href="index.php">Back to Home</a>
<div class="information" >
<h1>Write your reivew</h1>
<form action="controller.php" method="GET">
<input type="text" name="itemreview" size=50 value="<?php echo $item ?>" readonly>
<br><br>
<textarea name="comment" rows="8" cols="50" placeholder="Write your comment..." required></textarea>
<script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKFinder.setupCKEditor();
                CKEDITOR.replace( 'comment',{uiColor: '#9AB8F3'} );
</script>
<fieldset style="text-align: left;">
<legend>What is your overall rating?</legend> 
<input type="radio" name="rating" value="five" required><img src="./images/star.jpg" style="width:15px;"><img src="./images/star.jpg" style="width:15px;"><img src="./images/star.jpg" style="width:15px;"><img src="./images/star.jpg" style="width:15px;"><img src="./images/star.jpg" style="width:15px;"><br>
<input type="radio" name="rating" value="four" required><img src="./images/star.jpg" style="width:15px;"><img src="./images/star.jpg" style="width:15px;"><img src="./images/star.jpg" style="width:15px;"><img src="./images/star.jpg" style="width:15px;"><br>
<input type="radio" name="rating" value="three" required><img src="./images/star.jpg" style="width:15px;"><img src="./images/star.jpg" style="width:15px;"><img src="./images/star.jpg" style="width:15px;"><br>
<input type="radio" name="rating" value="two" required><img src="./images/star.jpg" style="width:15px;"><img src="./images/star.jpg" style="width:15px;"><br>
<input type="radio" name="rating" value="one" required><img src="./images/star.jpg" style="width:15px;"><br>
</fieldset>
<?php 
    
?>
<input type="submit" value="submit" name="review">


</form>
</div>

</body>
</html>