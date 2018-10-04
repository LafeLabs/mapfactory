<!doctype html>
<html>
<body>
<table id = "linktable">
    <tr>
        <td>
            <a href = "index.php">
                <img style = "width:80px" src = "factory_symbols/factory.svg"/>
            </a>        
        </td>
        <td>
            <a href = "editor.php">
                <img style = "width:80px" src = "factory_symbols/editor.svg"/>
            </a>
        </td>
    </tr>
</table>
    <h1>Replicator:</h1>

<div id = "mainscroll">


<h2>How to make your own Watershed Factory</h2>

<p>To create your own instance of this software you need to create a free web hosting account, upload one program, then run that program and the code will all be copied over.  Then you can custommize it as you see fit, and show others how to replicate it.</p>

<h2>Steps to copy the factory:</h2>
<ol>
    <li>
            Get your free hosting account at <a href = "https://www.000webhost.com/">www.000webhost.com</a>.  They will try to get you to get the paid hosting, which you can do later if you want but to get started the free one is fine.  You have to choose a name for your site, but since this is decentralized, picking a catchy name is not important, just something you can easily write down.  It could even be nonsense, as long as it's easy to write down and remember.   
    </li>
    <li>Navigate to the part of 000webhost where you can upload files to your main web directory.  Create a new file by clicking the appropriate icon and name it replicator.php.</li>
    <li>
        Open replicator.php in the editor, again clicking the appropriate link in the 000webhost interface, and copy and paste the code in this box:
        <textarea id = "replicatorcode"></textarea>
                Then save that file and close it.

        <script>
            currentFile = "php/replicator.txt";
            var httpc = new XMLHttpRequest();
            httpc.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    data = this.responseText;
                    document.getElementById("replicatorcode").value = data;
                }
            };
            httpc.open("GET", "fileloader.php?filename=" + currentFile, true);
            httpc.send();
        </script>
    </li>
    <li>
        Navigate your browser to the location of your web address.  This is [your chosen site name].000webhostapp.com/.  You should see a listing of the files in your site, which is just replicator.php.  Click on it to run it, and wait, up to a couple minutes, while the files copy.  
    </li>
    <li>
        After a minute or two you should see a link to "index.php".  Click on it.  You are now in your new instance of Watershed Factory.
    </li>
    <li>
        DO NOT PUT ANYTHING SECRET, PROPRIETARY, PERSONAL, CLASSIFIED, PRIVATE OR OF ANY MONETARY VALUE ON HERE!  This system is based on a "disposable server" model.  That is, on the assumption that the number of web servers is already greater than the number of human minds, and that each server can have thousands of instances of software like this, meaning the number of instances is many thousands per human mind for all of humanity.  This changes how we think of information and ultimately renders moot what is known as "cybersecurity".  However for the time being, as you have information which does need to be protected, keep it off this network or expect it to be copied and destroyed.  
    </li>
</ol>
</div>

<style>
h1{
    text-align:center;
    
}
    body{
        font-family:Helvetica;
        font-size:24px;
        text-align:justify;
    }
    #linktable{
        position:absolute;
        top:0px;
        left:0px;
    }
    #mainscroll{
        position:absolute;
        left:0px;
        right:0px;
        bottom:0px;
        top:150px;
        border-top:solid;
        overflow:scroll;
        padding:3em 3em 3em 3em;
    }
</style>
</body>
</html>