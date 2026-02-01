<?php
session_start(); //definir tiempo mazimo de inatividad
$tiempo_max_inativo = 500;
// verficar si la session ha expirado
if (isset($_SESSION['actividad'])) {
    $tiempo_inactivo = time() - $_SESSION['actividad'];
    if ($tiempo_inactivo > $tiempo_max_inativo) {
        // si el tiempo inactivo excede el limite destruir la session
        // y redigir a logibn
        session_unset();
        session_destroy();
        header("Location: ./");
        die();
    }
    $_SESSION['actividad'] = time();
}
?>
<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="exlamux6">

    <title>Panel de administrador</title>

    <!-- Custom fonts for this template-->
    <link href="vistas/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="vistas/css/sb-admin-2.min.css" rel="stylesheet">

    <!-- SweerAlert2 -->
    <script src="vistas/plugins/sweetalert2/sweetalert2.all.js"></script>

    <!-- Custom styles for this DataTables -->
    <link rel="stylesheet" href="vistas/css/dataTable.css">
    <script src="vistas/js/dataTable.js"></script>

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <?php
        if (isset($_SESSION["iniciarSesion"]) && $_SESSION["iniciarSesion"] == "ok") {
            /**============================
             * ASIDE
        ======================*/
            include 'modulos/menu.php';
        ?>


            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">
                    <?php
                    /**====================
                     * CABECERA
======================*/
                    include 'modulos/cabecera.php';

                    /**====================
                     *  CONTENIDO
======================*/
                    if (isset($_GET['ruta'])) {
                        $ruta = $_GET['ruta'];
                        $rutasValidas = ['carrusel', 'inicio', 'noticias', 'usuarios', 'logout'];

                        if (in_array($ruta, $rutasValidas)) {
                            if ($ruta == 'usuarios' && $_SESSION['rol'] != 1) {
                                // Redirige o muestra un mensaje si no tiene permisos
                                echo "No tienes permiso para acceder a esta sección.";
                            } else {
                                include 'modulos/' . $ruta . '.php';
                            }
                        } else {
                            include 'modulos/inicio.php'; // Ruta por defecto si la ruta no es válida
                        }
                    } else {
                        include 'modulos/inicio.php'; // Ruta por defecto si no se define `ruta`
                    }

                    /**====================
                     * FOOTER
======================*/
                    include 'modulos/footer.php';
                    ?>






                </div>
                <!-- End of Main Content -->



            </div>
            <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">¿Desea cerrar sesión?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Selecciona "Cerrar sesión" sí usted está seguro de cerrar su sesión de usuario.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    <a class="btn btn-primary" href="logout">Cerrar sesión</a>
                </div>
            </div>
        </div>
    </div>
<?php
        } else {
            include 'modulos/login-user.php';
        }
?>

<!-- Bootstrap core JavaScript-->
<script src="vistas/vendor/jquery/jquery.min.js"></script>
<script src="vistas/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="vistas/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="vistas/js/sb-admin-2.min.js"></script>

<script src="vistas/js/app.js"></script>
<script src="vistas/js/carrusel.js"></script>
<script src="vistas/js/noticias.js"></script>
<script src="vistas/js/usuarios.js"></script>
<script src="vistas/js/login.js"></script>



</body>

</html>