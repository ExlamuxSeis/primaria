<?php

class Conexion
{
    public static function start()
    {
        try {
            return new PDO('mysql:host=localhost;dbname=primaria', 'root', 'root'); // Es para pruebas estas credenciales
        } catch (PDOException $error) {
            die($error->getMessage());
        }
    }
}
