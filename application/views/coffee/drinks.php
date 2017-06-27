      <div class="jumbotron" id="bebidas">
        <?php
          $cat=$this->curl->sendGetMethod(base_url().'/index.php/api/bebidas/getCat');
          //echo "$request";   
          $cat=json_decode($cat);
          $select="<small><select id='drink_category_select' class='form_control select_category drink'>";
          $select=$select."<option value='0'>--Todas las Categorias--</option>";
          foreach ($cat->cat as $key => $value) {
            $select=$select."<option value='$value->idCategoria'>$value->Nombre</option>";
          }
          $select=$select."</select></small>";
        ?>
        <h2>Bebidas:<?php echo "$select"; ?></h2>
        <?php
          $request=$this->curl->sendGetMethod(base_url().'/index.php/api/bebidas/getAll');
          //echo "$request";   
          $request=json_decode($request);
          if ($request->status) {
            foreach ($request->drinks as $key => $value) {
              ?>
                <div class="btn-group drinks drink_category_<?php echo "$value->Categoria";?>">
                  <button type="button" class="btn  btn-lg dropdown-toggle botones" data-toggle="dropdown">
                    <?php echo "$value->Nombre";?>
                  <span class="caret"></span>
                  </button>
                  <ul class="dropdown-menu">
                    <li><a href="#">Chico</a></li>
                    <li><a href="#">Mediano</a></li>
                    <li><a href="#">Grande</a></li>
                    
                  </ul>
                </div>
              <?php
            }   
          }
         ?>

      </div>