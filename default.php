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
<div id="tochange"></div>
<script>
function showAll(){
	var tochange=document.getElementById("tochange");
	var anObj = new XMLHttpRequest();
	var mode="default";
	anObj.open("GET", "controller.php?mode="+mode, true);
	anObj.send();
	anObj.onreadystatechange = function () {
	if (anObj.readyState == 4 && anObj.status == 200) { 
		var array = JSON.parse(anObj.responseText);
		var str="<div style=\"margin: auto;border-radius: 5px;padding: 10px;width: 500px;height: 100%;border-radius: 5px;	box-shadow: 0 0 15px gray;text-align:center;\" id=\"tochange\">";
		str+=  "<h1>Shipping Information</h1>";
		str+="<form action=\"controller.php\" method=\"GET\">";
		for(var i=0;i<array.length;i++){
				str+="First Name";
				str+="<input name=\"firstName\"  type=\"text\" id=\"firstname\" value=\""+  array[i]['fname']+"\" required><br><br>";
			    str+="Last Name";
			    str+="<input name=\"lastName\" pattern=\"[A-Z a-z]*\" type=\"text\" id=\"lastname\" value=\""+array[i]['lname'] +"\" required><br><br>";
				str+="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				str+="Street <input name=\"street\" type=\"text\" id=\"street\" value=\""+ array[i]['street']+ "\" required><br><br>";
				str+="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				str+="City <input name=\"city\" pattern=\"[A-Z a-z]*\" type=\"text\" id=\"city\" value=\""+array[i]['city']+"\" required><br><br>";
				str+="State <select name=\"state\" id=\"state\" required>";
				str+="<option selected>"+array[i]['state']+"</option>";
				str+="<option>Alabama</option> ";
				str+="<option>Arizona</option> ";
				str+="<option>Alaska</option> ";
				str+="<option>Arkansas</option> ";
				str+="<option>California</option>";
				str+="<option>Colorado</option>";
				str+="<option>Conecticut</option>";
				str+="<option>Delaware</option>";
				str+="<option>Florida</option>";
				str+="<option>Geogia</option>";
				str+="<option>Hawaii</option>";
				str+="<option>Idaho</option>";
				str+="<option>Illinois</option>";
				str+="<option>Indiana</option>";
				str+="<option>Lowa</option>";
				str+="<option>Kansas</option>";
				str+="<option>Kentucky</option>";
				str+="<option>Louisiana</option>";
				str+="<option>Maine</option>";
				str+="<option>Maryland</option>";
				str+="<option>Massachusetts</option>";
				str+="<option>Michigan</option>";
				str+="<option>Minnesota</option>";
				str+="<option>Mississippi</option>";
				str+="<option>Missouri</option>";
				str+="<option>Montana</option>";
				str+="<option>Nebraska</option>";
				str+="<option>Nevada</option>";
				str+="<option>New Hampshire</option>";
				str+="<option>New Jersey</option>";
				str+="<option>New Mexico</option>";
				str+="<option>New York</option>";
				str+="<option>North Carlina</option>";
				str+="<option>North Dakota</option>";
				str+="<option>Ohio</option>";
				str+="<option>Okalahoma</option>";
				str+="<option>Oregon</option>";
				str+="<option>Pennsylvania</option>";
				str+="<option>Rhode Island</option>";
				str+="<option>South Carolina</option>";
				str+="<option>South Dakata</option>";
				str+="<option>Tennessee</option>";
				str+="<option>Texas</option>";
				str+="<option>Utah</option>";
				str+="<option>Vermont</option>";
				str+="<option>Virginia</option>";
				str+="<option>Washington</option>";
				str+="<option>West Virginia</option>";
				str+="<option>Wisconsin</option>";
				str+="<option>Wyoming</option>";
				str+="</select>";
				str+="<br><br>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				str+="ZIP <input name=\"zip\" pattern=\"[0-9]{5}\" type=\"text\" id=\"zip\" value=\""+array[i]['zip']+"\" required>";
			    str+="<br><br><input type=\"submit\" name=\"continueButton\" value=\"Continue\"></form> </div>";
		}
		tochange.innerHTML=str;
		
 	}
	} 
}
window.onload = showAll;
</script>




</body>
</html>