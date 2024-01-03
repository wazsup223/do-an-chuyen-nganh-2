<?php 
    session_name('admin');
    session_start();
    include($_SERVER['DOCUMENT_ROOT'] . "/DoAnWeb2-BanDienThoai-MVC/controllers/account/check-session-login-admin.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <base href="http://localhost:<?php echo $_SERVER['SERVER_PORT']; ?>/DoAnWeb2-BanDienThoai-MVC/" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <?php include("../../views/shared/import.php") ?>

    <link rel="stylesheet" href="assets/css/admin/sidebar-logo.css">
    <link rel="stylesheet" href="assets/css/admin/account-view-style.css">
    <link rel="stylesheet" href="assets/css/admin/manage-zone-style.css">

    <link rel="stylesheet" href="assets/css/account/register.css">
    <title>Trang Quản Trị</title>
</head>
<body>
    <div class="wrapper-full">
        <?php include("../../views/admin/sidebar.php"); ?>
        <div class="content-main">
            <?php include("../../views/admin/account-view.php"); ?>
            <?php 
                $param = 'user-manage';
                if(isset($_GET['param'])){
                    switch ($_GET['param']) {
                        case 'user-manage':
                            $param = 'user-manage';
                            break;
                        case 'product-manage':
                            $param = 'product-manage';
                            break;
                        case 'category-manage':
                            $param = 'category-manage';
                            break;        
                        case 'bill-list-manage':
                            $param = 'bill-list-manage';
                            break;
                        case 'view-bill-detail':
                            $param = 'view-bill-detail';
                            break;
                        default:
                            $param = 'user-manage';
                            break;
                    }
                }
                
                include("../../views/admin/".$param.".php");
            ?>
        </div>

        <!-- <script>
            let btns = document.querySelectorAll('button');
            btns.forEach(element => {
                element.onclick = ()=>{
                    console.log(element.innerHTML);
                }
            });
        </script> -->
    </div>
</body>
</html>