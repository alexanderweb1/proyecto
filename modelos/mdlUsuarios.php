<?php
require_once "conexion.php";

class modeloUsuario
{
    public static function buscarUsuarios($usuario, $contrasenia)
    {
        echo $usuario;
        echo $contrasenia;
        $stm = conexion::conectar()->prepare("SELECT * FROM usuarios WHERE usuario = :usuario AND contrasenia = :contrasenia");
        $stm->bindParam(":usuario", $usuario, PDO::PARAM_STR);
        $stm->bindParam(":contrasenia", $contrasenia, PDO::PARAM_STR);
        $stm->execute();
        return $stm->fetch();
    }
}
