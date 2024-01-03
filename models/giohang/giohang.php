<?php
    // Kiểm tra kết nối db
    include($_SERVER['DOCUMENT_ROOT'] . '/DoAnWeb2-BanDienThoai-MVC/config/connect.php');
    if(!$conn->connect_error){    //kết nối thành công
        class Cart {
            function themCart($id_kh,$id_sp,$soluongmua=1,$tongtien,$tensp,$anh_sp) {
                global $conn;
                $sql = "INSERT INTO giohang(id_kh, id_sp, soluong, tongtien, tensp, anh_sp) VALUES ('".$id_kh."','".$id_sp."','".$soluongmua."','".$tongtien."','".$tensp."','".$anh_sp."')";

                if (mysqli_query($conn, $sql)) {
                    return "success";
                } else {
                    return "non-success";
                }
            }
            function capnhatCart($id_kh,$id_sp,$soluongmua,$tongtien) {
                global $conn;
                $sql = "UPDATE giohang SET 
                        soluong = '".$soluongmua."',
                        tongtien = '".$tongtien."'
                        WHERE id_kh = '".$id_kh."' AND id_sp = '".$id_sp."'
                ";

                if (mysqli_query($conn, $sql)) {
                    return "success";
                } else {
                    return "non-success";
                }
            }
            function xoaCart($id_kh, $id_sp) {
                global $conn;
                $sql = "DELETE FROM giohang 
                        WHERE id_kh = '".$id_kh."' AND id_sp = '".$id_sp."'
                ";

                if (mysqli_query($conn, $sql)) {
                    return "success";
                } else {
                    return "non-success";
                }
            }
            function xoaAllCart($id_kh) {
                global $conn;
                $sql = "DELETE FROM giohang 
                        WHERE id_kh = '".$id_kh."'
                ";

                if (mysqli_query($conn, $sql)) {
                    return "success";
                } else {
                    return "non-success";
                }
            }
            function xuatCart($id_kh) {
                global $conn;
                $sql = "SELECT * FROM giohang
                        WHERE id_kh = '".$id_kh."';
                ";

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