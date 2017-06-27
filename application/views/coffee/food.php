<div class="jumbotron" id="alimentos">
	<?php
	  $select="";
	  $cat=$this->curl->sendGetMethod(base_url().'/index.php/api/comida/getCat');
	  //echo "$request";   
	  $cat=json_decode($cat);
	  $select="<small><select id='food_category_select' class='form_control select_category food'>";
	  $select=$select."<option value='0'>--Todas las Categorias--</option>";
	  foreach ($cat->cat as $key => $value) {
	    $select=$select."<option value='$value->idCategoria'>$value->Nombre</option>";
	  }
	  $select=$select."</select></small>";
	?>
    <h2>Alimentos:<?php echo $select;?></h2>
    <?php
      $request=$this->curl->sendGetMethod(base_url().'/index.php/api/comida/getAll');
      //echo "$request";   
      $request=json_decode($request);
      foreach ($request->food as $key => $value) {
            echo "<button type='button' class='btn btn-lg botones foods food_category_$value->Categoria'>$value->Nombre</button>";
      }   
     ?>    
</div>