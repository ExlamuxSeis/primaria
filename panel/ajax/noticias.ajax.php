<?php

require_once "../controladores/noticias.controlador.php";
require_once "../modelos/noticias.modelo.php";

class AjaxNoticia{
    public $idNoticia;

    public function ajaxEditarNoticia(){
        $campo = 'id';
        $item = $this->idNoticia;

        $respuesta = ControladorNoticia::ctrMostrarNoticia($item, $campo);

        echo json_encode($respuesta);
    }
}

if(isset($_POST['idNoticias'])){
    $editar = new AjaxNoticia();
    $editar -> idNoticia = $_POST['idNoticias'];
    $editar -> ajaxEditarNoticia();
}