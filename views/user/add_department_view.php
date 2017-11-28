<?php
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
                 


                    <li class="active-link">
                        <a href="../../index.php" ><i class="fa fa-desktop "></i>Trang quản trị <span class="badge">Included</span></a>
                    </li>                  
                    <li>
                        <a href="../../views/user/list_department_view.php"><i class="fa fa-table "></i>Phòng ban  <span class="badge">Included</span></a>
                    </li>
                    <li>
                        <a href="../../views/user/list_user_view.php"><i class="fa fa-qrcode "></i>Tài khoản</a>
                    </li>
                    <li>
                        <a href="../../views/user/info_user_view.php"><i class="fa fa-qrcode "></i>Thông tin cá nhân</a>
                    </li>
                    <li>
                        <a href="../../views/user/info_staff_view.php"><i class="fa fa-qrcode "></i>Thông tin cấp dưới</a>
                    </li>           

                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                                       
                  <hr />

                <form method="post" action="../../controllers/user/add_department.php"> 
                <table class="table table-striped table-bordered table-hover">
                <h2>Thêm mới phòng ban</h2>
                            
                            <tbody>
                                <?php
                                    if(isset($err)){echo "<b>".$err."</b>";};
                                ?>
                                <tr>
                                    <td>Tên phòng ban </td>
                                    <td><input type="text" name="name"></td>
                                </tr>
                                <tr>
                                    <td>Mô tả </td>
                                    <td><input type="textarea" name="disc"></td> 
                                </tr>
                                
                                <tr>
                                <td colspan="2">
                                    <input type="submit" name="submit" value="Cập nhật">
                                    <input type="reset" name="reset" value="Làm mới">
                                </td>
                                </tr>
                            
                            </tbody>
                        </table>

            </div>
    
        </div>
    <?php
    	include('include/footer.php');
    ?>
</body>
</html>
