<?php
class Purc_detail{
	public $id;
	public $purchases_id;
	public $sample_id;
	public $price;
	public $discount;

	function __construct($_id,$_purchases_id,$_sample_id,$_price,$_discount){
		$this->id=$_id;
		$this->purchases_id=$_purchases_id;
		$this->sample_id=$_sample_id;
		$this->price=$_price;
		$this->discount=$_discount;
	}

	function save(){
		global $db;
		$db->query("insert into purc_details(purchases_id,sample_id,price,discount)values('$this->purchases_id','$this->sample_id','$this->price','$this->discount')");
		return $db->insert_id;
	}

	function update(){
		global $db;
		$db->query("update purc_details set purchases_id='$this->purchases_id',sample_id='$this->sample_id',price='$this->price',discount='$this->discount' where id='$this->id'");
	}

	static function delete($id){
		global $db;
		$db->query("delete from purc_details where id='$id'");
	}

	static function get_purc_detail($id){
		global $db;
		$result=$db->query("select purchases_id,sample_id,price,discount from purc_details where id='$id'");
		list($purchases_id,$sample_id,$price,$discount)=$result->fetch_row();
		$purc_detail=new Purc_detail($id,$purchases_id,$sample_id,$price,$discount);
		return $purc_detail;
	}

	static function purc_detail_selectbox($name="cmbPurc_detail"){
		global $db;
		$result=$db->query("select id,name from purc_details");
		$html="<select id='$name' name='$name'>";
		while(list($id,$name)=$result->fetch_row()){
			$html.="<option value='$id'>$name</option>";
		}
		$html.="</select>";
		return $html;
	}

	static function manage_purc_details(){
		global $db;
		$result=$db->query("select id,purchases_id,sample_id,price,discount from purc_details ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Purchases_id</th><th>Sample_id</th><th>Price</th><th>Discount</th></tr>";
		while(list($id,$purchases_id,$sample_id,$price,$discount)=$result->fetch_row()){
			$action_buttons="<div class='clearfix'>";
			$action_buttons.=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-purc_detail"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-purc_detail"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$id</td><td>$purchases_id</td><td>$sample_id</td><td>$price</td><td>$discount</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_purc_details(){
		global $db;
		$result=$db->query("select id,purchases_id,sample_id,price,discount from purc_details ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Purchases_id</th><th>Sample_id</th><th>Price</th><th>Discount</th></tr>";
		while(list($id,$purchases_id,$sample_id,$price,$discount)=$result->fetch_row()){
			$html.="<tr><td>$id</td><td>$purchases_id</td><td>$sample_id</td><td>$price</td><td>$discount</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

}
?>