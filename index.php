<?php
//llamar a todos los controladores
require_once "controladores/ctrlPrincipal.php";
require_once "controladores/ctrlUsuarios.php";

//llamar a todos los modelos
require_once "modelos/mdlUsuarios.php";

$objPrincipal = new Principal();
$objPrincipal->ctrlPrincipal();
