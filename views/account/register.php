<base href="http://localhost:<?php echo $_SERVER['SERVER_PORT']; ?>/DoAnWeb2-BanDienThoai-MVC/" />
<?php
    session_start();
    include("../../config/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <base href="http://localhost:<?php echo $_SERVER['SERVER_PORT']; ?>/DoAnWeb2-BanDienThoai-MVC/" />
    <?php include("../../views/shared/import.php") ?>
    <link rel="stylesheet" href="assets/css/account/register.css">
    <title>Đăng Ký</title>
</head>
<body>
    <div class="register-wrapper">
        <div class="register-container">
            <div class="register-title">
                <h1>ĐĂNG KÝ</h1>
            </div>
            <div class="register-form">
                <form action="controllers/account/xuly-register.php" method="post">
                    <!-- Tên tài khoản -->
                    <div class="field field-accname">
                        <input type="text" name="acname" id="" placeholder="Tên tài khoản">
                    </div>
                    <p class="alert alert--acname"></p>

                    <!-- Họ tên khách hàng -->
                    <div class="field field-username">
                        <input type="text" name="uname" id="" placeholder="Họ tên">
                    </div>
                    <p class="alert alert--uname"></p>

                    <!-- Số điện thoại -->
                    <div class="field field-phone">
                        <input type="text" name="phone" id="" placeholder="Số điện thoại">
                    </div>
                    <p class="alert alert--phone"></p>
                    
                    <!-- Email -->
                    <div class="field field-mail">
                        <input type="text" name="mail" id="" placeholder="Email">
                    </div>
                    <p class="alert alert--mail"></p>

                    <!-- Địa chỉ -->
                    <div class="field field-address">
                        <input type="text" name="address" id="" placeholder="Địa chỉ">
                    </div>
                    <p class="alert alert--address"></p>

                    <!-- Mật khẩu -->
                    <div class="field field-pass">
                        <input type="password" name="pass" id="" placeholder="Password">
                        <span class="eye">
                            <i class="fa-solid fa-eye"></i>
                        </span>
                    </div>
                    <p class="alert alert--pass"></p>

                    <!-- Ngày sinh -->
                    <div class="field field-birth">
                        <input type="date" name="birth" id="" placeholder="Ngày sinh">
                    </div>
                    <p class="alert alert--birth"></p>

                    <!-- Ảnh đại diện -->
                    <div class="field field-avatar"> 
                        <span>Ảnh đại diện: </span>
                        <label id="upload" for="avt">Upload photo</label>
                        <label id="remove" for="" class="hidden">Remove photo</label>

                        <input type="file" name="avt" id="avt" placeholder="Ảnh tài khoản" accept=".png,.jpg,.jpeg" style="display: none">

                        <div class="wrap-avatar">
                            <a href="assets/images/uploads/customer-avatar/default-acc.png" target="_blank">
                                <img src="assets/images/uploads/customer-avatar/default-acc.png" alt="" class="account-avt">
                            </a>
                        </div>
                    </div>
                    <p class="alert alert--avatar" style="padding-top: 5px !important;"></p> 

                    <!-- Submit form -->
                    <button type="submit" class="btn">
                        <div class="name-btn">Sign Up</div>

                        <!-- Khi nhấn submit form thì hiển thị loading xoay tròn, sau khi nhận được kết quả trả về từ controllers thì có thể ẩn loading đi -->
                        <!-- <div class="loader hidden">        
                            <span class="ring"></span>
                        </div> -->
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script src="assets/js/account/validate-register.js"></script>
</body>
</html>