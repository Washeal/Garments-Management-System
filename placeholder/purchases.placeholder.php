<?php

if($page=="manage-purchase"){
    include("pages/purchase/manage_purchase.php");
    $not_found=0;
  }
  elseif($page=="Create-purchase"){
    include("pages/purchase/create_purchase.php");
    $not_found=0;
  } 

if($page=="manage-saplayer"){
    include("pages/saplayer/manage_saplayer.php");
    $not_found=0;
  }
  elseif($page=="Create-saplayer"){
    include("pages/saplayer/create_saplayer.php");
    $not_found=0;
  } 


?>