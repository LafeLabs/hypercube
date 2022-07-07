<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">

    <!--

        GEOMETRON CARD MAGIC
        
        AS ABOVE SO BELOW

        EVERYTHING IS PHYSICAL 
        EVERYTHING IS FRACTAL
        EVERYTHING IS RECURSIVE
        NO MONEY 
        MO MINING 
        NO PROPERTY
        LOOK AT THE INSECTS
        LOOK AT THE FUNGI
        LANGUAGE IS HOW THE MIND PARSES REALITY 

    -->
    <link href="data:image/x-icon;base64,AAABAAEAEBAQAAEABAAoAQAAFgAAACgAAAAQAAAAIAAAAAEABAAAAAAAgAAAAAAAAAAAAAAAEAAAAAAAAAAAAAAAAP//AP///wANAP8A5Dz6ABueRwAAt/8A6BonABo86AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAREREREREREREREAAAEREREREQCIgREREd3dwAAB3d3d3d3d3d3d3d3d3d3d3d3d3VVVVVVVQAFVVAAVVVQIiBRAiIBEQIAIBECAAERAgAgFgIABmYCIiBmAiIGZgIiIGYCIgZmYCIAaIAAMzMzAAiIiIiIiIiIiIiIiIiIiIiIgAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAA" rel="icon" type="image/x-icon" />

    <!--Stop Google:-->
    <META NAME="robots" CONTENT="noindex,nofollow">
    <script src="jscode/geometron.js"></script>


</head>
<body>    

<div id = "cardbox">
    <canvas id = "card"></canvas>
</div>
<div class = "data" id = "carddatadiv"><?php

if(isset($_GET["card"])){
    echo file_get_contents($_GET["card"]);
}

?></div>

<script>
maincanvas = document.getElementById("card");

if(innerWidth > innerHeight){
    //landscape
    square = innerWidth/3 - 150;
    document.getElementById("cardbox").style.left = Math.round((innerWidth - (3*square + 20))/2).toString() + "px";
    
    document.getElementById("cardbox").style.top = Math.round((innerHeight - (2*square + 20))/2).toString() + "px";
    mainGVM = new GVM(maincanvas,3*square + 20,2*square + 20);
    mainGVM.x0 = 10;
    mainGVM.y0 = square + 10;

}
else{
    square = innerWidth/2 - 50;

    document.getElementById("cardbox").style.left = Math.round((innerWidth - (2*square + 20))/2).toString() + "px";
    
    document.getElementById("cardbox").style.top = Math.round((innerHeight - (3*square + 20))/2).toString() + "px";
    
    mainGVM = new GVM(maincanvas,2*square + 20,3*square + 20);
    mainGVM.x0 = square + 10;
    mainGVM.y0 = 10;
    
    mainGVM.theta0 = 0;
    
}

mainGVM.importbytecode(hypercube);    

mainGVM.unit = square;
mainGVM.style.fill1 = "#AD8762";
maincanvas.style.display = "block";

if(document.getElementById("carddatadiv").innerHTML.length > 0){
    card = JSON.parse(document.getElementById("carddatadiv").innerHTML);
    loadcard();
}
else{
    var httpccard = new XMLHttpRequest();
    httpccard.onreadystatechange = function(){
        if (this.readyState == 4 && this.status == 200) {
            card = JSON.parse(this.responseText);
            loadcard();
        }
    };
    httpccard.open("GET", "fileloader.php?filename=data/card.txt", true);
    httpccard.send();
    
}



function loadcard(){

    
    mainGVM.drawGlyph("0321,0362,0203,0335,0203,0203,0203,0335,0203,0203,0335,0203,0203,0203,0335,0203,0363,0320,0335,0201,0334,0342,0335,0335,0342,0334,0201,0334,0342,0335,0342,0335,0342,0335,0330,0330,0335,");
    mainGVM.actionSequence("0336,0330,0333,0336,0336,");
    mainGVM.actionSequence(card.leftUpperIcon);
    mainGVM.actionSequence("0300,0333,0336,0330,0333,0336,0336,");
    mainGVM.actionSequence(card.middleUpperIcon);
    mainGVM.actionSequence("0300,0333,0333,0336,0330,0333,0336,0336,");
    mainGVM.actionSequence(card.rightUpperIcon);
    mainGVM.actionSequence("0300,0331,0336,0330,0333,0336,0336,");
    mainGVM.actionSequence(card.leftLowerIcon);
    mainGVM.actionSequence("0300,0331,0333,0336,0330,0333,0336,0336,");
    mainGVM.actionSequence(card.middleLowerIcon);
    mainGVM.actionSequence("0300,0331,0333,0333,0336,0330,0333,0336,0336,");
    mainGVM.actionSequence(card.rightLowerIcon);

    
}

</script>
<style>
body{
    background-color:#cecdcb;
}
input,textarea{
    color:#00ff00;
    font-family:courier;
    background-color:black;
}
#textio{
    position:absolute;
    right:0px;
    bottom:0px;
    width:200px;
    height:200px;
}
#maintable{
    position:absolute;
    top:0px;
    left:220px;
}
#cardbox{
    position:absolute;
    top:0px;
    right:0px;
    border:solid;
}
#iconsbox{
    position:absolute;
    left:0px;
    top:0px;
    bottom:0px;
    width:200px;
    overflow:scroll;
}
#importbutton{
    position:absolute;
    right:300px;
    bottom:10px;
    border:solid;
    border-radius:5px;
    text-align:center;
}
#cardlink{
    position:absolute;
    right:300px;
    bottom:40px;

}
.data{
    display:none;
}
.button{
    cursor:pointer;
}
.button:hover{
    background-color:green;
}
.button:active{
    background-color:yellow;
}

</style>
</body>
</html>