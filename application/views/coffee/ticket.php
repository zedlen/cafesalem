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
          <tr>
            <td>Producto</td>
            <td>$</td>
          </tr>

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