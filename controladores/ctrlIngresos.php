<?php

class ControladorIngreso
{
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
}
