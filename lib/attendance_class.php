<?php
      class Attendance{
        public $id;
        public $empoloyee_id;
        public $in_time;
        public $out_time;
        public $present_date;
     
        public function __construct($_id,$_emp_id,$_in_time,$_out_time,$_present_date){
           $this->id=$_id==null?"":$_id;
           $this->empoloyee_id=$_emp_id;  
           $this->in_time=$_in_time;      
           $this->out_time=$_out_time;
           $this->present_date=$_present_date;
        }



        
    public function save(){
        global $db;
        $db->query("insert into attendances(empoloyee_id,in_time,out_time,present_date)values('$this->empoloyee_id','$this->in_time','$this->out_time','$this->present_date')");
        return $db->insert_id;
       }

       public static function delete($id){
        global $db;
        $db->query("delete from attendances where id='$id'");
        echo "Deleted";
      }

      function update(){
        global $db;
        $db->query("update attendances set empoloyee_id='$this->empoloyee_id',in_time='$this->in_time',out_time='$this->out_time',present_date='$this->present_date' where id='$this->id'");
      }

                  //for Diaplay

      static function get_Attendance(){
        global $db;      
        $result=$db->query("select a.id,e.emp_name,a.in_time,a.out_time,a.present_date from attendances a,employees e where a.empoloyee_id=e.id");      
        $html="<table class='table table-dark table-striped'>";
        $html.="<tr><td>Id</td><td>Employee Name</td><td>In Time</td><td>Out Time</td><td>Present Address</td><td>Action</td></tr>";
        while(list($id,$emp_name,$in_time,$out_time,$present_date)=$result->fetch_row()){   
         
          $action_buttons="<div class='clearfix'>";
          $action_buttons.=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"Update-Attendance"]);      
          $action_buttons.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"Manage-Attendance"]);
          $action_buttons.="</div>";
          $html.="<tr><td>$id</td><td>$emp_name</td><td>$in_time</td><td>$out_time</td> <td>$present_date</td><td>$action_buttons</td></tr>";
        }
        $html.="</table>";
      
        return $html;
      
      }

         
   public function __toString(){
    return "emp:".$this->empoloyees_id.", intime:".$this->in_time;
}

                 //for Forenkey Empolyee

      static function html_select_attendance($_id=""){
        global $db;
        $result=$db->query("select id,emp_name from employees");
  
        $html="<div class='form-group row'>";
          $html.="<label class='col-sm-2 col-form-label'>Employee Name</label>";
          $html.="<div class='col-sm-10'>";
              $html.="<select name='cmbempoly' class='form-control'>";
              while(list($id,$emp_name)=$result->fetch_row()){
  
                if($_id==$id){
                 $html.="<option value='$id' selected>$emp_name</option>";
                }else{
                  $html.="<option value='$id'>$emp_name</option>";
                }
              }
              $html.="</select>";
          $html.="</div>";
        $html.="</div>";
        return $html;
    }               
              //for edit

    static function get_attendances($id){
      global $db;
      $result=$db->query("select empoloyee_id,in_time,out_time,present_date from attendances where id='$id'");
      list($empoloyee_id,$in_time,$out_time,$present_date)=$result->fetch_row();
      $attendance=new Attendance($id,$empoloyee_id,$in_time,$out_time,$present_date);
      return $attendance;
    }

        //for search

    public static function search_attentances($empoloyee_id,$date){

      global $db;      
        $result=$db->query("select a.id,e.emp_name,a.in_time,a.out_time,a.present_date from attendances a,employees e where e.id=a.empoloyee_id and a.empoloyee_id='$empoloyee_id' and a.present_date='$date'");      
        $html="<table class='table table-dark table-striped'>";
        $html.="<tr><td>Id</td><td>Empoloyee Name</td><td>In Time</td><td>Out Time</td><td>Present Address</td></tr>";
        while(list($id,$emp_name,$in_time,$out_time,$present_date)=$result->fetch_row()){   
        
          $html.="<tr><td>$id</td><td>$emp_name</td><td>$in_time</td><td>$out_time</td> <td>$present_date</td></tr>";
        }
        $html.="</table>";
      
        return $html;
    }


    
  


        
    }


?>