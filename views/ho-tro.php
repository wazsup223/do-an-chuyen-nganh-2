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
    <link rel="stylesheet" href="assets/css/ho-tro.css">
    <title>Hỗ trợ</title>
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
                <div class="support">
                        <div class="shopping-guide">
                            <h1 class="title first">HƯỚNG DẪN MUA HÀNG TRỰC TUYẾN TẠI KING MOBILE</h1>
                            <p>Quý khách gọi đến số 1900 1903 bấm phím 1 để gặp nhân viên bán hàng Online của chúng tôi. Nhân viên bán hàng Online sẽ tư vấn và tiếp nhận đơn hàng cho quý khách trong thời gian từ 8h-21h30 hàng ngày và tất cả các ngày trong tuần.</p>
                        </div>
                        <div class="policies">
                            <div class="policies__warranty">
                                <h1 class="title">CHÍNH SÁCH BẢO HÀNH</h1>
                                <ul>
                                    <li>Trong vòng 15 ngày đầu sau khi mua hàng, sản phẩm bị lỗi sẽ được đổi sản phẩm mới 100%. Sản phẩm phải có đầy đủ vỏ hộp, phụ kiện kèm theo và không bị trầy xước, không vi phạm điều kiện bảo hành khác và không phải là vật tư tiêu hao. Vật tiêu hao là vật khi đã qua sử dụng một lần thì mất đi hoặc không giữ được tính chất, hình dáng và tính năng sử dụng ban đầu, nếu lỗi KING MOBILE sẽ tiếp nhận bảo hành sản phẩm.</li>
                                    <li>Từ ngày 16 cho đến hết thời gian bảo hành, KING MOBILE cam kết khắc phục sự cố và trả bảo hành trong thời gian 10 ngày (không tính thứ bảy, chủ nhật, các ngày lễ, Tết và các trường hợp khác được thỏa thuận trước), những sản phẩm phải gửi bảo hành nước ngoài thời gian chờ bảo hành sẽ theo chính sách của hãng</li>
                                    <li>Cộng thêm thời hạn bảo hành sản phẩm, KING MOBILE cam kết cộng thêm thời hạn bảo hành số ngày tương ứng với số ngày Khách hàng gửi bảo hành sản phẩm, số ngày này được tính từ ngày Quý khách đi gửi bảo hành sản phẩm đến khi nhận được thông báo sản phẩm đã được bảo hành xong.</li>
                                </ul>
                            </div>
                            <div class="policies__premium">
                                <h1 class="title">CHÍNH SÁCH ƯU ĐÃI</h1>
                                <ol>
                                    <li>Đối với sản phẩm thuộc cùng ngành nghề kinh doanh, kể cả sản phẩm không được bán ra bởi KING MOBILE khi Quý khách hàng có nhu cầu được tư vấn để mua, sử dụng hoặc bảo trì, bảo dưỡng, cài đặt phần mềm hợp pháp vẫn được phục vụ theo hình thức tư vấn qua điện thoại hoặc được hỗ trợ sửa chữa khi mang sản phẩm trực tiếp đến các địa chỉ bảo hành của KING MOBILE.</li>
                                    <li>Đối với sản phẩm vi phạm điều kiện bảo hành, KING MOBILE vẫn tiếp nhận sửa chữa có tính phí với Quý khách hàng theo giá ưu đãi. Giá sửa chữa sẽ được báo với khách hàng trước khi thực hiện dịch vụ.</li>
                                    <li>Trường hợp sản phẩm vi phạm điều kiện bảo hành của KING MOBILE và của hãng, KING MOBILE sẽ hỗ trợ khách hàng gửi bảo hành sản phẩm tại hãng. Thời gian thông báo kết quả tối đa không quá 01 tháng kể từ ngày KING MOBILE nhận sản phẩm của khách hàng. Khách hàng sẽ chịu chi phí sửa chữa(nếu có) đối với các sản phẩm vi phạm điều kiện bảo hành.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
        
        <!-- Phần footer -->
        <?php include("../views/shared/footer.php")?>
    </div>
</body>
</html>