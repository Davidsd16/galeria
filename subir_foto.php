<?php

require 'funciones.php';
$conexion = conexion('galeria_practica', 'root', '');

if (!$conexion) {
    // header('Location: index.php');
    die();
}

if ($_SERVER['REQUEST_METHODE'] == 'POST' && !empty($_FILES)) {
    $check = @getimagesize($FILES['foto']['tmp_name']);
    if ($check !== false) {
        $carpeta_destino = 'fotos/';
        $archivo_subido = $carpeta_destino . $_FILES['foto']['name'];
        move_uploaded_file($_FILES['foto']['tmp_name'], $archivo_subido);
    }
}

require 'views/subir_foto.view.php';