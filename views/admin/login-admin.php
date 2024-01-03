<!DOCTYPE html>
<html lang="en">
    <head>
    <base href="http://localhost:<?php echo $_SERVER['SERVER_PORT']; ?>/DoAnWeb2-BanDienThoai-MVC/" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="assets/images/logo/king-mobile-cut.jpg" type="image/x-icon">

    <?php include("../../views/shared/import.php") ?>

    <!-- Đây là link css riêng cho từng trang -->
    <link rel="stylesheet" href="assets/css/account/login.css">
    <style>
        body {
            background-color: #333333;
            background-image: none;
        }
    </style>
    <title>Admin Area</title>
</head>
<body>
    <?php 
        // Nếu admin đã đăng nhập rồi thì không cần đăng nhập nữa, và trở về trang chính của admin
        session_name('admin');
        session_start();
        if(isset($_SESSION['adminlogin'])) {
            $url = '../../views/admin/index.php';
            header('location:' . $url); 
        }
    ?>
    <div class="login-wrapper">
        <div class="login-container">
            <div class="login-title">
                <h1>ĐĂNG NHẬP QUẢN TRỊ</h1>
            </div>
            <div class="login-form"> 
                <form action="" method="post">
                    <div class="field field-mail">
                        <input type="text" name="email" id="" placeholder="Email">
                    </div>
                    <p class="alert alert--mail" style="margin-bottom: 2.5px !important"></p>
                    
                    <div class="field field-pass">
                        <input type="password" name="pass" id="" placeholder="Password">
                        <span class="eye">
                            <i class="fa-solid fa-eye"></i>
                        </span>
                    </div> 
                    <p class="alert alert--pass"></p>

                    <button type="submit" class="btn">Đăng nhập</button>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/js/account/validate-login-admin.js"></script>
</body>
</html>