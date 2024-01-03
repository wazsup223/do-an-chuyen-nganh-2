<?php
    // Kiểm tra kết nối db
    include($_SERVER['DOCUMENT_ROOT'] . '/DoAnWeb2-BanDienThoai-MVC/config/connect.php');
    if(!$conn->connect_error){    //kết nối thành công
        class Product {
            function themSP($id_dmsp,$tensp,$gia_sp,$gia_khuyenmai,$soluong,$anh_sp,$motasp,$thongsokythuat) {
                global $conn;
                $sql = "INSERT INTO sanpham(id_dmsp, tensp, gia_sp, gia_khuyenmai, soluong, anh_sp, thongsokythuat) VALUES ('".$id_dmsp."','".$tensp."','".$gia_sp."','".$gia_khuyenmai."','".$soluong."','".$anh_sp."','".$motasp."','".$thongsokythuat."')";

                if (mysqli_query($conn, $sql)) {
                    return "success";
                } else {
                    return "non-success";
                }
            }
            function capnhatSP($id_sp,$id_dmsp,$tensp,$gia_sp,$gia_khuyenmai,$soluong,$anh_sp,$motasp,$thongsokythuat) {
                global $conn;
                $sql = "UPDATE sanpham SET 
                    id_dmsp = '".$id_dmsp."',
                    tensp = '".$tensp."',
                    gia_sp = '".$gia_sp."',
                    gia_khuyenmai = '".$gia_khuyenmai."',
                    soluong = '".$soluong."',
                    anh_sp = '".$anh_sp."',
                    motasp = '".$motasp."',
                    thongsokythuat = '".$thongsokythuat."'
                    WHERE id_sp = '".$id_sp."'
                ";

                if (mysqli_query($conn, $sql)) {
                    return "success";
                } else {
                    return "non-success";
                }
            }
            function xoaSP($id) {
                global $conn;
                $sql = "DELETE FROM sanpham WHERE id_sp = '".$id."' ";
                if (mysqli_query($conn, $sql)) {
                    return "success";
                } else {
                    return "non-success";
                }
            }
            function xuatSP() {
                global $conn;
                $sql = "SELECT * FROM sanpham";

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
            function xuatSP_theoDM($id_dmsp, $start = 0, $limit = -1) {         //Xuất sp theo danh mục
                global $conn;
                if($limit == -1){           
                    $sql = "SELECT * FROM sanpham WHERE id_dmsp = '".$id_dmsp."' ";
                }else{
                    $sql = "SELECT * FROM sanpham 
                            WHERE id_dmsp = '".$id_dmsp."' 
                            LIMIT ".$start.", ".$limit."
                    ";
                }

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

            function xuatMotSPTheoID($id_sp) {            //Xuất 1 sản phẩm theo id (cho trang chi tiết)
                global $conn;
                $sql = "SELECT * FROM sanpham
                        WHERE id_sp = '".$id_sp."' 
                ";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    $row = $result->fetch_assoc();
                    return $row;
                }else{
                    return 'No result';
                }
            }

            function searchTenSP($tensp, $start = 0, $limit = -1) {       
                global $conn;
                if($limit == -1){           
                    $sql = "SELECT * FROM sanpham
                        WHERE tensp LIKE '%".$tensp."%'     
                    ";
                }else{        //linit >= 0
                    $sql = "SELECT * FROM sanpham
                            WHERE tensp LIKE '%".$tensp."%'  
                            LIMIT ".$start.", ".$limit."   
                    ";
                }

                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    $rows = array();
                    while($row = $result->fetch_assoc()) {
                        array_push($rows, $row);
                    }
                    return $rows;
                }else{
                    return 'No result';      //Không tìm thấy kết quả
                }
            }

            function searchPriceSP() {       //Tìm sản phẩm nổi bật theo giá gốc cao nhất
                global $conn;
                $sql = "SELECT * FROM sanpham
                        ORDER BY gia_sp ASC
                        LIMIT 6
                ";

                $result = $conn->query($sql);
                if($result->num_rows > 0){
                    $rows = array();
                    while($row = $result->fetch_assoc()) {
                        array_push($rows, $row);
                    }
                    return $rows;
                }else{
                    return 'No result';      //Không tìm thấy kết quả
                }
            }

            function checkSoluongSP($id_sp, $soluongmua) {      //Kiểm tra số lượng SP cho vào giỏ
                global $conn;
                $sql = "SELECT soluong FROM sanpham
                        WHERE id_sp = '".$id_sp."'
                ";
               
                $result_soluong = $conn->query($sql);
                if($result_soluong->num_rows > 0){
                    $soluong_conlai = intval($result_soluong->fetch_assoc()['soluong']);
                    if($soluong_conlai == 0){
                        return 'Sản phẩm tạm hết hàng';
                    }
                    else if($soluongmua > $soluong_conlai){          
                        return 'Vượt quá số lượng sản phẩm hiện tại';
                    }
                    else{
                        return 'success';
                    }
                }else{
                    return 'Sản phẩm không tồn tại';
                }
            }

            function capnhatSoluongSP($id_sp, $soluongmua) {      //Cập nhật số lượng SP Khi đã thanh toán
                global $conn;
                $sql = "SELECT soluong FROM sanpham
                        WHERE id_sp = '".$id_sp."'
                ";
                $result_soluong = $conn->query($sql);
                if($result_soluong->num_rows > 0){
                    $soluong_conlai = intval($result_soluong->fetch_assoc()['soluong']);  //Số lượng trong kho
                    $capnhatsoluong = $soluong_conlai - $soluongmua;

                    if($capnhatsoluong < 0){
                        return 'Số lượng SP trong kho hiện không đủ!';
                    }
                    else if($capnhatsoluong >= 0){
                        $sql = "UPDATE sanpham
                                SET soluong = '".$capnhatsoluong."'
                                WHERE id_sp = '".$id_sp."'
                        ";
                        if (mysqli_query($conn, $sql)) {
                            return "success";
                        } else {
                            return "Lỗi cập nhật số lượng sp trong kho";
                        }
                    }
                }else{
                    return 'Sản phẩm không tồn tại';
                }
            }
        }
    }
?>