<?php
    include('../../models/product-category/product.php');   //Gọi models tương tác bảng Khách hàng
    global $conn;

    // Các hàm xử lý 
    function getInfoSP_ten($tensp, $start, $limit, $total_page){       //Lấy sản phẩm theo tên (so khớp)
        $product = new Product();
        $result = $product->searchTenSP($tensp, $start, $limit);
        echo json_encode([$result, $total_page]);
    }
    function getInfoSP_ID($id_sp){       //Lấy sản phẩm theo ID
        $product = new Product();
        $result = $product->xuatMotSPTheoID($id_sp);
        echo json_encode($result);
    }
    function getAllSP(){       //Lấy toàn bộ sản phẩm
        $product = new Product();
        $result = $product->xuatSP();
        echo json_encode($result);
    }
    function getSP_theoDM($id_dmsp, $start, $limit, $total_page){       //Lấy toàn bộ sản phẩm theo danh mục
        $product = new Product();
        $result = $product->xuatSP_theoDM($id_dmsp, $start, $limit);
        echo json_encode([$result, $total_page]);
    }
    function Delsp($id){           //Xóa sp theo id
        $product = new Product();
        $result = $product->xoaSP($id);          
        echo $result;
    }
    function addSP($id_dmsp,$tensp,$gia_sp,$gia_khuyenmai,$soluong,$anh_sp,$motasp,$thongsokythuat){           //Thêm sp
        $product = new Product();
        $result = $product->themSP($id_dmsp,$tensp,$gia_sp,$gia_khuyenmai,$soluong,$anh_sp,$motasp,$thongsokythuat);          
        echo $result;
    }
    function editSP($id_sp,$id_dmsp,$tensp,$gia_sp,$gia_khuyenmai,$soluong,$anh_sp,$motasp,$thongsokythuat){           //Cập nhật sp
        $product = new Product();
        $result = $product->capnhatSP($id_sp,$id_dmsp,$tensp,$gia_sp,$gia_khuyenmai,$soluong,$anh_sp,$motasp,$thongsokythuat);          
        echo $result;
    }

    function SP_noibat(){           //Lấy sản phẩm nổi bật
        $product = new Product();
        $result = $product->searchPriceSP();          
        echo json_encode($result);
    }

    function xuly_phanTrang($soLuong, $current_page) {           
        $limit = 4;                                    //1 trang tối đa là 4 sản phẩm
        $total_page = ceil($soLuong / $limit);         //Tổng số trang cần phải phân ra

        // Ràng buộc giá trị của current_page
        if ($current_page > $total_page){           //Nếu số trang hiện tại lớn hơn tổng trang ==> đặt max
            $current_page = $total_page;
        }
        else if ($current_page < 1){          //Nếu số trang hiện tại nhỏ hơn 1 ==> đặt về 1
            $current_page = 1;
        }

        $start = ($current_page - 1) * $limit;    //Tạo start

        // tht = 2 , 16sp, limit 4
        // 4 4 4 4      2 - 1 = 1 * 4 = 4 , 3 - 1 2 x 4 8
        // 1 - 3, 4 - 7, 8 - 11 

        return [$start, $limit, $total_page];
    }

    if(isset($_GET['action'])){
        $action = $_GET['action'];
        if($action == 'getAllSP'){          //Lấy toàn bộ sản phẩm
            getAllSP();
        }
        else if($action == 'getSp-DM'){       //Lấy sản phẩm theo id danh mục
            if(isset($_GET['iddm']) && isset($_GET['page'])){
                $id_dmsp = $_GET['iddm'];
                $current_page = $_GET['page'];         //Trang hiện tại là trang số mấy

                $product = new Product();
                $result = $product->xuatSP_theoDM($id_dmsp, 0, -1);
                $soLuong = count($result);               // Lấy tổng số lượng sản phẩm theo danh mục

                $ketquaPhanTrang = xuly_phanTrang($soLuong, $current_page);
                getSP_theoDM($id_dmsp, $ketquaPhanTrang[0], $ketquaPhanTrang[1], $ketquaPhanTrang[2]);
            }
        }
        else if($action == 'search'){         
            if(isset($_GET['key']) && isset($_GET['page'])){      //Tìm sản phẩm theo tên sản phẩm
                $tensp = $_GET['key'];
                $current_page = $_GET['page'];      //Lấy tham số get từ trang search trong view

                $product = new Product();
                $result = $product->searchTenSP($tensp, 0, -1);
                if($result == 'No result'){
                    echo 'No result';
                }else{
                    $soLuong = count($result);

                    $ketquaPhanTrang = xuly_phanTrang($soLuong, $current_page);
                    getInfoSP_ten($tensp, $ketquaPhanTrang[0], $ketquaPhanTrang[1], $ketquaPhanTrang[2]);
                }
                
            }
        }
        else if($action == 'del'){                
            if(isset($_GET['id'])){               //Xóa sản phẩm theo id sản phẩm
                $id = $_GET['id'];
                Delsp($id);
            }
        }
        else if($action == 'add'){               //Thêm mới 1 sản phẩm
            if(isset($_GET['id_dmsp']) && isset($_GET['tensp']) && isset($_GET['gia_sp']) && isset($_GET['gia_khuyenmai']) && isset($_GET['soluong'])&& isset($_GET['motasp'])&&isset($_GET['thongsokythuat'])&&isset($_POST['typeAvatarProperty'])){
                $id_dmsp = $_GET['id_dmsp'];
                $tensp = $_GET['tensp'];
                $gia_sp = $_GET['gia_sp'];
                $gia_khuyenmai = $_GET['gia_khuyenmai'];
                $soluong = $_GET['soluong'];
                $motasp = $_GET['motasp'];
                $thongsokythuat = $_GET['thongsokythuat'];

                $typeAvatarProperty = $_POST['typeAvatarProperty'];
                if($typeAvatarProperty == 'string'){
                    if(isset($_POST['avatar'])){
                        $avatar = $_POST['avatar'];       //User ko set ảnh đại diện
                        addSP($id_dmsp,$tensp,$gia_sp,$gia_khuyenmai,$soluong,$avatar,$motasp,$thongsokythuat);
                    } 
                }else{
                    if(isset($_FILES['avatar'])){                //User set ảnh đại diện          
                        $_FILES['avatar']['name'] = uniqid('pd_', true);
                        $duoiFile = pathinfo($_FILES['avatar']['full_path'], PATHINFO_EXTENSION);   //Đuôi file
                        $avatar = $_FILES['avatar']['name'] . '.' .$duoiFile;

                        $thuMucDich = "../../assets/images/products/"; // Đường dẫn đến thư mục "products"
                        $duongDanMoi = $thuMucDich . $avatar;
                        if (move_uploaded_file($_FILES['avatar']['tmp_name'], $duongDanMoi)) {
                            // echo "Tệp tin đã được tải lên và lưu thành công.";
                            addSP($id_dmsp,$tensp,$gia_sp,$gia_khuyenmai,$soluong,$avatar,$motasp,$thongsokythuat);
                        } else {
                            echo "Can't save avatar";
                        }
                    } 
                }
            }
        }
        else if($action == 'edit'){                   //Thêm mới 1 sản phẩm
            if(isset($_GET['id_sp']) && isset($_GET['id_dmsp']) && isset($_GET['tensp']) && isset($_GET['gia_sp']) && isset($_GET['gia_khuyenmai']) && isset($_GET['soluong'])&& isset($_GET['anh_sp'])&& isset($_GET['motasp'])&&isset($_GET['thongsokythuat'])){
                $id_sp = $_GET['id_sp'];
                $id_dmsp = $_GET['id_dmsp'];
                $tensp = $_GET['tensp'];
                $gia_sp = $_GET['gia_sp'];
                $gia_khuyenmai = $_GET['gia_khuyenmai'];
                $soluong = $_GET['soluong'];
                $anh_sp = $_GET['anh_sp'];
                $motasp = $_GET['motasp'];
                $thongsokythuat = $_GET['thongsokythuat'];
                editSP($id_sp,$id_dmsp,$tensp,$gia_sp,$gia_khuyenmai,$soluong,$anh_sp,$motasp,$thongsokythuat);
            }
        }

        else if($action == 'sp-noi-bat'){
            SP_noibat();
        }

        else if($action == 'chi-tiet-sp'){
            if(isset($_GET['id_sp'])){               //lấy 1 sản phẩm theo id sản phẩm
                $id_sp = $_GET['id_sp'];
                getInfoSP_ID($id_sp);
            }
        }
    }

    // echo "abc";
?>