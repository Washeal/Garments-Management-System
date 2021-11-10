<?php
if(isset($_POST["btnCreate"])){
	$saplayer_id=$_POST["cmbSaplayer"];
$parces_date=$_POST["txtParces_date"];
$delebery_date=$_POST["txtDelebery_date"];

	$obj=new Purchase("",$saplayer_id,$parces_date,$delebery_date);
	$obj->save();
}
?>

<section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> Amdash.
                    <small class="float-right">Date: <?php echo date("d M Y")?></small>
                  </h4>
                </div>
                <!-- /.col -->
              </div>
              <!-- info row -->
              <div class="row invoice-info">
                <div class="col-sm-4 invoice-col">
                  From
                  <address>
                    <strong>Amdash, Inc.</strong><br>
                    House:12, Road:1<br>
                    Block:E<br>
                    Mobile: 017834433<br>
                    Email: info@ishop.com
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                  To
                  <address>
                    <?php
                      echo Saplayer::saplayer_selectbox();
                    ?>
                   <div class="customer-info"></div>
                  </address>
                </div>
                <!-- /.col -->
                <div class="col-sm-4 invoice-col">
                 
                  <table>
                    <tr><td><b>Purchase No:</b></td><td><input type="text" style="width:60px" value="<?php echo Purchase::getLastpurchasesId()+1;?>"  readonly/></td></tr>
                    <tr><td><b>Purchase Date:</b></td><td><input type="date" id="txtOrderDate" value=<?php echo date("d-m-Y");?> /></td></tr>
                    <tr><td><b>Delivery Date:</b></td><td><input type="date" id="txtDueDate" value=<?php echo date("d-m-Y");?> /></td></tr>
                   
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- Table row -->
              <div class="row">
                <div class="col-12 table-responsive">
                  <table class="table table-striped">
                    <thead>
                    <tr>
                      <th>SN</th>
                      <th>Product</th>
                      <th>Price</th>
                      <th>Qty</th>                     
                      <th>Discount</th>
                      <th>Subtotal</th>
                      <th><input type="button" id="clearAll" value="Clear" /></th>
                    </tr>
                    <tr>
                      <th></th>
                      <th>
                        <?php
                          echo Sample::get_selectbox();
                       ?>
                      </th>
                        <th><input type="text" id="txtPrice" /></th>
                        <th><input type="text" id="txtQty" /></th>
                        <th><input type="text" id="txtDiscount" /></th>
                        <th></th>
                        <th><input type="button" id="btnAddToCart" value=" + " /></th>
                      </tr>
                    </thead>
                    <tbody  id="items">                    
                   
                    </tbody>
                  </table>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <div class="row">
                <!-- accepted payments column -->
                <div class="col-6">
                  

                
                </div>
                <!-- /.col -->
                <div class="col-6">
                  <p class="lead">Amount Due 2/22/2014</p>

                  <div class="table-responsive">
                    <table class="table">
                      <tbody>
                     <tr>
                        <th style="width:50%">Subtotal:</th>
                        <td id="subtotal">0</td>
                      </tr>
                      <tr>
                        <th>Tax (5%)</th>
                        <td id="tax">0</td>
                      </tr>
                      <tr>
                        <th>Shipping:</th>
                        <td id="shopping-cost">0</td>
                      </tr>
                      <tr>
                        <th>Total:</th>
                        <td id="net-total">0</td>
                      </tr>
                    </tbody></table>
                  </div>
                </div>
                <!-- /.col -->
              </div>
              <!-- /.row -->

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="invoice-print.html" rel="noopener" target="_blank" class="btn btn-default"><i class="fas fa-print"></i> Print</a>
                  <button type="button" id="btnProcessOrder" class="btn btn-success float-right"><i class="far fa-credit-card"></i> Process Order </button>
                 
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>

    <script>
      $(function() {  
        
        printCart();


        $("#btnProcessOrder").on("click",function(){
       
         
              let customer_id=$("#cmbSaplayer").val();
            
              let order_date=$("#txtOrderDate").val();
              let due_date=$("#txtDueDate").val();
             
              let products=JSON.parse(localStorage.getItem("cart"));

              $.ajax({
                url:'lib_ajex/ajex_create_purchase.php',
                type:'POST',
                data:{
                  "cmbSaplayer":customer_id,
                  "txtOrderDate":order_date,
                  "txtDueDate":due_date,
                  
                 "txtProducts":products
                },
                success:function(res){
                  console.log(res);
                  clearCart();
                }
            });


        });

        // $("#txtOrderDate").datepicker({dateFormat: 'dd-mm-yy'});
        // $("#txtDueDate").datepicker({dateFormat: 'dd-mm-yy'});

        $("#cmbSaplayer").on("change",function(){
           $.ajax({
             url:'lib_ajex/ajex_sapyler.php',
             type:'POST',
             data:{"cmbSapayer":$(this).val()},
             success:function(res){
               $(".customer-info").html(res);;
             }
           });
        });      
       

        $("#btnAddToCart").on("click",function(){

          // alert();
        
            let item_id=$("#cmbProduct").val(); 
            let name=  $("#cmbProduct option:selected").text();          
            let price=$("#txtPrice").val();
            let qty=$("#txtQty").val();
            let discount=$("#txtDiscount").val();

            let subtotal=price*qty-discount;

             let item={"name":name,"item_id":item_id,"price":price,"qty":parseFloat(qty),"discount":discount,"subtotal":qty*price-discount};
           
            
            save(item);         

             printCart();          
                        
          
        });
       

        $("body #items").on("dblclick","tr td",function(){         
           $(this).attr('contentEditable',true);
        });

        $("body #items").on("input","tr td",function(){  
         
          let index=$(this).parent().data("id"); 
           //alert(index);
           if($(this).attr('contentEditable')){
                                  
             let field=$(this).data("field"); 
             let value=$(this).text();            
             
             if(field=="price"){
                //updatePrice(index,value);
              }else if(field=="qty"){
               // updateQty(index,value);
              }else if(field=="discount"){
               // updateDiscount(index,value);
              }
            
            
           }

        });

        $("body").on("click",".delete",function(){
           let id=$(this).data("id");          
          // deleteItem(index);
           delItem(id)
           printCart();
        });
     
        $("#clearAll").on("click",function(){
          clearCart();
        });

        //------------------Functions----------

      


      function printCart(){
          let cart= localStorage.getItem("cart");
             cart=JSON.parse(cart);
           let sn=1;          
           let $bill="";  
           let subtotal=0;
           $.each(cart,function(i,item){
                //console.log(item.name);
             subtotal+=item.price*item.qty-item.discount;
              let $html="<tr>";            
             $html+="<td>";
             $html+=sn;
             $html+="</td>";
             $html+="<td>";
             $html+=item.name;
             $html+="</td>";
             $html+="<td data-field='price'>";
             $html+=item.price;
             $html+="</td>";
             $html+="<td data-field='qty'>";
             $html+=item.qty;
             $html+="</td>";
             $html+="<td data-field='discount'>";
             $html+=item.discount;
             $html+="</td>";
             $html+="<td data-field='subtotal'>";
             $html+=item.subtotal;
             $html+="</td>";
             $html+="<td>";
             $html+="<input type='button' class='delete' data-id='"+item.item_id+"' value='-'/>";
             $html+="</td>";
             $html+="</tr>";
             $bill+=$html;
             sn++;
           });      
                      
           $("#items").html($bill); 

           //Order Summary
           $("#subtotal").html(subtotal);
           let tax=(subtotal*0.05).toFixed(2);
           $("#tax").html(tax);
           $("#net-total").html(parseFloat(subtotal)+parseFloat(tax));
        }


       function save(item){
          let cart= localStorage.getItem("cart");
          if(cart!=null){
            if(!itemExists(item.item_id)){
              cart=JSON.parse(cart);
              cart.push(item);
              localStorage.setItem("cart", JSON.stringify(cart));
            }else{
              QtyUp(item.item_id,item.qty);
            }
          }else{
            cart=[];
            cart.push(item);
            localStorage.setItem("cart", JSON.stringify(cart));
          }
       }


       function QtyUp(id,qty){
          console.log(id)
          let cart= localStorage.getItem("cart");
          if(cart!=null){
            cart=JSON.parse(cart);   
            let tmp=[];  
            $.each(cart,function(i,item){
               if(id==item.item_id){
                 item.qty+=qty;
                 console.log(item);
                 tmp.push(item);
               }else{
                 tmp.push(item);
               }
            });  
            
            localStorage.setItem("cart", JSON.stringify(tmp));
          }
       }

       function itemExists(id){
          let found=0;
          let cart= localStorage.getItem("cart");
          if(cart!=null){
            cart=JSON.parse(cart);                   
            $.each(cart,function(i,item){
               if(id==item.item_id){
                found=1;                
               }
            });          
          }else{
            found=0;
          }

          return found;
       }

       function delItem(id){
          let cart= localStorage.getItem("cart");
          if(cart!=null){
            cart=JSON.parse(cart);   
            let tmp=[];         
            $.each(cart,function(i,item){
               if(id!=item.item_id){
                tmp.push(item);
               }
            });
            localStorage.setItem("cart",JSON.stringify(tmp));
          }
       }



       function clearCart(){
            localStorage.removeItem("cart");
            cart=[];            
            localStorage.setItem("cart", JSON.stringify(cart));
            printCart();
       }

      


      });
  </script>