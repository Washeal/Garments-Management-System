<?php
class Status{
	public $id;
	public $name;

	function __construct($_id,$_name){
		$this->id=$_id;
		$this->name=$_name;
	}

	function save(){
		global $db;
		$db->query("insert into steatus(name)values('$this->name')");
		return $db->insert_id;
	}

	function update(){
		global $db;
		$db->query("update steatus set name='$this->name' where id='$this->id'");
	}

	static function delete($id){
		global $db;
		$db->query("delete from steatus where id='$id'");
	}

	static function get_steatu($id){
		global $db;
		$result=$db->query("select name from steatus where id='$id'");
		list($name)=$result->fetch_row();
		$steatu=new Status($id,$name);
		return $steatu;
	}

	static function manage_steatus(){
		global $db;
		$result=$db->query("select id,name from steatus ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th></tr>";
		while(list($id,$name)=$result->fetch_row()){
			$action_buttons="<div class='clearfix'>";
			$action_buttons.=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-steatu"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-steatu"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$id</td><td>$name</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_steatus(){
		global $db;
		$result=$db->query("select id,name from steatus ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Name</th></tr>";
		while(list($id,$name)=$result->fetch_row()){
			$html.="<tr><td>$id</td><td>$name</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

    static function html_select_steatus($_id=""){
		global $db;
		$result=$db->query("select id,name from steatus");

		$html="<div class='form-group row'>";
		  $html.="<label class='col-sm-2 col-form-label'></label>";
		  $html.="<div class='col-sm-10'>";
			  $html.="<select name='cmbsteatus' class='form-control'>";
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
	                     //cmbBox

	static function get_selectbox_status($name="cmbSteatus"){
		global $db;
		$result=$db->query("select id,name from steatus");
		$html="<select name='$name' id='$name'>";
		while(list($id,$name)=$result->fetch_row()){
			$html.="<option value='$id'>$id | $name</option>";
		}
		$html.="</select>";

		return $html;
	}

}
?>