<?php

require_once "../controladores/usuarios.controlador.php";
require_once "../modelos/usuarios.modelo.php";

class AjaxCarrusel{
    public $idUsuario;

    public function ajaxEditarUsuario(){
        $campo = 'id';
        $item = $this->idUsuario;

        $respuesta = ControladorUsuarios::ctrMostrarUsuarios($item, $campo);

        echo json_encode($respuesta);
    }
}

if(isset($_POST['idUsuario'])){
    $editar = new AjaxCarrusel();
    $editar -> idUsuario = $_POST['idUsuario'];
    $editar -> ajaxEditarUsuario();
}