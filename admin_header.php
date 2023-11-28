<?php
   //nhúng vào các trang quản trị
   if(isset($message)){
      foreach($message as $message){//in ra thông báo trên cùng khi biến message được gán giá trị từ các trang quản trị
         echo '
         <div class="message">
            <span>'.$message.'</span>
            <i class="fas fa-times" onclick="this.parentElement.remove();"></i>
         </div>';
      }
   }
?>

<header class="header">

   <div class="flex">

      <a href="home.php" class="logo">Quản lý nhà kho</a>

      <nav class="navbar">
         <a href="home.php">Trang chủ</a>
         <a href="admin_products.php">Sản phẩm</a>
         <a href="admin_category.php">Danh mục</a>
         <a href="admin_supplier.php">Nhà cung cấp</a>
         <a href="admin_orders.php">Đơn hàng</a>
         <a href="admin_customers.php">Khách hàng</a>
         <a href="admin_statistical.php">Thống kê</a>
      </nav>

      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>

      <div class="account-box">
         <p>Tên người dùng : <span><?php echo $_SESSION['admin_name']; ?></span></p>
         <p>Email : <span><?php echo $_SESSION['admin_email']; ?></span></p>
         <a href="logout.php" class="delete-btn">Đăng xuất</a>
         <div><a href="login.php">Đăng nhập</a> | <a href="register.php">Đăng ký</a></div>
      </div>

   </div>

</header>