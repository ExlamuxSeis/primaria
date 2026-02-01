<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta name="description" content="Escuela Primaria Federal Benito Juárez - Nuevo Guerrero, Tlapehuala, Guerrero. Ofrecemos educación de calidad y programas educativos para estudiantes. Descubre eventos escolares y recursos para padres y estudiantes.">
    <meta name="keywords" content="escuela primaria, escuela primaria en Nuevo Guerrero, educación, estudiantes, programas educativos, Nuevo Guerrero, Tlapehuala, Guerrero, eventos escolares">
    <meta property="og:image" content="img/icono.png" />
    <meta property="og:title" content="Esc. Prim. Fed. Benito Juárez" />
    <link rel="shortcut icon" href="img/icono.png" type="image/x-icon">
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-grid.min.css">
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/letras.css">
    <script src="js/jquery-3.5.1.min.js"></script>
    <title>Esc. Prim. Fed. Lic. Benito Juarez</title>
</head>

<body class="services" style="background-color:rgb(224, 224, 212)">

    <!--Inicia el header-->
    <?php
    /**===================
     * EMPIEZA EL HEADER
    ======================*/
    include 'vistas/header.php';

    /**====================================
     * AQUÍ EMPIEZA EL MENÚ DE NAVEGACIÓN
    =======================================*/
    include 'vistas/nav.php';

    // Incluye el carrusel si no se pasa una ruta o si la ruta no está en las excluidas
    if (!isset($_GET['ruta']) || in_array($_GET['ruta'], ['inicio'])) {
        include 'vistas/carrusel.php';
    }

    ?>

    <!--Aquí termina el menú de navegación-->

    <!--Aquí comienza el main-->
    <main class="container" style="margin-top: 20px;">
        <div class="row g-4">
            <?php
            /**=============
             * CONTENIDO
            ================*/
            if (isset($_GET['ruta'])) {
                if (in_array($_GET['ruta'], ['oferta-educativa', 'noticias', 'inicio'])) {
                    // Incluye la vista correspondiente
                    include 'vistas/' . $_GET['ruta'] . ".php";

                    // Incluye el aside
                    include 'vistas/aside.php';
                } else {
                    // Incluye la página 404
                    include 'vistas/404.php';
                }
            } else {
                // Si no se pasa ninguna ruta, carga la página de inicio
                include 'vistas/inicio.php';

                // Incluye el aside
                include 'vistas/aside.php';
            } ?>
        </div>
    </main>
    <!--Aquí termina el main-->

    <!--Inicia el footer-->
    <?php include 'vistas/footer.php'; ?>
    <!--Aquí termina el footer-->

    <!--Scripts de JavaScript-->
    <script src="js/acercade.js"></script>
    <script src="js/bootbox.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/scroll.js"></script>
</body>

</html>