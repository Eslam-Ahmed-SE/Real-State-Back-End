<!--

<!DOCTYPE html>
<html lang="">

<head>
	<meta charset="utf-8">
	<title>API Index</title>
	<meta name="author" content="Eslam Ahmed">
	<meta name="description" content="Real state back end">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="">
	<link rel="icon" type="image/x-icon" href=""/>
</head>

<body>
	<header></header>
	<main></main>
	<footer></footer>
    
	
    <form action="connection/save_ad.php" method="post">
        <input type="number" name="UID" placeholder="UID"/>
        <br>
        <input type="text" name="pic" placeholder="pic"/>
        <br>
        <input type="number" name="price" placeholder="price"/>
        <br>
        <input type="text" name="address" placeholder="address"/>
        <br>
        <input type="number" name="type" placeholder="type"/>
        <br>
        
        
        <input type="radio" id="furnished" name="furnished" value="true"/>
        <label for="furnished">Furnished</label>
        <input type="radio" id="notFurnished" name="furnished" value="false"/>
        <label for="notFurnished">Not Furnished</label>
        <br>
        
        <input type="radio" id="sale" name="sale" value="1"/>
        <label for="sale">For Sale</label>
        <input type="radio" id="rent" name="sale" value="2"/>
        <label for="rent">For Rent</label>
        <br>
        <input type="number" name="rooms" placeholder="rooms num"/>
        <br>
        <input type="number" name="bathrooms" placeholder="bathrooms num"/>
        <br>
        <input type="number" name="area" placeholder="area"/>
        <br>
        <input type="text" name="desc" placeholder="desc"/>
        <br>
        <input type="text" name="email" placeholder="email"/>
        <br>
        <input type="number" name="phone" placeholder="phone"/>
        <br>
        <input type="number" name="whatsapp" placeholder="whatsapp"/>
        <br>
        <input type="submit"/>
    </form>    
    
    <script type="text/javascript" src=""></script>
    
</body>

</html>-->

<?php

require("Controller/AdController.php");

$page = null;
if (isset($_GET["page"]))
    $page=$_GET["page"];

$obje = new AdController();
$obje->list($page);


$ad["UID"]=12;
$ad["pics"]=array("pic/1.png","pic/2.png");
$ad["price"]=12;
$ad["address"]="12 asd";
$ad["type"]=1;
$ad["furnished"]=1;
$ad["sale_type"]=1;
$ad["rooms_num"]=1;
$ad["bathrooms_num"]=1;
$ad["area"]=1;
$ad["ad_dasc"]="asd asd";
$ad["contact_email"]="asd@asd.asd";
$ad["contact_phone"]=123;
$ad["contact_whatsapp"]=12323;
                    
//$obje->add($ad);





?>