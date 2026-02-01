<aside class="col-md-4" style="padding-top: 40px;">
    <div class="position-sticky" style="top: 2rem; text-align: center;">
        <div class="p-4 mb-3 bg-light rounded service hidden">
            <h4 class="fst-italic">Director de la institición</h4>
            <img src="img/Director (2).jpeg" width="80%" class="rounded rounded-circle
                        " alt="director">
            <p class="mb-0">Profesor: Jorge Cadena Vergara</p>
        </div>

        <div class="p-4 service hidden">
            <h4 class="fst-italic">Información</h4>
            <p class="text-start">
                La Escuela Primaria "Benito Juárez" es una institución educativa que destaca por su enfoque integral en la formación de sus estudiantes.
                Ubicada en un entorno tranquilo y seguro, esta escuela se ha ganado una excelente reputación en la comunidad por brindar una educación
                de calidad y promover valores fundamentales.
            </p>
        </div>
        <?php
        // Incluye el carrusel si no se pasa una ruta o si la ruta no está en las excluidas
        if (!isset($_GET['ruta']) || in_array($_GET['ruta'], ['inicio'])) {
        ?>
        <div class="p-4 service hidden">
            <h4 class="fst-italic">Sitios de interés</h4>
            <p class="text-start">
                <center>
                    <a href="https://libros.conaliteg.gob.mx/" target="_blank" style="text-decoration: none;">CNB (Comisión Nacional de Libros de Texto Gratuitos) <br> <img width="150" height="150" src="img/CNB.jpg" alt="CNB" /></a>
                    <br> <br>
                    <a href="https://www.pequejuegos.com/juegos-logica.html" target="_blank" style="text-decoration: none;">Pequejuegos en lógica <br> <img width="150" height="150" src="img/Pequejuegos.jpg" alt="Pequejuegos en lógica" /></a>
                    <br> <br>
                    <a href="https://www.aulaplaneta.com/" target="_blank" style="text-decoration: none;">Aulaplaneta <br> <img width="150" height="150" src="img/aulaplaneta.jpg" alt="Aulaplaneta" /></a>
                </center>
            </p>
        </div>
        <?php
        }
        ?>
    </div>
</aside>