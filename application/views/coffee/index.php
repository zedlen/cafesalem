<!DOCTYPE html> 
<html lang="es"> 
  <?php $this->load->view("coffee/include/header"); ?>
	<div class="container">
	  <div class="row">
  	<div class="col-md-4">
      <?php 
        $this->load->view("coffee/tables");
        $this->load->view("coffee/ticket");  
      ?>  			
  		</div>
  		<div class="col-md-8">
  			<?php 
          $this->load->view("coffee/drinks");
          $this->load->view("coffee/food");  
        ?>
  		</div>
		</div>
	</div>
  <?php $this->load->view("coffee/include/footer");?>     
</html> 