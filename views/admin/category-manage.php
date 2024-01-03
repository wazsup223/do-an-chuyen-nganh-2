<?php 
    include($_SERVER['DOCUMENT_ROOT'] . "/DoAnWeb2-BanDienThoai-MVC/controllers/account/check-session-login-admin.php");
?>
<div class="manage-zone">
    <h1 class="title">Quản lý danh mục sp</h1>
    <div class="table-manage">
        <h4 class="total-record">
            Bảng này có tổng <span>10</span> danh mục
        </h4>
        <!-- <div class="add-record">
            <button type="button" class="btn btn-success">Thêm</button>
        </div> -->
        <div class="table-container">
            <table style="min-width: initial">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Tên DM</th>
                        <th>Loại DM</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1001</td>
                        <td>iphone</td>
                        <td>điện thoại</td>
                        <td class="ctrl">
                            <div class="btn">
                                <button type="button" class="btn btn-primary edit-item">
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-danger delete-item">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

    </div>

    <style>
        .register-wrapper.add-user {
            width: 100%;
            min-height: 100vh;
            background-color: rgba(0, 0, 0, 0.7);
            display: none;
            justify-content: center;
            align-items: flex-start;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 9999;
            margin-top: 0px !important;
            padding-top: 2% !important;
        }
    </style>
        <div class="register-wrapper add-user">
            <div class="register-container">
                <div class="register-title">
                    <h1>Cập nhật danh mục</h1>
                </div>
                <div class="register-form">
                    <form action="" method="post">
                    
                        <div class="field field-accname">
                            <input type="text" name="acname" id="" placeholder="Tên danh mục">
                        </div>
                        <p class="alert alert--acname"></p>

                   
                        <div class="field field-username">
                            <input type="text" name="uname" id="" placeholder="Loại danh mục">
                        </div>
                        <p class="alert alert--uname"></p>

                        <!-- Submit form -->
                        <button type="submit" class="btn">
                            <div class="name-btn">Update</div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
</div>

<script>
        $.ajax({
            url: "controllers/product-category/xuly-category.php",
            method: "GET",
            data: {
                'action': 'getAllDM',
            }
        }).done(function(dataHD) {
            const dataParserHD = JSON.parse(dataHD);
            if(dataParserHD !== 'No result'){
                console.log(dataParserHD);
                const tbody = document.querySelector('tbody');
                const total = document.querySelector('.total-record');
                total.innerText = 'Bảng này có tổng ' + dataParserHD.length + ' danh mục';

                let strData = dataParserHD.map(function(item, index){
                    return `
                        <tr>
                            <td>${item['id_dmsp']}</td>
                            <td>${item['ten_dm']}</td>
                            <td>${item['loai_dm']}</td>
                            <td class="ctrl">
                                <div class="btn">
                                    <button type="button" class="btn btn-primary edit-item" data-iddm=${item['id_dmsp']} onclick="edit(this)">
                                        <i class="fas fa-pencil-alt"></i>
                                    </button>
                                    <button type="button" class="btn btn-danger delete-item" data-iddm=${item['id_dmsp']} onclick="xoa(this)">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    `;
                }).join('');
                tbody.innerHTML = strData;
            }
        });

        function xoa(btn) {
            if(confirm("Bạn có chắc chắn muốn xóa?")){
                const iddm = btn.getAttribute('data-iddm');
                $.ajax({
                    url: "controllers/product-category/xuly-category.php",
                    method: "GET",
                    data: {
                        'action': 'delDM',
                        'iddm': iddm
                    }
                }).done(function(data) {
                    if(data == 'success'){
                        alert('Xóa danh mục thành công');
                    }else{
                        alert('Xóa danh mục không thành công');
                    }
                })
            }
        }

        function edit(btn) {
            const iddm = btn.getAttribute('data-iddm');
            const form = document.querySelector('.register-wrapper.add-user');
            form.style.display = 'flex';

            document.querySelector('button[type="submit"]').onclick = function(e) {
                e.preventDefault();
                const inputs = document.querySelectorAll('input');
                
                $.ajax({
                    url: "controllers/product-category/xuly-category.php",
                    method: "GET",
                    data: {
                        'action': 'editDM',
                        'tendm': inputs[0].value,
                        'loaidm': inputs[1].value,
                        'iddm': iddm
                    }
                }).done(function(data) {
                    if(data == 'success'){
                        alert('Cập nhật danh mục thành công');
                        form.style.display = 'none';
                    }else{
                        alert('Cập nhật danh mục không thành công');
                        form.style.display = 'none';
                    }
                });
            }
        }
</script>