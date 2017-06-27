<div class="jumbotron" id="mesas">        
  <div class="radio" class="text-center">
    <?php
      $request=$this->curl->sendGetMethod(base_url().'/index.php/api/general/getTables');
      //echo "$request";   
      $request=json_decode($request);
      if ($request->status) {
             foreach ($request->tables as $key => $value) {
                   echo "<input class='table_radio' type='radio' name='mesa' id='mesa1' value='$value->idMesa'>
           Mesa No.$value->idMesa<br>";
             }
         }   
     ?>  
  </div>
</div>