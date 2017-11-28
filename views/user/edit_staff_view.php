<?php
session_start();
if($_SESSION['role']==0){
     if(isset($result)){  
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

                    <li class="active-link">
                        <a href="../../index.php"><i class="fa fa-desktop "></i>Trang quản trị <span class="badge">Included</span></a>
                    </li>
                   

                    <li>
                        <a href="../../views/user/list_department_view.php" ><i class="fa fa-table "></i>Phòng ban  <span class="badge">Included</span></a>
                    </li>
                    
                    <li>
                        <a href="../../views/user/list_user_view.php"><i class="fa fa-qrcode "></i>Tài khoản</a>
                    </li>
                    
                    <li>
                        <a href="../../views/user/info_user_view.php"><i class="fa fa-qrcode "></i>Thông tin cá nhân</a>
                    </li>
                    <li>
                        <a href="../../views/info_staff_view.php"><i class="fa fa-qrcode "></i>Thông tin cấp dưới</a>
                    </li>
                </ul>
                            </div>

        </nav>
        <!-- /. NAV SIDE  -->
        <div id="page-wrapper" >
            <div id="page-inner">
                                       
                  <hr />

                <form method="post"> 
                <table class="table table-striped table-bordered table-hover">
                <h2>Sửa thông tin nhân viên</h2>
                            
                            <tbody>

                                <tr>
                                    <td>Họ và tên</td>
                                    <td><input type="text" name="fullname" value="<?php echo $result['fullname']; ?>"></td>
                                </tr>
                               <tr>
                                    <td>Chức vụ </td>
                                    <td>
                                        <select name="position">
                                            <option value="1">Trưởng phòng</option>
                                            <option value="0">Nhân viên</option>
                                        </select>
                                    </td> 
                                </tr>
                                <tr>
                                    <td>Phòng ban </td>
                                    <td>
                                        <select name="department" >       
                                            <?php
                                            include('../../models/department/department.php');
                                            $department = new department;
                                            $row= $department->listDepartment();    
                                            print_r($row);
                                            foreach ($row as $key=>$value) {
                                                echo "<option value=\"" . $value['id'] . "\">";
                                                echo $value['name'];
                                                echo "</option>";
                                            }?>
                                        </select>
                                    </td> 
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
<?php
}
}else{
    header("location:login_view.php");
}
?>