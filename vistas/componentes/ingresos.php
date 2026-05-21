  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
          <div class="container-fluid">
              <div class="row mb-2">
                  <div class="col-sm-6">
                      <h1>Administración de Ingresos</h1>
                  </div>
                  <div class="col-sm-6">
                      <ol class="breadcrumb float-sm-right">
                          <li class="breadcrumb-item"><a href="inicio">Incio</a></li>
                          <li class="breadcrumb-item active">Ingresos</li>
                      </ol>
                  </div>
              </div>
          </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">

          <!-- Default box -->
          <div class="card">
              <div class="card-header">
                  <!-- Trigger the modal with a button -->
                  <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#myModal"><i class="fas fa-plus-square"></i> Nuevo Ingreso</button>

              </div>
              <div class="card-body">
                  <!-- Modal -->
                  <div class="modal fade" id="myModal" role="dialog">
                      <div class="modal-dialog modal-lg">

                          <div class="modal-content">
                              <div class="modal-header">
                                  <h4 class="modal-title">Crear Ingreso</h4>
                              </div>
                              <form method="post">
                                  <div class="modal-body">
                                      <div class="card-body">
                                          <!-- ID Invitado -->
                                          <div class="row">
                                              <div class="col-lg-6">

                                                  <div class="input-group mb-3">
                                                      <select name="crearInvitado" class="form-control" required>
                                                          <option value="">Seleccione invitado</option>

                                                          <?php
                                                            $conexion = Conexion::conectar();
                                                            $stmt = $conexion->prepare("

                                                                        SELECT invitados.id_invitado,
                                                                            estudiantes.nombre,
                                                                            estudiantes.apellido
                                                                        FROM invitados
                                                                        INNER JOIN estudiantes
                                                                        ON invitados.id_estudiante = estudiantes.id_estudiante
                                                                    ");
                                                            $stmt->execute();
                                                            $invitados = $stmt->fetchAll();
                                                            foreach ($invitados as $value) {
                                                                echo '
                                                                        <option value="' . $value["id_invitado"] . '">
                                                                            ' . $value["nombre"] . ' ' . $value["apellido"] . '
                                                                        </option>
                                                                    ';
                                                            }
                                                            ?>
                                                      </select>
                                                      <div class="input-group-append">
                                                          <span class="input-group-text">
                                                              <i class="fas fa-user"></i>
                                                          </span>
                                                      </div>
                                                  </div>
                                              </div>
                                              <!-- Cantidad Personas -->
                                              <div class="col-lg-6">
                                                  <div class="input-group mb-3">
                                                      <input type="number" class="form-control" name="crearCantidad" placeholder="Cantidad de personas"
                                                          min="1"
                                                          required>
                                                      <div class="input-group-append">
                                                          <span class="input-group-text">
                                                              <i class="fas fa-users"></i>
                                                          </span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>

                                          <!-- Fecha -->
                                          <div class="row">
                                              <div class="col-lg-12">
                                                  <div class="input-group mb-3">
                                                      <input type="date"
                                                          class="form-control"
                                                          name="crearFecha"
                                                          required>
                                                      <div class="input-group-append">
                                                          <span class="input-group-text">
                                                              <i class="fas fa-calendar"></i>
                                                          </span>
                                                      </div>
                                                  </div>
                                              </div>
                                          </div>
                                      </div>
                                  </div>
                                  <div class="modal-footer">

                                      <button type="submit" class="btn btn-primary">
                                          Guardar
                                      </button>
                                      <button type="button"
                                          class="btn btn-default"
                                          data-dismiss="modal">
                                          Cerrar
                                      </button>
                                  </div>
                              </form>
                          </div>
                      </div>
                  </div>
              </div>
              <!-- /.card-body -->
          </div>
          <!-- /.card -->
      </section>
      <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->