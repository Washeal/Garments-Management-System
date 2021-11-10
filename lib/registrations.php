<?php
class Registration{
	public $id;
	public $name;
	public $country;
	public $pasport;
	public $gender;
	public $email;
	public $mobile;
	public $comment;

	function __construct($_id,$_name,$_country,$_pasport,$_gender,$_email,$_mobile,$_comment){
		$this->id=$_id;
		$this->name=$_name;
		$this->country=$_country;
		$this->pasport=$_pasport;
		$this->gender=$_gender;
		$this->email=$_email;
		$this->mobile=$_mobile;
		$this->comment=$_comment;
	}

	function save(){
		global $db;
		$db->query("insert into registrations(name,country,pasport,gender,email,mobile,comment)values('$this->name','$this->country','$this->pasport','$this->gender','$this->email','$this->mobile','$this->comment')");
		return $db->insert_id;
	}

	function update(){
		global $db;
		$db->query("update registrations set name='$this->name',country='$this->country',pasport='$this->pasport',gender='$this->gender',email='$this->email',mobile='$this->mobile',comment='$this->comment' where id='$this->id'");
	}

	static function delete($id){
		global $db;
		$db->query("delete from registrations where id='$id'");
	}

	static function get_registration($id){
		global $db;
		$result=$db->query("select name,country,pasport,gender,email,mobile,comment from registrations where id='$id'");
		list($name,$country,$pasport,$gender,$email,$mobile,$comment)=$result->fetch_row();
		$registration=new Registration($id,$name,$country,$pasport,$gender,$email,$mobile,$comment);
		return $registration;
	}

	static function manage_registrations(){
		global $db;
		$result=$db->query("select id,name,country,pasport,gender,email,mobile,comment from registrations ");
		$html="<table class='table table-striped table-hover'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Country</th><th>Pasport</th><th>Gender</th><th>Email</th><th>Mobile</th><th>Comment</th></tr>";
		while(list($id,$name,$country,$pasport,$gender,$email,$mobile,$comment)=$result->fetch_row()){
			$action_buttons="<div class='clearfix'>";
			$action_buttons.=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"Update-reg"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-registration"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$id</td><td>$name</td><td>$country</td><td>$pasport</td><td>$gender</td><td>$email</td><td>$mobile</td><td>$comment</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	  public static function get_registrationss($id){
		global $db;
		$result=$db->query("select id,name,country,pasport,gender,email,mobile,comment from registrations where id='$id'");
		
		list($id,$name,$country,$pasport,$gender,$email,$mobile,$comment)=$result->fetch_row();
		$reg=new Registration($id,$name,$country,$pasport,$gender,$email,$mobile,$comment);
		return $reg;
	    }

	static function get_registrations(){
		global $db;
		$result=$db->query("select id,name,country,pasport,gender,email,mobile,comment from registrations ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th><th>Country</th><th>Pasport</th><th>Gender</th><th>Email</th><th>Mobile</th><th>Comment</th></tr>";
		while(list($id,$name,$country,$pasport,$gender,$email,$mobile,$comment)=$result->fetch_row()){
			$html.="<tr><td>$id</td><td>$name</td><td>$country</td><td>$pasport</td><td>$gender</td><td>$email</td><td>$mobile</td><td>$comment</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function gets_registrations($id){
		global $db;
		$result=$db->query("select id,name,country,pasport,gender,email,mobile,comment from registrations where id='$id'");
		list($id,$name,$country,$pasport,$gender,$email,$mobile,$comment)=$result->fetch_row();
		$customer=new  Registration($id,$name,$country,$pasport,$gender,$email,$mobile,$comment);
		return $customer;
	}

	static function get_selectbox($name="cmbCustomer"){
		global $db;
		$result=$db->query("select id,name,mobile from registrations");
		$html="<select name='$name' id='$name'>";
		while(list($id,$name,$mobile)=$result->fetch_row()){
			$html.="<option value='$id'>$id | $name, $mobile</option>";
		}
		$html.="</select>";

		return $html;
	}


	static function html_select_registrations($_id=""){
		global $db;
		$result=$db->query("select id,name from registrations");

		$html="<div class='form-group row'>";
		  $html.="<label class='col-sm-2 col-form-label'> buyer</label>";
		  $html.="<div class='col-sm-10'>";
			  $html.="<select name='cmbregistrations' class='form-control'>";
			  while(list($id,$name)=$result->fetch_row()){

				if($_id==$id){
				 $html.="<option value='$id' selected>$name</option>";
				}else{
				  $html.="<option value='$id'>$name</option>";
				}

			  }
			  $html.="</select>";
		  $html.="</div>";
		$html.="</div>";
		return $html;

	}

	

	

}
?>