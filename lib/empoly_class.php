<?php

class Empoloyees{
    public $id;
    public $emp_name;
    public $nid;
    public $present_address;
    public $permanent_address;
    public $edu_qulification;
    public $deptment_id;
    public $designation_id;
    public $gender;
    public $email;
    public $phone;
    public $joining_date;
    public $created_at;


    public function __construct($_id,$_emp_name,$_nid,$_present_address,$_permanent_address,$_edu_qulification,$_dept_id,$_designation_id,$_gender,$_email,$_phone,$_joining_date,$created_at){


        $this->id=$_id==null?"":$_id;
        $this->emp_name=$_emp_name;
        $this->nid=$_nid;
        $this->present_address=$_present_address;
        $this->permanent_address=$_permanent_address;
        $this->edu_qulification=$_edu_qulification;
        $this->deptment_id=$_dept_id;
        $this->designation_id=$_designation_id;
        $this->gender=$_gender;
        $this->email=$_email;
        $this->phone=$_phone;
        $this->joining_date=$_joining_date;
        $this->created_at=$created_at;

    }

    public function save(){
        global $db;
        $db->query("insert into employees(emp_name,nid,present_address,permanent_address,edu_qulification,depertment_id,designation_id,gender,email,phone,joining_date,created_at)values('$this->emp_name','$this->nid','$this->present_address','$this->permanent_address','$this->edu_qulification','$this->deptment_id','$this->designation_id','$this->gender','$this->email','$this->phone','$this->joining_date','$this->created_at')");
        return $db->insert_id;
       }
       
       

       public function update(){ 

        global $db;
        $db->query("update employees set emp_name='$this->emp_name',nid='$this->nid',present_address='$this->present_address',permanent_address='$this->permanent_address',edu_qulification='$this->edu_qulification',depertment_id='$this->deptment_id',designation_id='$this->designation_id',gender='$this->gender',email='$this->email',phone='$this->phone',joining_date='$this->joining_date',created_at='$this->created_at' where id='$this->id'");
       
        echo "Success";
    
       }


       public static function delete($id){
        global $db;
        $db->query("delete from employees where id='$id'");
        echo "Deleted";
      }

     
//    public function __toString(){
//     return "nid:".$this->nid.", emp_name:".$this->emp_name;
// }




        


      static function get_employees(){
        global $db;      
        $result=$db->query("select e.id,e.emp_name,e.gender,e.created_at,e.edu_qulification,e.permanent_address,dep.depertment,deg.designation,e.nid,e.present_address,e.email,e.phone,e.joining_date from employees e,depertments dep,designations deg where dep.id=e.depertment_id and deg.id=e.designation_id order by e.id");  

        $html="<table class='table table-dark table-striped mb-4'>";
        $html.="<tr><td>Id</td><td>Employee Name</td><td>Depertment Name</td><td>Designation Id </td><td>Employee NID</td> <td>Present Address</td> <td>Phone</td> <td>Joining Date</td><td>Action</td></tr>";
        while(list($id,$emp_name,$gender,$created_at,$edu_qulification,$permanent_address,$depertment_id,$designation_id,$nid,$present_address,$email,$phone,$join_date)=$result->fetch_row()){   
         
          $action_buttons="<div class='clearfix'>";
          $action_buttons.=action_button(["id"=>$id,"name"=>"Edit","value"=>"Edit","class"=>"primary","url"=>"Update-Employee"]);      
          $action_buttons.=action_button(["id"=>$id,"name"=>"Delete","value"=>"Delete","class"=>"danger","url"=>"manage-empolee"]);
          $action_buttons.="</div>";
          $html.="<tr><td>$id</td> <td>$emp_name</td> <td>$depertment_id</td> <td>$designation_id</td> <td>$nid</td> <td>$present_address</td> <td>$phone</td> <td>$join_date</td><td>$action_buttons</td></tr>";
        }
        $html.="</table>";
      
        return $html;
      
      }



     

   public static function get_employee($id){
      global $db;
      $result=$db->query("select emp_name,nid,present_address,permanent_address,edu_qulification,depertment_id,designation_id,gender,email,phone,joining_date,created_at from employees where id='$id'");
      list($emp_name,$nid,$present_address,$permanent_address,$edu_qulification,$depertment_id,$designation_id,$gender,$email,$phone,$joining_date,$created_at)=$result->fetch_row();
      $employee=new Empoloyees($id,$emp_name,$nid,$present_address,$permanent_address,$edu_qulification,$depertment_id,$designation_id,$gender,$email,$phone,$joining_date,$created_at);
      return $employee;
    }





}

?>