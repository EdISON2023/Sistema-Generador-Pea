<?php

function cargarArchivo($nombre_archivo, $tipo_archivo, $ruta_temporal,$destinoresources="./resources/",$carpetaDestino=""){
    $directorio_destino = $destinoresources . $carpetaDestino; 
    $ruta_destino = $directorio_destino . basename($nombre_archivo);

    $extension = pathinfo($nombre_archivo, PATHINFO_EXTENSION); 
    $nombre_aleatorio = uniqid('pea_') . '.' . $extension; 

    $ruta_destino = $directorio_destino . $nombre_aleatorio;

    if (move_uploaded_file($ruta_temporal, $ruta_destino)) {
        return $nombre_aleatorio;
    } else {
        return false;
    }
}
?>