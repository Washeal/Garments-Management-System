<?php
      if(isset($_POST["btnView"])){
            $order_id=$_POST["txtId"];
            $o=Order::get_order($order_id);
            //$obj=Order_detail::view_orderdetail($order_id);
            $cus=Registration::gets_registrations($o->customer_id);
      }
?>
<div class="container-fluid">
  <div class="wrapper">
    <!-- Main content -->
    <section class="invoice">
      <!-- title row -->
      <div class="row">
        <div class="col-12">
          <h2 class="page-header">
            <i class="fas fa-globe" style="color:blue"></i>INVOICE
           
          </h2>
        </div>
        <!-- /.col -->
      </div>
      <!-- info row -->
      <div class="row invoice-info">
        <div class="col-sm-4 invoice-col">
          From
          <address>
            <b>Amdash</b><br>
            795 Folsom Ave, Suite 600<br>
            San Francisco, CA 94107<br>
            Phone: (804) 123-5432<br>
            Email: 359.swapna@gmail.com
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          To
          <address>
          <b>Name:</b> <?php echo $cus->name ;?> <br>
         <b>Mobile:</b> <?php echo $cus->mobile;?> <br>
          <b>Email:</b> <?php echo $cus->email; ?>
          </address>
        </div>
        <!-- /.col -->
        <div class="col-sm-4 invoice-col">
          
          <b>Order ID: </b><?php echo $order_id?><br>
          <b>Order Date: </b><?php echo $o->order_date?><br>
          <b>Customer ID:</b> <?php echo $o->due_date?>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <!-- Table row -->
      <div class="row">
        <div class="col-12 table-responsive">
            <?php
              //echo Order_detail::view_orderdetail($order_id);

              echo Order_detail::get_order_details($order_id);
            ?>
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

      <div class="row">
        <!-- accepted payments column -->
        <div class="col-4">
          <p class="lead">Payment Methods:</p>
                    <img src="assets/credit/visa.png" alt="Visa">
                    <img src="assets/credit/mastercard.png" alt="Mastercard">
                    <img src="assets/credit/american-express.png" alt="American Express">
                    <img src="assets/credit/paypal2.png" alt="Paypal">

        
        </div>
        <!-- /.col -->
        <div class="col-8">
          <p class="lead">Date: <?php echo date("d M Y")?></p>

          <div class="table-responsive">
            <table class="table">
              <tr>
                <th style="width:50%">Subtotal:</th>
                <td><?php //echo $o->order_total;?></td>
              </tr>
              <tr>
                <th>Tax (5%)</th>
                <td><?php //echo $o->order_total*.05 ?></td>
              </tr>
              <tr>
                <th>Shipping:</th>
                <td>$5.80</td>
              </tr>
              <tr>
                <th>Total:</th>
                <td>$265.24</td>
              </tr>
            </table>
          <!-- </div>
          <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
        </div> -->
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <button type="button" class="btn btn-success float-laft" onclick="window.print()"> Print </button>
    </section>
    <!-- /.content -->
  </div>
  
</div>
<!-- <script>
  window.addEventListener("load", window.print());
</script> -->