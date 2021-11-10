<?php

 

if(isset($_POST["btnCreate"])){
	$emp_name=$_POST["txtEmp_name"];
$nid=$_POST["txtNid"];
$present_address=$_POST["txtPresent_address"];
$permanent_address=$_POST["txtPermanent_address"];
$edu_qulification=$_POST["txtEdu_qulification"];
$depertment_id=$_POST["cmbdepertment"];
$designation_id=$_POST["cmbdesignation"];
$gender=$_POST["rdoGender"];
$email=$_POST["txtEmail"];
$phone=$_POST["txtPhone"];
$joining_date=$_POST["txtJoining_date"];
$created_at=$_POST["txtCreated_at"];

	$obj=new Empoloyees("",$emp_name,$nid,$present_address,$permanent_address,$edu_qulification,$depertment_id,$designation_id,$gender,$email,$phone,$joining_date,$created_at);
	if($obj->save()){
		echo "successs fully save";
	}else{
		echo "save Failled";
	}
	

	


	echo "<script>window.location='manage-empolee'</script>";

  }


?>	
	
	
	<!--breadcrumb-->
		<?php
		$breadcrumb=[
		
		["url"=>"home","name"=>"content","icon"=>"bx-home-alt"]
		
		

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
		<h6 class="mb-0 text-uppercase">Empoylee From</h6>
		 <hr/>
		     <div class="card">
				<div class="card-body">
					
				<form action="Create-Empoyee" class="form-horizontal" method="post">
                <div class="card-body">
                   <?php                   
          
				   
			$html="";
			$html.=input_field(["label"=>"Empoylee Name","name"=>"Emp_name","type"=>"text"]);
			$html.=input_field(["label"=>"NID NO","name"=>"Nid","type"=>"text"]);
			$html.=input_field(["label"=>"Present Address","name"=>"Present_address","type"=>"text"]);
			$html.=input_field(["label"=>"Permanent Address","name"=>"Permanent_address","type"=>"text"]);
			$html.=input_field(["label"=>"Edu Qulification","name"=>"Edu_qulification","type"=>"text"]);
			$html.=Depertment::html_select_depertment();
			$html.=desiganation::html_select_desiganation();

			$optional=[["type"=>"radio","name"=>"rdoGender","value"=>"Male"],
			["type"=>"radio","name"=>"rdoGender","value"=>"Female"],
			["type"=>"radio","name"=>"rdoGender","value"=>"Others"]];  
			
	        $html.=input_field_redio("Gender",$optional);
			
			$html.=input_field(["label"=>"Email","name"=>"Email","type"=>"text"]);
			$html.=input_field(["label"=>"Phone","name"=>"Phone","type"=>"text"]);
			$html.=input_field(["label"=>"Joining Date","name"=>"Joining_date","type"=>"date"]);
			$html.=input_field(["label"=>"Created At","name"=>"Created_at","type"=>"time"]);

		echo $html;
?>
				  
				  
                                      
                   
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                   <div class="btn-group">
                    <?php
                    echo input_button(["type"=>"submit","name"=>"Create","value"=>"Create Empoyee"]);
                    echo input_button(["type"=>"reset","name"=>"Clear","value"=>"Clear"]);
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
	

	