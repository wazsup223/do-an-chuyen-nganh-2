<!DOCTYPE html>
<html lang="en">
<head>
    <base href="http://localhost:<?php echo $_SERVER['SERVER_PORT']; ?>/DoAnWeb2-BanDienThoai-MVC/" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <!-- Tệp giaodien/import.php dùng để dùng chung các đường dẫn css và js cho mọi trang -->
    <?php include("../views/shared/import.php") ?>

    <!-- Đây là link css riêng cho từng trang -->
    <!-- <link rel="stylesheet" href="../assets/css/trang-chu.css"> -->
    <link rel="stylesheet" href="assets/css/product-list.css">
    <title>Kết quả tìm kiếm</title>
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
            <div class="content-item content-main">
                <div class="outstanding-products phone">
                    <!-- Các item sản phẩm -->
                    
                </div>
                <p id="pagination-here" style="text-align: center;display: flex; justify-content: center; padding-bottom: 30px; font-size: 1.8rem"></p>
            </div>
        </div>
        
        <!-- Phần footer -->
        <?php include("../views/shared/footer.php")?>
    </div>


    <script src="//netdna.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
    <script src="https://cdn.rawgit.com/botmonster/jquery-bootpag/master/lib/jquery.bootpag.min.js"></script>
    <script>
        const url = new URL(window.location.href);
        const searchParams = url.searchParams;
        if(searchParams.size == 2){
            if(searchParams.has('key') && searchParams.has('page')){
                const key = searchParams.get('key');
                const page = searchParams.get('page');

                $.ajax({
                    url: 'controllers/product-category/xuly-product.php',
                    method: "GET",
                    data: {
                        'action': 'search',
                        'key': key,
                        'page': page
                    }
                }).done(function(data) {
                    const content_item = document.querySelector('.content-wrapper .content-main');
                    if(data === 'No result'){
                        content_item.innerHTML = '<h2>Không có kết quả</h2>'
                    }else{
                        const dataParser = JSON.parse(data);
                        const array_data = dataParser[0];
                        const total_page = dataParser[1];

                        render(dataParser[0]);
                        console.log(dataParser);

                        $('#pagination-here').bootpag({
                            total: total_page,
                            page: page,
                            maxVisible: 4,
                            leaps: false
                        }).on("page", function(event, num){
                            window.location.href = `http://localhost/DoAnWeb2-BanDienThoai-MVC/views/search.php?key=${key}&page=${num}`;
                        });

                    }
                }).fail(function() {
                    
                });
            }
        }

        function render(dataParserProduct){
                const outstanding_products = document.querySelector('div.outstanding-products');

                let mapData = dataParserProduct.map(function(item, index){
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