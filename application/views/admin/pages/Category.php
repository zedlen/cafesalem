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
                                echo "<tr id='row_categoria_$value->idCategoria'>
                                        <td id='name_$value->idCategoria'>$value->Nombre</td>
                                        <td id='description_$value->idCategoria'>$value->Descripcion</td>
                                        <td>
                                        <button type='button' class='btn btn-primary btn-circle waves-effect waves-circle waves-float' onclick='addEditCategory(".$value->idCategoria.");'>
                                                <i class='material-icons'>mode_edit</i>
                                            </button>
                                            <button type='button' class='btn btn-danger btn-circle waves-effect waves-circle waves-float' onclick='deleteCategory(".$value->idCategoria.");'>
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
                            <button type='button' class='btn btn-success btn-circle waves-effect waves-circle waves-float' onclick='addEditCategory(0);'>
                                <i class='material-icons'>add</i>
                            </button>
                        </td>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>

</section>



<div class="modal fade" id="categoryModal">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Categoria</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form>
            <label for="email_address">Nombre</label>
            <div class="form-group">
                <div class="form-line">
                    <input type="text" id="name_category" name="Nombre" class="form-control" placeholder="Nombre de categoria">
                </div>
            </div>
            <label for="password">Descripción</label>
            <div class="form-group">
                <div class="form-line">
                    <textarea id="description_category" name="Descripcion" class="form-control" rows="4" placeholder="Breve descripcion"></textarea>
                </div>
            </div>
            <br>            
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" onclick="saveChangesCategory()">Guardar</button>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
