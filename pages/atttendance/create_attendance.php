<?php

  if(isset($_POST["btnCreate"])){

    $empname=$_POST["cmbempoly"];
    $intime=$_POST["txtIntime"];
    $outtime=$_POST["txtOuttime"];
    $presentdate=$_POST["txtPresentdate"];
    $user=new Attendance("",$empname,$intime,$outtime,$presentdate);
 
	$user->save();

	echo "<script>window.location='Manage-Attendance'</script>";
 
  }


?>	
	
	
	<!--breadcrumb-->
		<?php
		$breadcrumb=[
		
		["url"=>"home","name"=>"Attendance","icon"=>"bx-home-alt"]
		
		

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
		<h6 class="mb-0 text-uppercase">Column Chart</h6>
		 <hr/>
		     <div class="card">
				<div class="card-body">
					
				<form action="Create-Attendance" class="form-horizontal" method="post">
                <div class="card-body">
                   <?php                   
                  
				   echo Attendance::html_select_attendance();
                   echo input_field(["label"=>"In Time","name"=>"Intime","type"=>"time","placeholder"=>"Enter Username","required"=>"required"]);                  
                   echo input_field(["label"=>"Out Time","name"=>"Outtime","type"=>"time","placeholder"=>"Enter Username","required"=>"required"]);
                   echo input_field(["label"=>"Present Date","name"=>"Presentdate","type"=>"date","placeholder"=>"Enter Username","required"=>"required"]);                  
                                              
				  
                                      
                   ?>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                   <div class="btn-group">
                    <?php
                    echo input_button(["type"=>"submit","name"=>"Create","value"=>"Create Attendance"]);
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
	

	