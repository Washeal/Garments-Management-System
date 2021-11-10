
	

	
		<!--end breadcrumb-->
 <div class="row">
	<div class="col-xl-11 mx-auto">
		<h6 class="mb-0 text-uppercase">Attendance From</h6>
		 <hr/>
		     <div class="card">
				<div class="card-body">
					
				<form action="search-Attendance" class="form-horizontal" method="post">
                <div class="card-body">
               

				<?php
			
				echo input_field(["label"=>"Search Empolyee","type"=>"number","name"=>"empid"]);
				echo input_field(["label"=>"Date","type"=>"date","name"=>"date"]);

				?>
						
				  
                                      
                   
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                   <div class="btn-group">
                    <?php
                    echo input_button(["type"=>"submit","name"=>"search","value"=>"Search"]);
					
                   
                    ?>   
                  </div>              
                </div>
                <!-- /.card-footer -->
          </form>
   <br>
   <br>
				
				</div>
				<?php
					if(isset($_POST["btnsearch"])){
						$empoloyee_id=$_POST["txtempid"];
						$date=$_POST["txtdate"];
					echo Attendance::search_attentances($empoloyee_id,$date);
					}

                ?>

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
	

	