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
    <link rel="stylesheet" href="assets/css/thanh-toan.css">
    <title>Thanh toán</title>
    <style>
        .info-properties input {
            width: 40%;
            padding: 5px 8px;
            font-size: 1.8rem;
        }
        .customer-info-zone p {
            font-size: 1.5rem;
            color: #ff0000c7 !important;
            padding: 0px 5% !important;
            height: 26px;
        }
    </style>
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
                <h1>THANH TOÁN</h1>
                <div class="customer-info-zone">
                    <!-- <h2>Thông tin người đặt hàng</h2>
                    <div class="info-properties">
                        <span>HỌ TÊN: </span>
                        <span>LÊ TRUNG TÍN</span>
                    </div>
                    <div class="info-properties">
                        <span>ĐỊA CHỈ: </span>
                        <span>Tân Hòa Đông, HCM</span>
                    </div>
                    <div class="info-properties">
                        <span>SĐT: </span>
                        <span>0937519600</span>
                    </div> -->
                </div>
                <div class="pay-method-zone">
                    <h2>Phương thức thanh toán</h2>
                    <select class="form-select" multiple aria-label="multiple select example">
                        <option value="1" selected>Chuyển khoản qua thẻ ATM</option>
                        <option value="2">Trực tiếp tại cửa hàng</option>
                    </select>
                </div>
                <div class="grab-method-zone">
                    <h2>Phương thức giao hàng</h2>
                    <select class="form-select" multiple aria-label="multiple select example">
                        <option value="1" selected>Nhận tại cửa hàng</option>
                        <option value="2">Giao hàng tận nơi</option>
                    </select>
                </div>
                <h3 class="total-price">Tổng tiền thanh toán: 20.000.000VNĐ</h3>

                <div class="complete-pay-zone">
                    <button type="button" class="btn btn-primary pay-action">
                        <a href="javascript:void(0)" class="dathang">ĐẶT HÀNG</a>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Phần footer -->
        <?php include("../views/shared/footer.php")?>
    </div>

    <script>
        var tongtien = 0;
        var dataParserKH = [];
        var dataParserGioHang = [];             //Chứa thông tin giỏ hàng
        function layProfileUser(){      //Lấy thông tin profile KH theo thông tin phiên login
            $.ajax({
                url: "controllers/user/xuly-user.php",
                method: "POST",
                data: {
                    'action': 'getProfile'
                }
            }).done(function(data) {
                if(data === 'session_timeout'){         //Nếu hết phiên login hoặc đang logout thì chuyển sang trang chủ
                    window.location.href = 'index.php';
                }else{
                    dataParserKH = JSON.parse(data);
                    const customer_info_zone = document.querySelector('.customer-info-zone');
                    customer_info_zone.innerHTML = `
                        <h2>Thông tin người đặt hàng</h2>
                        <div class="info-properties">
                            <span>HỌ TÊN: </span>
                            <input type="text" name="username" style="text-transform: uppercase" value="${dataParserKH['hoten']}" />
                            <p class="alert alert--acname"></p>
                        </div>
                        <div class="info-properties">
                            <span>ĐỊA CHỈ: </span>
                            <input type="text" name="address" value="${dataParserKH['address']}" >
                            <p class="alert alert--address"></p>
                        </div>
                        <div class="info-properties">
                            <span>SĐT: </span>
                            <input type="text" name="sdt" value="${dataParserKH['sdt']}" >
                            <p class="alert alert--phone"></p>
                        </div>
                    `;

                    getGioHang(dataParserKH['id_kh']);
                }
            });
        }

        function getGioHang(id_kh) {
            $.ajax({
                url: "controllers/giohang/xuly-giohang.php",
                method: "GET",
                data: {
                    'action': 'showCart',
                    'id_kh': id_kh
                }
            }).done(function(data) {
                if(data != 'No result'){
                    dataParserGioHang = JSON.parse(data);
                    tongTien = 0;
                    dataParserGioHang.forEach(item => {
                        tongTien += +(item['tongtien'].replace(/\./g, ''));
                    });
                    
                    document.querySelector('h3.total-price').innerText = `Tổng tiền thanh toán: ${tongTien.toLocaleString().replace(/\,/g, '.')}VNĐ`;

                    tongTien = tongTien.toLocaleString().replace(/\,/g, '.') + 'đ';

                    console.log(dataParserGioHang);
                }
            });
        }
        layProfileUser();

        function DatHang(){
            const dathang = document.querySelector('.dathang');
            dathang.addEventListener('click', function(){
                if(checkInfo()){
                //Tạo thông tin đơn hàng
                    // Lấy ngày lập hóa đơn
                    var today = new Date();
                    var day = today.getDate();
                    var month = today.getMonth() + 1; //Tháng trong JavaScript bắt đầu từ 0
                    var year = today.getFullYear();
                    const ngaylaphoadon = year + '-' + month + '-' + day;
                    
                    //Lấy tổng tiền
                    const laytongtien = tongTien;
                    
                    //Đặt trạng thái đơn hàng
                    const trangthai = 0;    //Chờ xử lý
                    
                    //Lấy Thông tin khách hàng
                    const infoUser = dataParserKH;

                    //Lấy thông tin giỏ hàng
                    const infoCart = dataParserGioHang;
                    console.log(infoCart);
                    $.ajax({
                        url: "controllers/bill/xuly-bill-list.php",
                        method: "GET",
                        data: {
                            'action': 'themHD',
                            'id_kh': infoUser['id_kh'],
                            'ngaylaphd': ngaylaphoadon,
                            'hoten': infoUser['hoten'],
                            'sdt': infoUser['sdt'],
                            'diachi': infoUser['address'],
                            'tongtien': laytongtien,
                            'trangthai': 0
                        }
                    }).done(function(data) {
                        if(data === 'success'){
                            //Tạo hóa đơn thành công thì lấy mã hóa đơn để phục vụ việc tạo chi tiết hóa đơn, vì CTHD cần mã hóa đơn
                            $.ajax({
                                url: "controllers/bill/xuly-bill-list.php",
                                method: "GET",
                                data: {
                                    'action': 'xuatHDtheoIDKH',
                                    'id_kh': infoUser['id_kh']
                                }
                            }).done(function(dataHD) {
                                if(dataHD != 'No result'){
                                    const dataParserHD = JSON.parse(dataHD);
                                    const id_hd = dataParserHD[0]['id_hd'];
                                    LapCTHD(id_hd, infoUser['id_kh'], infoCart);
                                }
                            });
                        }
                        else{
                            alert('Lập hóa đơn không thành công!');
                        }
                    });


                }
            });
        }
        DatHang();

        function checkInfo(){
            const hoten = document.querySelector('input[name="username"]').value;
            const address = document.querySelector('input[name="address"]').value;
            const phone = document.querySelector('input[name="sdt"]').value;
            let hasError = false;

            function alertError(message, className) {     //Hàm hiển thị thông báo không hợp lệ
                document.querySelector('.alert--'+className).innerText = message;
            }
            function change_alias(alias) {          //Hàm xóa bỏ dấu tiếng việt
                var str = alias;
                str = str.toLowerCase();
                str = str.replace(/à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ/g,"a"); 
                str = str.replace(/è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ/g,"e"); 
                str = str.replace(/ì|í|ị|ỉ|ĩ/g,"i"); 
                str = str.replace(/ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ/g,"o"); 
                str = str.replace(/ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ/g,"u"); 
                str = str.replace(/ỳ|ý|ỵ|ỷ|ỹ/g,"y"); 
                str = str.replace(/đ/g,"d");
                str = str.trimEnd(); 
                return str;
            }
            function validateUserName(userName) {
                let formatUserName = change_alias(userName);
                const rgxUserName = /^[a-zA-Z]+([ ]{1}[a-zA-Z]+)*$/;
                if(!formatUserName){
                    hasError = true;
                    return alertError('Vui lòng nhập tên người dùng', 'acname');
                }
                if(!rgxUserName.test(formatUserName)){ 
                    hasError = true;
                    return alertError('Tên người dùng không hợp lệ', 'acname');
                }
            }
            function validateAddress(address) {
                if(!address){
                    hasError = true;
                    return alertError('Vui lòng nhập địa chỉ', 'address');
                }
            }
            function validatePhoneNumber(phone) {
                const phonelen = phone.length;
                if(phonelen === 0){
                    hasError = true;
                    return alertError('Vui lòng nhập sđt', 'phone');
                }
                if(!(phonelen === 10 || phonelen === 11)){
                    hasError = true;
                    alertError('Sđt phải 10 hoặc 11 số', 'phone');
                }
            }

            validateUserName(hoten);
            validateAddress(address);
            validatePhoneNumber(phone);
            if(!hasError){
                return true;
            }
            hasError = false;
        }

        function LapCTHD(id_hd, id_kh, infoCart) {
            infoCart.forEach(item => {
                $.ajax({
                    url: "controllers/bill/xuly-bill-detail.php",
                    method: "GET",
                    data: {
                        'action': 'themCTHD',
                        'id_hd': id_hd,
                        'id_sp': item['id_sp'],
                        'tensp': item['tensp'],
                        'soluong': item['soluong'],
                        'tongtien': item['tongtien']
                    }
                }).done(function(data) {
                    if(data == 'success'){
                        console.log('done');
                    }else{
                        alert('Lập chi tiết hóa đơn không thành công!');
                    }
                });
            });
            setTimeout(() => {
                capnhatsoluongSP(id_kh, infoCart);
            }, 2000);
        }
        function capnhatsoluongSP(id_kh, infoCart){     //Trừ đi số lượng sản phẩn còn lại trong kho hàng, sau đó xóa giỏ hàng
            var checkCapNhat = false;
            console.log(infoCart);
            infoCart.forEach(item => {
                setTimeout(() => {
                    
                
                $.ajax({
                    url: "controllers/giohang/xuly-giohang.php",
                    method: "GET",
                    data: {
                        'action': 'capnhatSoluongTrongKho',
                        'id_sp': item['id_sp'],
                        'soluongmua': item['soluong']
                    }
                }).done(function(dataResponse) {
                    if(dataResponse === 'success'){
                        console.log(dataResponse);
                    }else{
                        alert(dataResponse);
                    }
                });
                }, 1000);
            });
            setTimeout(() => {
                xoaGioHang(id_kh);
            }, 2000);
        }
        function xoaGioHang(id_kh){     //Xóa giỏ hàng của KH khi đặt hàng, nếu xóa thành công thì đặt hàng thành công
            $.ajax({
                url: "controllers/giohang/xuly-giohang.php",
                method: "GET",
                data: {
                    'action': 'xoaAllCart',
                    'id_kh': id_kh
                }
            }).done(function(dataResponse) {
                if(dataResponse === 'success'){
                    alert('Đặt hàng thành công');
                    window.location.replace('index.php');
                }else{
                    alert('Đặt hàng không thành công');
                }
            });
        }
    </script>
</body>
</html>