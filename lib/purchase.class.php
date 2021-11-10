<?php
class Purchase{
	public $id;
	public $saplayer_id;
	public $parces_date;
	public $delebery_date;

	function __construct($_id,$_saplayer_id,$_parces_date,$_delebery_date){
		$this->id=$_id;
		$this->saplayer_id=$_saplayer_id;
		$this->parces_date=$_parces_date;
		$this->delebery_date=$_delebery_date;
	}

	function save(){
		global $db;
		$db->query("insert into purchases(saplayer_id,parces_date,delebery_date)values('$this->saplayer_id','$this->parces_date','$this->delebery_date')");
		return $db->insert_id;
	}

	function update(){
		global $db;
		$db->query("update purchases set saplayer_id='$this->saplayer_id',parces_date='$this->parces_date',delebery_date='$this->delebery_date' where id='$this->id'");
	}

	static function delete($id){
		global $db;
		$db->query("delete from purchases where id='$id'");
	}

	static function get_purchase($id){
		global $db;
		$result=$db->query("select saplayer_id,parces_date,delebery_date from purchases where id='$id'");
		list($saplayer_id,$parces_date,$delebery_date)=$result->fetch_row();
		$purchase=new Purchase($id,$saplayer_id,$parces_date,$delebery_date);
		return $purchase;
	}

	static function purchase_selectbox($name="cmbPurchase"){
		global $db;
		$result=$db->query("select id,name from purchases");
		$html="<select id='$name' name='$name'>";
		while(list($id,$name)=$result->fetch_row()){
			$html.="<option value='$id'>$name</option>";
		}
		$html.="</select>";
		return $html;
	}

	static function manage_purchases(){
		global $db;
		$result=$db->query("select id,saplayer_id,parces_date,delebery_date from purchases ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Saplayer_id</th><th>Parces_date</th><th>Delebery_date</th></tr>";
		while(list($id,$saplayer_id,$parces_date,$delebery_date)=$result->fetch_row()){
			$action_buttons="<div class='clearfix'>";
			$action_buttons.=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-purchase"]);
			$action_buttons.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-purchase"]);
			$action_buttons.="</div>";
			$html.="<tr><td>$id</td><td>$saplayer_id</td><td>$parces_date</td><td>$delebery_date</td><td>$action_buttons</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function get_purchases(){
		global $db;
		$result=$db->query("select id,saplayer_id,parces_date,delebery_date from purchases ");
		$html="<table class='table'>";
		$html.="<tr><th>Id</th><th>Saplayer_id</th><th>Parces_date</th><th>Delebery_date</th></tr>";
		while(list($id,$saplayer_id,$parces_date,$delebery_date)=$result->fetch_row()){
			$html.="<tr><td>$id</td><td>$saplayer_id</td><td>$parces_date</td><td>$delebery_date</td></tr>";
		}
		$html.="</table>";
		return $html;
	}

	static function getLastpurchasesId(){
		global $db;
		$result=$db->query("select max(id) from purchases");
		list($max_id)=$result->fetch_row();
        return $max_id;
	}

}
?>