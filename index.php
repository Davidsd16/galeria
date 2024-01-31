<?php

// Incluye el archivo de funciones que contiene la función de conexión
require 'funciones.php';

// Define la cantidad de fotos por página y obtiene el número de página actual
$fotos_por_pagina = 8;
$pagina_actual = (isset($_GET['p']) ? ($_GET['p']) : 1);
$inicio = ($pagina_actual > 1) ? $pagina_actual * $fotos_por_pagina - $fotos_por_pagina : 1;

// Conecta a la base de datos
$conexion = conexion('galeria_practica', 'root', '');

// Verifica si la conexión fue exitosa
if (!$conexion) {
    // Redirige a una página de error en caso de fallo en la conexión
    header('Location: error.php');
    exit;
}

// Prepara la consulta para obtener las fotos paginadas
$statement = $conexion->prepare("SELECT SQL_CALC_FOUND_ROWS * FROM fotos LIMIT $inicio, $fotos_por_pagina");

// Ejecuta la consulta
$statement->execute();

// Obtiene todas las fotos de la página actual
$fotos = $statement->fetchAll();

// Verifica si no hay fotos
if (!$fotos) {
    // Redirige a una página de error si no hay fotos
    header('Location: error.php');
    exit;
}

// Prepara la consulta para obtener el total de filas sin aplicar el LIMIT
$statement = $conexion->prepare("SELECT FOUND_ROWS() as total_filas");

// Ejecuta la consulta
$statement->execute();

// Obtiene el total de filas sin aplicar el LIMIT
$total_post = $statement->fetch()['total_filas'];

// Calcula el total de páginas necesarias para la paginación
$total_paginas = ceil($total_post / $fotos_por_pagina);

// Incluye la vista de la página principal con la información obtenida
require 'views/index.view.php';

?>
