<base href="http://localhost:<?php echo $_SERVER['SERVER_PORT']; ?>/DoAnWeb2-BanDienThoai-MVC/" />
<?php
    session_start();
    include("../config/connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Tệp giaodien/import.php dùng để dùng chung các đường dẫn css và js cho mọi trang -->
    <?php include("../views/shared/import.php") ?>

    <!-- Đây là link css riêng cho từng trang -->
    <link rel="stylesheet" href="assets/css/product-detail.css">
    <title>Chi tiết sản phẩm</title>
</head>
<body>
    <div class="wrapper">
        <!-- Phần header -->
        <?php include("../views/shared/header.php")?>

        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Phần Sitebar danh mục sản phẩm -->
            <?php include("../views/shared/danh-muc-sp.php")?>

            <!-- Phần main content, phần này tùy page mà có giao diện khác nhau -->
            <div class="content-item content-main" style="background-color: #ffffff;">
                
            </div>
        </div>
        
        <!-- Phần footer -->
        <?php include("../views/shared/footer.php")?>
    </div>

    <script>
        const url = new URL(window.location.href);
        const searchParams = url.searchParams;
        const id_sp = searchParams.get('idsp');

        $.ajax({
            url: 'controllers/product-category/xuly-product.php',
            method: "GET",
            data: {
                'action': 'chi-tiet-sp',
                'id_sp': id_sp
            }
        }).done(function(data) {
            if(data != 'No result'){
                localStorage.setItem("chitietsp", data);
                const dataParser = JSON.parse(data);
                render(dataParser);
            }
        }).fail(function(error) {
            console.error(error);
        });

        function render(data){
            const giaKhuyenMai = +data['gia_khuyenmai'].replace(/\./g, '');
            const giaGoc = +data['gia_sp'].replace(/\./g, '');
            let percent_sale_calc = '';
            if (giaGoc !== 0) {
                percent_sale_calc = 100 - ((giaKhuyenMai / giaGoc) * 100);
                percent_sale_calc = percent_sale_calc.toFixed(2);
            } else {
                percent_sale_calc = 100; 
            }
            const info_zone = `
                <div class="info-zone">
                    <div class="product-image">
                        <img src="assets/images/products/${data['anh_sp']}" alt="" srcset="">
                    </div>
                    <div class="product-infor">
                        <h1>${data['tensp']}</h1>
                        <div class="price-sale">
                            <p>
                                ${data['gia_khuyenmai']}₫
                            </p>
                        </div>
                        <div class="price-origin">
                            <p>
                                <span>
                                    ${data['gia_sp']}₫
                                </span>
                                <span class="percent-sale">
                                    ${percent_sale_calc}%
                                </span>
                            </p>
                        </div>
                        <p class="soluong">Số lượng: ${data['soluong']}
                        <div class="edit-soluong">
                                <button class="giam" onclick="giam(this)">-</button>
                                <input type="number" name="" id="soluong" value=${item['soluong']} onchange="capNhatSoluong(this)" data-idSP=${item['id_sp']} data-idKH=${item['id_kh']}>
                                <button class="tang" onclick="tang(this)">+</button>
                            </div></p>
                        <button type="button" class="btn btn-primary add-cart" data-id=${data['id_sp']} onclick="check(this)">
                            <a href="javascript:void(0);" >THÊM VÀO GIỎ HÀNG</a>
                        </button>
                    </div>
                </div>
            `;

            const piroduct_specifcation = `
                <div class="product-specification">
                    <h1>Cấu hình ${data['tensp']}</h1>
                    <table>
                        <tbody>
                            ${data['thongsokythuat']}
                        </tbody>
                    </table>
                </div>
            `;

            const product_description = `
                <div class="product-description">
                    <h1>Thông tin sản phẩm</h1>
                    <p>
                        ${data['motasp']}
                    </p>
                </div>    
            `;
            

            document.querySelector('div.content-item.content-main').innerHTML = '<h1>CHI TIẾT SẢN PHẨM</h1>' + info_zone + piroduct_specifcation + product_description;
        }
    </script>
    <script src="assets/js/cart/cart.js"></script>
</body>
</html>