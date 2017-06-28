<div class="jumbotron" id="ticket"> 
  <div>     
    <div class="col-md-4">
      Atendió:
    </div>
    <div class="col-md-8" id="sel">
    <?php
      $cat=$this->curl->sendGetMethod(base_url().'/index.php/api/general/getEmployees');
      //echo "$cat";   
      $cat=json_decode($cat);
      $select="<select id='employee_select' class='form_control select_category drink'>";
      foreach ($cat->employees as $key => $value) {
        $select=$select."<option value='$value->idEmpleado'>$value->Nombre $value->ApellidoPaterno $value->ApellidoMaterno</option>";
      }
      $select=$select."</select>";
      echo "$select";
    ?>      
    </div>
  </div>

  <div class="col-md-12">
    <div id="nota">
    Cuenta:

      <div id="cuenta" class="table-responsive">
        <table class="table">
          <thead>
            <th>Producto</th>
            <th>Cantidad</th>
            <th>$</th>
          </thead>
          <tbody id="ticket_datail"></tbody>
          <tfoot>
            <td>TOTAL</td>
            <td>&nbsp;</td>
            <td id="total_ticket"></td>
          </tfoot>

        </table>
       
      </div>
      
    </div>
  </div>

  <div class="btn-toolbar" role="toolbar" id="imprimir" >
    <div class="btn-group">
      <button type="button" class="btn btn-default" onclick="imprimir()" >
        <span class="glyphicon glyphicon-print" ></span>
      </button>             
    </div>
  </div>          
  
</div>