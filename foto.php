<?php

// Incluye el archivo de funciones que contiene la función de conexión
require 'funciones.php';

// Conecta a la base de datos
$conexion = conexion('galeria_practica', 'root', '');

// Verifica si la conexión fue exitosa
if (!$conexion) {
    // Redirige a una página de error en caso de fallo en la conexión
    header('Location: error.php');
    exit;
}

// Obtiene el ID de la foto desde la URL y lo convierte a entero
$id = isset($_GET['id']) ? (int)$_GET['id'] : false;

// Verifica si no se proporcionó un ID válido
if (!$id) {
    // Redirige a la página principal si no hay un ID válido
    header('Location: index.php');
    exit;
}

// Prepara y ejecuta una consulta para obtener la información de la foto específica
$estado = $conexion->prepare('SELECT * FROM fotos WHERE id = :id');
$estado->execute(array('id' => $id));

// Obtiene la información de la foto
$foto = $estado->fetch();

// Verifica si no se encontró la foto con el ID proporcionado
if (!$foto) {
    // Redirige a la página principal si no se encontró la foto
    header('Location: index.php');
    exit;
}

// Incluye la vista de la foto
require 'views/foto.view.php';
