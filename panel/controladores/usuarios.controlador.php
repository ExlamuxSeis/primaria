<?php
class ControladorUsuarios
{
    /**==================================
     *
     * MOSTRAR LOS USUARIOS
     *
    =====================================*/
    static public function ctrMostrarUsuarios($item)
    {
        $tabla = 'usuarios';
        $respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla, $item);
        return $respuesta;
    }


    /** ====================================
     * FUNCION PARA PROCESAR Y GUARDAR IMAGENES
    ========================================*/
    public static function guardarImagen($imagen, $directorio, $nuevoAncho, $nuevoAlto)
    {

        list($ancho, $alto) = getimagesize($imagen['tmp_name']);

        /***
         * crear el directorio donde vamos a guardar la foto
         */
        if (!file_exists($directorio)) {
            mkdir($directorio, 0755);
        }

        /***
         * de acuerdo al tipo de imagen creamos una funcion
         */
        if ($imagen['type'] == 'image/jpeg') {
            $aleatorio = mt_rand(100, 999);
            $ruta = 'vistas/img/logo/' . $aleatorio . '.jpg';

            $origen = imagecreatefromjpeg($imagen['tmp_name']);
            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
            imagejpeg($destino, $ruta);
        }
        if ($imagen['type'] == 'image/png') {
            $aleatorio = mt_rand(100, 999);
            $ruta = 'vistas/img/logo/' . $aleatorio . '.png';

            $origen = imagecreatefrompng($imagen['tmp_name']);
            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
            imagepng($destino, $ruta);
        }
        return $ruta;
    }



    /**=====================================
     *
     * CREAR NUEVO USUARIO
     *
    ==================================*/

    static public function ctrCrearUsuario()
    {
        if (isset($_POST['usuario'])) {
            if (
                empty($_POST['usuario']) || !isset($_FILES['icono']['tmp_name']) ||
                empty($_POST['nombre']) || empty($_POST['password']) || !isset($_POST['estado'])
                || !isset($_POST['rol'])
            ) {
                echo '<script>
                            swal({
                                title: "Error al guardar",
                                text: "No deben quedar campos sin complementar",
                                type: "error",
                                confirmButtonText: "!Cerrar!"
                            });
                        </script>';
                return;
            }

            $directorio = 'vistas/img/logo';
            if (!is_dir($directorio)) {
                mkdir($directorio, 0755, true);
            }

            $ruta = ControladorUsuarios::guardarImagen($_FILES['icono'], $directorio, 52, 52);
            if (!$ruta) {
                echo '<script>
                            swal({
                                title: "Error al subir imagen",
                                text: "Hubo un problema al guardar el logo.",
                                type: "error",
                                confirmButtonText: "!Cerrar!"
                            });
                        </script>';
                return;
            }

            $tabla = 'usuarios';
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            $parametros = [
                'logo' => $ruta,
                'usuario' => $_POST['usuario'],
                'nombre' => $_POST['nombre'],
                'password' => $password,
                'estado' => $_POST['estado'],
                'rol' => $_POST['rol']
            ];

            $respuesta = ModeloUsuarios::mdlIngresarUsuarios($tabla, $parametros);
            if ($respuesta) {
                echo '<script>
                            swal({
                                type: "success",
                                title: "¡El usuario ha sido guardado correctamente!",
                                showConfirmButton: true,
                                confirmButtonText: "Cerrar"
                            }).then(function(result) {
                                if (result.value) {
                                    window.location = "usuarios";
                                }
                            });
                        </script>';
            } else {
                echo '<script>
                            swal({
                                title: "Datos No Guardados",
                                text: "No funciono, no se guardó nada",
                                type: "error",
                                confirmButtonText: "!Cerrar!"
                            });
                        </script>';
            }
        }
    }



    /**=====================================
     *
     * EDITAR USUARIO
     *
    ==================================*/

    static public function ctrEditarUsuario()
    {

        $validos2 = "/^[a-zA-Z0-9]+$/";
        if (isset($_POST['Editarusuario'])) {

            if (
                empty($_POST['Editarusuario']) || empty($_POST['Editarnombre'])
            ) {

                echo '<script>
                        swal({
                        title: "Error al guardar",
                        text: "No deben quedar campos sin complementar",
                        type:  "error",
                        confirmButtonText: "!Cerrar!"
                        });
                    </script>';
            } else {
                $directorio = 'vistas/img/logo';
                $ruta = $_POST['iconoActual'];


                if (!empty($_FILES['Editaricono']['tmp_name'])) {
                    unlink($ruta);
                    $ruta = ControladorUsuarios::guardarImagen($_FILES['Editaricono'], $directorio, 52, 52);
                }


                if ($_POST['Actualpassword'] != '') {
                    if (preg_match($validos2, $_POST["Actualpassword"])) {
                        $encritar = password_hash($_POST['Actualpassword'], PASSWORD_BCRYPT);
                    } else {
                        echo '<script>
                        swal({
                            type: "error",
                            title: "Caracteres no valido, no se admiten espacios",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                            }).then(function(result){
                                if(result.value){
                                    window.location ="usuarios";
                                }
                            });
                        </script>';
                    }
                } else {
                    $encritar = $_POST['Editarpassword'];
                }

                $id = $_POST['id'];
                $tabla = 'usuarios';
                //$password = crypt($_POST['password'], '$2a$07$usesomesillystringforsalt$');
                $parametros = [
                    'logo' => $ruta,
                    'usuario' => $_POST['Editarusuario'],
                    'nombre' => $_POST['Editarnombre'],
                    'password' => $encritar,
                    'estado' => $_POST['Editarestado'],
                    'rol' => $_POST['Editarrol']
                ];
                $respuesta = ModeloUsuarios::mdlEditarUsuario($tabla, $parametros, $id);
                if ($respuesta) {
                    echo '<script>
                        swal({
						type: "success",
						title: "¡El usuario ha sido actualizado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
					}).then(function(result){

						if(result.value){
							window.location = "usuarios";
						}

					});
                    </script>';
                } else {
                    echo '<script>
                        swal({
                        title: "Datos No Guardados",
                        texto: "No funciono no se guardo nada",
                        type:  "error",
                        confrimButtonText: "!Cerrar!"
                        });
                    </script>';
                }
            }
        }
    }

    /*=============================================
    =            BORRAR USUARIO            =
    =============================================*/

    static public function ctrBorrarUsuario()
    {
        if (isset($_GET["idUsuario"])) {
            // Sanitización de datos
            $tabla = "usuarios";
            $idUsuario = htmlspecialchars($_GET["idUsuario"]);
            $fotoUsuario = isset($_GET["fotoUsuario"]) ? htmlspecialchars($_GET["fotoUsuario"]) : "";

            // Eliminar la foto del servidor si existe
            if (!empty($fotoUsuario) && file_exists($fotoUsuario)) {
                unlink($fotoUsuario);
            }

            // Llamar al modelo para eliminar el usuario
            $respuesta = ModeloUsuarios::mdlBorrarUsuario($tabla, $idUsuario);

            if ($respuesta == "ok") {
                // Respuesta de éxito con redirección
                echo '<script>
                        swal({
                            type: "success",
                            title: "¡El usuario ha sido borrado correctamente!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result) {
                            if (result.value) {
                                window.location = "usuarios";
                            }
                        });
                    </script>';
            } else {
                // Respuesta de error
                echo '<script>
                        swal({
                            title: "Error al eliminar",
                            text: "No funcionó eliminar al usuario",
                            type: "error",
                            confirmButtonText: "Cerrar"
                        });
                    </script>';
            }
        }
    }
}
