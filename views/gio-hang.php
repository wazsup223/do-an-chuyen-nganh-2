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
    <link rel="stylesheet" href="assets/css/giohang.css">
    <title>Giỏ hàng</title>
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
            <div class="content-item content-main" style="background-color: #ffffff;">
                <h1>GIỎ HÀNG</h1>
                <div class="cart-zone cart-not-exist">
                    <p style="font-size: 2.2rem; padding-left: 1%">Bạn chưa có giỏ hàng nào cả!!!</p>
                </div>
                <div class="cart-zone cart-exist">
                    <div class="action-zone">
                        <button class="btn-delAll" onclick="xoaToanBoSP(this)">Xóa tất cả</button>
                    </div>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Số lượng</th>
                                <th>Thành tiền</th>
                                <th style="width: min-content">Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                    
                    <div class="pay-zone">
                        <button type="button" class="btn btn-primary pay-action">
                            <a href="views/thanh-toan.php">THANH TOÁN</a>
                        </button>
                    </div>
                </div>
                
            </div>
        </div>
        
        <!-- Phần footer -->
        <?php include("../views/shared/footer.php")?>
    </div>
    <script>
        $.ajax({
            url: "controllers/account/check-session-login-customer.php",
            method: "GET"
        }).done(function(data) {
            if(data === 'timeout'){
                alert('Bạn cần đăng nhập mới xem được giỏ hàng');
                window.location.replace = 'index.php';
            }else{
                const id_kh = data.split(':')[0];
                const cart_zone_not_exist = document.querySelector('.cart-zone.cart-not-exist');
                const cart_zone_exist = document.querySelector('.cart-zone.cart-exist');
                const btn_delAll = document.querySelector('.cart-exist .action-zone button.btn-delAll');
                btn_delAll.setAttribute('data-idKH', id_kh);

                $.ajax({
                    url: "controllers/giohang/xuly-giohang.php",
                    method: "GET",
                    data: {
                        'action': 'showCart',
                        'id_kh': id_kh
                    }
                }).done(function(dataResponse) {
                    const dataParser = JSON.parse(dataResponse);
                    if(dataParser === 'No result'){
                        cart_zone_not_exist.style.display = 'block';
                        cart_zone_exist.style.display = 'none';
                    }else{
                        cart_zone_not_exist.style.display = 'none';
                        cart_zone_exist.style.display = 'block';
                        console.log(dataParser);

                        render(dataParser);
                    }
                });
            }
        });

        
        function xoaMotSP(btn) {
            const id_sp = btn.getAttribute('data-idSP');
            const id_kh = btn.getAttribute('data-idKH');

            var result = confirm("Bạn muốn xóa sản phẩm này?");
            if (result === true) {
                $.ajax({
                    url: "controllers/giohang/xuly-giohang.php",
                    method: "GET",
                    data: {
                        'action': 'xoaCart',
                        'id_sp': id_sp,
                        'id_kh': id_kh
                    }
                }).done(function(dataResponse) {
                    if(dataResponse === 'success'){
                        alert('Xóa thành công!');
                        btn.parentElement.parentElement.parentElement.remove();
                    }else{
                        alert('Xóa không thành công. Vui lòng thử lại!');
                    }
                });
            }
        }

        function xoaToanBoSP(btn) {        //Xóa toàn bộ giỏ hàng
            const id_kh = btn.getAttribute('data-idKH');
            var result = confirm("Bạn muốn xóa toàn bộ giỏ hàng?");
            if (result === true) {
                $.ajax({
                    url: "controllers/giohang/xuly-giohang.php",
                    method: "GET",
                    data: {
                        'action': 'xoaAllCart',
                        'id_kh': id_kh
                    }
                }).done(function(dataResponse) {
                    if(dataResponse === 'success'){
                        document.querySelector('.cart-exist .table tbody').innerHTML = '';
                        alert('Xóa thành công!');
                        location.reload();
                    }else{
                        alert('Xóa không thành công. Vui lòng thử lại!');
                    }
                });
            }
        }

        var timeoutID = '';
        function capNhatSoluong(input) {
            let soluongmua = +input.value;
            let total_price_td = input.parentElement.parentElement.nextElementSibling;

            let gia_ban_dau = +total_price_td.getAttribute('data-price');
            
            let tongtien = soluongmua * gia_ban_dau;
            let format_tongtien_toString = tongtien.toLocaleString().replace(/\,/g, '.');
            
            total_price_td.innerHTML = format_tongtien_toString + 'đ';

            //Tự động cập nhật số lượng giỏ hàng lên server sau khi user click tăng giảm số lượng khoảng 3s
            if(typeof timeoutID === 'number'){
                clearTimeout(timeoutID);
            }
            timeoutID = setTimeout(() => {
                const id_kh = input.getAttribute('data-idKH');
                const id_sp = input.getAttribute('data-idSP');
                $.ajax({
                    url: "controllers/giohang/xuly-giohang.php",
                    method: "GET",
                    data: {
                        'action': 'updateCart',
                        'id_kh': id_kh,
                        'id_sp': id_sp,
                        'soluongmua': soluongmua,
                        'tongtien': format_tongtien_toString
                    }
                }).done(function(dataResponse) {
                    if(dataResponse === 'success'){
                        alert('Cập nhật giỏ hàng thành công!');
                    }else{
                        alert(dataResponse);
                    }
                });
            }, 2000);
        }
            
        function tang(btn) {
            const input = btn.parentElement.querySelector('input#soluong');
            let current_value = +input.value;
            input.value = ++current_value;

            capNhatSoluong(input);
        }
        function giam(btn) {
            const input = btn.parentElement.querySelector('input#soluong');
            let current_value = +input.value;
            if(current_value > 0){
                input.value = --current_value;
                capNhatSoluong(input);
            }
        }

        function render(dataParser){
            let strData = dataParser.map(function(item, index){
                const gia_ban_dau = +(item['tongtien'].replace(/\./g, ''))/item['soluong'];
                return `
                    <tr>
                        <td class="img">
                            <div class="wrapper">
                                <img src="assets/images/products/${item['anh_sp']}" alt="">
                            </div>
                        </td>
                        <td>${item['tensp']}</td>
                        <td>
                            <div class="edit-soluong">
                                <button class="giam" onclick="giam(this)">-</button>
                                <input type="number" name="" id="soluong" value=${item['soluong']} onchange="capNhatSoluong(this)" data-idSP=${item['id_sp']} data-idKH=${item['id_kh']}>
                                <button class="tang" onclick="tang(this)">+</button>
                            </div>
                        </td>
                        <td data-price=${gia_ban_dau}>${item['tongtien']}đ</td>
                        <td class="ctrl" style="width: min-content">
                            <div class="btn">
                                <button type="button" class="btn btn-danger delete-item" data-idSP=${item['id_sp']} data-idKH=${item['id_kh']} onclick="xoaMotSP(this)">
                                    Xóa
                                </button>
                            </div>
                        </td>
                    </tr>
                `;
            }).join('');

            document.querySelector('.cart-exist .table tbody').innerHTML = strData;
        }
    </script>
</body>
</html>