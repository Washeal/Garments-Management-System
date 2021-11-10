<?php

   class Depertment{
    public $id;
    public $depertment_nam;

    function __construct($_id,$depertment_nam){
      $this->id=$_id;
      $this->depertment=$depertment_nam;

    }

    
    function save(){
        global $db;         
        $db->query("insert into depertments(depertment)values('$this->depertment')");
        return $db->insert_id; 
      }

      public static function delete($id){
        global $db;
        $db->query("delete from depertments where id='$id'");
        echo "Deleted";
      }


      static function html_select_depertment($_id=""){
        global $db;
        $result=$db->query("select id,depertment from depertments");

          $html="<div class='form-group row'>";
          $html.="<label class='col-sm-2 col-form-label'>depertment</label>";
          $html.="<div class='col-sm-10'>";
          $html.="<select name='cmbdepertment' class='form-control'>";
          while(list($id,$dep_name)=$result->fetch_row()){

          if($_id==$id){
          $html.="<option value='$id' selected>$dep_name</option>";
          }else{
          $html.="<option value='$id'>$dep_name</option>";
          }

      }
              $html.="</select>";
          $html.="</div>";
          $html.="</div>";
          return $html;

      }


                    
      static function get_Depertment(){
        global $db;      
        $result=$db->query("select id,depertment from depertments");      
        $html="<table class='table table-hover'>";
        $html.="<tr><td>Id</td><td>depertment Name</td><td>Action</td></tr>";
        while(list($id,$dep_name)=$result->fetch_row()){   
    
          $action_buttons=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"info"]);
          $action_buttons.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger"]);
    
          $html.="<tr><td>$id</td><td>$dep_name</td><td>$action_buttons</td></tr>";
        }
        $html.="</table>";
      
        return $html;
      
      }

    
 
 }
?>