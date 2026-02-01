<?php
require_once 'conexion.php';
class ModeloNoticia
{
    /**====================================
     *
     * MOSTRAR LAS NOTICIAS
     *
    =============================================*/
    static public function mdlMostrarNoticia($tabla, $item)
    {
        if ($item != null) {
            $query = Conexion::start()->prepare("SELECT * FROM $tabla
            WHERE id = '$item'");
            $query->execute();
            return $query->fetch(PDO::FETCH_OBJ); // Devuelve un único objeto
        } else {
            $query = Conexion::start()->prepare("SELECT * FROM $tabla");
            $query->execute();
            return $query->fetchAll(PDO::FETCH_OBJ);// Devuelve un arreglo de objetos
        }

        $query->close();
        $query = null;
    }

    /**=====================================
     *
     * INSERTAR UNA NUEVA NOTICIA
     *
    ============================================ */
    static public function mdlIngresarNoticia($tabla, $parametros)
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
     * OBTENER LOS TRES ÚLTIMAS NOTICIAS
     *
===================================================*/
    static public function mdlObtenerUltimasNoticias($tabla)
    {
        $query = Conexion::start()->prepare("SELECT * FROM $tabla ORDER BY id DESC LIMIT 3");

        $query->execute();

        return $query->fetchAll(PDO::FETCH_OBJ);

        $query->closeCursor();
        $query = null;
    }

    static public function mdlEditarNoticias($tabla, $parametros, $id)
    {
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
    =            Borrar noicia            =
    =============================================*/

    static public function mdlBorrarNoticia($tabla, $datos)
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
