<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Configuración del documento -->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Enlaces a fuentes externas y estilos -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@300;400&family=Slabo+27px&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/estilos.css">

    <!-- Título de la página -->
    <title>Galeria</title>
</head>
<body>
    <!-- Encabezado de la página -->
    <header>
        <div class="contenedor">
            <!-- Título de la foto -->
            <h1 class="titulo">Foto:
                <?php
                    // Muestra el título de la foto si está presente; de lo contrario, muestra el nombre de la imagen
                    if (!empty($foto['titulo'])) {
                        echo $foto['titulo'];
                    } else {
                        echo $foto['imagen'];
                    }
                ?>
            </h1>
        </div>
    </header>

    <!-- Contenedor principal -->
    <div class="contenedor">
        <!-- Sección de la foto -->
        <div class="foto">
            <!-- Imagen de la foto -->
            <img src="fotos/<?php echo $foto['imagen']; ?>">

            <!-- Descripción de la foto -->
            <p class="texto"><?php echo $foto['texto']; ?></p>

            <!-- Enlace para regresar a la página principal -->
            <a href="index.php" class="regresar"><i class="fa fa-long-arrow-left"></i> Regresar</a>
        </div>
    </div>

    <!-- Pie de página -->
    <footer>
        <!-- Mensaje de derechos de autor ficticio -->
        <p class="copyright">Lorem ipsum dolor sit amet</p>
    </footer>
</body>
</html>
