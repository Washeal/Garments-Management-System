<?php
   if(isset($_GET["page"])){

       $page=$_GET["page"];
       $not_found=1;
      //  if($page=="home"){
      //     include("pages/defoult.php");
      //  }
    
      include("placeholder/users_placeholder.php");
      include("placeholder/empoloyee_placeholder.php");
      include("placeholder/product_placeholder.php");
      include("placeholder/registration_placeholder.php");
      include("placeholder/order_placeholder.php");

      include("placeholder/purchases.placeholder.php");


      if($page=="home"){
    include("pages/defoult.php");
    $not_found=0;
  }

     

   }
?>