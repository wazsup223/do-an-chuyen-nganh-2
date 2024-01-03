<?php
    if(isset($_GET['user'])){
        $user = $_GET['user'];
        if($user === 'customer'){
            session_name("customer");
            session_start();
            if(isset($_SESSION['kh'])){
                unset($_SESSION['kh']);   //Hủy session
            }
            $url = '../../index.php';
            header('location: '.$url);
        }
        else if($user === 'admin'){
            session_name("admin");
            session_start();
            if(isset($_SESSION['adminlogin'])){
                unset($_SESSION['adminlogin']);
                // $url = '../../views/admin/login-admin.php';
                // header('location: '.$url);
            }
            $url = '../../views/admin/login-admin.php';
            header('location: '.$url);
        }
    }
?>