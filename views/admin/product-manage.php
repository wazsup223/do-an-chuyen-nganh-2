<?php 
    include($_SERVER['DOCUMENT_ROOT'] . "/DoAnWeb2-BanDienThoai-MVC/controllers/account/check-session-login-admin.php");
?>
<div class="manage-zone">
    <h1 class="title">Quản lý sản phẩm</h1>
    <div class="table-manage">
        <h4 class="total-record">
            Bảng này có tổng <span>10</span> sản phẩm
        </h4>
        <div class="add-record">
            <button type="button" class="btn btn-success" onclick="them()">Thêm</button>
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ảnh SP</th>
                        <th>Tên SP</th>
                        <th>Giá gốc</th>
                        <th>Giá KM</th>
                        <th>Số lượng</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2000000001</td>
                        <td class="img">
                            <div class="wrapper">
                                <img src="assets/images/products/iphone-14-pro-max-vang-thumb.jpg" alt="">
                            </div>
                        </td>
                        <td>Iphone 14 pro max</td>
                        <td>27.490.000</td>
                        <td>20.999.000</td>
                        <td>180</td>
                        <td class="ctrl" style="width: min-content">
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
            position: absolute;
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
                    <h1>THÊM SẢN PHẨM</h1>
                </div>
                <div class="register-form">
                    <form action="" method="post">
                        <!-- Tên tài khoản -->
                        <div class="field field-accname">
                            <input type="text" name="acname" id="" placeholder="Mã danh mục">
                        </div>
                        <p class="alert alert--acname"></p>

                        <div class="field field-accname">
                            <input type="text" name="acname" id="" placeholder="Tên sản phẩm">
                        </div>
                        <p class="alert alert--acname"></p>

                        <!-- Họ tên khách hàng -->
                        <div class="field field-username">
                            <input type="text" name="uname" id="" placeholder="Giá gốc">
                        </div>
                        <p class="alert alert--uname"></p>

                        <!-- Số điện thoại -->
                        <div class="field field-phone">
                            <input type="text" name="phone" id="" placeholder="Giá khuyến mãi">
                        </div>
                        <p class="alert alert--phone"></p>
                        
                        <!-- Email -->
                        <div class="field field-mail">
                            <input type="number" name="mail" id="" placeholder="Số lượng">
                        </div>
                        <p class="alert alert--mail"></p>

                        <!-- Địa chỉ -->
                        <div class="field field-address">
                            <textarea rows="4" cols="50" name="address" id="" placeholder="Mô tả sản phẩm" ></textarea>
                        </div>
                        <p class="alert alert--address"></p>

                        <!-- Địa chỉ -->
                        <div class="field field-address">
                            <textarea rows="4" cols="50" name="address" id="" placeholder="Thông số kỹ thuật"></textarea>
                        </div>
                        <p class="alert alert--address"></p>

                        <!-- Ảnh đại diện -->
                        <div class="field field-avatar"> 
                            <span>Ảnh sản phẩm: </span>
                            <label id="upload" for="avt">Upload photo</label>
                            <label id="remove" for="" class="hidden">Remove photo</label>

                            <input type="file" name="avt" id="avt" placeholder="Ảnh tài khoản" accept=".png,.jpg,.jpeg" style="display: none">

                            <div class="wrap-avatar">
                                <a href="assets/images/uploads/customer-avatar/default-acc.png" target="_blank">
                                    <img src="assets/images/uploads/customer-avatar/default-acc.png" alt="" class="account-avt">
                                </a>
                            </div>
                        </div>
                        <p class="alert alert--avatar" style="padding-top: 5px !important;"></p> 

                        <!-- Submit form -->
                        <button type="submit" class="btn">
                            <div class="name-btn">Thêm</div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
</div>

<script>
    const table = document.querySelector('.table-container');
    const tbody = table.querySelector('tbody');

    function getListProduct(){
        $.ajax({
            url: 'controllers/product-category/xuly-product.php',
            method: "GET",
            data: {
                'action': 'getAllSP'
            }
        }).done(function(data) {
            if(data != 'No result'){
                let dataParser = JSON.parse(data);
                let total_product = dataParser.length;

                console.log(dataParser);

                document.querySelector('.table-manage h4.total-record span').innerText = total_product;
                let stringHTML = dataParser.map(function(item, index){
                    return `<tr>
                        <td>${item['id_sp']}</td>
                        <td class="img">
                            <div class="wrapper">
                                <img src="assets/images/products/${item['anh_sp']}" alt="">
                            </div>
                        </td>
                        <td>${item['tensp']}</td>
                        <td>${item['gia_sp']}đ</td>
                        <td>${item['gia_khuyenmai']}đ</td>
                        <td>${item['soluong']}</td>
                        <td class="ctrl" style="width: min-content">
                            <div class="btn">
                                <button type="button" class="btn btn-primary edit-item" >
                                    <i class="fas fa-pencil-alt"></i>
                                </button>
                                <button type="button" class="btn btn-danger delete-item" data-idsp=${item['id_sp']} onclick="xoa(this)">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>`;
                });
                tbody.innerHTML = stringHTML.join('');
            }else{
                console.log('Lỗi');
            }
        });
    }
    getListProduct();

    function xoa(btn) {
        let this_tr = btn.parentElement.parentElement.parentElement;
        this_tr.style.backgroundColor = '#CCCCCC';

        setTimeout(() => {
            let text = "Xác nhận xóa sản phẩm này?";
            if (confirm(text) == true) {
                let id_sp = btn.getAttribute('data-idsp');
                $.ajax({
                    url: 'controllers/product-category/xuly-product.php',
                    method: "GET",
                    data: {
                        'action': 'del',
                        'id': id_sp
                    }
                }).done(function(data) {
                    if(data === 'success'){
                        alert('Đã xóa sản phẩm thành công');
                        getListProduct();
                    }else{
                        alert('Xóa SP không thành công');
                    }
                    // console.log(data);
                });
            }
            else{
                this_tr.style.backgroundColor = 'transparent';
            }
        }, 100);
    }

    function them(){
        let form_wrapper = document.querySelector('.register-wrapper.add-user');
        let child = form_wrapper.firstElementChild;
        form_wrapper.style.display = 'flex';
        form_wrapper.addEventListener('click', function(e){
            if(e.target.contains(child)){
                form_wrapper.style.display = 'none';
            }
        });

        const query = document.querySelector.bind(document);
        const queryAll = document.querySelectorAll.bind(document);
        const inputs = queryAll('input');
        const textarea = queryAll('textarea');

        const label_upload = query('label#upload');
        const label_remove = query('label#remove');
        const ava = query('input[name="avt"]');

        const submit_btn = query('button[type="submit"]');
        let fileTemp = 'default-acc.png';     //Khai báo biến fileTemp dùng để lưu đường dẫn ảnh
        // Kiểm tra ảnh đại diện
        function AvatarPhoto() {
            label_upload.onclick = function() {
                // p_alerts[p_alerts.length - 1].innerText = '';   //Tắt thông báo đỏ khi chọn file
                ava.addEventListener('change', function(e) {
                    if(this.files[0]){
                        const typeOfFile = this.files[0].type;
                        switch (typeOfFile) {
                            case 'image/png':
                            case 'image/jpg':
                            case 'image/jpeg':
                                label_upload.classList.toggle('hidden');
                                label_remove.classList.toggle('hidden');
                                const newSrc = URL.createObjectURL(this.files[0]);
                                query('.wrap-avatar a').setAttribute('href', newSrc);
                                query('.wrap-avatar a img.account-avt').setAttribute('src', newSrc);
                                fileTemp = this.files[0]; 
                                break;
                            default:
                                alertError('Phải chọn file ảnh. Ảnh mặc định được áp dụng', 'avatar');
                        }
                    }
                    this.value = '';
                });
            }
            label_remove.onclick = function(){
                URL.revokeObjectURL(fileTemp);  //Giải phóng tài nguyên đường dẫn tạm thời
                fileTemp = 'default-acc.png';
                query('.wrap-avatar a').setAttribute('href', 'assets/images/uploads/customer-avatar/default-acc.png');
                query('.wrap-avatar a img.account-avt').src = 'assets/images/uploads/customer-avatar/default-acc.png';
                label_upload.classList.toggle('hidden');
                this.classList.toggle('hidden');
            }
        }
        AvatarPhoto();

        submit_btn.onclick = function(e) {
            e.preventDefault();
            submit_btn.disabled = true;
            const formData = new FormData();
            formData.append('action', 'add');
            formData.append('id_dmsp', inputs[0].value);
            formData.append('tensp', inputs[1].value);
            formData.append('gia_sp', inputs[2].value);
            formData.append('gia_khuyenmai', inputs[3].value);
            formData.append('soluong', inputs[4].value);
            formData.append('motasp', textarea[0].value);
            formData.append('thongsokythuat', textarea[1].value);
            if(typeof fileTemp === "string"){
                formData.append('typeAvatarProperty', 'string');
            }else{
                formData.append('typeAvatarProperty', 'object');
            }
            formData.append('avatar', fileTemp);   
            $.ajax({
                type: 'GET',
                url: 'controllers/product-category/xuly-product.php',
                data: formData,
                processData: false,
                contentType: false,
                success: function(data) {
                    if(data === 'success'){
                        alert('Thêm sp thành công');
                        form_wrapper.style.display = 'none';
                        getListProduct();
                    }else if(data === "Can't save avatar"){
                        alert('lỗi lưu ảnh vào thư mục products');
                    }else{
                        alert('Lỗi khi thêm sp vào csdl');
                    }
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            }).always(function() {
                submit_btn.disabled = false;
            });
        }
    }
</script>