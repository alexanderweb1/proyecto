<?php
class ControladorIngreso
{
    #accion para guardar un ingreso desde el formulario
    public function ctrlGuardarIngreso()
    {
        if (
            isset($_POST['crearInvitado']) && isset($_POST['crearCantidad']) && isset($_POST['crearFecha'])
        ) {

            $data = array(
                "crearInvitado" => $_POST['crearInvitado'],
                "crearCantidad" => $_POST['crearCantidad'],
                "crearFecha" => $_POST['crearFecha']
            );

            $res = ModeloIngreso::guardarIngreso($data);
            echo $res;


            if ($res == "OK") {

                echo '<script>
                    Swal.fire({
                        icon:"success",
                        title:"¡Ingreso Guardado Correctamente!",
                        showConfirmButton:true,
                        confirmButtonText:"Cerrar"
                    }).then(function(result){

                        if(result.value){

                            window.location="ingresos";

                        }
                    });
                    </script>';
            } else {

                echo '<script>
                    Swal.fire({
                        icon:"error",
                        title:"¡Error, no se pudo guardar el ingreso!",
                        showConfirmButton:true,
                        confirmButtonText:"Cerrar"
                    }).then(function(result){

                        if(result.value){

                            window.location="ingresos";
                        }
                    });
                </script>';
            }
        }
    }

    #accion para preparar datos para una consulta de ingresos
    public static function ctrlCargarDatosIngresos($parametros, $id)
    {
        //llamar a la funcion para traer los datos de los ingresos
        $res = ModeloIngreso::traerDatosIngresos($parametros, $id);
        return $res;
    }
}
