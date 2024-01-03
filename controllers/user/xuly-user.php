<?php
    include('../../models/user/user.php');   //Gọi models tương tác bảng Khách hàng
    global $conn;

    // Các hàm xử lý 
    function getInfoUser($id){
        $user = new User();
        $result = $user->searchIDUser($id);
        echo json_encode($result);
    }
    function getAllUser(){
        $user = new User();
        $result = $user->xuatUser();
        if($result == 'No result'){
            echo 'fail';
        }else{
            echo json_encode($result);
        }
    }
    function AddUser($tentk,$hoten,$sdt,$email,$password,$dob,$avatar,$address){
        $user = new User();
        $result = $user->themUser($tentk,$hoten,$sdt,$email,$password,$dob,$avatar,$address);
        echo $result;
    }
    function DelUser($id){
        $user = new User();
        $result = $user->xoaUser($id);
        echo $result;
    }
    // function UpdateUser($id,$tentk,$hoten,$sdt,$email,$password,$dob,$avatar,$address){
    //     $user = new User();
    //     $result = $user->capnhatUser($id,$tentk,$hoten,$sdt,$email,$password,$dob,$avatar,$address);
    //     echo $result;
    // }
    

    if(isset($_POST['action'])){
        $action = $_POST['action'];

        if($action == 'getProfile'){        //Lấy thông tin khách hàng ở trang profile
            session_name("customer");
            session_start();
            if(isset($_SESSION['kh'])){
                $pieces = explode(':', $_SESSION['kh']);
                getInfoUser($pieces[0]);
            }else{
                echo 'session_timeout';
            }
        }

        if($action == 'getAll'){          //Lấy toàn bộ ds khách hàng, chỉ dành cho admin
            session_name("admin");
            session_start();
            if(isset($_SESSION['adminlogin'])){
                getAllUser();
            }else{
                $url = '../../views/admin/index.php';
                header('location:' . $url);
            }
        }

        if($action == 'add'){           //Thêm khách hàng
            if(isset($_POST['tentk']) && isset($_POST['hoten']) && isset($_POST['sdt']) && isset($_POST['email']) && isset($_POST['password'])&& isset($_POST['dob'])&& isset($_POST['address'])&&isset($_POST['typeAvatarProperty'])){
                $tentk = $_POST['tentk'];
                $hoten = $_POST['hoten'];
                $sdt = $_POST['sdt'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                $dob = $_POST['dob'];
                $address = $_POST['address'];

                $typeAvatarProperty = $_POST['typeAvatarProperty'];
                if($typeAvatarProperty == 'string'){
                    if(isset($_POST['avatar'])){
                        $avatar = $_POST['avatar'];       //User ko set ảnh đại diện
                        AddUser($tentk,$hoten,$sdt,$email,$password,$dob,$avatar,$address);
                    } 
                }else{
                    if(isset($_FILES['avatar'])){                //User set ảnh đại diện          
                        $_FILES['avatar']['name'] = uniqid('avatar_', true);
                        $duoiFile = pathinfo($_FILES['avatar']['full_path'], PATHINFO_EXTENSION);   //Đuôi file
                        $avatar = $_FILES['avatar']['name'] . '.' .$duoiFile;

                        $thuMucDich = "../../assets/images/uploads/customer-avatar/"; // Đường dẫn đến thư mục "uploads"
                        $duongDanMoi = $thuMucDich . $avatar;
                        if (move_uploaded_file($_FILES['avatar']['tmp_name'], $duongDanMoi)) {
                            // echo "Tệp tin đã được tải lên và lưu thành công.";
                            AddUser($tentk,$hoten,$sdt,$email,$password,$dob,$avatar,$address);
                        } else {
                            echo "Can't save avatar";
                        }
                    } 
                }
            }
        }

        if($action == 'del'){              //xóa khách hàng, dành cho admin
            session_name("admin");
            session_start();
            if(isset($_SESSION['adminlogin'])){
                if(isset($_POST['id_kh'])){
                    $id = $_POST['id_kh'];

                    $user = new User();
                    $result = $user->searchIDUser($id);
                    $avatar_name = $result['avatar'];
                    $duongDan = "../../assets/images/uploads/customer-avatar/".$avatar_name;

                    if($duongDan != "../../assets/images/uploads/customer-avatar/default-acc.png"){    //Xóa tệp tin trong thư mục uploads/customer-avatar
                        if (file_exists($duongDan)) {
                            unlink($duongDan);
                        }
                    }
                    DelUser($id);
                }
            }else{
                $url = '../../views/admin/index.php';
                header('location:' . $url);
            }
        }

        // if($action == 'update'){
        //     if(isset($_POST['id_kh']) && isset($_POST['tentk']) && isset($_POST['hoten']) && isset($_POST['sdt']) && isset($_POST['email']) && isset($_POST['password']) && isset($_POST['dob']) && isset($_POST['avatar'])&& isset($_POST['address'])){
        //         $id = $_POST['id_kh'];
        //         $tentk = $_POST['tentk'];
        //         $hoten = $_POST['hoten'];
        //         $sdt = $_POST['sdt'];
        //         $email = $_POST['email'];
        //         $password = $_POST['password'];
        //         $dob = $_POST['dob'];
        //         $avatar = $_POST['avatar'];
        //         $address = $_POST['address'];
        //         UpdateUser($id,$tentk,$hoten,$sdt,$email,$password,$dob,$avatar,$address);
        //     }
        // }
    }
?>