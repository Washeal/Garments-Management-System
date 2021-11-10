<?php
if(isset($_POST["btnEdit"])){
	$employee_id=$_POST["txtId"];
	$obj=Empoloyees::get_employee($employee_id);
}






if(isset($_POST["btnUpdate"])){

$id=$_POST["txtId"];
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

$obj=new Empoloyees($id,$emp_name,$nid,$present_address,$permanent_address,$edu_qulification,$depertment_id,$designation_id,$gender,$email,$phone,$joining_date,$created_at);
	$obj->update();
    
	echo "<script>window.location='manage-empolee'</script>";

}
?>
	

	
		<!--end breadcrumb-->
 <div class="row">
	<div class="col-xl-11 mx-auto">
		<h6 class="mb-0 text-uppercase">Column Chart</h6>
		 <hr/>
		     <div class="card">
				<div class="card-body">
					
				<form action="Update-Employee" class="form-horizontal" method="post">
                <div class="card-body">
                   <?php                   
                             
                 
                  
				 

				   
			$html="";
            $html.=input_field(["type"=>"hidden","name"=>"Id","value"=>isset($obj->id)?$obj->id:""]); 
    
			$html.=input_field(["label"=>"Empoylee Name","name"=>"Emp_name","type"=>"text","value"=>isset($obj->emp_name)?$obj->emp_name:""]);
			$html.=input_field(["label"=>"NID NO","name"=>"Nid","type"=>"text","value"=>$obj->nid]);
			$html.=input_field(["label"=>"Present Address","name"=>"Present_address","type"=>"text","value"=>$obj->present_address]);
			$html.=input_field(["label"=>"Permanent Address","name"=>"Permanent_address","type"=>"text","value"=>$obj->permanent_address]);
			$html.=input_field(["label"=>"Edu Qulification","name"=>"Edu_qulification","type"=>"text","value"=>$obj->edu_qulification]);
			$html.=Depertment::html_select_depertment(isset($obj->depertment_id)?$obj->depertment_id:0);
			$html.=desiganation::html_select_desiganation(isset($obj->desiganation_id)?$obj->desiganation_id:0);

			$optional=[["type"=>"radio","name"=>"rdoGender","value"=>"Male"],
			["type"=>"radio","name"=>"rdoGender","value"=>"Female"],
			["type"=>"radio","name"=>"rdoGender","value"=>"Others"]];  
			
	        $html.=input_field_redio("Gender",$optional);
			
			$html.=input_field(["label"=>"Email","name"=>"Email","type"=>"text","value"=>$obj->email]);
			$html.=input_field(["label"=>"Phone","name"=>"Phone","type"=>"text","value"=>$obj->phone]);
			$html.=input_field(["label"=>"Joining Date","name"=>"Joining_date","type"=>"date","value"=>$obj->joining_date]);
			$html.=input_field(["label"=>"Created At","name"=>"Created_at","type"=>"time","value"=>$obj->created_at]);

		
		   echo $html;
?>
				  
				  
                                      
                   
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                   <div class="btn-group">
				  
                    <?php

                    echo input_button(["type"=>"submit","name"=>"Update","value"=>"Update Empoyee"]);
                  
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
	

	