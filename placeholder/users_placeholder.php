<?php

if($page=="content"){
    include("pages/content.php");
}
 elseif($page=="profile"){
    include("profile.php");
    $not_found=0;
  } 
    elseif($page=="Dashbord"){
      include("pages/defoult.php");
      $not_found=0;
  } 
    elseif($page=="create-user"){
    include("pages/user/create_user.php");
    $not_found=0;
    }
    elseif($page=="manage-user"){
        include("pages/user/manage.user.php");
        $not_found=0;
    } 
    elseif($page=="manage-role"){
        include("pages/role/manage_roll.php");
        $not_found=0;
      }
      elseif($page=="create-role"){
        include("pages/role/create_role.php");
        $not_found=0;
      }
      elseif($page=="edit-user"){
        include("pages/user/edit_user.php");
        $not_found=0;
      }


?>