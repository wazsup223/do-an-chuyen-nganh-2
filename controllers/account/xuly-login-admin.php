<?php
    include('../../models/user/user.php'); //Gọi models tương tác bảng Khách hàng
    global $conn;

    if(isset($_POST['email']) && isset($_POST['password'])){
        $email = $_POST['email'];
        $pass = $_POST['password'];
        $phanquyen = 0;    //Khi login ở trang admin thì phải có phân quyền

        $user = new User();
        $result = $user->searchMailPassUser($email, $pass, $phanquyen);
        if($result){
            ini_set("session.cookie_lifetime",3*86400);
            session_name("admin");
            session_start();
            session_regenerate_id(); 
            $_SESSION['adminlogin'] = $result;
            echo 'success';
        }else{
            echo 'Sai thông tin đăng nhập';
        }
    }
    $conn->close();
?>