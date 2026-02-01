<?php
require_once 'conexion.php';
class ModeloUsuarios
{
    /**====================================
     *
     * MOSTRAR LOS USUARIOS
     *
    =============================================*/
    static public function mdlMostrarUsuarios($tabla, $item)
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

    /**====================================
     *
     * MOSTRAR LOS USUARIOS PARA LOGUEARSE
     *
    =============================================*/
    static public function mdlMostrarUsuario($tabla, $item, $valor)
    {
        try {
            $stmt = Conexion::start()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return null;
        }
    }

    /**=====================================
     *
     * INSERTAR NUEVO USUARIO
     *
    ============================================ */
    static public function mdlIngresarUsuarios($tabla, $parametros)
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
     * EDITAR USUARIO
     *
    ====================================================*/

    static public function mdlEditarUsuario($tabla, $parametros, $id)
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
    =            Borrar usuario            =
    =============================================*/

    static public function mdlBorrarUsuario($tabla, $datos){

        $stmt = Conexion::start()->prepare("DELETE FROM $tabla WHERE id = :id");

        $stmt -> bindParam(":id", $datos, PDO::PARAM_INT);

        if($stmt -> execute()){
            return "ok";
        }else{
            return "error";
        }

        $stmt -> close();
        $stmt = null;
    }
}
