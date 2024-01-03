<?php 
    include($_SERVER['DOCUMENT_ROOT'] . "/DoAnWeb2-BanDienThoai-MVC/controllers/account/check-session-login-admin.php");
?>
<div class="sidebar">
    <div class="logo">
        <div class="wrap-img">
            <img src="assets/images/logo/king-mobile-cut.jpg" alt="" srcset="">
        </div>
    </div>
    <div class="menu">
        <div class="menu__item">
            <a href="views/admin/index.php?param=user-manage">
                <span class="item__icon">
                    <i class="fa-solid fa-users"></i>
                </span>
                <span class="item__name">Khách hàng</span>
            </a>
        </div>
        <div class="menu__item">
            <a href="views/admin/index.php?param=product-manage">
                <span class="item__icon">
                <i class="fa-solid fa-cart-flatbed"></i>
                </span>
                <span class="item__name">Sản phẩm</span>
            </a>
        </div>
        <div class="menu__item">
            <a href="views/admin/index.php?param=category-manage">
                <span class="item__icon">
                    <i class="fa-solid fa-table-list fa-lg"></i>
                </span>
                <span class="item__name">Danh mục</span>
            </a>
        </div>
        <div class="menu__item">
            <a href="views/admin/index.php?param=bill-list-manage">
                <span class="item__icon" style="margin-right: 3% !important;">
                    <i class="fa-solid fa-receipt fa-lg"></i>
                </span>
                <span class="item__name">Hóa đơn</span>
            </a>
        </div>
    </div>
</div>