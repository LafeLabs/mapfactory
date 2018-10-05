<!doctype html>
<html>
<head>
<title>Map</title>
<!-- 
PUBLIC DOMAIN, NO COPYRIGHTS, NO PATENTS.

-->
<!--Stop Google:-->
<META NAME="robots" CONTENT="noindex,nofollow">

</head>
<body>
<div id = "jsondatadiv" style = "display:none"><?php

echo file_get_contents("json/map.txt");

?></div>
<img id = "mainImage"/>
<script>
    map = JSON.parse(document.getElementById("jsondatadiv").innerHTML);
    document.getElementById("mainImage").src = "images/" + map.imagefilename;
    
    document.getElementById("mainImage").onload = function(){
        if(this.width < innerWidth){
            this.style.left = (0.5*(innerWidth - this.width)).toString() + "px";
            imageWidth = 0.5*(innerWidth - this.width);
        }
        else{
            this.style.left = "0px";
            this.style.width = innerWidth;
            imageWidth = innerWidth;
        }        
    }

</script>
<style>

#mainImage{
    position:absolute;
    z-index:-1;
    left:0px;
    top:0px;
    overflow:hidden;
    height:100%;
}
body{
    font-size:1.5em;
    font-family:helvetica;
}
</style>
</body>
</html>