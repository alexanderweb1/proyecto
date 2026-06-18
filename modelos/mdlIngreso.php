<?php
require_once "conexion.php";
class ModeloIngreso
{
    public static function guardarIngreso($data)
    {
        $stm = Conexion::conectar()->prepare("INSERT INTO ingresos (id_invitado, cantidad_personas, fecha)
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
    public static function traerDatosIngresos($parametros, $id)
    {
        if ($parametros) {
            $stm = conexion::conectar()->prepare("SELECT ingresos.*, invitados.id_invitado AS invitado 
                                              FROM ingresos 
                                              INNER JOIN invitados ON ingresos.id_invitado= invitados.id_invitado");
            $stm->execute();
            return $stm->fetchAll();
        } else {
            $stm = conexion::conectar()->prepare("SELECT * FROM ingresos WHERE id_ingreso = :id_ingreso");
            $stm->bindParam(":id_ingreso", $id, PDO::PARAM_INT);
            $stm->execute();
            return $stm->fetch();
        }
    }
}
