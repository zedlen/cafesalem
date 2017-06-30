<section class="content">
    <div class="container-fluid">               
        <div class="card">
            <div class="header">Categorias</div>
            <div class="body table-responsive">
                <table class="table table-striped table-bordered table js-exportable">
                    <thead>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>&nbsp;</th>
                    </thead>
                    <tbody id="category_table">
                        <?php
                          $cat=$this->curl->sendGetMethod(base_url().'/index.php/api/general/getCategories');
                          //echo "$cat";   
                          $cat=json_decode($cat);                      
                          foreach ($cat->categories as $key => $value) {
                                echo "<tr>
                                        <td>$value->Nombre</td>
                                        <td>$value->Descripcion</td>
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
                            Agregar nueva categoria
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