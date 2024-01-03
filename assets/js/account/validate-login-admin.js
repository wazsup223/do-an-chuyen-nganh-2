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
const email = query('input[name="email"]');
const pass = query('input[name="pass"]');
let hasError = false;
const eye = query('.field-pass .eye');

function alertError(message, className) {
    query('.alert--'+className).innerText = message;
}

function validateMail(mail) {
    const rgxMail = /^([a-zA-Z0-9-._])+[@]+[a-z]+[.]+[a-z]+([.]+[a-z]+)*$/;
    if(!mail){
        hasError = true;
        return alertError('Vui lòng nhập email', 'mail');;
    }
    if(!rgxMail.test(mail)){
        hasError = true;
        alertError('Email không đúng định dạng', 'mail');
    }
}

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

submit_btn.onclick = (e)=> {
    e.preventDefault();
    validateMail(email.value);
    validatePassword(pass.value);
    if(!hasError){
        $.ajax({
            url: "controllers/account/xuly-login-admin.php",
            method: "POST",
            data: {
                 'email': email.value,
                 'password': pass.value,
            }
        }).done(function(data) {
            if(data === 'success'){
                window.location.replace('views/admin/index.php');
                // console.log(data);
            }else{
                alert(data);
            }
        }).fail(function() {
           
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