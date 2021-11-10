<?php
  require_once("../db_config.php");
  require_once("../lib/order_class.php");
  require_once("../lib/order_detail.class.php");

 
  $customer_id=$_POST["cmbCustomer"];
  $order_date=$_POST["txtOrderDate"];
  $due_date=$_POST["txtDueDate"];
  $shipping_address=$_POST["txtShippingAddress"];
  $discount=$_POST["txtDiscount"];
  $vat=$_POST["txtVat"];
  $products=$_POST["txtProducts"];
 
 
  // $order_date=date("Y-m-d",strtotime($order_date));
  // $due_date=date("Y-m-d",strtotime($due_date));

  $order=new Order("",$customer_id,$order_date,$shipping_address,$discount,$vat,$due_date);
  $order_id=$order->save(); 
  
 

  
  
  foreach($products as $product){
    
    $orderdetails=new Order_detail("",$order_id,$product["item_id"],$product["price"],$product["qty"],$product["discount"]);
    $orderdetails->save();
  }

  print_r($products);



?>