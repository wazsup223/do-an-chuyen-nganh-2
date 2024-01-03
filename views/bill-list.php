<base href="http://localhost:<?php echo $_SERVER['SERVER_PORT']; ?>/DoAnWeb2-BanDienThoai-MVC/" />
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Tệp giaodien/import.php dùng để dùng chung các đường dẫn css và js cho mọi trang -->
    <?php include("../views/shared/import.php") ?>

    <!-- Đây là link css riêng cho từng trang -->
    <link rel="stylesheet" href="assets/css/bill-list.css">
    <title>Hóa đơn</title>
</head>
<body>
    <div class="wrapper">
        <!-- Phần header -->
        <?php include("../views/shared/header.php")?>

        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Phần Sitebar danh mục sản phẩm -->
            <?php include("../views/shared/danh-muc-sp.php")?>

            <!-- Phần main content, phần này tùy page mà có giao diện khác nhau -->
            <div class="content-item content-main">
                <h1>Lịch sử đơn hàng</h1>
                <div class="bill-zone bill-not-exist">
                    <p style="font-size: 2.2rem; padding-left: 1%">Bạn chưa có đơn hàng nào cả!!!</p>
                </div>
                <div class="bill-zone bill-exist">
                    <table>
                        <thead>
                            <tr>
                                <th>Mã hóa đơn</th>
                                <th>Ngày đặt hàng</th>
                                <th>Tổng tiền</th>
                                <th>Trạng thái</th>
                                <th>Xem chi tiết</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
                
            </div>
        </div>
        
        <!-- Phần footer -->
        <?php include("../views/shared/footer.php")?>
    </div>

    <script>
        //Lấy thông tin id phiên kh
        $.ajax({
            url: "controllers/account/check-session-login-customer.php",
            method: "GET"
        }).done(function(data) {
            if(data !== 'timeout'){
                const id_kh = data.split(':')[0];
                //Lấy thông tin hóa đơn theo mã KH vừa nhận được
                $.ajax({
                    url: "controllers/bill/xuly-bill-list.php",
                    method: "GET",
                    data: {'action': 'xuatHDtheoIDKH',
                    'id_kh': id_kh}
                }).done(function(dataHD) {
                    if(dataHD != 'No result'){
                        const dataParser = JSON.parse(dataHD);
                        
                        const tbody = document.querySelector('tbody');
                        let strData = dataParser.map(function(item, index){
                            return `
                                <tr>
                                    <td>${item['id_hd']}</td>
                                    <td>${item['id_hd']}</td>
                                    <td>${item['id_hd']}</td>
                                    <td>
                                        Đã giao
                                    </td>
                                    <td>
                                        <a href="views/bill-list-detail.php?id_hd=${item['id_hd']}">Xem</a>
                                    </td>
                                </tr>
                            `;
                        }).join('');
                        tbody.innerHTML = strData;
                    }
                });
            }
        });
    </script>
</body>
</html>