<?php
  
  class Role{       

     public $id;
     public $name;

     function __construct($_id,$_name){
       $this->id=$_id;
       $this->name=$_name;

     }


     function save(){
       global $db;         
       $db->query("insert into roles(name)values('$this->name')");
       return $db->insert_id; 
     }
     public static function delete($id){
      global $db;
      $db->query("delete from roles where id='$id'");
      echo "Deleted";
    }


     static function html_select_roles($_id=""){
          global $db;
          $result=$db->query("select id,name from roles");

          $html="<div class='form-group row'>";
            $html.="<label class='col-sm-2 col-form-label'>Role</label>";
            $html.="<div class='col-sm-10'>";
                $html.="<select name='cmbRole' class='form-control'>";
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
 
 
 
      static function get_roles(){
        global $db;      
        $result=$db->query("select id,name from roles");      
        $html="<table class='table table-hover'>";
        $html.="<tr><td>Id</td><td>Name</td><td>Action</td></tr>";
        while(list($id,$name)=$result->fetch_row()){   
    
          $action_buttons=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"info"]);
          $action_buttons.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger"]);
    
          $html.="<tr><td>$id</td><td>$name</td><td>$action_buttons</td></tr>";
        }
        $html.="</table>";
      
        return $html;
      
      }
 
    
    
    
    }

?>