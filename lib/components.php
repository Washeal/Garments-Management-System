<?php

   //----------------------New-------------------------//


   function nav_links($url,$text,$css="bx bx-home-circle"){
    $html="<a href='$url' class=''>";
    $html.="<div class='parent-icon'><i class='$css'></i>";
    $html.="</div>";
    $html.="<div class='menu-title'>$text</div>";
    $html.="</a>";

    return $html;
   }


   function nav_links_dropdown($url,$text,$css="",$options=array()){
      if(count($options)){
         $html="<a href='$url' class='has-arrow'>";

      }else{
         $html="<a href='$url' class='has-arrow'>";
      }
     
      $html.="<div class='parent-icon '><i class='$css'></i>";
      $html.="</div>";
      $html.="<div class='menu-title'>$text</div>";
     
      $html.="</a>";

      if(count($options)){
         $html.= nav_down($options);
      }
  
      return $html;
     }




     function nav_down($options){

     $html="<ul>";
      foreach($options as $option){
         $html.="<li>";
         $html.=nav_links($option["url"],$option["value"],$option["css"]);
         $html.="</li>";

      }
      $html.="</ul>";
      return $html;
     }
  

   





                             //peofile

    function profile_status($option){
      $html="<p>{$option["text"]}</p>";
      $html.="<div class='progress mb-3' style='{$option["height"]}'>";
      $html.="<div class='progress-bar {$option["bg-class"]}' role='progressbar' style='{$option["width"]}' aria-valuenow='{$option["aria-valuemin"]}' aria-valuemin='0' aria-valuemax='100'>";
      $html.="</div>";
      $html.="</div>";
      return $html;
    }







                   //breadcame


            function page_header($title,$breadcrumb){

         
                     $html ="<div class='page-breadcrumb d-none d-sm-flex align-items-center mb-3'>";
                     $html.="<div class='breadcrumb-title pe-3'>$title</div>";
                     $html.="<div class='ps-3'>";
                     $html.="<nav aria-label='breadcrumb'>";
                     $html.="<ol class='breadcrumb mb-0 p-0'>";
                     $link["icon"]=isset($link["icon"])? $link["icon"]:"";
                     
                     foreach($breadcrumb as $link){
                     $html.="<li class='breadcrumb-item '><a href='{$link["url"]}'><i class='bx {$link["icon"]}'></i></a>";
                     $html.="</li>";
                     $html.="<li class='breadcrumb-item active' aria-current='page'>{$link["name"]}</li>";
                     }
                     $html.="</ol>";
                     $html.="</nav>";
                     $html.="</div>";
                     return $html;

                     }
                        

      function input_button($config){
         $html="<input type='{$config["type"]}' value='{$config["value"]}' name='btn{$config["name"]}' class='btn btn-info'/>";
         return $html;
      }
   
      function input_field($config){
   
         $config["required"]=isset($config["required"])?$config["required"]:"";
         $config["placeholder"]=isset($config["placeholder"])?$config["placeholder"]:"";
         $config["value"]=isset($config["value"])?$config["value"]:"";
         $config["label"]=isset($config["label"])?$config["label"]:"";      
   
         $html="<div class='form-group row'>";
         $html.="<label for='txt{$config["name"]}' class='col-sm-2 col-form-label'>{$config["label"]}</label>";
         $html.="<div class='col-sm-10'>";
         $html.="<input type='{$config["type"]}' class='form-control' name='txt{$config["name"]}' id='txt{$config["name"]}' value='{$config["value"]}' placeholder='{$config["placeholder"]}' {$config["required"]}>";
         $html.="</div>";
         $html.="</div>";
   
         return $html;
   
      }


     


       function action_button($config){
         $config["url"]=isset($config["url"])?$config["url"]:"#";
         $config["class"]=isset($config["class"])?$config["class"]:"";
      
         $html="<form action='{$config["url"]}' method='post' style='float:left;margin-right:10px'>";
         $html.="<input type='hidden' name='txtId' value='{$config["id"]}' />";
         $html.="<input type='submit' class='btn btn-{$config["class"]}' name='btn{$config["name"]}' value='{$config["value"]}' />";
         $html.="</form>";
         return $html;
       }
       

       function input_field_redio($level,$options){
         $html="<div class='form-group row'>";
         $html.="<label class='col-sm-2 col-form-label'>$level</label>";
         $html.="<div class='col-sm-10'>";
         $html.= "<div class='form-control'>";
         foreach($options as $option){
         $html.= "<input type='radio' name='{$option["name"]}' 'id='{$option["name"]}' value={$option['value'] }>{$option['value']}&nbsp;";
         }
         $html.="</div>";
         $html.="</div>";
         $html.="</div>";

         return $html;
}



function select_field($config){
   $config["value"]=isset($config["value"])?$config["value"]:""; 
   global $db; 
}

function PrintDate($day="cmbDay",$month="cmbMonth",$year="cmbYear"){

   $html="";
   $html.="<select name='$day'>";
   for($d=1;$d<=30;$d++){
       $d=str_pad($d,2, '0', STR_PAD_LEFT); 
       $html.="<option value='$d'>$d</option>";

   }
   $html.="</select>";

   $html.="<select name='$month'>";
    $months=["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"];
   for($d=1;$d<=12;$d++){
       $d=str_pad($d,2,'0',STR_PAD_LEFT); 
       $html.="<option value='$d'>{$months[$d-1]}</option>";

   }
   $html.="</select>";
   $html.="<select name='$year'>";
   
  for($d=date("Y")-60;$d<=date("Y")+3;$d++){     
      $html.="<option value='$d'>$d</option>";
  }
  $html.="</select>";
   return $html;
}

function PrintTime($hour="cmbHour",$min="cmbMin",$ampm="cmbAMPM"){

   $html="<select name='$hour'>";
   for($h=1;$h<=12;$h++){
      $h=str_pad($h,2, '0', STR_PAD_LEFT); 
      $html.="<option value='$h'>$h</option>";
   }
   $html.="</select>";

   $html.="<select name='$min'>";
   for($h=1;$h<=60;$h++){
       $h=str_pad($h,2, '0', STR_PAD_LEFT); 
      $html.="<option value='$h'>$h</option>";
   }
   $html.="</select>";

   $html.="<select name='$ampm'>";
   $html.="<option value='AM'>AM</option>";
   $html.="<option value='PM'>PM</option>";
   $html.="</select>";
  
    return $html;


}
         



?>