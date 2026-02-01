<?php

class ControladorLogin {
    static public function ctrIngresarUsuario() {
        if (isset($_POST['usuario']) && isset($_POST['password'])) {
            // Validar entrada
            if (!empty($_POST['usuario']) && !empty($_POST['password'])) {
                $tabla = 'usuarios';
                $item = 'usuario';
                $valor = $_POST['usuario'];

                // Consultar usuario en la base de datos
                $respuesta = ModeloUsuarios::mdlMostrarUsuario($tabla, $item, $valor);

                if ($respuesta && $respuesta['usuario'] === $_POST['usuario']) {
                    // Verificar contraseña
                    if (password_verify($_POST['password'], $respuesta['password'])) {
                        // Verificar estado
                        if ($respuesta['estado'] == 1) {
                            $_SESSION['iniciarSesion'] = 'ok';
                            $_SESSION["id"] = $respuesta["id"];
                            $_SESSION["nombre"] = $respuesta["nombre"];
                            $_SESSION["usuario"] = $respuesta["usuario"];
                            $_SESSION['rol'] = $respuesta['rol'];
                            $_SESSION["actividad"] = time();
                            $_SESSION["foto"] = $respuesta["logo"];

                            echo '<script>window.location = "inicio";</script>';
                            exit();
                        } else {
                            echo '<div class="alert alert-danger mt-3">El usuario no está activado.</div>';
                        }
                    } else {
                        echo '<div class="alert alert-danger mt-3">Contraseña incorrecta.</div>';
                    }
                } else {
                    echo '<div class="alert alert-danger mt-3">El usuario no existe.</div>';
                }
            } else {
                echo '<div class="alert alert-danger mt-3">Debe completar todos los campos.</div>';
            }
        }
    }
}
