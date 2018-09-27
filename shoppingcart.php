<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Shopping Cart</title>
</head>
<body class="shoppingcart">
<?php
session_start ();
?>
<a href="index.php">Back to Home</a>
<div class="information">
<h1>Shopping Cart</h1>
<div id="shoppingcart">

</div>

</div>
<script>
function showAll(){
	var shoppingcart=document.getElementById("shoppingcart");
	var anObj = new XMLHttpRequest();
	var mode="shoppingcart";
	anObj.open("GET", "controller.php?mode="+mode, true);
	anObj.send();
	anObj.onreadystatechange = function () {
	if (anObj.readyState == 4 && anObj.status == 200) { 
	
		var array = JSON.parse(anObj.responseText);
		var str="";
		var price=0;
		var total=0;
		if(array.length==0){
			str="<span>Your Shopping Cart is Empty</span>"
		}
		else{
			str+="<ul>";
			for(var i=0;i<array.length;i++){
				price=array[i]['quantity']*array[i]['price'];
				str+="<li style=\"float:left;\">";
				str+="item: "
				str+=array[i]['item'];
				str+="&nbsp;&nbsp;&nbsp;quantity:";
				str+=array[i]['quantity'];
				str+="&nbsp;&nbsp;&nbsp;price:$";
				str+=price;
				if(array[i]['item']=="App Store & iTunes Gift Cards"){
					str+="<form action=\"controller.php\" method=\"GET\"><input style=\"float:left;\" type=\"submit\" name=\"removeGiftCard\" value=\"remove\"></form>";
				}
				else if(array[i]['item']=="NEW Fitbit Ionic Smartwatch"){
					str+="<form action=\"controller.php\" method=\"GET\"><input style=\"float:left;\" type=\"submit\" name=\"removeWatch\" value=\"remove\"></form>";
				}
				else if(array[i]['item']=="Brown Giant Teddy Bear"){
					str+="<form action=\"controller.php\" method=\"GET\"><input style=\"float:left;\" type=\"submit\" name=\"removeBear\" value=\"remove\"></form>";
				}
				else if(array[i]['item']=="Memory Foam Mattress"){
					str+="<form action=\"controller.php\" method=\"GET\"><input style=\"float:left;\" type=\"submit\" name=\"removeMattress\" value=\"remove\"></form>";
				}
				else if(array[i]['item']=="Sony Headphones"){
					str+="<form action=\"controller.php\" method=\"GET\"><input style=\"float:left;\" type=\"submit\" name=\"removeSony\" value=\"remove\"></form>";
				}
				else if(array[i]['item']=="Floor Lamp"){
					str+="<form action=\"controller.php\" method=\"GET\"><input style=\"float:left;\" type=\"submit\" name=\"removeLamp\" value=\"remove\"></form>";
				}
				else if(array[i]['item']=="Mechanical Keyboard"){
					str+="<form action=\"controller.php\" method=\"GET\"><input style=\"float:left;\" type=\"submit\" name=\"removeKeyboard\" value=\"remove\"></form>";
				}
				else if(array[i]['item']=="Nike Air Force"){
					str+="<form action=\"controller.php\" method=\"GET\"><input style=\"float:left;\" type=\"submit\" name=\"removeNike\" value=\"remove\"></form>";
				}
				else if(array[i]['item']=="One piece OP LUFFY"){
					str+="<form action=\"controller.php\" method=\"GET\"><input style=\"float:left;\" type=\"submit\" name=\"removeLufei\" value=\"remove\"></form>";
				}
				//~~~~~
				else if(array[i]['item']=="Executive Swivel Office Chair"){
					str+="<form action=\"controller.php\" method=\"GET\"><input style=\"float:left;\" type=\"submit\" name=\"removeChair\" value=\"remove\"></form>";
				}
				else if(array[i]['item']=="Vertical File Cabinet"){
					str+="<form action=\"controller.php\" method=\"GET\"><input style=\"float:left;\" type=\"submit\" name=\"removeCabinet\" value=\"remove\"></form>";
				}
				else if(array[i]['item']=="One Piece Portrait of Shanks"){
					str+="<form action=\"controller.php\" method=\"GET\"><input style=\"float:left;\" type=\"submit\" name=\"removeShanks\" value=\"remove\"></form>";
				}
				
				str+="</li>";
				total+=price;
			}
			str+="</ur>";
			str+="<br><br><br><br>";
			str+="<span>Total: $"+total+"</span>"
			str+="<br><br>";
			str+="<form action=\"checkout.php\"><input type=\"submit\" value=\"Check Out\"></form>"
		}
		shoppingcart.innerHTML=str;
		
 	}
	} 
}
window.onload = showAll;
</script>
</body>
</html>