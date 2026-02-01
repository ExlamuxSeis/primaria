<?php
include_once 'panel/controladores/carrusel.controlador.php';
include_once 'panel/modelos/carrusel.modelo.php';

// Llama al controlador para obtener los tres últimos carruseles
$respuesta = ControladorCarrusel::ctrObtenerUltimosCarruseles();
?>

<style>
    #my-image {
        filter: brightness(0.7); /* Ajusta el brillo según tus necesidades */
    }
</style>

<div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        <?php foreach ($respuesta as $index => $carrusel) { ?>
            <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="<?= $index ?>" class="<?= $index === 0 ? 'active' : '' ?>" aria-current="true" aria-label="Slide <?= $index + 1 ?>"></button>
        <?php } ?>
    </div>
    <div class="carousel-inner">
        <?php foreach ($respuesta as $index => $carrusel) { ?>
            <div class="carousel-item <?= $index === 0 ? 'active' : '' ?>" data-bs-interval="3000">
                <img id="my-image" src="panel/<?= $carrusel->imagen ?>" class="d-block w-100" alt="carrusel">
                <div class="carousel-caption d-none d-md-block">
                    <h5><?= $carrusel->titulo ?></h5>
                    <p><?= $carrusel->subtitulo ?></p>
                </div>
            </div>
        <?php } ?>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
