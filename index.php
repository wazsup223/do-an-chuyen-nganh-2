<!DOCTYPE html>
<html lang="en">
<head>
    <base href="http://localhost:<?php echo $_SERVER['SERVER_PORT']; ?>/DoAnWeb2-BanDienThoai-MVC/" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Tệp giaodien/import.php dùng để dùng chung các đường dẫn css và js cho mọi trang -->
    <?php include("views/shared/import.php") ?>

    <!-- Đây là link css riêng cho từng trang -->
    <link rel="stylesheet" href="assets/css/trang-chu.css">
    <title>Trang chủ</title>
</head>
<body>
    <div class="wrapper">
        <!-- Phần header -->
        <?php include("views/shared/header.php")?>

        <!-- Content wrapper -->
        <div class="content-wrapper">
            <!-- Phần Sitebar danh mục sản phẩm -->
            <?php include("views/shared/danh-muc-sp.php")?>

            <!-- Phần main content, phần này tùy page mà có giao diện khác nhau -->
            <div class="content-item content-main">
                <!-- Tiêu đề lớn -->
                <div class="main-title">
                    <h1>SẢN PHẨM NỔI BẬT</h1>
                </div>
                <!-- Khối container -->
                <div class="outstanding-products phone">
                    <!-- Các item sản phẩm -->
                </div>

                <!-- Tiêu đề lớn -->
                <!-- <div class="main-title second">
                    <h1>PHỤ KIỆN NỔI BẬT</h1>
                </div>
                <div class="outstanding-products phukien">
                    <div class="item">
                        <div class="image">
                            <img src="assets/images/products/day-sac/cap-lightning-mfi-09m-anker-a8012-thumb.jpg" alt="" srcset="">
                        </div>
                        <div class="title">
                            <h2>
                            Cáp Lightning MFI 0.9m Anker Select+ A8012 
                            </h2>
                        </div>
                        <div class="price-sale">
                            <p>
                                20.490.000₫
                            </p>
                        </div>
                        <div class="price-origin">
                            <p>
                                <span>
                                    27.490.000₫
                                </span>
                                <span>
                                    -6%
                                </span>
                            </p>
                        </div>
                        <div class="detail">
                            <button type="button" class="btn btn-primary">
                                <a class="a" href="">Xem chi tiết</a>
                            </button>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
        
        <!-- Phần footer -->
        <?php include("views/shared/footer.php")?>
    </div>

    <script>
        $.ajax({
            url: 'controllers/product-category/xuly-product.php',
            method: "GET",
            data: {
                'action': 'sp-noi-bat',
            }
        }).done(function(data) {
            if(data != 'No result'){
                const dataParser = JSON.parse(data);
                render(dataParser);
            }
        }).fail(function(error) {
            console.error(error);
        });

        function render(dataParser){
                const outstanding_products = document.querySelector('div.outstanding-products');

                let mapData = dataParser.map(function(item, index){
                    const giaKhuyenMai = +item['gia_khuyenmai'].replace(/\./g, '');
                    const giaGoc = +item['gia_sp'].replace(/\./g, '');
                    let percent_sale_calc = '';
                    if (giaGoc !== 0) {
                        percent_sale_calc = 100 - ((giaKhuyenMai / giaGoc) * 100);
                        percent_sale_calc = percent_sale_calc.toFixed(2);
                    } else {
                        percent_sale_calc = 100; 
                    }
                   
                    return `
                        <div class="item">
                            <div class="image">
                                <img src="assets/images/products/${item['anh_sp']}" alt="" srcset="">
                            </div>
                            <div class="title">
                                <h2>
                                    ${item['tensp']}
                                </h2>
                            </div>
                            <div class="price-sale">
                                <p>
                                    ${item['gia_khuyenmai']}₫
                                </p>
                            </div>
                            <div class="price-origin">
                                <p>
                                    <span>
                                        ${item['gia_sp']}₫
                                    </span>
                                    <span class="percent-sale">
                                        ${percent_sale_calc}%
                                    </span>
                                </p>
                            </div>
                            <div class="detail">
                                <button type="button" class="btn btn-primary">
                                    <a class="a" href="views/product-detail.php?idsp=${item['id_sp']}">Xem chi tiết</a>
                                </button>
                            </div>
                        </div>
                    `;
                }).join(''); 
                outstanding_products.innerHTML = mapData;
            }
    </script>
</body>
</html>