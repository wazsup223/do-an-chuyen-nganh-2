<?php 
    include($_SERVER['DOCUMENT_ROOT'] . "/DoAnWeb2-BanDienThoai-MVC/controllers/account/check-session-login-admin.php");
?>
<div class="manage-zone">
    <h1 class="title">Quản lý hóa đơn</h1>
    <div class="table-manage">
        <h4 class="total-record">
            
        </h4>
        <!-- <div class="add-record">
            <button type="button" class="btn btn-success">Thêm</button>
        </div> -->
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Họ Tên</th>
                        <th>SĐT</th>
                        <th>Địa chỉ</th>
                        <th>Ngày lập hđ</th>
                        <th>Tổng tiền</th>
                        <th>Trạng thái</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    
                </tbody>
            </table>
        </div>

    </div>

    <script>
        $.ajax({
            url: "controllers/bill/xuly-bill-list.php",
            method: "GET",
            data: {
                'action': 'xuatAllHD',
            }
        }).done(function(dataHD) {
            const dataParserHD = JSON.parse(dataHD);
            if(dataParserHD !== 'No result'){
                console.log(dataParserHD);
                const tbody = document.querySelector('tbody');
                const total = document.querySelector('.total-record');
                total.innerText = 'Bảng này có tổng ' + dataParserHD.length + ' hóa đơn';

                let strData = dataParserHD.map(function(item, index){
                    return `
                        <tr>
                            <td>${item['id_hd']}</td>
                            <td>${item['hoten']}</td>
                            <td>${item['sdt']}</td>
                            <td>${item['diachi']}</td>
                            <td>${item['ngaylaphd']}</td>
                            <td>${item['tongtien']}</td>
                            <td>Đã giao</td>
                            <td class="ctrl">
                                <div class="btn" style="flex-wrap: wrap">
                                    <button type="button" class="btn btn-danger delete-item" data-idHD=${item['id_hd']} data-idKH=${item['id_kh']} onclick="xoa(this)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <button type="button" class="btn btn-success show-detail" style="font-size: 1.4rem; color: #fff" onclick="chuyenhuong(this)" data-idHD=${item['id_hd']}>
                                        Chi tiết
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `;
                }).join('');
                tbody.innerHTML = strData;
            }
        });

        function xoa(btn){
            const id_kh = btn.getAttribute('data-idKH');
            const id_hd = btn.getAttribute('data-idHD');

            $.ajax({
                url: "controllers/bill/xuly-bill-detail.php",
                method: "GET",
                data: {
                    'action': 'xoaCTHDtheoIDHD',
                    'id_hd': id_hd
                }
            }).done(function(data) {
                console.log(data);
                if(data === 'success'){
                    $.ajax({
                        url: "controllers/bill/xuly-bill-list.php",
                        method: "GET",
                        data: {
                            'action': 'xoaHDtheoIDHD',
                            'id_hd': id_hd
                        }
                    }).done(function(data) {
                        console.log(data);
                        if(data === 'success'){
                            alert('Xóa hóa đơn thành công!');
                        }
                    });
                }
            });
        }

        function chuyenhuong(btn) {
            const id_hd = btn.getAttribute('data-idHD');
            window.location.href = `views/admin/index.php?param=view-bill-detail&id_hd=${id_hd}`;
        }
    </script>
</div>