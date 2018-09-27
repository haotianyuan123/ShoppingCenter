<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="style.css" />
<title>Floor Lamp</title>
</head>
<body class="OneItemBody">
<?php
session_start ();
?>
<a href="index.php">Back to Home</a>
<div class="information">
<img src="./images/lamp.jpg" class="ImageInformation" ><br>
<span>Tree Trunk & Twig Floor Lamp</span><br><br>
value:<input name="value" type="text" value=189$ readonly><br><br>
<?php
        if(isset($_SESSION['login']))
        {
        echo "<form action=\"controller.php\" method=\"GET\">
        <input name=\"quantity\" type=\"number\" min=\"1\" max=\"100\" required id=\"quantity\">Quantity (1..100)
        <br><br>
        <input type=\"submit\" name=\"LampcheckOut\" value=\"Check Out\">
        <br><br>
        or
        <br><br>
        <input type=\"submit\" name=\"LampaddCart\" value=\"Add to Cart\">
        </form>";
        }
        else{
            echo "<span>Please Login</span>";
        }
        echo '<fieldset style="text-align:left;">' . '<legend>Item specifics</legend>';
        echo "Model: Tree Trunk Floor Lamp<br>Type: Floor Lamp<br>Brand:  N/A<br> Theme: Nature<br> Size: 58.5\"H";
        echo "</fieldset>";
        
?>
<div id="tochange"></div>
</div>


<script>
function getreviews(){
	var anObj = new XMLHttpRequest();
	var mode="getreviewsLamp";
	anObj.open("GET", "controller.php?mode="+mode, true);
	anObj.send();
	anObj.onreadystatechange = function () {
	if (anObj.readyState == 4 && anObj.status == 200) { 
		var array = JSON.parse(anObj.responseText);
		var rating=0;
		for(var i=0;i<array.length;i++){
			rating+=parseInt(array[i]['rating']);
		}
		rating=rating/array.length;
		rating=parseFloat(rating).toFixed(2);
		var str="<fieldset style=\"text-align:left;\">";
		str+="Overall Rating: "+rating+" star";
 		str+="<legend>Customers Reviews</legend>";
 		for(var i=0;i<array.length;i++){
			str+="<div style=\"border:2px solid black; width:100%;border-radius:5px;\">";
			if(parseInt(array[i]['rating'])==5){
				str+="<img src=\"./images/star.jpg\" style=\"width:15px;\">";
				str+="<img src=\"./images/star.jpg\" style=\"width:15px;\">";
				str+="<img src=\"./images/star.jpg\" style=\"width:15px;\">";
				str+="<img src=\"./images/star.jpg\" style=\"width:15px;\">";
				str+="<img src=\"./images/star.jpg\" style=\"width:15px;\">";
				str+="<br>";
			}
			if(parseInt(array[i]['rating'])==4){
				str+="<img src=\"./images/star.jpg\" style=\"width:15px;\">";
				str+="<img src=\"./images/star.jpg\" style=\"width:15px;\">";
				str+="<img src=\"./images/star.jpg\" style=\"width:15px;\">";
				str+="<img src=\"./images/star.jpg\" style=\"width:15px;\">";
				str+="<br>";
			}
			if(parseInt(array[i]['rating'])==3){
				str+="<img src=\"./images/star.jpg\" style=\"width:15px;\">";
				str+="<img src=\"./images/star.jpg\" style=\"width:15px;\">";
				str+="<img src=\"./images/star.jpg\" style=\"width:15px;\">";
				str+="<br>";
			}
			if(parseInt(array[i]['rating'])==2){
				str+="<img src=\"./images/star.jpg\" style=\"width:15px;\">";
				str+="<img src=\"./images/star.jpg\" style=\"width:15px;\">";
				str+="<br>";
			}
			if(parseInt(array[i]['rating'])==1){
				str+="<img src=\"./images/star.jpg\" style=\"width:15px;\">";
				str+="<br>";
			}
			str+="\""+array[i]['review']+"\"";
			str+="<br> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;--"+array[i]['username'];
			str+="</div>";
			str+="<br>";
 		}
 		
		str+="</fieldset>";
     
		document.getElementById("tochange").innerHTML=str;
	}
	}
	
}
window.onload = getreviews;
</script>
</body>
</html>

