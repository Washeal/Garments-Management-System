<?php

if(isset($_POST["btnEdit"])){
    $id=$_POST["txtId"];     
    $obj=Registration::get_registrationss($id);
}
   
?>


    <?php

    if(isset($_POST["btnUpdate"])){

      $id=$_POST["txtId"];
      $name=$_POST["txtName"];
      $country=$_POST["txtCountry"];
      $pasport=$_POST["txtPasport"];
      $gender=$_POST["rdoGender"];
      $email=$_POST["txtEmail"];
      $mobile=$_POST["txtMobile"];
      $comment=$_POST["txtComment"];

	$obj=new Registration($id,$name,$country,$pasport,$gender,$email,$mobile,$comment);
	$obj->update();
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
					
				<form action="Update-reg" class="form-horizontal" method="post">
                <div class="card-body">
                <?php
                    $html="";
                     $html.=input_field(["label"=>"","name"=>"Id","type"=>"hidden","value"=>isset($obj->id)?$obj->id:""]);

                    $html.=input_field(["label"=>"Name","name"=>"Name","type"=>"text","value"=>isset($obj->name)?$obj->name:""]);
					
                    $html.=input_field(["label"=>"Country","name"=>"Country","type"=>"text","value"=>isset($obj->country)?$obj->country:""]);
                    $html.=input_field(["label"=>"Pasport","name"=>"Pasport","type"=>"text","value"=>isset($obj->pasport)?$obj->pasport:""]);
                    

					$optional=[["type"=>"radio","name"=>"rdoGender","value"=>"Male"],
		        	["type"=>"radio","name"=>"rdoGender","value"=>"Female"],
			        ["type"=>"radio","name"=>"rdoGender","value"=>"Others"]];  
			
	               $html.=input_field_redio("Gender",$optional);

                    $html.=input_field(["label"=>"Email","name"=>"Email","type"=>"text","value"=>isset($obj->email)?$obj->email:""]);
                    $html.=input_field(["label"=>"Mobile","name"=>"Mobile","type"=>"text","value"=>isset($obj->mobile)?$obj->mobile:""]);
                    $html.=input_field(["label"=>"Comment","name"=>"Comment","type"=>"text","value"=>isset($obj->comment)?$obj->comment:""]);

		            echo $html;
?>
				  
				  
                                      
                   
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                   <div class="btn-group">
                   <?php
                        $html=input_button(["type"=>"submit","name"=>"Update","value"=>"Update"]);
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
	

	