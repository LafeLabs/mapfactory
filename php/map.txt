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
<div id = "bigbox">
    <img id = "mainImage"/>
</div>
<script>
feetperdegree = 364567;

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
    init();
}
function init(){
    feetperpixel = thismap.widthfeet/imageWidth;
    for(var index = 0;index < localmaps.length;index++){
        if(localmaps[index].widthfeet < 0.8*thismap.widthfeet){
            if(getdistance(localmaps[index].latlon,thismap.latlon) < thismap.widthfeet){
                var newa = document.createElement("A");
                var newimg = document.createElement("IMG");
                newa.appendChild(newimg);
                newa.className = "submapa";
                newimg.className = "submapimg";
                newimg.src = "../" + localmaps[index].mapname + "/images/" + localmaps[index].imagefilename; 
                newa.href = "../" + localmaps[index].mapname + "/";
                
                //sort z index manually after they're all loaded
                
                
                var deltaangle = localmaps[index].angle - thismap.angle;
                
                var latlon1 = thismap.latlon;
                var latlon2 = localmaps[index].latlon;
                var lat1 = parseFloat(latlon1.split(",")[0]);
                var lon1 = parseFloat(latlon1.split(",")[1]);
                var lat2 = parseFloat(latlon2.split(",")[0]);
                var lon2 = parseFloat(latlon2.split(",")[1]);

                var deltaxfeet = feetperdegree*(lat2 - lat1)*Math.cos(lat1*Math.PI/180);
                var deltayfeet = feetperdegree*(lat2 - lat1);
    
                newa.style.position = "absolute";
                
                var z = -Math.round(Math.log(localmaps[index].widthfeet*10)); 
                newa.style.zIndex = parseInt(z).toString();
                newimg.style.zIndex = parseInt(z -1).toString();

                newa.style.width = (localmaps[index].widthfeet/feetperpixel).toString() + "px";
                newimg.style.width = "100%";
                newa.style.height = (localmaps[index].widthfeet/feetperpixel).toString() + "px";
                newa.style.left = (0.5*(innerWidth - imageWidth) + deltaxfeet/feetperpixel).toString() + "px";
                newa.style.top  = (-deltayfeet/feetperpixel).toString() + "px";
                newa.style.transform = "rotate(" + deltaangle.toString() + "deg)";
                document.getElementById("bigbox").appendChild(newa);
            }
        }
        else{
            if(getdistance(localmaps[index].latlon,thismap.latlon) < localmaps[index].widthfeet*2){
                
            }
        }
    }
}

function getdistance(latlon1,latlon2){
    var lat1 = parseFloat(latlon1.split(",")[0]);
    var lon1 = parseFloat(latlon1.split(",")[1]);
    var lat2 = parseFloat(latlon2.split(",")[0]);
    var lon2 = parseFloat(latlon2.split(",")[1]);

    var deltaxfeet = feetperdegree*(lat2 - lat1)*Math.cos(lat1*Math.PI/180);
    var deltayfeet = feetperdegree*(lat2 - lat1);
    
    var dfeet = Math.sqrt(deltaxfeet*deltaxfeet + deltayfeet*deltayfeet);
    return dfeet;
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
    z-index:-10000;
    left:0px;
    top:0px;
    overflow:hidden;
    height:100%;
}
body{
    font-size:1.5em;
    font-family:helvetica;
}
#bigbox{
    position:absolute;
    left:0px;
    top:0px;
    right:0px;
    bottom:0px;
    overflow:hidden;
}
#submapa{
    position:absolute;
    border:solid;
}
#submapimg{
    position:absolute;
    left:0px;
    top:0px;
    width:100%;
}
</style>
</body>
</html>