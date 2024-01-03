<?php 
    include($_SERVER['DOCUMENT_ROOT'] . "/DoAnWeb2-BanDienThoai-MVC/controllers/account/check-session-login-admin.php");
?>
<div class="manage-zone">
    <h1 class="title">
        Chi tiết hóa đơn
    </h1>
    <div class="table-manage">
        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>Tên sản phẩm</th>
                        <th>Số lượng</th>
                        <th>Thành tiền</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>

    </div>
</div>

<script>
    const url = new URL(window.location.href);
    const searchParams = url.searchParams;
    const id_hd = searchParams.get('id_hd');

    $.ajax({
            url: "controllers/bill/xuly-bill-detail.php",
            method: "GET",
            data: {
                'action': 'xuatCTHDtheoIDHD',
                'id_hd': id_hd
            }
        }).done(function(dataHD) {
            if(dataHD != 'No result'){
                const dataParser = JSON.parse(dataHD);
                const tbody = document.querySelector('tbody');
                let strData = dataParser.map(function(item, index){
                    return `
                        <tr>
                            <td>${item['tensp']}</td>
                            <td>${item['soluong']}</td>
                            <td>${item['tongtien']}đ</td>
                        </tr>
                    `;
                }).join('');
                tbody.innerHTML = strData;
            }
        });
</script>