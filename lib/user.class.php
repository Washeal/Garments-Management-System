<?php

 class User{
   public $id;
   public $role_id;
   public $username;
   public $password;

   public function __construct($_id,$_role_id,$_username,$_password){
      $this->id=$_id==null?"":$_id;
      $this->role_id=$_role_id;  
      $this->username=$_username;      
      $this->password=$_password;
   }

   public function save(){
    global $db;
    $db->query("insert into users(username,password,role_id,created_at)values('$this->username','$this->password','$this->role_id',now())");
    return $db->insert_id;
   }  
                                   
   public function update(){ 
    global $db;
    $db->query("update users set username='$this->username',password='$this->password',role_id='$this->role_id' where id='$this->id'");
   
    echo "Success";

   }
   
   public static function delete($id){
     global $db;
     $db->query("delete from users where id='$id'");
     echo "Deleted";
   }

   static function get_users(){
    global $db;      
    $result=$db->query("select u.id,u.username,r.name role from users u,roles r where r.id=u.role_id order by u.id");      
    $html="<table class='table table-hover'>";
    $html.="<tr><td>Id</td><td>Name</td><td>Role</td><td>Action</td></tr>";
    while(list($id,$username,$role)=$result->fetch_row()){   
     
      $action_buttons="<div class='clearfix'>";
      $action_buttons.=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"edit-user"]);      
      $action_buttons.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-user"]);
      $action_buttons.="</div>";
      $html.="<tr><td>$id</td><td>$username</td><td>$role</td><td>$action_buttons</td></tr>";
    }
    $html.="</table>";
  
    return $html;
  
  }

   public static function get_user($id){
    global $db;
    $result=$db->query("select id,username,password,role_id from users where id='$id'");
    
    list($id,$username,$password,$role_id)=$result->fetch_row();
    $user=new User($id,$role_id,$username,$password);
    return $user;
   
   }

  static function get_users_json(){
 
      global $db;

      $users=[];
      $result=$db->query("select u.id,u.username,r.name role from users u,roles r where r.id=u.role_id");
      while(list($id,$username,$role)=$result->fetch_row()){
        array_push($users,["id"=>$id,"name"=>$username,"role"=>$role]);
      }
     
      return json_encode($users);


  }
      
  

   public function __toString(){
       return "Username:".$this->username.", Password:".$this->password;
   }

 }






?>