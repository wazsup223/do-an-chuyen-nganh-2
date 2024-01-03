<?php
    include('../../models/product-category/category.php');   //Gọi models tương tác bảng Khách hàng
    global $conn;

    // Các hàm xử lý 
    function getInfoDM_id($id_dmsp){       //Lấy danh mục theo id danh mục
        $category = new Category();
        $result = $category->xuatDM_theoID($id_dmsp);
        echo json_encode($result);
    }
    function getInfoDM_all(){             //Lấy toàn bộ danh mục trong csdl
        $category = new Category();
        $result = $category->xuatDM();
        echo json_encode($result);
    }
    function Del_DM($id_dmsp){       //Xóa danh mục theo id danh mục
        $category = new Category();
        $result = $category->xoaDM($id_dmsp);
        echo $result;
    }
    function Add_DM($ten_dm,$loai_dm){       //Thêm danh mục
        $category = new Category();
        $result = $category->themDM($ten_dm,$loai_dm);
        echo $result;
    }
    function Edit_DM($id_dmsp,$ten_dm,$loai_dm) {              //Cập nhật danh mục theo id danh mục
        $category = new Category();
        $result = $category->capnhatDM($id_dmsp,$ten_dm,$loai_dm);
        echo $result;
    }


    if(isset($_GET['action'])){              
        $action = $_GET['action'];
        if($action == 'getDM'){               //Lấy danh mục theo id danh mục
            if(isset($_GET['iddm'])){
                $id_dmsp = $_GET['iddm'];
                getInfoDM_id($id_dmsp);
            }
        }

        else if($action == 'getAllDM'){       //Lấy toàn bộ danh mục trong csdl
            getInfoDM_all();
        }

        else if($action == 'delDM') {
            if(isset($_GET['iddm'])){
                $id_dmsp = $_GET['iddm'];
                Del_DM($id_dmsp);
            }
        }

        else if($action == 'addDM') {
            if(isset($_GET['tendm']) && isset($_GET['loaidm'])){
                $ten_dm = $_GET['tendm'];
                $loai_dm = $_GET['loaidm'];
                Add_DM($ten_dm,$loai_dm);
            }
        }

        else if($action == 'editDM') {
            if(isset($_GET['iddm']) && isset($_GET['tendm']) && isset($_GET['loaidm'])){
                $id_dmsp = $_GET['iddm'];
                $ten_dm = $_GET['tendm'];
                $loai_dm = $_GET['loaidm'];
                Edit_DM($id_dmsp,$ten_dm,$loai_dm);
            }
        }
    }
?>