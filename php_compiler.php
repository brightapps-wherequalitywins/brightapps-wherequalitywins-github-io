<?php
$archivos=['home-en.php','home-es.php'];
foreach($archivos as $archivo){
    $contenido=@file_get_contents("http://www.brightapps.local/$archivo");
    if($contenido===false)continue;
    $contenido=preg_replace(['/>\s+</','/\s{2,}/'],['><',' '],$contenido);
    $idioma=strpos($archivo,'-en')!==false?'en':'es';
    $path="$idioma/home/";
    if(!is_dir($path))mkdir($path,0777,true);
    @file_put_contents("$path/index.html",$contenido);
}