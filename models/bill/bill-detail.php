<?php
    include($_SERVER['DOCUMENT_ROOT'] . '/DoAnWeb2-BanDienThoai-MVC/config/connect.php');
    if(!$conn->connect_error){
        class ChiTietHoaDon {
            function themCTHoaDon($id_hd,$id_sp,$tensp,$soluong,$tongtien) {
                global $conn;
                $sql = "INSERT INTO chitiethd(id_hd,id_sp,tensp,soluong,tongtien) VALUES ('".$id_hd."','".$id_sp."','".$tensp."','".$soluong."','".$tongtien."')";

                if (mysqli_query($conn, $sql)) {
                    return "success";
                } else {
                    return "non-success";
                }
            }
            function xoaCTHoaDon($id_hd) {
                global $conn;
                $sql = "DELETE FROM chitiethd WHERE id_hd = '".$id_hd."' ";
                if (mysqli_query($conn, $sql)) {
                    return "success";
                } else {
                    return "non-success";
                }
            }
            function xuatHoaDonTheoIdHD($id_hd) {      //Xuất chi tiêt hóa đơn theo mã Hóa đơn
                global $conn;
                $sql = "SELECT * FROM chitiethd WHERE id_hd = '".$id_hd."' ";

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