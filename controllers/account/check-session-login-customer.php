<?php
    session_name("customer");
    session_start();
    if(isset($_SESSION['kh'])){
        echo $_SESSION['kh'];
    }else{
        echo 'timeout';
    }
?>