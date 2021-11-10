<div class="nav-container">
			<div class="mobile-topbar-header">
				<div>
					<img src="assets/images/logo-icon.png" class="logo-icon" alt="logo icon">
				</div>
				<div>
					<h4 class="logo-text">WAYASEL</h4>
				</div>
				<div class="toggle-icon ms-auto"><i class='bx bx-arrow-to-left'></i>
				</div>
			</div>
			<nav class="topbar-nav">
				<ul class="metismenu" id="menu">

	 <li>
<?php
 
	
	   
	   echo nav_links_dropdown("Dashbord","Dashbord","bx bx-donate-blood");
			
?>           
 	</li>
	 <li>
<?php
 
	$options=[

			 ["url"=>"manage-role","value"=>"Manage Role","css"=>"bx bx-right-arrow-alt"],           
		     ["url"=>"manage-user","value"=>"Manage User","css"=>"bx bx-right-arrow-alt"]
			
		   
	       ];
	   
	   echo nav_links_dropdown("#","USER","bx bx-donate-blood",$options); 
			
?>           
 	</li>
	 <li>
<?php
 
	$options=[
	     	["url"=>"manage-empolee","value"=>"Manage Empoloyee","css"=>"bx bx-right-arrow-alt"],
			 ["url"=>"manage-designation","value"=>"Manage designation","css"=>"bx bx-right-arrow-alt"],
			 ["url"=>"manage-Depertment","value"=>"Manage Depertment","css"=>"bx bx-right-arrow-alt"],
			 ["url"=>"Manage-Attendance","value"=>"Manage Attendance","css"=>"bx bx-right-arrow-alt"],
			 ["url"=>"search-Attendance","value"=>"Search-Attendance","css"=>"bx bx-right-arrow-alt"]
			         
		    
			
		   
	       ];
	   
	   echo nav_links_dropdown("#","HR","bx bx-donate-blood",$options); 


			
?>           
 	</li>  
	             
	       

	 <li>
<?php
 
 $options=[
	["url"=>"manage-order","value"=>"Manage Order","css"=>"fas fa-dolly"],
	["url"=>"manage-Status","value"=>"Manage Status","css"=>"fas fa-boxes"],
	["url"=>"manage-registration","value"=>"Buyer Info","css"=>"fas fa-dolly"],
	["url"=>"manage-sampol","value"=>"Sampols","css"=>"fas fa-boxes"]
	
         
   ];
  echo nav_links_dropdown("#","Order","bx bx-lock",$options); ?>           
 
          
 	</li>

	 <li>
<?php
 
 $options=[
	["url"=>"manage-purchase","value"=>"Manage purchase","css"=>"fas fa-dolly"],
	["url"=>"manage-saplayer","value"=>"Manage Saplayer","css"=>"fas fa-dolly"]
	
	
         
   ];
  echo nav_links_dropdown("#","Purchases","bx bx-lock",$options); ?>           
 
          
 	</li>
					
				</ul>
			</nav>
		</div>