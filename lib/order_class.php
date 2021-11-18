<?php
class Order{
	public $id;
	public $customer_id;
	public $order_date;
	public $shipping_address;
	public $discount;
	public $vat;
	public $due_date;

	function __construct($_id,$_customer_id,$_order_date,$_shipping_address,$_discount,$_vat,$_due_date){
		$this->id=$_id;
		$this->customer_id=$_customer_id;
		$this->order_date=$_order_date;
		$this->shipping_address=$_shipping_address;
		$this->discount=$_discount;
		$this->vat=$_vat;
		$this->due_date=$_due_date;
	}

	function save(){
		global $db;
		$db->query("insert into Orders(customer_id,order_date,shipping_address,discount,vat,due_date)values('$this->customer_id','$this->order_date','$this->shipping_address','$this->discount','$this->vat','$this->due_date')");
		return $db->insert_id;
	}

	function update(){
		global $db;
		$db->query("update Orders set customer_id='$this->customer_id',order_date='$this->order_date',shipping_address='$this->shipping_address',discount='$this->discount',vat='$this->vat',due_date='$this->due_date' where id='$this->id'");
	}

	static function delete($id){
		global $db;
		$db->query("delete from Orders where id='$id'");
		$db->query("delete from order_details where id='$id'");
	}

	

	static function order_selectbox($name="cmbOrder"){
		global $db;
		$result=$db->query("select id,name from Orders");
		$html="<select id='$name' name='$name'>";
		while(list($id,$name)=$result->fetch_row()){
			$html.="<option value='$id'>$name</option>";
		}
		$html.="</select>";
		return $html;
	}
	static function get_order($id){
		global $db;
		$result=$db->query("select customer_id,order_date,shipping_address,discount,vat,due_date from Orders where id='$id'");
		list($customer_id,$order_date,$shipping_address,$discount,$vat,$due_date)=$result->fetch_row();
		$order=new Order($id,$customer_id,$order_date,$shipping_address,$discount,$vat,$due_date);
		return $order;
	}

	// static function get_order($id){
	// 	global $db;
	// 	$result=$db->query("select customer_id,order_date,discount,order_total,paid_amount,delivery_date from orders where id='$id'");
	// 	list($customer_id,$order_date,$discount,$order_total,$paid_amount,$delivery_date)=$result->fetch_row();
	// 	$order=new Order($id,$customer_id,$order_date,$discount,$order_total,$paid_amount,$delivery_date);
	// 	return $order;
	// }

	static function manage_orders(){
		global $db;
		$result=$db->query("select o.id,r.name,o.order_date,o.shipping_address,o.discount,o.vat,o.due_date from Orders o,registrations r where r.id=o.customer_id");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Customer Id</th><th>Order Date</th><th>Shipping Address</th><th>Due Date</th></tr>";
		while(list($id,$customer_id,$order_date,$shipping_address,$discount,$vat,$due_date)=$result->fetch_row()){
			$action_buttons="<div class='clearfix'>";
			$action_buttons.=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-order"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-order"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"View","value"=>"View","class"=>"info","url"=>"view-order"]);
			$action_buttons.="</div>";

			$order_date=date("d M Y",strtotime($order_date));
			$due_date=date("d M Y",strtotime($due_date));

			$html.="<tr><td>$id</td><td>$customer_id</td><td>$order_date</td><td>$shipping_address</td><td>$due_date</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}
	
	static function get_orders(){
		global $db;
		$result=$db->query("select id,customer_id,order_date,shipping_address,discount,vat,due_date from Orders ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Customer_id</th><th>Order_date</th><th>Shipping_address</th><th>Discount</th><th>Vat</th><th>Due_date</th></tr>";
		while(list($id,$customer_id,$order_date,$shipping_address,$discount,$vat,$due_date)=$result->fetch_row()){
			$html.="<tr><td>$id</td><td>$customer_id</td><td>$order_date</td><td>$shipping_address</td><td>$discount</td><td>$vat</td><td>$due_date</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function getLastOrderId(){
		global $db;
		$result=$db->query("select max(id) from orders");
		list($max_id)=$result->fetch_row();
        return $max_id;
	}

	

}
?>