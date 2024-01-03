<?php
    // $data = json_decode(file_get_contents('php://input'));
    // echo json_encode($data);

    include('../../models/user/user.php'); //Gọi models tương tác bảng Khách hàng
    global $conn;

    if(isset($_POST['email']) && isset($_POST['password'])){
        $email = $_POST['email'];
        $pass = $_POST['password'];
        // $phanquyen = 1;    

        $user = new User();
        $result = $user->searchMailPassUser($email, $pass);
        if($result){
            ini_set("session.cookie_lifetime", 3*86400);    //Cho 3 ngày giữ trạng thái login kể từ ngày login
            session_name("customer");
            session_start();
            session_regenerate_id(); 
            $_SESSION['kh'] = $result;
            echo 'success';
            // $url = '../../index.php';
            // header('location: '. $url);
        }else{
            // $url = '../../views/account/login.php';
            // header('location: '. $url);
            echo 'Sai thông tin đăng nhập';
        }
    }
    $conn->close();
?>