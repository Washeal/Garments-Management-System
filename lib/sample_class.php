<?php

class Sample{
	public $id;
	public $name;
	public $price;

	function __construct($_id,$_name,$_price){
		$this->id=$_id;
		$this->name=$_name;
		$this->price=$_price;
	}

	function save($file=""){
		global $db;
		$db->query("insert into samples(name,price)values('$this->name','$this->price')");
		if(is_array($file)){
		$exe=pathinfo($file["name"],PATHINFO_EXTENSION);
		
		move_uploaded_file($file["tmp_name"],"img/upload/{$db->insert_id}.{$exe}");
		}
		return $db->insert_id;
	}

	function update(){
		global $db;
		$db->query("update samples set name='$this->name',price='$this->price' where id='$this->id'");
	}

	static function delete($id){
		global $db;
		$db->query("delete from samples where id='$id'");
	}

	static function get_sample($id){
		global $db;
		$result=$db->query("select name,price from samples where id='$id'");
		list($name,$price)=$result->fetch_row();
		$sample=new Sample($id,$name,$price);
		return $sample;
	}

	static function manage_samples(){
		global $db;
		$result=$db->query("select id,name,price from samples ");
		$html="<table class='table table-striped table-hover'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Price</th><th>Photo</th></tr>";
		while(list($id,$name,$price)=$result->fetch_row()){
			$action_buttons="<div class='clearfix'>";
			$action_buttons.=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-sample"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-sampol"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$id</td><td>$name</td><td>$price</td><td> <img src='img/upload/$id.jpg'style='width:50px;height:50px'> </td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_samples(){
		global $db;
		$result=$db->query("select id,name,price from samples ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Price</th></tr>";
		while(list($id,$name,$price)=$result->fetch_row()){
			$html.="<tr><td>$id</td><td>$name</td><td>$price</td></tr>";
		}
		$html.="</table>";
		return $html;
	}


	static function get_selectbox($name="cmbProduct"){
		global $db;
		$result=$db->query("select id,name,price from samples");
		$html="<select name='$name' id='$name'>";
		while(list($id,$name,$price)=$result->fetch_row()){
			$html.="<option value='$id'>$name</option>";
		}
		$html.="</select>";

		return $html;
	}



}
?>