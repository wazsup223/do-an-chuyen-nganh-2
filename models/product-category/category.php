<?php
    // Kiểm tra kết nối db
    include($_SERVER['DOCUMENT_ROOT'] . '/DoAnWeb2-BanDienThoai-MVC/config/connect.php');
    if(!$conn->connect_error){    //kết nối thành công
        class Category {
            function themDM($ten_dm,$loai_dm) {
                global $conn;
                $sql = "INSERT INTO danhmucsp(ten_dm, loai_dm) VALUES ('".$ten_dm."','".$loai_dm."')";

                if (mysqli_query($conn, $sql)) {
                    return "success";
                } else {
                    return "non-success";
                }
            }
            function capnhatDM($id_dmsp,$ten_dm,$loai_dm) {
                global $conn;
                $sql = "UPDATE danhmucsp SET 
                    ten_dm = '".$ten_dm."',
                    loai_dm = '".$loai_dm."'
                    WHERE id_dmsp = '".$id_dmsp."'
                ";

                if (mysqli_query($conn, $sql)) {
                    return "success";
                } else {
                    return "non-success";
                }
            }
            function xoaDM($id_dmsp) {
                global $conn;
                $sql = "DELETE FROM danhmucsp WHERE id_dmsp = '".$id_dmsp."' ";
                if (mysqli_query($conn, $sql)) {
                    return "success";
                } else {
                    return "non-success";
                }
            }
            function xuatDM() {
                global $conn;
                $sql = "SELECT * FROM danhmucsp";

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
            function xuatDM_theoID($id_dmsp) {         //Xuất danh mục theo id danh mục
                global $conn;
                $sql = "SELECT * FROM danhmucsp WHERE id_dmsp = '".$id_dmsp."' ";

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