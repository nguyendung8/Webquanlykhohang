<?php

   include 'config.php';

   session_start();

   $admin_id = $_SESSION['admin_id']; //tạo session admin

   if(!isset($admin_id)){// session không tồn tại => quay lại trang đăng nhập
      header('location:login.php');
   }

   if(isset($_GET['delete'])){//xóa người dùng từ onclick href='delete'
      $delete_id = $_GET['delete'];
      mysqli_query($conn, "DELETE FROM `users` WHERE id = '$delete_id'") or die('query failed');
      header('location:admin_users.php');
   }

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Khách hàng</title>

   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
   <link rel="stylesheet" href="css/admin_style.css">

</head>
<body>
   
<?php include 'admin_header.php'; ?>

<section class="users">

   <h1 class="title"> Danh sách khách hàng </h1>

   <div class="box-container">
      <?php
         $select_customers = mysqli_query($conn, "SELECT * FROM `customers`") or die('query failed');
         while($fetch_customers = mysqli_fetch_assoc($select_customers)){
      ?>
      <div class="box">
         <p> Id người dùng : <span><?php echo $fetch_customers['id']; ?></span> </p>
         <p> Tên người dùng : <span><?php echo $fetch_customers['name']; ?></span> </p>
         <p> Email : <span><?php echo $fetch_customers['email']; ?></span> </p>
         <p> Quyền người dùng : <span style="color:<?php if($fetch_customers['user_type'] == 'admin'){ echo 'var(--orange)'; } ?>"><?php echo $fetch_customers['user_type']; ?></span> </p>
      <?php
         if($fetch_customers['user_type'] == 'admin'){
      ?>
            <a href="#" onclick="return confirm('Không thể xóa Admin?');" class="delete-btn">Xóa người dùng</a>
      <?php
         }else{
      ?>
            <a href="admin_users.php?delete=<?php echo $fetch_customers['id']; ?>" onclick="return confirm('Xóa người dùng này?');" class="delete-btn">Xóa người dùng</a>
      <?php      
         }
      ?>
      </div>
      <?php
         }
      ?>
   </div>

</section>

<script src="js/admin_script.js"></script>

</body>
</html>