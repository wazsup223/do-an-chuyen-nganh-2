<?php
    include('../../models/bill/bill-list.php');   //Gọi models tương tác bảng Hóa đơn
    global $conn;

    // Các hàm xử lý 
    function xuatHDtheoIDKH($id_kh){       //Lấy hóa đơn theo ID khách hàng
        $hd = new HoaDon();
        $result = $hd->xuatHoaDonTheoIDKH($id_kh);
        echo json_encode($result);
    }
    function xuatAllHD(){       //Lấy toàn hóa đơn trong bảng hóa đơn
        $hd = new HoaDon();
        $result = $hd->xuatAllHoaDon();
        echo json_encode($result);
    }
    function xoaHDtheoIDHD($id_hd){           //Xóa hóa đơn theo mã khách hàng
        $hd = new HoaDon();
        $result = $hd->xoaHoaDon($id_hd);          
        echo $result;
    }
    function themHD($id_kh,$ngaylaphd,$hoten,$sdt,$diachi,$tongtien,$trangthai){           //Thêm sp
        $hd = new HoaDon();
        $result = $hd->themHoaDon($id_kh,$ngaylaphd,$hoten,$sdt,$diachi,$tongtien,$trangthai);          
        echo $result;
    }

    if(isset($_GET['action'])){
        $action = $_GET['action'];
        if($action == 'xuatHDtheoIDKH'){    
            if(isset($_GET['id_kh'])){
                $id_kh = $_GET['id_kh'];
                xuatHDtheoIDKH($id_kh);
            }      
        }
        else if($action == 'xuatAllHD'){
            xuatAllHD();
        }
        else if($action == 'xoaHDtheoIDHD'){
            if(isset($_GET['id_hd'])){
                $id_hd = $_GET['id_hd'];
                xoaHDtheoIDHD($id_hd);
            }  
        }
        else if($action == 'themHD'){
            if(isset($_GET['id_kh']) && isset($_GET['ngaylaphd']) && isset($_GET['hoten']) && isset($_GET['sdt']) && isset($_GET['diachi']) && isset($_GET['tongtien'])&& isset($_GET['trangthai'])){
                $id_kh = $_GET['id_kh'];
                $ngaylaphd = $_GET['ngaylaphd'];
                $hoten = $_GET['hoten'];
                $sdt = $_GET['sdt'];
                $diachi = $_GET['diachi'];
                $tongtien = $_GET['tongtien'];
                $trangthai = $_GET['trangthai'];
                themHD($id_kh,$ngaylaphd,$hoten,$sdt,$diachi,$tongtien,$trangthai);
            }
        }
    }
?>