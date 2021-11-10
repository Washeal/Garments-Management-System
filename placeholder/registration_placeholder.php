<?php

    //registration
    if($page=="manage-registration"){
        include("pages/registutrations/manage_buyer.php");
        $not_found=0;
      }
      elseif($page=="create-registration"){
        include("pages/registutrations/create_buyer.php");
        $not_found=0;
      }  
      elseif($page=="Update-reg"){
        include("pages/registutrations/edit_reg.php");
        $not_found=0;
      }
     
  


?>