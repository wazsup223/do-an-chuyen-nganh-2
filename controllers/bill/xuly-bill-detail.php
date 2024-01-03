<?php
    include('../../models/bill/bill-detail.php');   //Gọi models tương tác bảng CT Hóa đơn
    global $conn;

    // Các hàm xử lý 
    function xuatCTHDtheoIDHD($id_hd){       //Lấy ct hóa đơn theo ID hóa đơn
        $cthd = new ChiTietHoaDon();
        $result = $cthd->xuatHoaDonTheoIdHD($id_hd);
        echo json_encode($result);
    }
    function xoaCTHDtheoIDHD($id_hd){           //Xóa ct hóa đơn theo mã hd
        $cthd = new ChiTietHoaDon();
        $result = $cthd->xoaCTHoaDon($id_hd);        
        echo $result;
    }
    function themCTHD($id_hd,$id_sp,$tensp,$soluong,$tongtien){         
        $cthd = new ChiTietHoaDon();
        $result = $cthd->themCTHoaDon($id_hd,$id_sp,$tensp,$soluong,$tongtien);          
        echo $result;
    }

    if(isset($_GET['action'])){
        $action = $_GET['action'];
        if($action == 'xuatCTHDtheoIDHD'){    
            if(isset($_GET['id_hd'])){
                $id_hd = $_GET['id_hd'];
                xuatCTHDtheoIDHD($id_hd);
            }      
        }
        else if($action == 'xoaCTHDtheoIDHD'){
            if(isset($_GET['id_hd'])){
                $id_hd = $_GET['id_hd'];
                xoaCTHDtheoIDHD($id_hd);
            }  
        }
        else if($action == 'themCTHD'){
            if(isset($_GET['id_hd']) && isset($_GET['id_sp']) && isset($_GET['tensp']) && isset($_GET['soluong']) && isset($_GET['tongtien'])){
                $id_hd = $_GET['id_hd'];
                $id_sp = $_GET['id_sp'];
                $tensp = $_GET['tensp'];
                $soluong = $_GET['soluong'];
                $tongtien = $_GET['tongtien'];
                themCTHD($id_hd,$id_sp,$tensp,$soluong,$tongtien);
            }
        }
    }
?>