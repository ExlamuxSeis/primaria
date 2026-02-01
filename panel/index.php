<?php

    /***==================
     * CONTROLADORES
    ======================*/
    require_once "controladores/plantilla.controlador.php";
    require_once 'controladores/carrusel.controlador.php';
    require_once 'controladores/login.controlador.php';
    require_once 'controladores/noticias.controlador.php';
    require_once 'controladores/usuarios.controlador.php';

    /**=================
     * MODELOS
    ====================*/
    require_once 'modelos/noticias.modelo.php';
    require_once 'modelos/carrusel.modelo.php';
    require_once 'modelos/usuarios.modelo.php';

    /**===================
     * VISTAS
    ======================*/
    $plantilla = new ControladorPlantilla();
    $plantilla->ctrPlantilla();
