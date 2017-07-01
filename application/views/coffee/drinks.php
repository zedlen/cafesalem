      <div class="jumbotron" id="bebidas">        
        <div class="btn-group">
         <button id="show_modal_drink" type="button" class="btn  btn-lg botones " data-toggle="modal" data-target="#myModal">Bebidas</button>
       </div>


     </div>
     <div class="panel-body">
      <!-- Modal -->
      <div id="myModal" class="modal fade" role="dialog" >
        <div class="modal-dialog" style="width:1000px !important;">
          <!-- Modal content-->
          <div class="modal-content" style="position:relative; overflow:auto;">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
              <h2 class="modal-title">Bebidas</h2>
            </div>

            <div class="modal-body">
              <div class="block-area" id="responsiveTable">                  
                <div class="table-responsive overflow">
                  <table class="table table-stripped js-exportable" id="drink_table">
                    <thead>
                      <th>&nbsp;</th>
                      <th>Nombre</th>
                      <th>Precio</th>
                      <th>&nbsp;</th>
                    </thead>
                    <tbody>


                      <?php
                      $request=$this->curl->sendGetMethod(base_url().'/index.php/api/bebidas/getAll');   
                      $request=json_decode($request);
                      if ($request->status) {
                        foreach ($request->drinks as $key => $value) {
                          echo "<tr><td><input id='select_producto_$value->idProducto' class='check_select_drink form-control' type='checkbox' obj_name='$value->Nombre' precio='$value->Precio' producto_id='$value->idProducto' onchange='change_val($value->idProducto)'></td>";
                          foreach ($value as $index => $obj) {
                            if ($index=="Nombre"||$index=="Precio") {
                              echo "<td>$obj</td>";
                            }
                            if ($index=="Descripcion") {
                              echo "<td><input class='form-control' id='cantidad_$value->idProducto' type='number' min='1' max='99'></td>";
                            }

                          }
                        }   
                      }
                      ?>
                    </tbody>
                  </table>    

                  <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal" id="close_modal">Close</button>
                    <button type="button" class="btn btn-primary" id="save_drinks">Save</button>                                   
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
