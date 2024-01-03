<?php
    include($_SERVER['DOCUMENT_ROOT'] . '/DoAnWeb2-BanDienThoai-MVC/config/connect.php');
    if(!$conn->connect_error){
        class HoaDon {
            function themHoaDon($id_kh,$ngaylaphd,$hoten,$sdt,$diachi,$tongtien,$trangthai) {
                global $conn;
                $sql = "INSERT INTO hoadon(id_kh,ngaylaphd,hoten,sdt,diachi,tongtien,trangthai) VALUES ('".$id_kh."','".$ngaylaphd."','".$hoten."','".$sdt."','".$diachi."','".$tongtien."','".$trangthai."')";

                if (mysqli_query($conn, $sql)) {
                    return "success";
                } else {
                    return "non-success";
                }
            }
            function xoaHoaDon($id_hd) {
                global $conn;
                $sql = "DELETE FROM hoadon WHERE id_hd = '".$id_hd."' ";
                if (mysqli_query($conn, $sql)) {
                    return "success";
                } else {
                    return "non-success";
                }
            }
            function xuatHoaDonTheoIDKH($id_kh) {      //Xuất hóa đơn theo mã KH
                global $conn;
                $sql = "SELECT * FROM hoadon WHERE id_kh = '".$id_kh."' ";

                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    $rows = array();
                    while($row = $result->fetch_assoc()) {
                        array_push($rows, $row);
                    }
                    return $rows;
                }else{
                    return 'No result';
                }
            }
            function xuatAllHoaDon() {      //Xuất toàn bộ hóa đơn
                global $conn;
                $sql = "SELECT * FROM hoadon ";

                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    $rows = array();
                    while($row = $result->fetch_assoc()) {
                        array_push($rows, $row);
                    }
                    return $rows;
                }else{
                    return 'No result';
                }
            }
        }
    }
?>