<?php

$webdnaurl = "https://raw.githubusercontent.com/LafeLabs/picrust/main/picrust/data/webdna.txt";

if(isset($_GET["dna"])){
    $webdnaurl = $_GET["dna"];
}

$baseurl = explode("data/",$dnaurl)[0];
$webdnaraw = file_get_contents($dnaurl);
$webdna = json_decode($webdnaraw);


foreach($webdna as $value){
    
    copy($baseurl."media/".$value,"media/".$value);

}



?>
<a href = "index.html">CLICK TO GO TO PAGE</a>
<style>
a{
    font-size:3em;
}
</style>
