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

    mkdir("../deck/decks/".$filename);
        mkdir("../deck/decks/".$filename."/images");
        mkdir("../deck/decks/".$filename."/html");
        
        copy("../deck/php/indextemplate.txt","../deck/decks/".$filename."/index.php");    
        copy("../deck/deckeditor.php","../deck/decks/".$filename."/deckeditor.php");    
        copy("../deck/filesaver.php","../deck/decks/".$filename."/filesaver.php");    
        copy("../deck/fileloader.php","../deck/decks/".$filename."/fileloader.php");    
    $decktext = "";
    $imageindex = 0;
    foreach($imagelist as $value){
        $fileextension = substr($value,-4);
        $patharray = explode("/",$value);
        $fullfilename = "../".$patharray[count($patharray) - 3]."/".$patharray[count($patharray) - 2]."/".$patharray[count($patharray) - 1];
        copy($fullfilename,"../deck/decks/".$filename."/images/image".$imageindex.$fileextension);    
        $decktext .= "\n<div class = \"slide\">\n    \n<h1></h1>\n<img src = \"";
        $decktext .= "images/image".$imageindex.$fileextension."\"/>";
        $decktext .= "\n</div>\n";
        $imageindex++;
    }
    
    file_put_contents("../deck/decks/".$filename."/html/deck.txt",$decktext);
    
?>