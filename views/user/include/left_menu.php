<nav class="navbar-default navbar-side" role="navigation">
            <div class="sidebar-collapse">
                <ul class="nav" id="main-menu">
                    <?php if($_SESSION['role'] == 1){
                        $isAdmin = false;
                    }else{
                        $isAdmin = true;
                    } ?>


                    <li class="active-link" style="<?php if(!$isAdmin) echo 'opacity:0.5'; ?>">
                        <a href="index.php" onclick="<?php if(!$isAdmin) echo 'return false'; ?>"><i class="fa fa-desktop "></i>Trang quản trị <span class="badge">Included</span></a>
                    </li>

                    <li style="<?php if(!$isAdmin) echo 'opacity:0.5'; ?>">
                        <a href="views/user/list_department_view.php" onclick="<?php if(!$isAdmin) echo 'return false'; ?>"><i class="fa fa-table "></i>Phòng ban  <span class="badge">Included</span></a>
                    </li>

                    <li style="<?php if(!$isAdmin) echo 'opacity:0.5'; ?>">
                        <a href="views/user/list_user_view.php" onclick="<?php if(!$isAdmin) echo 'return false'; ?>"><i class="fa fa-qrcode "></i>Tài khoản</a>
                    </li>
    
                     <li>
                        <a href="views/user/info_user_view.php"><i class="fa fa-qrcode "></i>Thông tin cá nhân</a>
                    </li>

                     <li>
                        <a href="views/user/info_staff_view.php"><i class="fa fa-qrcode "></i>Thông tin cấp dưới</a>
                    </li>
                    
                </ul>
                            </div>

        </nav>