<?php
//delete all files in images directory
//DANGER!  SMASH! FIRE!!! BLODD!!!! EXPECT DESTRUCTIONS!

$files = scandir(getcwd()."/images");
foreach(array_reverse($files) as $value){
    if($value != "." && $value != ".."){
        //delete file:
        unlink("images/".$value);
    }
}
?>