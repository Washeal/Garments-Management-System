<?php

    //empolee
if($page=="manage-empolee"){
    include("pages/empoloyee/manage_empoyee.php");
    $not_found=0;
  }
  elseif($page=="Create-Empoyee"){
    include("pages/empoloyee/create_empoyees.php");
    $not_found=0;
  }  
  elseif($page=="Update-Employee"){
    include("pages/empoloyee/update_employee.php");
    $not_found=0;
  } 
  //designation
  elseif($page=="manage-designation"){
    include("pages/desiganation/manage_desiganation.php");
    $not_found=0;
  }
  elseif($page=="create-designation"){
    include("pages/desiganation/create_desiganation.php");
    $not_found=0;
  }   //Depertment
  elseif($page=="manage-Depertment"){
    include("pages/depertment/manage_depertment.php");
    $not_found=0;
  }
  elseif($page=="Create-Depertment"){
    include("pages/depertment/create_depertment.php");
    $not_found=0;
  }
     //Attendance
     elseif($page=="Manage-Attendance"){
      include("pages/atttendance/manage_attandance.php");
      $not_found=0;
    }
    elseif($page=="Create-Attendance"){
      include("pages/atttendance/create_attendance.php");
      $not_found=0;
    }

    elseif($page=="Update-Attendance"){
      include("pages/atttendance/update_attendance.php");
      $not_found=0;
    }
    elseif($page=="search-Attendance"){
      include("pages/atttendance/search_attendance.php");
      $not_found=0;
    }
  
  

?>