function check(btn) {
    $.ajax({
        url: "controllers/account/check-session-login-customer.php",
        method: "GET"
    }).done(function(data) {
        if(data === 'timeout'){
            alert('Bạn cần đăng nhập mới được mua sản phẩm');
        }else{
            const id_kh = data.split(':')[0];
            const chitietsp = JSON.parse(localStorage.getItem('chitietsp'));
            
            $.ajax({
                url: "controllers/giohang/xuly-giohang.php",
                method: "GET",
                data: {
                    'action': 'themCart',
                    'id_kh': id_kh,
                    'id_sp': chitietsp['id_sp'],
                    'soluongmua': 1,
                    'tongtien': chitietsp['gia_khuyenmai'],
                    'tensp': chitietsp['tensp'],
                    'anh_sp': chitietsp['anh_sp']
                }
            }).done(function(data) {
                if(data === 'success'){
                    alert('Thêm giỏ hàng thành công!');
                }
            });
        }
    });
}