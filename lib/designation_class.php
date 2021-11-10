<?php

   class desiganation{
    public $id;
    public $desiganation;

    function __construct($_id,$desiganation){
      $this->id=$_id;
      $this->desiganation=$desiganation;

    }

    
    function save(){
        global $db;         
        $db->query("insert into designations(designation)values('$this->desiganation')");
        return $db->insert_id; 
      }

      public static function delete($id){
        global $db;
        $db->query("delete from designations where id='$id'");
        echo "Deleted";
      }




      static function html_select_desiganation($_id=""){
          global $db;
          $result=$db->query("select id,designation from designations");

              $html="<div class='form-group row'>";
              $html.="<label class='col-sm-2 col-form-label'>designation</label>";
              $html.="<div class='col-sm-10'>";
              $html.="<select name='cmbdesignation' class='form-control'>";
              while(list($id,$desiganation)=$result->fetch_row()){

              if($_id==$id){
              $html.="<option value='$id' selected>$desiganation</option>";
              }else{
              $html.="<option value='$id'>$desiganation</option>";
              }

          }
              $html.="</select>";
          $html.="</div>";
          $html.="</div>";
          return $html;

      }


                    
      static function get_desiganation(){
        global $db;      
        $result=$db->query("select id,designation from designations");      
        $html="<table class='table table-hover'>";
        $html.="<tr><td>Id</td><td>designation</td><td>Action</td></tr>";
        while(list($id,$desiganation)=$result->fetch_row()){   
    
          $action_buttons=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"info"]);
          $action_buttons.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger"]);
    
          $html.="<tr><td>$id</td><td>$desiganation</td><td>$action_buttons</td></tr>";
        }
        $html.="</table>";
      
        return $html;
      
      }

    
 
 }
?>