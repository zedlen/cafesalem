<section class="content">
    <div class="container-fluid">               
        <div class="card">
            <div class="header">Productos</div>
            <div class="body table-responsive">
                <table class="table table-striped table-bordered table-condensed js-exportable">
                    <thead>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>CURP</th>
                        <th>Edad</th>
                        <th>Genero</th>
                        <th>Dirección</th>
                        <th>&nbsp;</th>
                    </thead>
                    <tbody id="category_table">
                        <?php
                          $cat=$this->curl->sendGetMethod(base_url().'/index.php/api/general/getEmployees');
                          //echo "$cat";   
                          $cat=json_decode($cat);                      
                          foreach ($cat->employees as $key => $value) {
                            if ($value->Genero=="M") {
                                $genero="Masculino";
                            } else {
                                $genero="Femenino";
                            }
                                                                                
                                echo "<tr id='row_empleado_$value->idEmpleado'>
                                        <td id='nombre_$value->idEmpleado'>$value->Nombre</td>
                                        <td id='aPaterno_$value->idEmpleado'>$value->ApellidoPaterno</td>
                                        <td id='aMaterno_$value->idEmpleado'>$value->ApellidoMaterno</td>
                                        <td id='curp_$value->idEmpleado'>$value->curp</td>
                                        <td id='edad_$value->idEmpleado'>$value->Edad</td>
                                        <td id='genero_$value->idEmpleado'>$genero</td>
                                        <td id='direccion_$value->idEmpleado'>$value->Direccion</td>
                                        <td>
                                        <button type='button' class='btn btn-primary btn-circle waves-effect waves-circle waves-float' onclick='addEditEmployee($value->idEmpleado);'>
                                                <i class='material-icons'>mode_edit</i>
                                            </button>
                                            <button type='button' class='btn btn-danger btn-circle waves-effect waves-circle waves-float' onclick='deleteEmployee($value->idEmpleado);'>
                                                <i class='material-icons'>delete_forever</i>
                                            </button>
                                        </td>
                                    </tr>";
                          }
                        ?>
                    </tbody>
                    <tfoot>
                        <td colspan="3">
                            Agregar nuevo empleado
                            <button type='button' class='btn btn-success btn-circle waves-effect waves-circle waves-float' onclick='addEditEmployee(0);'>
                                <i class='material-icons'>add</i>
                            </button>
                        </td>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</section>

<div class="modal fade" id="employeeModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form_validation">
            <label for="nombre">Nombre</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="text" id="nombre" name="Nombre" class="form-control" placeholder="Jose onclick='addEditEmployee(0)'" required="required">
                </div>
            </div>
            <label for="aPaterno">Apellido Paterno</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="text" id="aPaterno" name="apellidoPaterno" class="form-control" placeholder="Lopez" required="required">
                </div>
            </div>
            <label for="aMaterno">Apellido Materno</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="text" id="aMaterno" name="apellidoMaterno" class="form-control" placeholder="Lopez" required="required">
                </div>
            </div>
            <label for="curp">CURP</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="text" id="curp" name="curp" class="form-control" placeholder="XXXX000000" required="required">
                </div>
            </div>
            <label for="edad">Edad</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="text" id="edad" name="Edad" class="form-control" placeholder="18" max="99" min="18">
                </div>
            </div>
            <label for="genero">Genero</label>
            <div class="form-group">
                <div class="form-line">
                    <select id="genero" name="Genero" class="form-control" required="required">
                        <option value="M">Masculino</option>
                        <option value="F">Femenino</option>
                    </select>
                </div>
            </div>
            <label for="direccion">Dirección</label>
            <div class="form-group">
                <div class="form-line">
                    <textarea type="text" id="direccion" name="Direccion" class="form-control" placeholder="Direcciónn"></textarea>
                </div>
            </div>
            <br>            
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="saveChangesEmployee()">Guardar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
