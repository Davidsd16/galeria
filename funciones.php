<?php

function conexion($tabla, $usuario, $pass){
    try {
        $conexion = new PDO("mysql:host=localhost;dbname=$tabla", $usuario, $pass);
        return $conexion;
    } catch (PDOException $e) {
        // Manejar el error de conexión aquí, puedes imprimir el mensaje de error para depuración
        echo "Error de conexión: " . $e->getMessage();
        return false;
    }
}
