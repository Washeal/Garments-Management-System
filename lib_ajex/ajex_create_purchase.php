<?php
  require_once("../db_config.php");
  require_once("../lib/purchase.class.php");
  require_once("../lib/purc_detail.class.php");

 
  $cmbSapayer_id=$_POST["cmbSaplayer"];
  $order_date=$_POST["txtOrderDate"];
  $due_date=$_POST["txtDueDate"];
  
 $products=$_POST["txtProducts"];
 
  $order=new Purchase("",$cmbSapayer_id,$order_date,$due_date);
  $order_id=$order->save(); 
  
 
  foreach($products as $product){
    
  $orderdetails=new Purc_detail("",$order_id,$product["item_id"],$product["price"],$product["qty"],$product["discount"]);
    $orderdetails->save();
  }

  print_r($products);



?>