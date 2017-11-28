<?php
ob_start();
session_start();
include('library/autoload.php');
include('library/database.php');
if(isset($_SESSION['name']) && $_SESSION['first_login']==1){

?>

<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <?php include('views/user/include/head.php'); ?>
</head>
<body>
    
    <div id="wrapper">
         <?php include('views/user/include/header.php'); ?>
        <!-- /. NAV TOP  -->
         <?php include('views/user/include/left_menu.php'); ?>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                <div class="row">
                    <div class="col-lg-12">
                     <h2>QUẢN LÝ NHÂN SỰ </h2>   
                    </div>
                </div>              
                 <!-- /. ROW  -->
                  <hr />
               
                  <!-- /. ROW  --> 
                  
                  <?php if($_SESSION['role'] == 1){
                        $isAdmin = false;
                    }else{
                        $isAdmin = true;
                    } ?>
                            <div class="row text-center pad-top">
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6" style="<?php if(!$isAdmin) echo 'opacity:0.5'; ?>">
                      <div class="div-square">
                           <a href="views/user/list_department_view.php" onclick="<?php if(!$isAdmin) echo 'return false'; ?>" >
 <i class="fa fa-circle-o-notch fa-5x"></i>
                      <h4>Phòng ban</h4>
                      </a>
                      </div>
                  </div> 
                 
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6" style ="<?php if(!$isAdmin) echo 'opacity: 0.5'; ?>">
                      <div class="div-square">
                           <a href="views/user/list_user_view.php" onclick="<?php if(!$isAdmin) echo 'return false'; ?>">
 <i class="fa fa-lightbulb-o fa-5x"></i>
                      <h4>Tài khoản</h4>
                      </a>
                      </div>  
                  </div>
        
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="views/user/info_user_view.php" >
 <i class="fa fa-lightbulb-o fa-5x"></i>
                      <h4>Thông tin cá nhân</h4>
                      </a>
                      </div>  
                  </div>
                  <div class="col-lg-2 col-md-2 col-sm-2 col-xs-6">
                      <div class="div-square">
                           <a href="views/user/info_staff_view.php" >
 <i class="fa fa-lightbulb-o fa-5x"></i>
                      <h4>Thông tin cấp dưới</h4>
                      </a>
                      </div>  
                  </div>  
                  
              </div>
                 <!-- /. ROW  --> 
             <!-- /. PAGE INNER  -->
            </div>
         <!-- /. PAGE WRAPPER  -->
     </div>
    <?php
      include('views/user/include/footer.php');
    ?>
</body>
</html>
<?php
}else{
  header("location: views/user/login_view.php");
}
?>
<?php
include_once('library/database.php');
if(isset($_GET['controller'])){
      switch ($_GET['controller']) {
        case "user": include('controllers/user/controller.php');
        break;

      }
    } else{
      header("location:index.php?controller=user&action=login");
    }
?>