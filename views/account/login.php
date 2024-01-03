<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="http://localhost:<?php echo $_SERVER['SERVER_PORT']; ?>/DoAnWeb2-BanDienThoai-MVC/" />
    <?php include("../../views/shared/import.php") ?>
    <link rel="stylesheet" href="assets/css/account/login.css">
    <title>Đăng nhập</title>
</head>
<body>
    <?php 
        // Nếu khách hàng đã đăng nhập rồi thì không cần đăng nhập nữa, và trở về trang chủ
        session_name('customer');
        session_start();
        if(isset($_SESSION['kh'])) {
            $url = '../../index.php';
            header('location:' . $url); 
        }
    ?>
    <div class="login-wrapper">
        <div class="login-container">
            <div class="login-title">
                <h1>ĐĂNG NHẬP</h1>
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

                    <button type="submit" class="btn">Sign in</button>

                    <a href="views/account/register.php" class="dnthave">Chưa có tài khoản? Đăng ký ngay</a>
                </form>
            </div>
        </div>
    </div>

    <script src="assets/js/account/validate-login.js"></script>
</body>
</html>