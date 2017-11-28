<div class="footer">
      
    
            <div class="row">
                <div class="col-lg-12" >
                    &copy;  2017 QUẢN LÝ NHÂN SỰ | Design by: <a href="#" style="color:#fff;" target="_blank">Nguyễn Thảo</a>
                </div>
            </div>
        </div>
        <?php
		if(!empty($_SESSION['thongbao'])){
		    echo '<script>alert("'. $_SESSION['thongbao'] .'")</script>';
		    unset($_SESSION['thongbao']); //hien thong bao
		}
        ?>