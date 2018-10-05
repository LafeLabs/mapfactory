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
<div id = "maplistjsondatadiv" style = "display:none"><?php

$maplist = json_decode(file_get_contents("../../json/maplist.txt"));

$outtext = "[\n";
    foreach($maplist as $mapname){
        $outtext .= file_get_contents("../".$mapname."/json/map.txt");
        $outtext .= ",\n";
    }

$outtext  = rtrim($outtext,",\n");
$outtext .= "]"; 

echo $outtext;

?></div>
<div id = "maplistdatadiv" style = "display:none"><?php

echo file_get_contents("../../json/maplist.txt");

?></div>
<div id = "jsondatadiv" style = "display:none"><?php

echo file_get_contents("json/map.txt");

?></div>

<a  id  = "uplink" href = "../../">
    <img style = "height:80px" src = "../../factory_symbols/factory.svg">
</a>

<img id = "mainImage"/>
<script>

localmaps = JSON.parse(document.getElementById("maplistjsondatadiv").innerHTML);


    thismap = JSON.parse(document.getElementById("jsondatadiv").innerHTML);
    document.getElementById("mainImage").src = "images/" + thismap.imagefilename;
    
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
#uplink{
    position:absolute;
    left:0px;
    top:0px;
    z-index:100;
}
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