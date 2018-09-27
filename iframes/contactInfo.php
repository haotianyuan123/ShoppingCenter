<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Profile</title>
</head>
<body class="LoginBody">
<?php
session_start ();
?>
<div class="profile">
<h1>Edit My User Profile</h1>
<div id="toChange"></div>
</div>

<script>
function showAll(){
	var anObj = new XMLHttpRequest();
	var mode="profile";
	anObj.open("GET", "../controller.php?mode="+mode, true);
	anObj.send();
	anObj.onreadystatechange = function () {
	if (anObj.readyState == 4 && anObj.status == 200) { 
		var array = JSON.parse(anObj.responseText);
		var str="<form action=\"../controller.php\" method=\"GET\">";	
		str+="FirstName:<input type=\"text\" name=\"fname\" value=\"";
		if(array[0]['fname']!=null){
			str+=array[0]['fname'];
		}
		str+="\"><br><br>";
		str+="LastName:<input type=\"text\" name=\"lname\" value=\"";
		if(array[0]['lname']!=null){
			str+=array[0]['lname'];
		}
		str+="\"><br><br>";
		str+="Street:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"text\" name=\"street\" value=\"";
		if(array[0]['street']!=null){
			str+=array[0]['street'];
		}
		str+="\"><br><br>";
		
		str+="City:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"text\" name=\"city\" value=\"";
		if(array[0]['city']!=null){
			str+=array[0]['city'];
		}
		str+="\"><br><br>";
		str+="State&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <select name=\"state\">";
		if(array[0]['state']!=null){
			str+="<option selected>"+array[0]['state']+"</option> ";
		}
		else{
			str+="<option> </option> ";
		}
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
		
		str+="</select><br><br>";
		str+="Zip:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<input type=\"text\" pattern=\"[0-9]{5}\" name=\"zip\" value=\"";
		if(array[0]['zip']!=null){
			str+=array[0]['zip'];
		}
		str+="\"><br><br>";
		str+="<input type=\"submit\" name=\"save\" value=\"save\"><br><br>";
		str+="</form>";
		document.getElementById('toChange').innerHTML=str;
	}
	}
	
}
window.onload = showAll;

</script>
</body>
</html>