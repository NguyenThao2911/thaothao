<?php
session_start();
include('../../library/autoload.php');
include('../../models/department/department.php');

if($_SESSION['role']==0){
 
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
                <div class="row">
                    <div class="col-lg-12">
                     <h2>QUẢN TRỊ > PHÒNG BAN</h2>   
                    </div>
                </div>              
                <div style="float: right;">
                    <a href="add_department_view.php">(+) Thêm mới Phòng ban</a>
                </div>
                  <hr />
                  
                <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Staff</th>
                                    <th>Action</th>

                                </tr>
                            </thead>
                            <tbody>
                            <?php

                            $department = new department;
                            $result= $department->listDepartment();
                           
                           foreach ($result as $key=>$value) {
                            
                            ?>
                                <tr>
                                    <td><?php echo $value['id'] ?></td>
                                    <td><?php echo $value['name'] ?></td>
                                    <td><a href="list_staff_view.php?id=<?php echo $value['id'];?>">Danh sách</a></td>
                                    <td><a href="../../controllers/user/edit_department.php?id=<?php echo $value['id']; ?>">Sửa</a> | <a href="../../controllers/user/del_department.php?id=<?php echo $value['id']; ?>">Xóa</a></td>
                                </tr>
                            <?php
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