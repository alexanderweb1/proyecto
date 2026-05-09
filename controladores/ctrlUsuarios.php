<?php
class controladorUsuario
{
    public function ctrlLoginUsuario()
    {
        if (isset($_POST["usuario"]) && isset($_POST["contrasenia"])) {
            $usuario = $_POST["usuario"];
            $contrasenia = $_POST["contrasenia"];

            $datos = modeloUsuario::buscarUsuarios($usuario, $contrasenia);

            if ($datos['usuario'] == $usuario && $datos['contrasenia'] == $contrasenia) {

                $_SESSION["login"] = "activo";
                $_SESSION["nombre"] = $datos["nombres"] . " " . $datos["apellidos"];

                echo '<script>
                        window.location.href = "inicio";
                     </script>';
            } else {
                echo ("Datos incorrectos");
            }
        } else {
            echo ("Hay datos obligatorios en el formulario");
        }
    }
}
