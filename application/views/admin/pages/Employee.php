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
                                echo "<tr>
                                        <td>$value->Nombre</td>
                                        <td>$value->ApellidoPaterno</td>
                                        <td>$value->ApellidoMaterno</td>
                                        <td>$value->curp</td>
                                        <td>$value->Edad</td>
                                        <td>$value->Genero</td>
                                        <td>$value->Direccion</td>
                                        <td>
                                        <button type='button' class='btn btn-primary btn-circle waves-effect waves-circle waves-float'>
                                                <i class='material-icons'>mode_edit</i>
                                            </button>
                                            <button type='button' class='btn btn-danger btn-circle waves-effect waves-circle waves-float'>
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
                            <button type='button' class='btn btn-success btn-circle waves-effect waves-circle waves-float'>
                                <i class='material-icons'>add</i>
                            </button>
                        </td>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</section>