<?php
/* javascript this pairs with:

        savejson = {};
        savejson.imagefilename = imagefilename;
        savejson.latlon = currentjson[imagefilename].latlon;
        savejson.widthfeet = currentjson[imagefilename].widthfeet;
        savejson.angle = currentjson[imagefilename].angle;
        
        data = encodeURIComponent(JSON.stringify(savejson,null,"    "));
        var httpc = new XMLHttpRequest();
        var url = "makenewmap.php";        
        httpc.open("POST", url, true);
        httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8");
        httpc.send("data="+data+"&filename="+currentFile);//send text to makenewpage.php
        
*/

    $data = $_POST["data"]; //get data  which is just a JSON list of images
    
    $mapjson = json_decode($data);
    $imagefilename = $mapjson->imagefilename;

    $filename = $_POST["filename"];//name of new directory

    mkdir("../maps/".$filename);
        mkdir("../maps/".$filename."/images");
        mkdir("../maps/".$filename."/php");
        mkdir("../maps/".$filename."/json");
    copy("../php/map.txt","../maps/".$filename."/index.php");    
    file_put_contents("../maps/".$filename."/json/map.txt",$data);
    copy("../images/images/".$imagefilename,"../maps/".$filename."/images/".$imagefilename);    
    
?>