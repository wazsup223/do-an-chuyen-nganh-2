<?php
    if(session_status() == PHP_SESSION_NONE){
        session_name('admin');
        session_start();
    }
    if(isset($_SESSION['adminlogin'])){ 
        echo $_SESSION['adminlogin'];
    }else{
        echo 'timeout';
    }
?>