<?php
require_once 'conexion.php';
class ModeloCarrusel
{
    /**====================================
     *
     * MOSTRAR LOS SLIDERS
     *
    =============================================*/
    static public function mdlMostrarCarrusel($tabla, $item)
    {
        if ($item != null) {
            $query = Conexion::start()->prepare("SELECT * FROM $tabla
            WHERE id = '$item'");
            $query->execute();
            return $query->fetch();
        } else {
            $query = Conexion::start()->prepare("SELECT * FROM $tabla");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);
        }

        $query->close();
        $query = null;
    }

    /**================================================
     *
     * OBTENER LOS TRES ÚLTIMOS CARRUSELES
     *
===================================================*/
    static public function mdlObtenerUltimosCarruseles($tabla)
    {
        $query = Conexion::start()->prepare("SELECT * FROM $tabla ORDER BY id DESC LIMIT 3");

        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);

        $query->closeCursor();
        $query = null;
    }

    /**===========================================
     *
     * INSERTAR UN NUEVO SLIDER
     *
    ==============================================*/
    static public function mdlIngresarCarrusel($tabla, $parametros)
    {

        $col = implode(', ', array_keys($parametros));
        $valores = ":" . implode(', :', array_keys($parametros));

        $query = Conexion::start()->prepare("INSERT INTO {$tabla}
        ({$col}) VALUES ({$valores})");

        if ($query->execute($parametros)) {
            return true;
        } else {
            return false;
        }

        $query->close();
        $query = null;
    }

    /**================================================
     *
     * EDITAR CARRUSEL
     *
    ====================================================*/

    static public function mdlEditarCarrusel($tabla, $parametros, $id)
    {
        // var_dump($parametros);
        $set = "";
        foreach ($parametros as $key => $value) {
            $set .= "{$key} = :{$key}, ";
        }
        $set = rtrim($set, ", ");

        $query = Conexion::start()->prepare("UPDATE {$tabla} SET {$set} WHERE id = :id");

        $parametros['id'] = $id;

        if ($query->execute($parametros)) {
            return true;
        } else {
            return false;
        }
        $query->close();
        $query = null;
    }

    /*=============================================
    =            Borrar carrusel            =
    =============================================*/

    static public function mdlBorrarCarrusel($tabla, $datos)
    {

        $stmt = Conexion::start()->prepare("DELETE FROM $tabla WHERE id = :id");

        $stmt->bindParam(":id", $datos, PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }

        $stmt->close();
        $stmt = null;
    }
}
