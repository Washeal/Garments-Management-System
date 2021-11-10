

        jquery("#btnProcessOrder").on("click",function(){
              let customer_id=jquery("#cmbCustomer").val();

			           alert(customer_id);

            });


		$("#txtOrderDate").datepicker({dateFormat: 'dd-mm-yy'});
        $("#txtDeleberyDate").datepicker({dateFormat:'dd-mm-yy'});

        $("#cmbCustomer").on("change",function(){
           $.ajax({
             url:'lib_ajex/ajex_customer.php',
             type:'POST',
             data:{"cmbCustomer":$(this).val()},
             success:function(res){
               $(".customer-info").html(res);;
             }
           
           });
        
        });      
       

        $("#btnAddToCart").on("click",function(){
          alert();
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