<?php
if(isset($_POST["btnEdit"])){
	$attendance_id=$_POST["txtId"];
	$obj=Attendance::get_attendances($attendance_id);
}
if(isset($_POST["btnUpdate"])){
	$attendance_id=$_POST["txtId"];
	$empoloyee_id=$_POST["cmbempoly"];
	$in_time=$_POST["txtIn_time"];
	$out_time=$_POST["txtOut_time"];
	$present_date=$_POST["txtPresent_date"];

	$obj=new Attendance($attendance_id,$empoloyee_id,$in_time,$out_time,$present_date);
	$obj->update();

	echo "<script>window.location='Manage-Attendance'</script>";
}
?>
	

	
		<!--end breadcrumb-->
 <div class="row">
	<div class="col-xl-11 mx-auto">
		<h6 class="mb-0 text-uppercase">Attendance From</h6>
		 <hr/>
		     <div class="card">
				<div class="card-body">
					
				<form action="Update-Attendance" class="form-horizontal" method="post">
                <div class="card-body">
               

 <?php
        $html="";
        $html.=input_field(["type"=>"hidden","name"=>"Id","value"=>isset($obj->id)?$obj->id:""]);
        $html.=Attendance::html_select_attendance(isset($obj->empoloyee_id)?$obj->empoloyee_id:0);
        $html.=input_field(["label"=>"In_time","type"=>"text","name"=>"In_time","value"=>isset($obj->in_time)?$obj->in_time:""]);
        $html.=input_field(["label"=>"Out_time","type"=>"text","name"=>"Out_time","value"=>isset($obj->out_time)?$obj->out_time:""]);
        $html.=input_field(["label"=>"Present_date","type"=>"text","name"=>"Present_date","value"=>isset($obj->present_date)?$obj->present_date:""]);

		echo $html;
?>
				  
				  
                                      
                   
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                   <div class="btn-group">
                    <?php
                    echo input_button(["type"=>"submit","name"=>"Update","value"=>"Update Empoyee"]);
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
	

	