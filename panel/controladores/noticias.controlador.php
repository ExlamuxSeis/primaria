<?php
class ControladorNoticia
{
    /**==================================
     *
     * MOSTRAR LAS NOTICIAS
     *
    =====================================*/
    static public function ctrMostrarNoticia($item)
    {
        $tabla = 'noticias';
        $respuesta = ModeloNoticia::mdlMostrarNoticia($tabla, $item);
        return $respuesta;
    }

        /**========================================
     * OBTENER LOS ÚLTIMOS TRES CARRUSELES
    ==========================================*/
    static public function ctrObtenerUltimasNoticias()
    {
        // Define el nombre de la tabla
        $tabla = "noticias";

        // Llama al método del modelo
        $respuesta = ModeloNoticia::mdlObtenerUltimasNoticias($tabla);

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
            $ruta = 'vistas/img/noticias/' . $aleatorio . '.jpg';

            $origen = imagecreatefromjpeg($imagen['tmp_name']);
            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
            imagejpeg($destino, $ruta);
        }
        if ($imagen['type'] == 'image/png') {
            $aleatorio = mt_rand(100, 999);
            $ruta = 'vistas/img/noticias/' . $aleatorio . '.png';

            $origen = imagecreatefrompng($imagen['tmp_name']);
            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);

            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
            imagepng($destino, $ruta);
        }
        return $ruta;
    }



    /**=====================================
     *
     * CREAR NUEVA NOTICIA
     *
    ==================================*/

    static public function ctrCrearNoticia()
    {

        if (isset($_POST['titulo'])) {

            if (
                empty($_POST['titulo']) || empty($_POST['noticia'])
                || empty($_POST['notaCorta']) || empty($_POST['p1'])
                || empty($_POST['p2']) || empty($_POST['p3'])
                || empty($_POST['p4']) || empty($_POST['p5'])
                || empty($_POST['p6']) || empty($_POST['autor'])
                || empty($_POST['fecha']) || empty($_FILES['imagenPortada']['tmp_name'])
                || empty($_FILES['imagenHorizontal']['tmp_name'])
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
                $directorio = 'vistas/img/noticias';
                // $nuevoAncho = '52';
                // $nuevoAlto = '52';
                // $imagen = $_FILES['logo'];

                $portada = ControladorNoticia::guardarImagen($_FILES['imagenPortada'], $directorio, 500, 600);
                $horizontal = ControladorNoticia::guardarImagen($_FILES['imagenHorizontal'], $directorio, 1400, 600);

                $tabla = 'noticias';
                $parametros = [
                    'titulo' => $_POST['titulo'],
                    'nombre_noticia' => $_POST['noticia'],
                    'nota_corta' => $_POST['notaCorta'],
                    'p1' => $_POST['p1'],
                    'p2' => $_POST['p2'],
                    'p3' => $_POST['p3'],
                    'p4' => $_POST['p4'],
                    'p5' => $_POST['p5'],
                    'p6' => $_POST['p6'],
                    'autor' => $_POST['autor'],
                    'fecha' => $_POST['fecha'],
                    'imagen_portada' => $portada,
                    'imagen_horizontal' => $horizontal
                ];
                $respuesta = ModeloNoticia::mdlIngresarNoticia($tabla, $parametros);
                if ($respuesta) {
                    echo '<script>
                        swal({
						type: "success",
						title: "¡La noticia ha sido guardada correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
					}).then(function(result){

						if(result.value){
							window.location = "noticias";
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

    static public function ctrEditarNoticia()
    {

        if (isset($_POST['Editartitulo'])) {

            if (
                empty($_POST['Editartitulo']) || empty($_POST['Editarnoticia'])
                || empty($_POST['EditarnotaCorta']) || empty($_POST['Editarp1'])
                || empty($_POST['Editarp2']) || empty($_POST['Editarp3'])
                || empty($_POST['Editarp4']) || empty($_POST['Editarp5'])
                || empty($_POST['Editarp6']) || empty($_POST['Editarautor'])
                || empty($_POST['Editarfecha'])
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
                $directorio = 'vistas/img/noticias';
                // $nuevoAncho = '52';
                // $nuevoAlto = '52';
                $portada = $_POST['portadaActual'];
                $horizontal = $_POST['horizontalActual'];

                if (!empty($_FILES['EditarimagenPortada']['tmp_name'])) {
                    unlink($portada);
                    $portada = ControladorNoticia::guardarImagen($_FILES['EditarimagenPortada'], $directorio, 500, 600);
                }
                if (!empty($_FILES['EditarimagenHorizontal']['tmp_name'])) {
                    unlink($horizontal);
                    $horizontal = ControladorNoticia::guardarImagen($_FILES['EditarimagenHorizontal'], $directorio, 1400, 800);
                }

                $id = $_POST['editarId'];
                $tabla = 'noticias';
                $parametros = [
                    'titulo' => $_POST['Editartitulo'],
                    'nombre_noticia' => $_POST['Editarnoticia'],
                    'nota_corta' => $_POST['EditarnotaCorta'],
                    'p1' => $_POST['Editarp1'],
                    'p2' => $_POST['Editarp2'],
                    'p3' => $_POST['Editarp3'],
                    'p4' => $_POST['Editarp4'],
                    'p5' => $_POST['Editarp5'],
                    'p6' => $_POST['Editarp6'],
                    'autor' => $_POST['Editarautor'],
                    'fecha' => $_POST['Editarfecha'],
                    'imagen_portada' => $portada,
                    'imagen_horizontal' => $horizontal
                ];
                $respuesta = ModeloNoticia::mdlEditarNoticias($tabla, $parametros, $id);
                if ($respuesta) {
                    echo '<script>
                        swal({
						type: "success",
						title: "¡La noticia ha sido actualizada correctamente!",
						showConfirmButton: true,
						confirmButtonText: "Cerrar"
					}).then(function(result){

						if(result.value){
							window.location = "noticias";
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
    =            BORRAR NOTICIA            =
    =============================================*/

    static public function ctrBorrarNoticia()
    {
        if (isset($_GET["idNoticia"])) {
            // Sanitización de datos
            $tabla = "noticias";
            $idNoticia = htmlspecialchars($_GET["idNoticia"]);
            $imagenPortada = isset($_GET["imagenPortada"]) ? htmlspecialchars($_GET["imagenPortada"]) : "";
            $imagenHorizontal = isset($_GET["imagenHorizontal"]) ? htmlspecialchars($_GET["imagenHorizontal"]) : "";

            // Eliminar la foto del servidor si existe
            if (!empty($imagenPortada) && file_exists($imagenPortada)) {
                unlink($imagenPortada);
            }

            // Eliminar la foto del servidor si existe
            if (!empty($imagenHorizontal) && file_exists($imagenHorizontal)) {
                unlink($imagenHorizontal);

                // Llamar al modelo para eliminar el usuario
                $respuesta = ModeloNoticia::mdlBorrarNoticia($tabla, $idNoticia);

                if ($respuesta == "ok") {
                    // Respuesta de éxito con redirección
                    echo '<script>
                        swal({
                            type: "success",
                            title: "¡La noticia ha sido borrada correctamente!",
                            showConfirmButton: true,
                            confirmButtonText: "Cerrar"
                        }).then(function(result) {
                            if (result.value) {
                                window.location = "noticias";
                            }
                        });
                    </script>';
                } else {
                    // Respuesta de error
                    echo '<script>
                        swal({
                            title: "Error al eliminar",
                            text: "No funcionó eliminar la noticia",
                            type: "error",
                            confirmButtonText: "Cerrar"
                        });
                    </script>';
                }
            }
        }
    }
}
