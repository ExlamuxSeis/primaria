<?php
class ControladorCarrusel
{
    /**==================================
     *
     * MOSTRAR LOS CARRUSEL
     *
    =====================================*/
    static public function ctrMostrarCarrusel($item)
    {
        $tabla = 'carrusel';
        $respuesta = ModeloCarrusel::mdlMostrarCarrusel($tabla, $item);
        return $respuesta;
    }

    /**========================================
     * OBTENER LOS ÚLTIMOS TRES CARRUSELES
    ==========================================*/
    static public function ctrObtenerUltimosCarruseles()
    {
        // Define el nombre de la tabla
        $tabla = "carrusel";

        // Llama al método del modelo
        $respuesta = ModeloCarrusel::mdlObtenerUltimosCarruseles($tabla);

        // Retorna la respuesta al lugar desde donde se llamó
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
            $ruta = 'vistas/img/carrusel/' . $aleatorio . '.jpg';

            $origen = imagecreatefromjpeg($imagen['tmp_name']);
            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
            imagejpeg($destino, $ruta);
        }
        if ($imagen['type'] == 'image/jpg') {
            $aleatorio = mt_rand(100, 999);
            $ruta = 'vistas/img/carrusel/' . $aleatorio . '.jpg';

            $origen = imagecreatefromjpeg($imagen['tmp_name']);
            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
            imagejpeg($destino, $ruta);
        }
        if ($imagen['type'] == 'image/png') {
            $aleatorio = mt_rand(100, 999);
            $ruta = 'vistas/img/carrusel/' . $aleatorio . '.png';

            $origen = imagecreatefrompng($imagen['tmp_name']);
            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
            imagepng($destino, $ruta);
        }
        return $ruta;
    }



    /**=====================================
     *
     * CREAR CARRUSEL
     *
    ==================================*/

    static public function ctrCrearCarrusel()
    {

        if (isset($_POST['titulo'])) {

            if (
                empty($_POST['titulo']) || empty($_FILES['foto']['tmp_name']) || empty($_POST['subtitulo'])
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
                $directorio = 'vistas/img/carrusel';
                // $imagen = $_FILES['logo'];

                $carrusel = ControladorCarrusel::guardarImagen($_FILES['foto'], $directorio, 1400, 400);

                $tabla = 'carrusel';
                $parametros = [
                    'titulo' => $_POST['titulo'],
                    'subtitulo' => $_POST['subtitulo'],
                    'imagen' => $carrusel
                ];
                $respuesta = ModeloCarrusel::mdlIngresarCarrusel($tabla, $parametros);
                if ($respuesta) {
                    echo '<script>
                        swal({
						type: "success",
						title: "¡El carrusel ha sido guardado correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
					}).then(function(result){

						if(result.value){
							window.location = "?ruta=carrusel";
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

    /**======================================
     * EDITAR CARRUSEL
    ========================================*/

    static public function ctrEditarCarrusel()
    {

        if (isset($_POST['Editartitulo'])) {

            if (
                empty($_POST['Editartitulo']) || empty($_POST['Editarsubtitulo'])
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
                $directorio = 'vistas/img/carrusel';
                // $nuevoAncho = '52';
                // $nuevoAlto = '52';
                $carrusel = $_POST['fotoActual'];

                if (!empty($_FILES['Editarfoto']['tmp_name'])) {
                    unlink($carrusel);
                    $carrusel = ControladorNoticia::guardarImagen($_FILES['Editarfoto'], $directorio, 1400, 400);
                }

                $id = $_POST['id'];
                $tabla = 'carrusel';
                $parametros = [
                    'titulo' => $_POST['Editartitulo'],
                    'subtitulo' => $_POST['Editarsubtitulo'],
                    'imagen' => $carrusel
                ];
                $respuesta = ModeloCarrusel::mdlEditarCarrusel($tabla, $parametros, $id);
                if ($respuesta) {
                    echo '<script>
                        swal({
						type: "success",
						title: "¡el carrusel ha sido actualizado -correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
					}).then(function(result){

						if(result.value){
							window.location = "carrusel";
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
    =            BORRAR CARRUSEL            =
    =============================================*/

    static public function ctrBorrarCarrusel()
    {
        if (isset($_GET["idCarrusel"])) {
            // Sanitización de datos
            $tabla = "carrusel";
            $idCarrusel = htmlspecialchars($_GET["idCarrusel"]);
            $imagenCarrusel = isset($_GET["imagenCarrusel"]) ? htmlspecialchars($_GET["imagenCarrusel"]) : "";

            // Eliminar la foto del servidor si existe
            if (!empty($imagenCarrusel) && file_exists($imagenCarrusel)) {
                unlink($imagenCarrusel);
            }

            // Llamar al modelo para eliminar el usuario
            $respuesta = ModeloCarrusel::mdlBorrarCarrusel($tabla, $idCarrusel);

            if ($respuesta == "ok") {
                // Respuesta de éxito con redirección
                echo '<script>
                        swal({
                            type: "success",
                            title: "¡El carrusel ha sido borrado correctamente!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result) {
                            if (result.value) {
                                window.location = "carrusel";
                            }
                        });
                    </script>';
            } else {
                // Respuesta de error
                echo '<script>
                        swal({
                            title: "Error al eliminar",
                            text: "No funcionó eliminar al carrusel",
                            type: "error",
                            confirmButtonText: "Cerrar"
                        });
                    </script>';
            }
        }
    }
}
