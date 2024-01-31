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
    <div class="contenedor">
        <h1 class="titulo">Galería de imágenes</h1>
    </div>

    <!-- Sección de fotos -->
    <section class="fotos">
        <div class="contenedor">
            <?php foreach ($fotos as $foto) : ?>
                <!-- Mostrar cada foto en miniatura con un enlace a su página individual -->
                <div class="thumb">
                    <a href="foto.php?id=<?php echo $foto['id']; ?>">
                        <img src="fotos/<?php echo $foto['imagen']; ?>" alt="<?php echo $foto['titulo']; ?>">
                    </a>
                </div>
            <?php endforeach; ?>

            <!-- Paginación de fotos -->
            <div class="paginacion">
                <?php if ($pagina_actual > 1) : ?>
                    <!-- Enlace a la página anterior -->
                    <a href="index.php?p=<?php echo $pagina_actual - 1; ?>" class="izquierda"><i class="fa fa-long-arrow-left"></i> Página Anterior</a>
                <?php endif ?>

                <?php if ($total_paginas != $pagina_actual) : ?>
                    <!-- Enlace a la página siguiente -->
                    <a href="index.php?p=<?php echo $pagina_actual + 1; ?>"><i class="fa fa-long-arrow-right"></i> Página Siguiente</a>
                <?php endif ?>
            </div>
        </div>
    </section>

    <!-- Pie de página -->
    <footer>
        <!-- Derechos de autor ficticios -->
        <p class="copyright">Lorem ipsum dolor sit amet</p>
    </footer>
</body>
</html>
