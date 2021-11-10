<?php

    //Product
    if($page=="manage-order"){
        include("pages/order/manage_order.php");
        $not_found=0;
      }
      elseif($page=="Create-order"){
        include("pages/order/create_order.php");
        $not_found=0;
      }
      elseif($page=="view-order"){
        include("pages/order/view.php");
        $not_found=0;
      }   
      elseif($page=="order-invoice"){
        include("pages/order/order_invoice.php");
        $not_found=0;
      }  

      elseif($page=="manage-Status"){
        include("pages/status/manage_status.php");
        $not_found=0;
      } 
      elseif($page=="create-Status"){
        include("pages/status/create_status.php");
        $not_found=0;
      } 
      
  


?>