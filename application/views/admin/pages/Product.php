<section class="content">
    <div class="container-fluid">               
        <div class="card">
            <div class="header">Productos</div>
            <div class="body table-responsive">
                <table class="table table-striped table-bordered table-condensed js-exportable">
                    <thead>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Categoría</th>
                        <th>Precio</th>
                        <th>Bebida/Comida</th>
                        <th>&nbsp;</th>
                    </thead>
                    <tbody id="category_table">
                        <?php
                          $cat=$this->curl->sendGetMethod(base_url().'/index.php/api/general/getProducts');
                          //echo "$cat";   
                          $cat=json_decode($cat);                      
                          foreach ($cat->products as $key => $value) {
                          	if ($value->Bebida==1) {
                          		$type="Bebida";
                          	} else {
                          		if ($value->Comida==1) {
                          			$type="Comida";
                          		}
                          		else{
                          			$type="Ninguno";
                          		}
                          	}
                          	
                                echo "<tr>
                                        <td>$value->Nombre</td>
                                        <td>$value->Descripcion</td>
                                        <td>$value->Categoria</td>
                                        <td>&#36;$value->Precio</td>
                                        <td>$type</td>
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
                            Agregar nuevo producto
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