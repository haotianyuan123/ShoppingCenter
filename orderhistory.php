<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Order History</title>
</head>
<body class="orderhistory_bg">
<?php
session_start ();
?>
<div class="information" style="height:8980px;">
<h1>Your Order History</h1>
<div id="toChange"></div>
</div>

<script>
function showAll(){
	var shoppingcart=document.getElementById("shoppingcart");
	var anObj = new XMLHttpRequest();
	var mode="orderhistory";
	anObj.open("GET", "controller.php?mode="+mode, true);
	anObj.send();
	anObj.onreadystatechange = function () {
	if (anObj.readyState == 4 && anObj.status == 200) { 
		var str="";
		var array = JSON.parse(anObj.responseText);
		if(array.length==0)
		{
			str+="<span><strong>Your Order History is Empty</strong></span>"
		}
		else{
				
				str+="<form class=\"orderHistory_field\" style=\"float:left;\" action=\"review.php\" method=\"GET\">";
				str+="<fieldset style=\"text-align: left;\">";
				for(var i=0;i<array.length;i++){
					str+="<input type=\"radio\" name=\"itemhistory\" value=\""+array[i]['item']+"\" required>";
					str+="item: "
						str+=array[i]['item'];
						str+=" quantity: "
						str+=array[i]['quantity'];
						str+=" date: "
						str+=array[i]['date'];
					str+="<br>";
				}
				str+="</fieldset>";
				str+="<br>";
				str+="<input type=\"submit\" name=\"review\" value=\"Write the product review\"></form>";                                                 
				str+="<br>";
				str+="<form action=\"controller.php\" method=\"GET\"><input type=\"submit\"name=\"cleanorderhistory\" value=\"Clean history\"><br>";
				str+="</form>";
				
			
		}
		str+="<br>";
		str+="<a href=\"index.php\"><strong>Back to Home</strong></a>";
		document.getElementById('toChange').innerHTML=str;
	}
	}
}
window.onload = showAll;
</script>
</body>
</html>