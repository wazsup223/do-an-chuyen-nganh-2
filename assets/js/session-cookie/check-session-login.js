function Check_session_login() {
    const nav_account_logout = document.querySelector('.header-menu .nav-account.logout-status');
    const nav_account_login = document.querySelector('.header-menu .nav-account.login-status');
    const nav_account_avatar_image = nav_account_login.firstElementChild.firstElementChild.firstElementChild;
    // const nav_account_login_showProfile = nav_account_login.firstElementChild.firstElementChild;

    $.ajax({
        url: "controllers/account/check-session-login-customer.php",
        method: "GET"
    }).done(function(data) {
        if(data !== 'timeout'){
            nav_account_logout.classList.toggle('hidden');
            nav_account_login.classList.toggle('hidden');
            
            let arr_data = data.split(':');
            let id_customer = arr_data[0];
            let tentk_customer = arr_data[1];
            let avatar_customer = arr_data[2];

            // nav_account_login_showProfile.setAttribute('href', `views/account/profile-edit.php?id_kh=${id_customer}`);
            nav_account_avatar_image.setAttribute("src", 'assets/images/uploads/customer-avatar/' + avatar_customer);
        }
    });
}

Check_session_login();