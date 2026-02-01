<?php
include_once 'panel/controladores/noticias.controlador.php';
include_once 'panel/modelos/noticias.modelo.php';

// Llama al controlador para obtener los tres últimas noticias
$noticia = ControladorNoticia::ctrObtenerUltimasNoticias();
?>

<div class="col-md-8">
    <h1 class="h2 pb-2 mb-4 text-dark border-bottom border-dark">Noticias</h1>
    <div class="row mb-2 service hidden">
        <div class="col-md-12">
            <?php
            foreach ($noticia as $noticias) {
            ?>
                <div id="FondoArticle" class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                    <div class="col-md-3">
                        <img class="img-fluid rounded-start w-100 h-100" src="panel/<?= $noticias->imagen_portada ?>" alt="noticia">
                    </div>
                    <div class="col-md-9 p-4 d-flex flex-column position-static">
                        <strong class="d-inline-block mb-2 text-primary"><?= $noticias->titulo ?></strong>
                        <h3 class="mb-0"><?= $noticias->nombre_noticia ?></h3>
                        <div class="mb-1 text-muted"><?= $noticias->fecha ?></div>
                        <p class="card-text mb-auto"><?= $noticias->nota_corta ?></p>
                        <div class="mb-1 text-muted"><?= $noticias->autor ?></div>
                        <div class="col-md-12">

                            <a href="noticias?key=<?= $noticias->id ?>" class="btn btn-info col-md-4">Seguir viendo...</a>
                            <a href="#" class="btn btn-primary col-md-2 compartirFacebook"><img src="img/facebook.svg" alt="icono"></a>
                            <i class="bi bi-whatsapp"></i>
                            <a href="#" class="btn btn-success col-md-2 compartirWhatsApp"><img src="img/whatsapp.svg" alt="icono"></a>
                        </div>

                    </div>
                    <script>
                        // Obtén todos los elementos con la clase "compartirFacebook"
                        var botonesCompartir = document.querySelectorAll(".compartirFacebook");

                        // Agrega un evento de clic a cada botón de compartir
                        botonesCompartir.forEach(function(boton) {
                            boton.addEventListener("click", function(event) {
                                event.preventDefault();

                                // Encuentra el contenedor de la noticia para obtener la URL
                                var noticiaContainer = this.closest(".col-md-9");
                                var noticiaURL = obtenerURLDeNoticia(noticiaContainer);

                                // Abre la ventana de compartir de Facebook
                                window.open("https://www.facebook.com/sharer/sharer.php?u=" + encodeURIComponent(noticiaURL), "_blank");
                            });
                        });

                        // Función para obtener la URL de la noticia asociada al contenedor
                        function obtenerURLDeNoticia(noticiaContainer) {
                            // Encuentra el enlace de la noticia dentro del contenedor
                            var enlaceNoticia = noticiaContainer.querySelector("a.btn-primary");

                            // Obtiene la URL del enlace de la noticia
                            return enlaceNoticia.href;
                        }
                    </script>
                    <script>
                        document.addEventListener("DOMContentLoaded", function() {
                            // Obtén todos los elementos con la clase "compartirWhatsApp"
                            var botonesCompartirWhatsApp = document.querySelectorAll(".compartirWhatsApp");

                            // Agrega un evento de clic a cada botón de compartir en WhatsApp
                            botonesCompartirWhatsApp.forEach(function(boton) {
                                boton.addEventListener("click", function(event) {
                                    event.preventDefault();

                                    // Encuentra el contenedor de la noticia más cercano
                                    var noticiaContainer = boton.closest(".col-md-9");

                                    if (noticiaContainer) {
                                        var noticiaURL = obtenerURLDeNoticia(noticiaContainer);

                                        // Verifica si la URL de la noticia es válida antes de continuar
                                        if (noticiaURL) {
                                            // Detecta si el usuario está en un dispositivo móvil o no
                                            var isMobile = /iPhone|iPad|iPod|Android/i.test(navigator.userAgent);

                                            // Selecciona la URL correcta para WhatsApp Web o móvil
                                            var whatsappBaseURL = isMobile ?
                                                "https://api.whatsapp.com/send?text=" :
                                                "https://web.whatsapp.com/send?text=";

                                            // Construye la URL completa
                                            var whatsappURL = whatsappBaseURL + encodeURIComponent(noticiaURL);

                                            // Abre una nueva ventana o pestaña para compartir en WhatsApp
                                            window.open(whatsappURL, "_blank");
                                        } else {
                                            console.error("No se encontró la URL de la noticia para compartir.");
                                        }
                                    } else {
                                        console.error("No se encontró el contenedor de la noticia.");
                                    }
                                });
                            });

                            /**
                             * Función para obtener la URL de la noticia asociada al contenedor.
                             * @param {HTMLElement} noticiaContainer - El contenedor de la noticia.
                             * @returns {string|null} - La URL de la noticia o null si no se encuentra.
                             */
                            function obtenerURLDeNoticia(noticiaContainer) {
                                var enlaceNoticia = noticiaContainer.querySelector("a.btn-primary");
                                return enlaceNoticia ? enlaceNoticia.href : null;
                            }
                        });
                    </script>


                </div>
            <?php } ?>
        </div>
    </div>
    <div class="col-md-12 my-3 py-4 service hidden">
        <h2 class=" pb-2 mb-4 text-dark border-bottom border-dark">¿Deseas estudiar aquí?</h2>
        <div>
            <p>Los requisitos son los siguintes:</p>
            <ol>
                <li>Acta de nacimiento</li>
                <li>CURP (Alumno)</li>
                <li>Hoja amarilla</li>
                <li>Constancia de preescolar</li>
                <li>Cartilla de vacunación</li>
                <li>INE y CURP de padre o tutor</li>
                <li>Un sobre color beige</li>
                <p><Strong>Nota: todo en una copia</Strong></p>
            </ol>
            <p class="fst-italic">Dudas o aclaraciones ir a la institución personalmente.</p>
        </div>
    </div>
    <div class="border-bottom border-dark"></div>
    <!-- Información de la institución niños y niñas totales -->
    <?php
    include 'datos.php';
    ?>
    <!-- Cierre de Información de la institución niños y niñas totales -->
    <div class="col-md-12 my-3 py-4">
        <h2 class=" pb-2 mb-4 text-dark border-bottom border-dark">Ubicación de la institución</h2>
        <div>
            <p>Nuevo Guerrero, Gro, municipio de Tlapehuala. 40609.</p>
            <iframe class="rounded rounded-5" title="Nuevo Guerrero, Gro, municipio de Tlapehuala. 40609" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1894.8127459334598!2d-100.52726312686003!3d18.22712595641305!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x85ccc9544debe73b%3A0x4315a35b5f08d353!2sEscuela%20Primaria%20Lic.%20Benito%20Juarez!5e0!3m2!1ses-419!2smx!4v1678729071845!5m2!1ses-419!2smx" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
    </div>
</div>