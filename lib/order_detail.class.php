<?php
class Order_detail{
	public $id;
	public $order_id;
	public $product_id;
	public $price;
	public $qty;
	public $discount;

	function __construct($_id,$_order_id,$_product_id,$_price,$_qty,$_discount){
		$this->id=$_id;
		$this->order_id=$_order_id;
		$this->product_id=$_product_id;
		$this->price=$_price;
		$this->qty=$_qty;
		$this->discount=$_discount;
	}

	function save(){
		global $db;
		$db->query("insert into order_details(order_id,product_id,price,qty,discount)values('$this->order_id','$this->product_id','$this->price','$this->qty','$this->discount')");
		return $db->insert_id;
	}

	function update(){
		global $db;
		$db->query("update order_details set order_id='$this->order_id',product_id='$this->product_id',price='$this->price',qty='$this->qty',discount='$this->discount' where id='$this->id'");
	}

	static function delete($id){
		global $db;
		$db->query("delete from order_details where id='$id'");
	}

	static function get_order_detail($id){
		global $db;
		$result=$db->query("select order_id,product_id,price,qty,discount from order_details where id='$id'");
		list($order_id,$product_id,$price,$qty,$discount)=$result->fetch_row();
		$order_detail=new Order_detail($id,$order_id,$product_id,$price,$qty,$discount);
		return $order_detail;
	}

	static function manage_order_details(){
		global $db;
		$result=$db->query("select id,order_id,product_id,price,qty,discount from order_details ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Order_id</th><th>Product_id</th><th>Price</th><th>Qty</th><th>Discount</th></tr>";
		while(list($id,$order_id,$product_id,$price,$qty,$discount)=$result->fetch_row()){
			$action_buttons="<div class='clearfix'>";
			$action_buttons.=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-order_detail"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-order_detail"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$id</td><td>$order_id</td><td>$product_id</td><td>$price</td><td>$qty</td><td>$discount</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_order_details($id){
		global $db;
		$result=$db->query("select s.id,s.name,d.price,d.qty,d.discount,d.qty*d.price sub from order_details d,samples s where s.id=d.product_id and d.order_id='$id'");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Product Name</th><th>Price</th><th>Qty</th><th>Discount</th><th>Subtotal</th></tr>";
		while(list($id,$product_id,$price,$qty,$discount,$subtotal)=$result->fetch_row()){
			$html.="<tr><td>$id</td><td>$product_id</td><td>$price</td><td>$qty</td><td>$discount</td><td>$subtotal</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	// static function view_orderdetail($id){
	// 	global $db;
	// 	$html="<table class='table table-striped'>";
	// 	$html.="<tr><th>ID</th><th>Product</th><th>Price</th><th>Quantity</th><th>Discount</th><th>Total</th></tr>";
	// 	$result=$db->query("select p.id,p.name,d.price,d.quantity,d.discount,p.photo from order_details d,products p where p.id=d.product_id and d.order_id='$id'");
	// 	while (list($id,$product,$price,$qty,$discount,$photo)=$result->fetch_row()){
	// 	$total=$price*$qty-$discount;
	// 	$html.="<tr><td>$id</td><td><img src='img/product/$photo' width='100'>$product</td><td>$price</td><td>$qty</td><td>$discount</td><td>$total</td></tr>";
	// 	}
	// 	$html.="</table>";
	// 	return $html;
	// }

}
?>