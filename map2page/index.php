<!doctype html>
<html>
<head>
<title>Combiner</title>
<!-- 
PUBLIC DOMAIN, NO COPYRIGHTS, NO PATENTS.

-->
<!--Stop Google:-->
<META NAME="robots" CONTENT="noindex,nofollow">
<!-- links to MathJax JavaScript library, un-comment to use math-->
<!--

<script src="https://cdnjs.cloudflare.com/ajax/libs/mathjax/2.7.0/MathJax.js?config=TeX-AMS-MML_HTMLorMML"></script>
<script>
	MathJax.Hub.Config({
		tex2jax: {
		inlineMath: [['$','$'], ['\\(','\\)']],
		processEscapes: true,
		processClass: "mathjax",
        ignoreClass: "no-mathjax"
		}
	});//			MathJax.Hub.Typeset();//tell Mathjax to update the math
</script>

-->
</head>
<body>
<div id = "prevjsondatadiv" style = "display:none"><?php

echo file_get_contents("../mapalign/json/currentjson.txt");

?></div>
<div id = "imagesdatadiv" style = "display:none"><?php

$files = scandir(getcwd()."/../images/images");
$listtext = "";
foreach(array_reverse($files) as $value){
    if($value != "." && $value != ".."){
        $listtext .= $value.",";
    }
}
echo rtrim($listtext,",");

?></div>
<?php
echo file_get_contents("html/feed.txt")
?>
<style>

body{
    font-size:1.5em;
    font-family:helvetica;
}
</style>
</body>
</html>