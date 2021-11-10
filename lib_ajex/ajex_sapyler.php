<?php

  require_once("../db_config.php");
  require_once("../lib/saplayer.class.php");

  $customer_id=$_POST["cmbSapayer"];
   
  $customer=Saplayer::get_saplayer($customer_id);
  echo $customer->country."<br>";

?>