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
                          	
                                echo "<tr id='row_producto_$value->idProducto'>
                                        <td id='name_$value->idProducto'>$value->Nombre</td>
                                        <td id='descripcion_$value->idProducto'>$value->Descripcion</td>
                                        <td id='categoria_$value->idProducto' categoria='$value->idCategoria'>$value->Categoria</td>
                                        <td id='precio_$value->idProducto' precio='$value->Precio'>&#36;$value->Precio</td>
                                        <td id='tipo_$value->idProducto'>$type</td>
                                        <td>
                                        <button type='button' class='btn btn-primary btn-circle waves-effect waves-circle waves-float' onclick='addEditProduct(".$value->idProducto.");'>
                                                <i class='material-icons'>mode_edit</i>
                                            </button>
                                            <button type='button' class='btn btn-danger btn-circle waves-effect waves-circle waves-float' onclick='deleteProduct(".$value->idProducto.");'>
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
                            <button type='button' class='btn btn-success btn-circle waves-effect waves-circle waves-float' onclick='addEditProduct(0);'>
                                <i class='material-icons'>add</i>
                            </button>
                        </td>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</section>


<div class="modal fade" id="productModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Producto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form_validation">
            <label for="name_producto">Nombre</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="text" id="name_producto" name="Nombre" class="form-control" placeholder="Nombre de producto" required="required">
                </div>
            </div>
            <label for="description_producto">Descripción</label>
            <div class="form-group">
                <div class="form-line">
                    <textarea id="description_producto" name="Descripcion" class="form-control" placeholder="Breve descripcion"></textarea>
                </div>
            </div>
             <label for="cetegory_prodcut">Categoria</label>
            <div class="form-group">
                <select id="category_product" class="form-control" required="required">
                <?php
                  $categories=$this->curl->sendGetMethod(base_url().'/index.php/api/general/getCategories');
                  //echo "$cat";   
                  $categories=json_decode($categories); 
                  foreach ($categories->categories as $key => $value) {
                    echo "<option value='$value->idCategoria'>$value->Nombre</option>";
                  }
                ?>
                </select>
                
            </div>
              <label for="prize_product">Precio</label>
              <div class="form-group">
                <div class="form-line">
                    <input type="number" id="prize_product" name="Precio" class="form-control" placeholder="0.0" required="required">
                </div>
            </div>
            <label for="tipe_product">Tipo</label>
            <div class="form-group">
                <select id="tipe_product" class="form-control" required="required">                  
                  <option value="1">Comida</option>
                  <option value="2">Bebida</option>
                  <option value="3">Ninguno</option>                  
                </select>
            </div>                       
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="saveChangesProduct()">Guardar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>