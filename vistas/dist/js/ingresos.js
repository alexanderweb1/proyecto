$(function () {
    $("#tableIngresos").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#tableIngresos_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });


  $(".editarIngresoTabla").click(function(){
    var id_ingreso = $(this).attr("id_ingreso");
    var datos  = new FormData();
    datos.append('id_ingreso', id_ingreso)
    datos.append('operacion', 'editar')
    $.ajax({
      url:'ajax/ajaxIngresos.php',
      method:'POST',
      data: datos,
      cache: false,
      contentType:false,
      processData: false,
      dataType: 'json',

      success: function (respuesta){
        
        $("#editarIdIngreso").val(respuesta.id_ingreso);
        $("#editarInvitado").val(respuesta.id_invitado);
        $("#editarCantidad").val(respuesta.cantidad_personas);
        let fecha = respuesta.fecha.replace(" ", "T");
        $("#editarFecha").val(fecha);
        
        console.log("Datos desde PHP", respuesta)
      },
      error: function(xhr, status, error) {
              console.error("Error crítico en la petición AJAX:", error);
              console.log("Detalles del servidor:", xhr.responseText);
          }
    })
  });