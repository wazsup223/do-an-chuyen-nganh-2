<?php 
    include($_SERVER['DOCUMENT_ROOT'] . "/DoAnWeb2-BanDienThoai-MVC/controllers/account/check-session-login-admin.php");
?>
<div class="manage-zone">
    <h1 class="title">Quản lý khách hàng</h1>
    <div class="table-manage">
        <h4 class="total-record">
            Bảng này có tổng <span>10</span> user
        </h4>
        <div class="add-record">
            <button type="button" class="btn btn-success" onclick="them(this)">Thêm</button>
        </div>
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Avatar</th>
                        <th>Tên TK</th>
                        <th>Họ tên</th>
                        <th>Sđt</th>
                        <th>Email</th>
                        <th>Địa chỉ</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>100000001</td>
                        <td class="img">
                            <div class="wrapper">
                                <img src="assets/images/uploads/admin-avatar/admin-tin-le.jpg" alt="">
                            </div>
                        </td>
                        <td class="wrap-text">Tin Le</td>
                        <td class="td-padding">Lê Trung Tín</td>
                        <td>0937519600</td>
                        <td class="wrap-text">trungtin.le1505@gmail.com</td>
                        <td class="wrap-text">TanHoaDong, HCM</td>
                        <td class="ctrl" style="width: min-content">
                            <div class="btn">
                                <button type="button" class="btn btn-primary delete-item">
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
                    <h1>TẠO MỚI USER</h1>
                </div>
                <div class="register-form">
                    <form action="" method="post">
                        <!-- Tên tài khoản -->
                        <div class="field field-accname">
                            <input type="text" name="acname" id="" placeholder="Tên tài khoản">
                        </div>
                        <p class="alert alert--acname"></p>

                        <!-- Họ tên khách hàng -->
                        <div class="field field-username">
                            <input type="text" name="uname" id="" placeholder="Họ tên">
                        </div>
                        <p class="alert alert--uname"></p>

                        <!-- Số điện thoại -->
                        <div class="field field-phone">
                            <input type="text" name="phone" id="" placeholder="Số điện thoại">
                        </div>
                        <p class="alert alert--phone"></p>
                        
                        <!-- Email -->
                        <div class="field field-mail">
                            <input type="text" name="mail" id="" placeholder="Email">
                        </div>
                        <p class="alert alert--mail"></p>

                        <!-- Địa chỉ -->
                        <div class="field field-address">
                            <input type="text" name="address" id="" placeholder="Địa chỉ">
                        </div>
                        <p class="alert alert--address"></p>

                        <!-- Mật khẩu -->
                        <div class="field field-pass">
                            <input type="password" name="pass" id="" placeholder="Password">
                            <span class="eye">
                                <i class="fa-solid fa-eye"></i>
                            </span>
                        </div>
                        <p class="alert alert--pass"></p>

                        <!-- Ngày sinh -->
                        <div class="field field-birth">
                            <input type="date" name="birth" id="" placeholder="Ngày sinh">
                        </div>
                        <p class="alert alert--birth"></p>

                        <!-- Ảnh đại diện -->
                        <div class="field field-avatar"> 
                            <span>Ảnh đại diện: </span>
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
                            <div class="name-btn">Sign Up</div>
                        </button>
                    </form>
                </div>
            </div>
        </div>
</div>
<script>
    const table = document.querySelector('.table-container');
    const tbody = table.querySelector('tbody');

    function getListUser(){
        $.ajax({
            url: 'controllers/user/xuly-user.php',
            method: "POST",
            data: {
                'action': 'getAll'
            }
        }).done(function(data) {
            if(data != 'fail'){
                let dataParser = JSON.parse(data);
                let total_user = dataParser.length;

                document.querySelector('.table-manage h4.total-record span').innerText = total_user;
                let stringHTML = dataParser.map(function(item, index){
                    return `<tr>
                                <td class="id_kh">${item['id_kh']}</td>
                                <td class="img">
                                    <div class="wrapper">
                                        <img src="assets/images/uploads/customer-avatar/${item['avatar']}" alt="">
                                    </div>
                                </td>
                                <td class="wrap-text">${item['tentk']}</td>
                                <td class="td-padding">${item['hoten']}</td>
                                <td>${item['sdt']}</td>
                                <td class="wrap-text">${item['email']}</td>
                                <td class="wrap-text">${item['address']}</td>
                                <td class="ctrl" style="width: min-content">
                                    <div class="btn">
                                        <button type="button" class="btn btn-danger delete-item" onclick="xoa(this)">
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
    getListUser();

    function xoa(btn) {
        let this_tr = btn.parentElement.parentElement.parentElement;
        this_tr.style.backgroundColor = '#CCCCCC';

        setTimeout(() => {
            let text = "Xác nhận xóa người dùng này?";
            if (confirm(text) == true) {
                let id = this_tr.querySelector('.id_kh');
                $.ajax({
                    url: 'controllers/user/xuly-user.php',
                    method: "POST",
                    data: {
                        'action': 'del',
                        'id_kh': id.innerHTML
                    }
                }).done(function(data) {
                    if(data === 'success'){
                        alert('Đã xóa user thành công');
                        getListUser();
                    }else{
                        alert('Xóa user không thành công');
                    }
                    // console.log(data);
                });
            }
            else{
                this_tr.style.backgroundColor = 'transparent';
            }
        }, 100);
    }

    function them(btn){
        let form_wrapper = document.querySelector('.register-wrapper.add-user');
        let child = form_wrapper.firstElementChild;
        form_wrapper.style.display = 'flex';
        form_wrapper.addEventListener('click', function(e){
            if(e.target.contains(child)){
                form_wrapper.style.display = 'none';
            }
        });

        validateAndPost(form_wrapper);
    }

    function validateAndPost(form_wrapper) {
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
            // str = str.replace(/!|@|%|\^|\*|\(|\)|\+|\=|\<|\>|\?|\/|,|\.|\:|\;|\'|\"|\&|\#|\[|\]|~|\$|_|`|-|{|}|\||\\/g," ");
            // str = str.replace(/ + /g," ");
            str = str.trimEnd(); 
            return str;
        }
        const user_profile = [];
        const query = document.querySelector.bind(document);
        const queryAll = document.querySelectorAll.bind(document);
        const p_alerts = queryAll('p.alert');
        const inputs = queryAll('input');
        inputs.forEach((item, index)=> {
            item.addEventListener('focus', ()=>{
                p_alerts[index].innerText = '';
            })
        });

        const form = query('form');
        const submit_btn = query('button[type="submit"]');

        const accName = query('input[name="acname"]');
        const userName = query('input[name="uname"]');
        const phone = query('input[name="phone"]');
        const email = query('input[name="mail"]');
        const address = query('input[name="address"]');
        const pass = query('input[name="pass"]');
        const dob = query('input[name="birth"]');
        const ava = query('input[name="avt"]');

        const label_upload = query('label#upload');
        const label_remove = query('label#remove');

        const nameBtnSubmit = query('button[type="submit"] .name-btn');
        const loaderSubmit = query('button[type="submit"] .loader');

        let hasError = false;
        const eye = query('.field-pass .eye');

        function alertError(message, className) {     //Hàm hiển thị thông báo không hợp lệ
            query('.alert--'+className).innerText = message;
        }
        // Kiểm tra tên tài khoản
        function validateAccName(accName) {
            let formatAccName = change_alias(accName);        //Bỏ dấu tiếng việt và chuyển về dạng lowerCase
            const rgxAccName = /^[a-zA-Z0-9-._@&]+([ ]{1}[a-zA-Z0-9-._@&]+)*$/;    
            if(!formatAccName){
                hasError = true;
                return alertError('Vui lòng nhập tên tài khoản', 'acname');
            }
            if(!rgxAccName.test(formatAccName)){
                hasError = true;
                alertError('Tên tài khoản không hợp lệ', 'acname');
            }
        }
        // Kiểm tra tên người dùng
        function validateUserName(userName) {
            let formatUserName = change_alias(userName);
            const rgxUserName = /^[a-zA-Z]+([ ]{1}[a-zA-Z]+)*$/;
            if(!formatUserName){
                hasError = true;
                return alertError('Vui lòng nhập tên người dùng', 'uname');
            }
            if(!rgxUserName.test(formatUserName)){ 
                hasError = true;
                return alertError('Tên người dùng không hợp lệ', 'uname');
            }
        }
        // Kiểm tra email
        function validateMail(mail) {
            const rgxMail = /^([a-zA-Z0-9-._])+[@]+[a-z]+[.]+[a-z]+([.]+[a-z]+)*$/;
            if(!mail){
                hasError = true;
                return alertError('Vui lòng nhập email', 'mail');
            }
            if(!rgxMail.test(mail)){
                hasError = true;
                alertError('Email không hợp lệ', 'mail');
            }
        }
        function validateAddress(address) {
            if(!address){
                hasError = true;
                return alertError('Vui lòng nhập địa chỉ', 'address');
            }
        }
        // Kiểm tra mật khẩu
        function validatePassword(pass) {
            const passlen = pass.length;
            if(passlen === 0){
                hasError = true;
                return alertError('Vui lòng nhập mật khẩu', 'pass');
            }
            if(passlen < 8){
                hasError = true;
                alertError('Mật khẩu ít nhất 8 ký tự', 'pass');
            }
        }
        // Kiểm tra số điện thoại
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
        // Kiểm tra ngày tháng năm sinh
        function validateDOB(DOB_value) {
            if(!DOB_value){
                hasError = true;
                return alertError('Vui lòng chọn ngày sinh', 'birth');
            }
        }
        let fileTemp = 'default-acc.png';     //Khai báo biến fileTemp dùng để lưu đường dẫn ảnh
        // Kiểm tra ảnh đại diện
        function AvatarPhoto() {
            label_upload.onclick = function() {
                p_alerts[p_alerts.length - 1].innerText = '';   //Tắt thông báo đỏ khi chọn file
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
            validateAccName(accName.value);
            validateUserName(userName.value);
            validatePhoneNumber(phone.value);
            validateMail(email.value);
            validatePassword(pass.value);
            validateDOB(dob.value);
            validateAddress(address.value);

            if(!hasError){
                submit_btn.disabled = true;
                const formData = new FormData();
                formData.append('action', 'add');
                formData.append('tentk', accName.value);
                formData.append('hoten', userName.value);
                formData.append('sdt', phone.value);
                formData.append('email', email.value);
                formData.append('address', address.value);
                formData.append('password', pass.value);
                formData.append('dob', dob.value);
                if(typeof fileTemp === "string"){
                    formData.append('typeAvatarProperty', 'string');
                }else{
                    formData.append('typeAvatarProperty', 'object');
                }
                formData.append('avatar', fileTemp);
                console.log(typeof fileTemp);

                $.ajax({
                    type: 'POST',
                    url: 'controllers/user/xuly-user.php',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(data) {
                        if(data === 'success'){
                            alert('Thêm kh thành công');
                            form_wrapper.style.display = 'none';
                            getListUser();
                        }else if(data === "Can't save avatar"){
                            alert('lỗi lưu ảnh vào thư mục uploads/customer-avatar');
                        }else{
                            alert('Lỗi khi thêm kh vào csdl');
                        }
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown);
                    }
                }).always(function() {
                    submit_btn.disabled = false;
                });
            }
            hasError = false;
        }

        let flag = 1;
        eye.onclick = function(){
            let i = this.firstElementChild;
            let input_type = this.parentElement.firstElementChild;
            i.classList.toggle('fa-eye');
            i.classList.toggle('fa-eye-slash');
            input_type.setAttribute("type", `${ flag ? 'text' : 'password' }`);
            flag = !flag;
        }   
    }
</script>





