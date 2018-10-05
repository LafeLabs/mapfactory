<!doctype html>
<html>
<head>
<title>Map List</title>
<!-- 
PUBLIC DOMAIN, NO COPYRIGHTS, NO PATENTS.

EVERYTHING IS PHYSICAL
EVERYTHING IS FRACTAL
EVERYTHING IS RECURSIVE

NO MONEY
NO PROPERTY
NO MINING

LOOK AT THE INSECTS
LOOK AT THE FUNGI
LANGUAGE IS HOW THE MIND PARSES REALITY
-->
<!--Stop Google:-->
<META NAME="robots" CONTENT="noindex,nofollow">
    </head>
    <body>
        <a href  ="index.php">            
            <img src = "factory_symbols/factory.svg" style = "width:80px"/>
        </a>
        <h1>Maps</h1>
    <?php
    $files = scandir(getcwd()."/maps");
    echo "<ul>";
    $filelist = "[\n";
    foreach($files as $filename){
        if($filename != "." && $filename != ".."){
           echo  "\n<li><a href = \"maps/".$filename."/\">".$filename."/</a></li>\n";
           $filelist .= "    \"".$filename."\",\n";
        }
    }
    echo "</ul>";

    $filelist  = rtrim($filelist,",\n");
    $filelist .= "\n]";
    file_put_contents("json/maplist.txt",$filelist);
?>
        <style>
    body{
        font-family:Helvetica;
        font-size:2em;
    } 
    h1{
        width:100%;
        text-align:center;
    }
    li{
        width:100%;
        padding-left:40%;
        list-style: none;
    }
        </style>
    </body>
</html>