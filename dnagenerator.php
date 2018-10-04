<?php

function getfiles($localpath){
    $outstring = "";
    $files = scandir(getcwd()."/".$localpath);
    $outstring .= "\t{\n\t\t\"path\":\"".$localpath."\",\n\t\t\"files\":[\n";
    
    foreach($files as $value){
        if($value != "." && $value != ".."){
            if(substr($value,-4) == ".txt"){
                $outstring .= "\t\t\t\"".$value."\",\n";
            }
        }
    }
    $outstring = substr($outstring,0,-2);
    $outstring .= "\n\t\t]\n\t}";
    return $outstring;
}

function getALLfiles($localpath){
    $outstring = "";
    $files = scandir(getcwd()."/".$localpath);
    $outstring .= "\t{\n\t\t\"path\":\"".$localpath."\",\n\t\t\"files\":[\n";
    
    foreach($files as $value){
        if($value != "." && $value != ".."){
            $outstring .= "\t\t\t\"".$value."\",\n";
        }
    }
    $outstring = substr($outstring,0,-2);
    $outstring .= "\n\t\t]\n\t}";
    return $outstring;
}

$finalstring = "[\n";

$finalstring .= getfiles("php");
$finalstring .= ",\n";
$finalstring .= getfiles("html");
$finalstring .= ",\n";
$finalstring .= getfiles("json");
$finalstring .= ",\n";

$finalstring .= getALLfiles("factory_symbols");
$finalstring .= ",\n";

$finalstring .= getfiles("page/php");
$finalstring .= ",\n";
$finalstring .= getfiles("page/html");
$finalstring .= ",\n";

$finalstring .= getfiles("textfeed/php");
$finalstring .= ",\n";
$finalstring .= getfiles("textfeed/json");
$finalstring .= ",\n";

$finalstring .= getfiles("linkfeed/php");
$finalstring .= ",\n";
$finalstring .= getfiles("linkfeed/json");
$finalstring .= ",\n";


$finalstring .= getfiles("symbol/php");
$finalstring .= ",\n";
$finalstring .= getfiles("symbol/html");
$finalstring .= ",\n";
$finalstring .= getfiles("symbol/css");
$finalstring .= ",\n";
$finalstring .= getfiles("symbol/javascript");
$finalstring .= ",\n";
$finalstring .= getfiles("symbol/bytecode");
$finalstring .= ",\n";
$finalstring .= getfiles("symbol/json");
$finalstring .= ",\n";


$finalstring .= getfiles("combiner/php");
$finalstring .= ",\n";
$finalstring .= getfiles("combiner/html");
$finalstring .= ",\n";
$finalstring .= getfiles("combiner/json");
$finalstring .= ",\n";

$finalstring .= getfiles("aligner/php");
$finalstring .= ",\n";
$finalstring .= getfiles("aligner/html");
$finalstring .= ",\n";

$finalstring .= getfiles("images/php");
$finalstring .= ",\n";
$finalstring .= getfiles("images/json");


$finalstring .= "\n]";

echo $finalstring;

$file = fopen("json/dna.txt","w");// create new file with this name
fwrite($file,$finalstring); //write data to file
fclose($file);  //close file

?>
<a href = "editor.php">editor.php</a>