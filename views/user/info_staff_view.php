<?php
session_start();
if($_SESSION['name']){
     
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
      <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Simple Responsive Admin</title>
    <!-- BOOTSTRAP STYLES-->
    <link href="../../public/css/admin/bootstrap.css" rel="stylesheet" />
     <!-- FONTAWESOME STYLES-->
    <link href="../../public/css/admin/font-awesome.css" rel="stylesheet" />
        <!-- CUSTOM STYLES-->
    <link href="../../public/css/admin/custom.css" rel="stylesheet" />
     <!-- GOOGLE FONTS-->
   <link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

    <!-- /. WRAPPER  -->
    <!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
    <!-- JQUERY SCRIPTS -->
    <script src="../../public/js/admin/jquery-1.10.2.js"></script>
      <!-- BOOTSTRAP SCRIPTS -->
    <script src="../../public/js/admin/bootstrap.min.js"></script>
      <!-- CUSTOM SCRIPTS -->
    <script src="../../public/js/admin/custom.js"></script>
    
</head>
<body>
         
    <div id="wrapper">
         <div class="navbar navbar-inverse navbar-fixed-top">
            <div class="adjust-nav">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".sidebar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    
                </div>
              
                <span class="logout-spn" >
                  <?php
                    
                    if(isset($_SESSION['name'])){
                        echo "Xin chào ! ".$_SESSION['name']." | ";
                    }
                  ?>
                  <a href="../../index.php?controller=user&action=logout" style="color:#fff;">LOGOUT</a>  

                </span>
            </div>
        </div>
        <!-- /. NAV TOP  -->
        <!--LEFT MENU-->
         <nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                 
                    <?php if($_SESSION['role'] == 1){
                        $isAdmin = false;
                    }else{
                        $isAdmin = true;
                    } ?>

                    <li class="active-link" style="<?php if(!$isAdmin) echo 'opacity:0.5'; ?>">
                        <a href="../../index.php"><i class="fa fa-desktop " onclick="<?php if(!$isAdmin) echo 'return false'; ?>"></i>Trang quản trị <span class="badge">Included</span></a>
                    </li>
                   
                    <li style="<?php if(!$isAdmin) echo 'opacity:0.5'; ?>">
                        <a href="list_department_view.php" onclick="<?php if(!$isAdmin) echo 'return false'; ?>"><i class="fa fa-table "></i>Phòng ban  <span class="badge">Included</span></a>
                    </li>

                    <li style="<?php if(!$isAdmin) echo 'opacity:0.5'; ?>">
                        <a href="list_user_view.php" onclick="<?php if(!$isAdmin) echo 'return false'; ?>"><i class="fa fa-qrcode "></i>Tài khoản</a>
                    </li>
                    
                    <li>
                        <a href="info_user_view.php"><i class="fa fa-qrcode "></i>Thông tin cá nhân</a>
                    </li>
                    <li>
                        <a href="info_staff_view.php"><i class="fa fa-qrcode "></i>Thông tin cấp dưới</a>
                    </li>
                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                                       
                  <hr />

                <table class="table table-striped table-bordered table-hover">
                <h2>Thông tin cấp dưới :

                <?php 
                include('../../models/user/user.php');

                //Lấy ra thông tin người dùng
                    if(isset($_SESSION['id'])){
                    $id = $_SESSION['id'];
                    $user = new user();  
                    $user->set_id($id);   
                    $row = $user->infoUser();

                    echo $row['name']; //hiển thị phòng ban người dùng
                ?></h2>
                            
                            <tbody>
                                <?php     
                                    //Kiểm tra xem nếu người dùng là Trưởng phòng thì in ra các thông tin nhân viên cấp dưới phòng ban đó
                                    if($row['position']==1){
                                    $info_staff = new user();
                                    $row1 = $info_staff->infoStaff();
                                                
                                                      
                                                                   
                                ?>
                                <tr>
                                    <td>STT</td>
                                    <td>Họ và tên </td>
                                    <td>Ngày sinh </td>
                                    <td>Giới tính </td>
                                    <td>Email </td>
                                    <td>Chức vụ </td>
                                    
                                </tr>  
                                <?php 
                                //Lặp in các thông tin cấp dưới
                                    foreach ($row1 as $key => $value) {

                                ?> 
                                                
                                <tr>
                                    <td><?php  ?></td>
                                    <td><?php echo $value['fullname']; ?></td>
                                    <td><?php echo $value['birthday']; ?></td>
                                    <td><?php echo $value['sex']; ?></td>
                                    <td><?php echo $value['email']; ?></td>
                                    <td><?php if($value['position']==0){echo "Nhân viên";} else{echo "Trưởng phòng"; }?> </td>
                                    
                                </tr>
                                
                                <?php
                                    
                                    }
                                    } else{ //Ngược lại nếu người đó là nhân viên thì không có nhân viên cấp dưới
                                        echo "Không có nhân viên nào dưới cấp của bạn";
                                    }
                                    }             
                                ?>
                            </tbody>
                        </table>
            </div>
    
        </div>
    <?php
    	include('include/footer.php');
    ?>
</body>
</html>
<?php
}
else{
    header("location:login_view.php");
}
?>