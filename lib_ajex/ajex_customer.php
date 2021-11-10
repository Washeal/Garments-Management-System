<?php

  require_once("../db_config.php");
  require_once("../lib/registrations.php");

  $customer_id=$_POST["cmbCustomer"];
   
  $customer=Registration::get_registration($customer_id);
  echo $customer->mobile."<br>";

?>

