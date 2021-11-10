<?php
if(isset($_POST["btnCreate"])){
	$order_id=$_POST["cmbOrder"];
$sampol_id=$_POST["cmbSampol"];
$price=$_POST["txtPrice"];
$utc=$_POST["txtUtc"];
$quantity=$_POST["txtQuantity"];
$discount=$_POST["txtDiscount"];
$size_id=$_POST["cmbSize"];
$colour_id=$_POST["cmbColour"];

	$obj=new Order_detail("",$order_id,$sampol_id,$price,$utc,$quantity,$discount,$size_id,$colour_id);
	$obj->save();
}
?>
	
	
	<!--breadcrumb-->
		<?php
		$breadcrumb=[
		
		["url"=>"home","name"=>"Registration From","icon"=>"bx-home-alt"]
		
		

		];

		
		echo  page_header("Home",$breadcrumb);
		?>
			<div class="ms-auto">
				<div class="btn-group">
					<button type="button" class="btn btn-primary">Settings</button>
					<button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
					</button>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end"><a class="dropdown-item" href="javascript:;">Action</a>
						<a class="dropdown-item" href="javascript:;">Another action</a>
						<a class="dropdown-item" href="javascript:;">Something else here</a>
					
					</div>
				</div>
			</div>
		</div>
		<!--end breadcrumb-->
 <div class="row">
	<div class="col-xl-11 mx-auto">
		<h6 class="mb-0 text-uppercase"></h6>
		 <hr/>
		     <div class="card">
				<div class="card-body">
					
				<form action="Create-order" class="form-horizontal" method="post">
                <div class="card-body">
<?php
            $html="";
            $html.=select_field(["label"=>"Order","name"=>"cmbOrder","table"=>"orders"]);
            $html.=select_field(["label"=>"Sampol","name"=>"cmbSampol","table"=>"sampols"]);
            $html.=input_field(["label"=>"Price","name"=>"Price"]);
            $html.=input_field(["label"=>"Utc","name"=>"Utc"]);
            $html.=input_field(["label"=>"Quantity","name"=>"Quantity"]);
            $html.=input_field(["label"=>"Discount","name"=>"Discount"]);
            $html.=select_field(["label"=>"Size","name"=>"cmbSize","table"=>"sizes"]);
            $html.=select_field(["label"=>"Colour","name"=>"cmbColour","table"=>"colours"]);

		    echo $html;
?>
				  
				  
                                      
                   
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                   <div class="btn-group">
                   <?php
                        $html=input_button(["type"=>"submit","name"=>"Create","value"=>"Create"]);
                            echo $html;
                    ?>  
                  </div>              
                </div>
                <!-- /.card-footer -->
          </form>

				
				</div>
				
			</div>
		</div>
		<!--end row-->
	</div>

		<!--end page wrapper -->
		<!--start overlay-->
		<div class="overlay toggle-icon"></div>
		<!--end overlay-->
		<!--Start Back To Top Button--> <a href="javaScript:;" class="back-to-top"><i class='bx bxs-up-arrow-alt'></i></a>
		<!--End Back To Top Button-->
	

	