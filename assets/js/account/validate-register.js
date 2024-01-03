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
    // const rgxUserName = /^[A-Z]+[a-z]?+([ ]{1}[A-Z]+[a-z]??)*$/;
    // const rgxUserName = /^[A-Z]+[a-z]*?([ ]{1}[A-Z]+[a-z]*?)*$/;
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
                        fileTemp = this.files[0];       //Lưu đối tượng ảnh vào fileTemp để phục vụ việc giải phóng tài nguyên tạo đường dẫn tạm thời cho ảnh sau này (URL.revokeObjectURL)
                        break;
                    default:
                        alertError('Phải chọn file ảnh. Ảnh mặc định được áp dụng', 'avatar');
                }
            }
            this.value = '';  //remove đi giá trị của thẻ input type file này, bởi vì nếu không set value của input là rỗng thì khi upload ảnh giống ảnh trước ở lần kết tiếp nó sẽ không bắt được sự kiện onchange vì trước đó thẻ input vẫn còn giá trị
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
        // nameBtnSubmit.classList.toggle('hidden');
        // loaderSubmit.classList.toggle('hidden');
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

        // UploadToServer(userProfile);
        $.ajax({
            type: 'POST',
            url: 'controllers/user/xuly-user.php',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {
                if(data === 'success'){
                    console.log('Thêm kh thành công');
                    window.location.replace('views/account/login.php');
                }else if(data === "Can't save avatar"){
                    console.log('lỗi lưu ảnh vào thư mục uploads/customer-avatar');
                }else{
                    console.log('Lỗi khi thêm kh vào csdl');
                }
            },
            error: function(jqXHR, textStatus, errorThrown) {
                console.log(textStatus, errorThrown);
            }
        }).always(function() {
            submit_btn.disabled = false;
        });
    }
    hasError = false;                //reset lại biến hasError sau mỗi lần kiểm tra để check valid cho lần tiếp theo
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

// function UploadToServer(userProfile) {
//     $.ajax({
//         type: 'POST',
//         url: 'controllers/user/xuly-user.php',
//         data: userProfile,
//         success: function(data) {
//             // if(data === 'success'){
//             //     console.log('Thêm kh thành công');
//             //     window.location.replace('views/account/login.php');
//             // }else{
//             //     console.log('lỗi thêm kh vào csdl');
//             // }
//             console.log(data);
//         },
//         error: function(jqXHR, textStatus, errorThrown) {
//             console.log(textStatus, errorThrown);
//         }
//     }).always(function() {
//         submit_btn.disabled = false;
//     });
// }