<!-- 
this program generates the file data/webdna.txt
webdna.txt is a json formatted file which points to all the files in this system, which is then used by replciator.php to copy the whole thing.  The file names are local, so that the replicator can work when pointed at any address where this system lives, which could be any new instance, so that the system can replicate without any reference to some centralized repository such as one on github. 
-->
<a href = "editor.php">editor.php</a>
<p></p>
<a href = "index.html">index.html</a>
<br/>

<pre>
<?php

    $files = scandir(getcwd()."/web");

    $webdna = [];
    foreach($files as $value){
        if(substr($value,-5) == ".html" || substr($value,-4) == ".css" || substr($value,-3) == ".js" || substr($value,-4) == ".php"){
            
            array_push($webdna,$value);
        }
    }


    echo json_encode($webdna,JSON_PRETTY_PRINT);

    $file = fopen("data/webdna.txt","w");// create new file with this name
    fwrite($file,json_encode($webdna,JSON_PRETTY_PRINT)); //write data to file
    fclose($file);  //close file

?>
</pre>
<style>
    a{
        font-size:3em;
    }
</style>
