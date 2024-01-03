<?php
    //Cấu hình mỗi trang gồm 9 sản phẩm
    $products_per_page = 9;

    //Cấu hình pagination
    $pagination_number = 5;
?>

<?php
    $conn = new mysqli('localhost', 'root', '', 'ban-dt');
    if ($conn->connect_error) {
        die("Kết nối đến MySQL thất bại: " . $conn->connect_error);
        $conn->close();
    }else{
        echo 'Ố kề kết nối thành công <br>';
        if(!$conn->connect_error){
            $sql = "SELECT * FROM sanpham";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo $row['tensp'] . "<br>" . "
                        <table>
                            <tbody>
                                ".$row['thongsokythuat']."
                            </tbody>
                        </table>
                        <br><br><br>
                    ";
                }
            }else {
                echo "Không có dữ liệu.";
            }
        }
    }
?>