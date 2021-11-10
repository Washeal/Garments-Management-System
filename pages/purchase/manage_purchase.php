<?php
if(isset($_POST["btnDelete"])){
	$purchase_id=$_POST["txtId"];
	Purchase::delete($purchase_id);}
?>


    <!-- Main content -->
    <section class="content">     
     <div class="card">
      <div class='card-header'>
				<a href='Create-purchase' class='btn btn-success'>New Purchase</a>
			</div>
				<div class='card-body'>
		<?php
			echo Purchase::manage_purchases();
		?>
			</div>
    <div class="card-footer">
      &nbsp;
    </div>
</div>

</section>
    <!-- /.content -->