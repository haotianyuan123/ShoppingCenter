<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
<link rel="stylesheet" type="text/css" href="dropdown_menu.css" />
<link rel="stylesheet" type="text/css" href="avatar.css" />
<script src="./ckfinder/ckfinder.js"></script>
<title>Shopping Site</title>
</head>
<body id="indexBody" class="indexBody" background="" onload="setBackground()">
<?php
session_start ();
?>
<div id="header">
		<div class="bigTitle">
			Welcome to Arizona Shopping Center
		<?php
        if(isset($_SESSION['login']))
        {
           
            $var = $_SESSION['login'].".jpg";
            echo "<div class=\"dropdown\">
                  <button onclick=\"myFunction()\" class=\"dropbtn\">".$_SESSION['login'].
                  "</button> <div id=\"myDropdown\" class=\"dropdown-content\">".
                  "<a href=\"accountSetting.php\">Account Setting</a>".
                  "<a href=\"orderhistory.php\">Order History</a>".
                  "<a href=\"shoppingcart.php\">Shopping Cart</a>
                   <a href=\"\" onclick=\"userLogOut()\">Log Out</a>
                   </div>
                   </div>"; 
            if(file_exists("avatar/".$var))
                echo "<div id=\"avatar\" style=\"background-image: url(avatar/".$var.");\"></div>";
            else
                echo "<div id=\"avatar\" style=\"background-image: url(avatar/default_avatar.jpg);\"></div>";
            
            echo "<br><button class=\"fileChooser\" onclick=\"getURL()\">Comfirm</button>";
            echo "<input class=\"fileChooser\" type=\"text\" size=\"10\" name=\"url\" id=\"url\" />";
            echo "<button class=\"fileChooser\" onclick=\"openPopup()\">Select file</button>";
        }
        else
        { 
          echo "<form action=\"./Register.php\">
		        <button>Register</button>
		        </form>";
          echo "<form action=\"./Login.php\">
		        <button >Login</button>
		        </form>";
        }
		?>
		</div>
		
		
		
</div>
<div id="giftcard" class="oneItem">
<img src="./images/giftcard.jpeg" class="itemImage">
<a href="GiftCard.php">App Store & iTunes Gift Cards</a><br><br>
<span>$25</span>
<br>
<?php 
if(isset($_SESSION['login']))
{
echo "<form action=\"controller.php\" method=\"GET\"><button name=\"buyitGiftCard\">Buy It Now</button></form>
  
    <form action=\"controller.php\" method=\"GET\">
    <button name=\"giftcard\">Add to cart</button>
    <form>";
}
else{
    echo "<span>Please Login</span>";
}
?>
</div>

<div id="watch" class="oneItem">
<img src="./images/watch.jpg" class="itemImage">
<a href="watch.php">NEW Fitbit Ionic Smartwatch</a><br><br>
<span>$239</span>
<br>
<?php 
if(isset($_SESSION['login']))
{
echo "<form action=\"controller.php\" method=\"GET\"><button name=\"buyitWatch\">Buy It Now</button></form>
  
    <form action=\"controller.php\" method=\"GET\">
    <button name=\"watch\">Add to cart</button>
    <form>";
}
else{
    echo "<span>Please Login</span>";
}
?>
</div>

<div id="bear" class="oneItem">
<img src="./images/bear.jpg" class="itemImage">
<a href="bear.php">Brown Giant Teddy Bear</a><br><br>
<span>$46</span>
<br>
<?php 
if(isset($_SESSION['login']))
{
echo "<form action=\"controller.php\" method=\"GET\"><button name=\"buyitBear\">Buy It Now</button></form>
  
    <form action=\"controller.php\" method=\"GET\">
    <button name=\"bear\">Add to cart</button>
    <form>";
}
else{
    echo "<span>Please Login</span>";
}
?>
</div>

<div id="bear" class="oneItem">
<img src="./images/mattress.jpg" class="itemImage">
<a href="mattress.php">Memory Foam Mattress</a><br><br>
<span>$356</span>
<br>
<?php 
if(isset($_SESSION['login']))
{
echo "<form action=\"controller.php\" method=\"GET\"><button name=\"buyitMattress\">Buy It Now</button></form>
  
    <form action=\"controller.php\" method=\"GET\">
    <button name=\"mattress\">Add to cart</button>
    <form>";
}
else{
    echo "<span>Please Login</span>";
}
?>
</div>

<div id="sony" class="oneItem">
<img src="./images/sony.jpg" class="itemImage">
<a href="sony.php">Sony Headphones</a><br><br>
<span>$290</span>
<br>
<?php 
if(isset($_SESSION['login']))
{
echo "<form action=\"controller.php\" method=\"GET\"><button name=\"buyitSony\">Buy It Now</button></form>
  
    <form action=\"controller.php\" method=\"GET\">
    <button name=\"sony\">Add to cart</button>
    <form>";
}
else{
    echo "<span>Please Login</span>";
}
?>
</div>

<div id="lamp" class="oneItem">
<img src="./images/lamp.jpg" class="itemImage">
<a href="lamp.php">Floor Lamp</a><br><br>
<span>$189</span>
<br>
<?php 
if(isset($_SESSION['login']))
{
echo "<form action=\"controller.php\" method=\"GET\"><button name=\"buyitLamp\">Buy It Now</button></form>
    <form action=\"controller.php\" method=\"GET\">
    <button name=\"lamp\">Add to cart</button>
    <form>";
}
else{
    echo "<span>Please Login</span>";
}
?>
</div>

<div id="keyboard" class="oneItem">
<img src="./images/keyboard.jpg" class="itemImage">
<a href="keyboard.php">Mechanical Keyboard</a><br><br>
<span>$480</span>
<br>
<?php 
if(isset($_SESSION['login']))
{
echo "<form action=\"controller.php\" method=\"GET\"><button name=\"buyitKeyboard\">Buy It Now</button></form>
    <form action=\"controller.php\" method=\"GET\">
    <button name=\"keyboard\">Add to cart</button>
    <form>";
}
else{
    echo "<span>Please Login</span>";
}
?>
</div>

<div id="nike" class="oneItem">
<img src="./images/nike.jpg" class="itemImage">
<a href="nike.php">Nike Air Force 1</a><br><br>
<span>$85</span>
<br>
<?php 
if(isset($_SESSION['login']))
{
echo "<form action=\"controller.php\" method=\"GET\"><button name=\"buyitNike\">Buy It Now</button></form>
    <form action=\"controller.php\" method=\"GET\">
    <button name=\"nike\">Add to cart</button>
    <form>";
}
else{
    echo "<span>Please Login</span>";
}
?>
</div>

<div id="lufei" class="oneItem">
<img src="./images/lufei.jpg" class="itemImage">
<a href="lufei.php">One piece OP LUFFY</a><br><br>
<span>$13</span>
<br>
<?php 
if(isset($_SESSION['login']))
{
echo "<form action=\"controller.php\" method=\"GET\"><button name=\"buyitLufei\">Buy It Now</button></form>
    <form action=\"controller.php\" method=\"GET\">
    <button name=\"lufei\">Add to cart</button>
    <form>";
}
else{
    echo "<span>Please Login</span>";
}
?>
</div>

<!-- final ******************************* -->
<div id="chair" class="oneItem">
<img src="./images/chair.jpg" class="itemImage">
<a href="chair.php">Executive Swivel Office Chair</a><br><br>
<span>$69</span>
<br>
<?php 
if(isset($_SESSION['login']))
{
echo "<form action=\"controller.php\" method=\"GET\"><button name=\"buyitChair\">Buy It Now</button></form>
    <form action=\"controller.php\" method=\"GET\">
    <button name=\"chair\">Add to cart</button>
    <form>";
}
else{
    echo "<span>Please Login</span>";
}
?>
</div>

<div id="cabinet" class="oneItem">
<img src="./images/cabinet.jpg" class="itemImage">
<a href="cabinet.php">Vertical File Cabinet</a><br><br>
<span>$152</span>
<br>
<?php 
if(isset($_SESSION['login']))
{
echo "<form action=\"controller.php\" method=\"GET\"><button name=\"buyitCabinet\">Buy It Now</button></form>
    <form action=\"controller.php\" method=\"GET\">
    <button name=\"cabinet\">Add to cart</button>
    <form>";
}
else{
    echo "<span>Please Login</span>";
}
?>
</div>

<div id="shanks" class="oneItem">
<img src="./images/shanks.jpg" class="itemImage">
<a href="shanks.php">One Piece Portrait of Shanks</a><br><br>
<span>$103</span>
<br>
<?php 
if(isset($_SESSION['login']))
{
echo "<form action=\"controller.php\" method=\"GET\"><button name=\"buyitShanks\">Buy It Now</button></form>
    <form action=\"controller.php\" method=\"GET\">
    <button name=\"shanks\">Add to cart</button>
    <form>";
}
else{
    echo "<span>Please Login</span>";
}
?>
</div>






<script>
var bg="";
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) 
{

    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}

function userLogOut()
{
	var ajax = new XMLHttpRequest();
	ajax.open("GET", "controller.php?logout=" + " ", false);
	ajax.send();

	ajax.onreadystatechange = function() 
	{
		if (ajax.readyState == 4 && ajax.status == 200) 
		{
			 location.reload();
		}
	}
}

function openPopup() {
	    CKFinder.popup( {
        chooseFiles: true,
        onInit: function( finder ) {
            finder.on( 'files:choose', function( evt ) {
                var file = evt.data.files.first();
                document.getElementById( 'url' ).value = file.getUrl();
               } );
                finder.on( 'file:choose:resizedImage', function( evt ) {
                    document.getElementById( 'url' ).value = evt.data.resizedUrl;
               } );
        }
    } );
}

function getURL()
{
	if(document.getElementById("url").value === "")
		return;
	console.log(document.getElementById("url").value);
	var link = ".." + document.getElementById("url").value;
	document.getElementById('indexBody').setAttribute('background',  link);
	bg = link;

	var ajax = new XMLHttpRequest();
	ajax.open("GET", "controller.php?userBg=" + bg, true);
	ajax.send();

	ajax.onreadystatechange = function() 
	{
		if (ajax.readyState == 4 && ajax.status == 200) 
		{
			console.log("Saved in database!");
		}
	}
}

function setBackground()
{
	var ajax = new XMLHttpRequest();
	ajax.open("GET", "controller.php?getBg=" + "getBg", true);
	ajax.send();

	ajax.onreadystatechange = function() 
	{
		if (ajax.readyState == 4 && ajax.status == 200) 
		{
			bg = JSON.parse(ajax.responseText);
			console.log("bg is: " + bg);
			
			if(bg === "LogOut" || bg === null)
			{
				document.getElementById('header').setAttribute('class', 'headerDefault');
				return;
			}
			document.getElementById('indexBody').setAttribute('background',  bg);
		}
	}
	
}
</script>

</body>
</html>