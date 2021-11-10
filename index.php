<?php session_start();
require_once("db_config.php");

  if(isset($_POST["btnSignIn"])){
     $username=$_POST["txtUsername"];
     $password=$_POST["txtPassword"];
    //echo $username," ",$password;
     $result=$db->query("select u.id,u.username,r.name from users u,roles r where r.id=u.role_id and u.username='$username' and u.password='$password'");

        if($db->affected_rows>0){
            list($uid,$_username,$role)=$result->fetch_row();
            $_SESSION["uid"]=$uid;
            $_SESSION["uname"]=$_username;
            $_SESSION["urole"]=$role;
            header("location:home");
        }  
  
     }

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Dashboard">
  <meta name="keyword" content="Dashboard, Bootstrap, Admin, Template, Theme, Responsive, Fluid, Retina">
  <title>Dashio - Bootstrap Admin Template</title>

  <!-- Favicons -->
  <link href="login/img/favicon.png" rel="icon">
  <link href="login/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="login/lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!--external css-->
  <link href="login/lib/font-awesome/css/font-awesome.css" rel="stylesheet" />
  <!-- Custom styles for this template -->
  <link href="login/css/style.css" rel="stylesheet">
  <link href="login/css/style-responsive.css" rel="stylesheet">
  
  <!-- =======================================================
    Template Name: Dashio
    Template URL: https://templatemag.com/dashio-bootstrap-admin-template/
    Author: TemplateMag.com
    License: https://templatemag.com/license/
  ======================================================= -->
</head>

<body>
  <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
  <div id="login-page">
    <div class="container">
      <form class="form-login" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
        <h2 class="form-login-heading">sign in now</h2>
        <div class="login-wrap">
          <input type="text" class="form-control" name="txtUsername" placeholder="User ID" autofocus>
          <br>
          <input type="password" name="txtPassword" class="form-control" placeholder="Password">
         <br>
          <button class="btn btn-theme btn-block" type="submit" name="btnSignIn"><i class="fa fa-lock"></i> SIGN IN</button>
          <hr>
          <div class="login-social-link centered">
           
            <button class="btn btn-facebook" type="submit"><i class="fa fa-facebook"></i> Facebook</button>
            <button class="btn btn-twitter" type="submit"><i class="fa fa-twitter"></i> Twitter</button>
          </div>
          
        </div>
        <!-- Modal -->
        
        <!-- modal -->
      </form>
    </div>
  </div>
  <!-- js placed at the end of the document so the pages load faster -->
  <script src="login/lib/jquery/jquery.min.js"></script>
  <script src="login/lib/bootstrap/js/bootstrap.min.js"></script>
  <!--BACKSTRETCH-->
  <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
  <script type="text/javascript" src="login/lib/jquery.backstretch.min.js"></script>
  <script>
    $.backstretch("login/img/login-bg.jpg", {
      speed: 500
    });
  </script>
</body>

</html>
