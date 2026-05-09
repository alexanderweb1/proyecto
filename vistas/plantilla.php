<?php
session_start();
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Sistema</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="vistas/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="vistas/dist/css/adminlte.min.css">
</head>

<?php
if (isset($_SESSION["login"]) && $_SESSION["login"] == "activo") {
    echo '<body class="hold-transition sidebar-mini">';
    echo '<div class="wrapper">';

    include "vistas/componentes/menu.php";
    include "vistas/componentes/sidebar.php";

    //rutas de nuestra aplicacio
    if (isset($_GET["enlace"])) {
        if ($_GET["enlace"] == "inicio") {
            include "vistas/componentes/" . $_GET["enlace"] . ".php";
        } else {
            include "vistas/componentes/404.php";
        }
    } else {
        include "vistas/componentes/inicio.php";
    }

    include "vistas/componentes/footer.php";
} else {
    include "vistas/componentes/login.php";
    echo '<body class="hold-transition login-page">';
}
?>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>