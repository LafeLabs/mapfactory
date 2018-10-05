<?php
/* javascript this pairs with:

 currentFile = document.getElementById("nameinput").value;
        data = encodeURIComponent(JSON.stringify(localmemejson,null,"    "));
        var httpc = new XMLHttpRequest();
        var url = "makenewpage.php";        
        httpc.open("POST", url, true);
        httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8");
        httpc.send("data="+data+"&filename="+currentFile);//send text to makenewpage.php
*/

    $data = $_POST["data"]; //get data  which is just a JSON list of images
    $filename = $_POST["filename"];//name of new directory
    $imagelist =json_decode($data);

    mkdir("../scroll/scrolls/".$filename);
        mkdir("../scroll/scrolls/".$filename."/images");
        mkdir("../scroll/scrolls/".$filename."/html");
        copy("../scroll/php/indextemplate.txt","../scroll/scrolls/".$filename."/index.php");    
        copy("../scroll/scrolleditor.php","../scroll/scrolls/".$filename."/scrolleditor.php");    
        copy("../scroll/filesaver.php","../scroll/scrolls/".$filename."/filesaver.php");    
        copy("../scroll/fileloader.php","../scroll/scrolls/".$filename."/fileloader.php");    
    $scrolltext = "<h1>".$filename."</h1>\n";
    $imageindex = 0;
    foreach($imagelist as $value){
            $fileextension = substr($value,-4);
         //   $filedata = file_get_contents($filename);
        //    file_put_contents("",$filedata);
            
            $patharray = explode("/",$value);
            $fullfilename = "../".$patharray[count($patharray) - 3]."/".$patharray[count($patharray) - 2]."/".$patharray[count($patharray) - 1];
            copy($fullfilename,"../scroll/scrolls/".$filename."/images/image".$imageindex.$fileextension);    
            $scrolltext .= "\n<figure>\n    <img src = \"";
            $scrolltext .= "images/image".$imageindex.$fileextension."\"/>";
            $scrolltext .= "\n<figcaption></figcaption>\n";
            $scrolltext .= "</figure>\n";
            $imageindex++;
    }
    
    file_put_contents("../scroll/scrolls/".$filename."/html/scroll.txt",$scrolltext);
    
?>