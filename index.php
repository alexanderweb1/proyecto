<?php
//llamar a todos los controladores
require_once "controladores/ctrlPrincipal.php";
require_once "controladores/ctrlUsurios.php";
require_once "controladores/ctrlIngresos.php";
require_once "controladores/ctrlDatosInvitado.php";


//llamar a todos los modelos
require_once "modelos/mdlUsuario.php";
require_once "modelos/mdlIngreso.php";
require_once "modelos/mdlDatosInvitado.php";

$objPrincipal = new Principal();
$objPrincipal->ctrlPrincipal();
