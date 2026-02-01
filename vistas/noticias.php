<?php

require_once 'panel/controladores/noticias.controlador.php';
require_once 'panel/modelos/noticias.modelo.php';

$id = isset($_GET['key']) ? htmlspecialchars($_GET['key']) : null;
if (empty($id)) {
    echo "<script>
            window.location = 'inicio';
        </script>";
    exit;
}

// Llama al controlador para obtener la noticia
$noticia = ControladorNoticia::ctrMostrarNoticia($id);


// Llama al controlador para obtener los tres últimas noticias
$UltimasNoticias = ControladorNoticia::ctrObtenerUltimasNoticias();



if ($noticia == false) {
    echo "<script>
                window.location = 'inicio';
            </script>";
}
?>


<div class="col-md-8">
    <h1 class="h2 pb-2 mb-4 text-center text-dark border-bottom border-dark">
        Noticias
    </h1>
    <div class="col-md-12">
        <div class="container">
            <h2 class="display-5 link-body-emphasis mb-0"><?= $noticia->nombre_noticia ?></h2>
            <p class="blog-post-meta mb-4 text-muted"><?= $noticia->fecha ?> por <?= $noticia->autor ?></p>
            <div class="col-md-12">
                <article class="blog-post">
                    <img src="panel/<?= $noticia->imagen_horizontal ?>" class="rounded img-fluid" alt="noticia"> <br> <br>
                    <p class="lead text-justify mb-4" style="font-size: 18px; color: #333;"><?= $noticia->p1 ?></p>
                    <p class="lead text-justify mb-4" style="font-size: 18px; color: #333;"><?= $noticia->p2 ?></p>
                    <p class="lead text-justify mb-4" style="font-size: 18px; color: #333;"><?= $noticia->p3 ?>!</p>
                    <p class="lead text-justify mb-4" style="font-size: 18px; color: #333;"><?= $noticia->p4 ?></p>
                    <p class="lead text-justify mb-4" style="font-size: 18px; color: #333;"><?= $noticia->p5 ?></p>
                    <p class="lead text-justify mb-4" style="font-size: 18px; color: #333;"><?= $noticia->p6 ?></p>
                </article>
            </div>
        </div>
    </div>

    <div class="border-bottom border-dark mb-4"></div>
<h1 class="text-center mb-4">Últimas Noticias</h1>
<div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
    <?php foreach ($UltimasNoticias as $noticia): ?>
        <div class="col">
            <div class="card h-100 border-0 shadow-sm">
                <div class="card-body">
                    <h5 class="card-title text-dark fw-bold"><?= htmlspecialchars($noticia->nombre_noticia) ?></h5>
                    <p class="card-text text-muted"><?= htmlspecialchars($noticia->nota_corta) ?></p>
                    <a href="noticias?key=<?= urlencode($noticia->id) ?>" class="btn btn-outline-primary btn-sm">Leer más</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

</div>