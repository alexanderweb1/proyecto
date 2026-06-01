<?php
require_once "conexion.php";
class ModeloIngreso
{
    public static function guardarIngreso($data)
    {
        $stm = Conexion::conectar()->prepare("INSERT INTO ingresos (id_inivitado, cantidad_personas, fecha)
                                                VALUES (:crearInvitado, :crearCantidad, :crearFecha)");

        $stm->bindParam(":crearInvitado", $data["crearInvitado"], PDO::PARAM_STR);
        $stm->bindParam(":crearCantidad", $data["crearCantidad"], PDO::PARAM_STR);
        $stm->bindParam(":crearFecha", $data["crearFecha"], PDO::PARAM_STR);

        if ($stm->execute()) {
            return "OK";
        } else {
            return "Error";
        }
    }

    //funcion para traer los datos de los ingresos
    public static function traerDatosIngresos()
    {
        $stm = conexion::conectar()->prepare("SELECT * FROM ingresos");
        $stm->execute();
        return $stm->fetchAll();
    }
}
