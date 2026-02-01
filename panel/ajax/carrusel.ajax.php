<?php

require_once "../controladores/carrusel.controlador.php";
require_once "../modelos/carrusel.modelo.php";

class AjaxCarrusel{
    public $idCarrusel;

    public function ajaxEditarCarrusel(){
        $campo = 'id';
        $item = $this->idCarrusel;

        $respuesta = ControladorCarrusel::ctrMostrarCarrusel($item, $campo);

        echo json_encode($respuesta);
    }
}

if(isset($_POST['idCarrusel'])){
    $editar = new AjaxCarrusel();
    $editar -> idCarrusel = $_POST['idCarrusel'];
    $editar -> ajaxEditarCarrusel();
}