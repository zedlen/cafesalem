<div class="jumbotron" id="ticket"> 
  <div>     
    <div class="col-md-4">
      Atendió:
    </div>
    <div class="col-md-8" id="sel">
      <select requiered class="form-control input-sm">
        <option value="" disabled="">--Seleccione quien atendió--</option>
        <option value="1">mesero1</option>
        <option value="2">mesero2</option>
        <option value="3">mesero3</option>
        <option value="4">mesero4</option>
        <option value="5">mesero5</option>
      </select>
    </div>
  </div>

  <div class="col-md-12">
    <div id="nota">
    Cuenta:

      <div id="cuenta">
        <table>
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