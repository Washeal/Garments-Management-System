<?php
class Saplayer{
	public $id;
	public $name;
	public $country;
	public $pasport;
	public $email;
	public $mobile;

	function __construct($_id,$_name,$_country,$_pasport,$_email,$_mobile){
		$this->id=$_id;
		$this->name=$_name;
		$this->country=$_country;
		$this->pasport=$_pasport;
		$this->email=$_email;
		$this->mobile=$_mobile;
	}

	function save(){
		global $db;
		$db->query("insert into saplayer(name,country,pasport,email,mobile)values('$this->name','$this->country','$this->pasport','$this->email','$this->mobile')");
		return $db->insert_id;
	}

	function update(){
		global $db;
		$db->query("update saplayer set name='$this->name',country='$this->country',pasport='$this->pasport',email='$this->email',mobile='$this->mobile' where id='$this->id'");
	}

	static function delete($id){
		global $db;
		$db->query("delete from saplayer where id='$id'");
	}

	static function get_saplayer($id){
		global $db;
		$result=$db->query("select name,country,pasport,email,mobile from saplayer where id='$id'");
		list($name,$country,$pasport,$email,$mobile)=$result->fetch_row();
		$saplayer=new Saplayer($id,$name,$country,$pasport,$email,$mobile);
		return $saplayer;
	}

	static function saplayer_selectbox($name="cmbSaplayer"){
		global $db;
		$result=$db->query("select id,name from saplayer");
		$html="<select id='$name' name='$name'>";
		while(list($id,$name)=$result->fetch_row()){
			$html.="<option value='$id'>$name</option>";
		}
		$html.="</select>";
		return $html;
	}

	static function manage_saplayers(){
		global $db;
		$result=$db->query("select id,name,country,pasport,email,mobile from saplayer ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Country</th><th>Pasport</th><th>Email</th><th>Mobile</th></tr>";
		while(list($id,$name,$country,$pasport,$email,$mobile)=$result->fetch_row()){
			$action_buttons="<div class='clearfix'>";
			$action_buttons.=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-saplayer"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-saplayer"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$id</td><td>$name</td><td>$country</td><td>$pasport</td><td>$email</td><td>$mobile</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_saplayers(){
		global $db;
		$result=$db->query("select id,name,country,pasport,email,mobile from saplayer ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Country</th><th>Pasport</th><th>Email</th><th>Mobile</th></tr>";
		while(list($id,$name,$country,$pasport,$email,$mobile)=$result->fetch_row()){
			$html.="<tr><td>$id</td><td>$name</td><td>$country</td><td>$pasport</td><td>$email</td><td>$mobile</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

}
?>