<!doctype html>
<html>
<head>
<title>Image Upload</title>
<!-- 
PUBLIC DOMAIN, NO COPYRIGHTS, NO PATENTS.
-->
<!--Stop Google:-->
<META NAME="robots" CONTENT="noindex,nofollow">
</head>
<body>
<div id = "listdiv" style = "display:none"><?php

//echo file_get_contents("list.txt");
$files = scandir(getcwd()."/images");
$listtext = "";
foreach(array_reverse($files) as $value){
    if($value != "." && $value != ".."){
        $listtext .= $value.",";
    }
}
echo $listtext;

?></div>
<table>
    <tr>
        <td>
    <a href = "editor.php"><img style = "width:80px" src = "../factory_symbols/editor.svg"/></a>
        </td>
        <td>
        <a href = "../marker/"><img style = "height:80px" src = "../factory_symbols/marker.svg"/></a>
        </td>
        <td>
        <a href = "../"><img style = "height:80px" src = "../factory_symbols/factory.svg"/></a>
        </td>
    </tr>
</table>

<div class = "button" id = "delete" style = "display:none">! DELETE ALL !</div>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
<div id = "imagescroll">
    
</div>

<script>
    imagenames = document.getElementById("listdiv").innerHTML.split(",");

    for(var index = 0;index < imagenames.length;index++){
        if(imagenames[index].length> 2){
            var newimg = document.createElement("IMG");
            newimg.src = "images/" + imagenames[index];
            document.getElementById("imagescroll").appendChild(newimg);
        }
    }
    
    document.getElementById("delete").onclick = function(){
        var httpc = new XMLHttpRequest();
        var url = "deleteallimages.php";        
        httpc.open("POST", url, true);
        httpc.setRequestHeader("Content-Type", "application/x-www-form-urlencoded;charset=utf-8");
        httpc.send();//
        document.getElementById("imagescroll").innerHTML = "";
    }
    
</script>
<style>
#submit:active{
    background-color:yellow;
}
#imagescroll{
    position:absolute;
    top:25%;
    bottom:0px;
    left:0px;
    right:0px;
    overflow:scroll;
    border-top:solid;
}
#imagescroll img{
    display:block;
    margin:auto;
    width:25%;
}
body{
    font-family:Helvetica;
    font-size:2.5em;
}
input{
    font-size:25px;
    font-family:courier;
        cursor:pointer;

}
h1,h2,h3,h4,h5{
    width:100%;
    text-align:center;
}
.button{
    cursor:pointer;
    border:solid;
    border-radius:5px;
    text-align:center;
    padding-left:1em;
    padding-right:1em;
}
.button:hover{
    background-color:green;
}
.button:active{
    background-color:yellow;
}
#delete{
    position:absolute;
    top:1em;
    right:1em;
    color:red;
    border-color:red;
}
</style>

</body>
</html>