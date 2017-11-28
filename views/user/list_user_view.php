<?php
session_start();
include('../../library/autoload.php');
include('../../models/user/user.php');

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
                        <a href="list_department_view.php"><i class="fa fa-table "></i>Phòng ban  <span class="badge">Included</span></a>
                    </li>
                   
                    <li>
                        <a href="list_user_view.php"><i class="fa fa-qrcode "></i>Tài khoản</a>
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
                <div class="row">
                    <div class="col-lg-12">
                     <h2>QUẢN TRỊ > TÀI KHOẢN</h2>   
                    </div>
                </div>              
                <div style="float: right;">
                    <a href="add_staff_view.php">(+) Thêm mới Tài khoản</a>
                </div>
                  <hr />
                  
                  
                
                <table class="table table-striped table-bordered table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Role</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                            //Code phân trang
                            $sotin1trang =4;
                            if(isset($_GET['trang'])){
                                $trang = $_GET['trang'];
                            }else{
                                $trang=1;
                            }
                            $from =($trang-1)*$sotin1trang;
                            
                            $conn = mysqli_connect("localhost", "root", "", "quanlynhansu");
                            $sql = "SELECT id, user_name, role FROM users LIMIT $from, $sotin1trang";
                            $list_user = mysqli_query($conn,$sql);
                            $result = array();
                            $i=0;
                            while ($row = mysqli_fetch_array($list_user)) {
                                $result[$i] = array("id"=>$row['id'], "user_name"=>$row['user_name'], "role"=>$row['role']);
                                $i++;
                            }
                           
                           
                           foreach ($result as $key=>$value) {
                            
                            ?>
                                <tr>
                                    <td><?php echo $value['id'] ?></td>
                                    <td><?php echo $value['user_name'] ?></td>
                                    <td><?php if($value['role']==0){echo "Admin";}else{echo "User";} ?></td>
                                    <td><a href="../../controllers/user/del_user.php?id=<?php echo $value['id'];?>">Xóa</a> | <a href="../../controllers/user/reset_pass.php?id=<?php echo $value['id']; ?>">Reset</a></td>
                                </tr>
                            <?php
                            }
                            ?>
                            </tbody>
                        </table>
                        
                         
                          <?php
                          //thanh phân trang
                            $x = mysqli_query($conn,"SELECT id, user_name, role FROM users");
                            $tongtin = mysqli_num_rows($x);
                            $sotrang = ceil($tongtin/$sotin1trang);
                            for ($i=1; $i <= $sotrang ; $i++) { 
                                echo "<a href ='list_user_view.php?trang=$i'>
                                        <li style = 'text-decoration: none;
                                                     margin-right: 5px;
                                                     background-color: #F3F3F3;
                                                     display: inline-block;
                                                     padding: 7px;'>".$i.
                                        "</li></a>";
                               
                            }
                             echo "<br>";
                          ?>
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