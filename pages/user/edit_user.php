<?php

if(isset($_POST["btnEdit"])){
    $id=$_POST["txtId"];     
    $user=User::get_user($id);
}
   
?>

<?php

  if(isset($_POST["btnUpdate"])){

    $id=$_POST["txtId"];
    $username=$_POST["txtUsername"];
    $password=$_POST["txtPassword"];
    $role_id=$_POST["cmbRole"];


    $_user=new User($id,$role_id,$username,$password);   
    $_user->update();

    echo "<script>window.location='manage-user'</script>";
    
  }


?>	
	
	
	<!--breadcrumb-->
		<?php
		$breadcrumb=[
		
		["url"=>"home.php","name"=>"content","icon"=>"bx-home-alt"]
		
		

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
				
				<form action="edit-user" class="form-horizontal" method="post">
                <div class="card-body">
                   <?php   
                    echo input_field(["label"=>"","name"=>"Id","type"=>"hidden","value"=>isset($user->id)?$user->id:""]);                  
                                  
                   echo Role::html_select_roles(isset($user->role_id)?$user->role_id:0);
                    
                   echo input_field(["label"=>"User Name","name"=>"Username","type"=>"text","placeholder"=>"Enter Username","required"=>"required","value"=>isset($user->username)?$user->username:""]);
                   echo input_field(["label"=>"Password","name"=>"Password","type"=>"password","placeholder"=>"Enter Username","value"=>isset($user->password)?$user->password:""]);                  
                   echo input_field(["label"=>"Retype Password","name"=>"RePassword","type"=>"password","placeholder"=>"Enter Username","value"=>isset($user->password)?$user->password:""]);                  
                                      
                   ?>
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                  <?php
                   echo input_button(["type"=>"submit","name"=>"Update","value"=>"Update User"]);
                   echo input_button(["type"=>"reset","name"=>"Clear","value"=>"Clear"]);
                  ?>                 
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
	

	