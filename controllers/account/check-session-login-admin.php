<?php 
    // if(!isset($_SESSION['adminlogin'])){
    //     $url = '../../views/admin/login-admin.php';
    //     header('location:' . $url);
    // }

    if(session_status() == PHP_SESSION_NONE){
        session_name('admin');
        session_start();
    }
    if(!isset($_SESSION['adminlogin'])){
        $url = '../../views/admin/login-admin.php';
        header('location:' . $url);
    }

    if(isset($_SESSION['adminlogin'])){ 
        $parsedURL = parse_url($_SERVER['REQUEST_URI']);
        $path = $parsedURL['path'];
        if($path != '/DoAnWeb2-BanDienThoai-MVC/views/admin/index.php'){
            $url = '../../views/admin/index.php';
            header('location:' . $url);
        }
    }
?>