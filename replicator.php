<?php

    $url = "https://raw.githubusercontent.com/LafeLabs/factory/master/json/dna.txt";
    $dnaraw = file_get_contents($url);
    $dna =json_decode($dnaraw);
    $baseurl = explode("json",$url)[0];

    //sources
    mkdir("page");
        mkdir("page/pages");
        mkdir("page/json");
    mkdir("factory_symbols");
    mkdir("textfeed");
        mkdir("textfeed/html");
    mkdir("linkfeed");
        mkdir("linkfeed/html");
    mkdir("symbol");
        mkdir("symbol/svg");
    mkdir("images");
        mkdir("images/images");
    mkdir("combiner");
    mkdir("aligner");
        mkdir("aligner/memes");

    foreach($dna as $dirs){
        mkdir($dirs->path);
        $files = $dirs->files;
        foreach($files as $filename){
            $data = file_get_contents($baseurl.$dirs->path."/".$filename);
            $file = fopen($dirs->path."/".$filename,"w");// create new file with this name
            fwrite($file,$data); //write data to file
            fclose($file);  //close file
            if(substr($dirs->path,-3) == "php" && $filename != "php/replicator.txt"){
                $file = fopen(substr($dirs->path,0,-3).explode(".",$filename)[0].".php","w");// create new file with this name
                fwrite($file,$data); //write data to file
                fclose($file);  //close file                
            }
        }    
    }
?>

<a href = "index.php" style = "font-size:5em;">index.php</a>
