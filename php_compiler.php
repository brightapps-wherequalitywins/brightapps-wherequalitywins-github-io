<?php
$archivos = ['home-en.php', 'home-es.php'];

foreach ($archivos as $archivo) {
    $contenido = file_get_contents("http://www.brightapps.local/$archivo"); // Cambia localhost por la URL de tu servidor
    $nombre_salida = basename($archivo, '.php') . '.html';
    file_put_contents($nombre_salida, $contenido);
    echo "Archivo generado: $nombre_salida\n";
}