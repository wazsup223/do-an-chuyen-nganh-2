<?php 
    include($_SERVER['DOCUMENT_ROOT'] . "/DoAnWeb2-BanDienThoai-MVC/controllers/account/check-session-login-admin.php");
?>
<div class="account">
    <div class="avatar">
        <a href="assets/images/uploads/customer-avatar/default-acc.png" class="link-profile">
            <img src="assets/images/uploads/customer-avatar/default-acc.png" alt="" srcset="">
        </a> 
    </div> 
    <div class="admin-name">
        <span>
            Admin
        </span>
    </div>
    <div class="logout">
        <a href="controllers/account/xuly-logout.php?user=admin" class="link-logout" title="Đăng xuất">
            <i class="fa-solid fa-arrow-right-from-bracket" style="color: #ff0000;"></i>
        </a>
    </div>
</div>
<script>
    const account_profile = document.querySelector('.account .link-profile');
    const account_avatar_image = document.querySelector('.account .link-profile img');
    const account_name = document.querySelector('.account .admin-name span');

    $.ajax({
        url: "controllers/account/change-account-view-admin.php",
        method: "GET"
    }).done(function(data) {
        if(data !== 'timeout'){
            let arr_data = data.split(':');

            let id_admin = arr_data[0];
            let tentk_admin = arr_data[1];
            let avatar_admin = arr_data[2];

            account_profile.setAttribute('href', 'assets/images/uploads/customer-avatar/' + avatar_admin);
            account_avatar_image.setAttribute('src', 'assets/images/uploads/customer-avatar/' + avatar_admin);
            account_name.innerText = tentk_admin;
        }
    });
</script>