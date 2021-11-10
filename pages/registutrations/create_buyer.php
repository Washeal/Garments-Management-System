<?php
if(isset($_POST["btnCreate"])){
	$name=$_POST["txtName"];
$country=$_POST["txtCountry"];
$pasport=$_POST["txtPasport"];
$gender=$_POST["rdoGender"];
$email=$_POST["txtEmail"];
$mobile=$_POST["txtMobile"];
$comment=$_POST["txtComment"];

	$obj=new Registration("",$name,$country,$pasport,$gender,$email,$mobile,$comment);
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
					
				<form action="create-registration" class="form-horizontal" method="post">
                <div class="card-body">
                <?php
                    $html="";
                    $html.=input_field(["label"=>"Name","name"=>"Name","type"=>"text"]);
					
                    $html.=input_field(["label"=>"Country","name"=>"Country","type"=>"text"]);
                    $html.=input_field(["label"=>"Pasport","name"=>"Pasport","type"=>"text"]);
                    

					$optional=[["type"=>"radio","name"=>"rdoGender","value"=>"Male"],
		        	["type"=>"radio","name"=>"rdoGender","value"=>"Female"],
			        ["type"=>"radio","name"=>"rdoGender","value"=>"Others"]];  
			
	               $html.=input_field_redio("Gender",$optional);

                    $html.=input_field(["label"=>"Email","name"=>"Email","type"=>"text"]);
                    $html.=input_field(["label"=>"Mobile","name"=>"Mobile","type"=>"text"]);
                    $html.=input_field(["label"=>"Comment","name"=>"Comment","type"=>"text"]);

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
	

	