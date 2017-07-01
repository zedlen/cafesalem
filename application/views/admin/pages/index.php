<section class="content">
        <div class="container-fluid">
            <div class="block-header">
                <h2>DASHBOARD</h2>
            </div>
            <?php
              $today=$this->curl->sendGetMethod(base_url().'/index.php/api/general/getDailyReport');
              $employees=$this->curl->sendGetMethod(base_url().'/index.php/api/general/getEmployees');
              $products=$this->curl->sendGetMethod(base_url().'/index.php/api/general/getProducts');
              $today=json_decode($today); 
              $employees=json_decode($employees); 
              $products=json_decode($products); 
              $today_sold=0; 
              $total_products=0;
              $employee_array=array();
              $product_array=array();   
              if (isset($today->tickets)) {
                  foreach ($today->tickets as $key => $value) {
                       $today_sold=$today_sold+$value->Total;
                       $employee_name=str_replace(" ", "", $value->Empleado);
                       if (isset($employee_array[$employee_name])) {
                           $employee_array[$employee_name]=$employee_array[$employee_name]+1;
                       } else {
                          $employee_array[$employee_name]=0;
                       }
                       foreach ($value->Detalle as $index => $obj) {
                            $product_name=str_replace(" ", "", $obj->Producto);
                            if (isset($product_array[$product_name])) {
                                $product_array[$product_name]=$product_array[$product_name]+(int)$obj->Cantidad;
                            } else {                             
                                $product_array[$product_name]=(int)$obj->Cantidad;
                            }                       
                            $total_products=$total_products+$obj->Cantidad;
                       }
                  }
              }
            ?>

            <!-- Widgets -->
            <div class="row clearfix">
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-cyan hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">shopping_cart</i>
                        </div>
                        <div class="content">
                            <div class="text">Ventas del día</div>
                            <div><i class="material-icons">attach_money</i><span class="number count-to" data-from="0" data-to="<?php echo $today_sold;?>" data-speed="1000" data-fresh-interval="20"></span></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-light-green hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">add_shopping_cart</i>
                        </div>
                        <div class="content">
                            <div class="text">Total vendidos</div>
                            <div class="number count-to" data-from="0" data-to="<?php echo $total_products;?>" data-speed="1000" data-fresh-interval="20"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-orange hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">trending_up</i>
                        </div>
                        <div class="content">
                            <div class="text">+ Vendido</div>
                            <div>
                                <?php 
                                    if (sizeof($product_array)>0) {
                                        $producto=array_search(max($product_array),$product_array);                                    
                                        foreach ($products->products as $key => $value) {                                    
                                            if ($producto==str_replace(" ", "", $value->Nombre)) {
                                                echo "$value->Nombre";
                                                break;
                                            }
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
                    <div class="info-box bg-pink hover-expand-effect">
                        <div class="icon">
                            <i class="material-icons">person</i>
                        </div>
                        <div class="content">
                            <div class="text">Mejor vendedor</div>
                            <div class="number">
                                <?php 
                                    if (sizeof($employee_array)>0) {
                                        $empleado=array_search(max($employee_array),$employee_array);                                    
                                        foreach ($employees->employees as $key => $value) {                                        
                                            if ($empleado==$value->Nombre.$value->ApellidoPaterno.$value->ApellidoMaterno) {
                                                echo "$value->Nombre";
                                                break;
                                            }
                                        }
                                    }
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- #END# Widgets -->
            <div class="row"> 
                <div class="card">
                    <div class="header">Reporte del mes</div>
                    <div class="body">
                        <div id="monthly_report" style="height: 400px; min-width: 100%"></div>
                    </div>
                </div>              
                
            </div>
            <div class="row"> 
                <div class="card">
                    <div class="header">Reporte del año</div>
                    <div class="body">
                        <div id="annual_report" style="height: 400px; min-width: 100%"></div>
                    </div>
                </div>              
                
            </div>
        </div>       
    </section>

           
    