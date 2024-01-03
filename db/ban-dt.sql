-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 18, 2023 lúc 08:41 AM
-- Phiên bản máy phục vụ: 10.4.27-MariaDB
-- Phiên bản PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ban-dt`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `chitiethd`
--

CREATE TABLE `chitiethd` (
  `id_hd` int(10) UNSIGNED NOT NULL,
  `id_sp` int(11) UNSIGNED NOT NULL,
  `tensp` varchar(255) NOT NULL,
  `dongia` varchar(100) NOT NULL,
  `soluong` int(10) NOT NULL,
  `tongtien` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `chitiethd`
--

INSERT INTO `chitiethd` (`id_hd`, `id_sp`, `tensp`, `dongia`, `soluong`, `tongtien`) VALUES
(100000001, 2000000002, 'iphone 11', '10.999.000', 10, '109.990.000');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmucsp`
--

CREATE TABLE `danhmucsp` (
  `id_dmsp` int(5) UNSIGNED NOT NULL,
  `ten_dm` varchar(200) NOT NULL,
  `loai_dm` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmucsp`
--

INSERT INTO `danhmucsp` (`id_dmsp`, `ten_dm`, `loai_dm`) VALUES
(1001, 'iphone', 'điện thoại'),
(1002, 'samsung', 'điện thoại'),
(1003, 'xiaomi', 'điện thoại'),
(1004, 'dây sạc', 'phụ kiện');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `giohang`
--

CREATE TABLE `giohang` (
  `id_cart` int(10) UNSIGNED NOT NULL,
  `id_kh` int(10) UNSIGNED NOT NULL,
  `id_sp` int(11) UNSIGNED NOT NULL,
  `soluong` int(10) NOT NULL,
  `tongtien` varchar(100) NOT NULL,
  `tensp` varchar(255) NOT NULL,
  `anh_sp` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `giohang`
--

INSERT INTO `giohang` (`id_cart`, `id_kh`, `id_sp`, `soluong`, `tongtien`, `tensp`, `anh_sp`) VALUES
(19, 100000007, 2000000018, 1, '9.490.000', 'xiaomi redmi note 11 pro 5g', 'xiaomi-redmi-note-11-pro-trang-thumb.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `hoadon`
--

CREATE TABLE `hoadon` (
  `id_hd` int(10) UNSIGNED NOT NULL,
  `id_kh` int(10) UNSIGNED NOT NULL,
  `ngaylaphd` date NOT NULL,
  `hoten` varchar(100) NOT NULL,
  `sdt` varchar(11) NOT NULL,
  `diachi` varchar(200) NOT NULL,
  `tongtien` varchar(100) NOT NULL,
  `trangthai` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `hoadon`
--

INSERT INTO `hoadon` (`id_hd`, `id_kh`, `ngaylaphd`, `hoten`, `sdt`, `diachi`, `tongtien`, `trangthai`) VALUES
(100000001, 100000002, '2023-04-30', 'Nguyễn Văn A', '0937519612', 'BinhChanh, HCM', '109.990.000', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `khach_hang`
--

CREATE TABLE `khach_hang` (
  `id_kh` int(10) UNSIGNED NOT NULL,
  `tentk` varchar(100) NOT NULL,
  `hoten` varchar(100) NOT NULL,
  `sdt` varchar(11) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` varchar(100) NOT NULL,
  `dob` date NOT NULL,
  `avatar` varchar(250) NOT NULL,
  `phanquyen` int(1) NOT NULL,
  `address` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `khach_hang`
--

INSERT INTO `khach_hang` (`id_kh`, `tentk`, `hoten`, `sdt`, `email`, `password`, `dob`, `avatar`, `phanquyen`, `address`) VALUES
(100000001, 'Tin Le', 'Lê Trung Tín', '0937519600', 'trungtin.le1505@gmail.com', '123456789', '2002-03-05', 'avatar_645e31c63500d2.47129893.jpg', 0, 'TanHoaDong, HCM'),
(100000002, 'TVP', 'Trương Vạn Phát', '0906304519', 'tvp123@gmail.com', '987654321', '2002-07-11', 'avatar_645e328b5566f8.83706953.jpg', 0, 'BinhChanh, HCM'),
(100000003, 'DatLongVinh', 'Trương Quốc Đạt', '0563538888', 'datlongvinhctmedia@gmail.com', '123456789', '1993-10-06', 'avatar_645e3304967a11.35357166.jpg', 1, 'VinhLong, VN'),
(100000007, 'TungHuy', 'Đinh Tùng Huy', '0968191333', 'phuonganhnguyen.10696@gmail.com', '00000000', '1992-09-30', 'avatar_645e33203239d5.61312544.jpg', 1, 'Cầu Giấy, Hà Nội'),
(100000010, 'TrongThuc', 'Trần Trọng Trường', '0964201735', 'tritrantv121295@gmail.com', '123456789', '2022-09-08', 'avatar_645e3398780229.44460810.jpg', 1, 'Cai Lậy, Tiền Giang'),
(100000011, 'NhanNghia', 'Phạm Thành Nhân', '0788818752', 'phamthanhnhan260402@gmail.com', '123456789', '2002-04-26', 'avatar_645e33cd22ed16.30836290.jpg', 1, 'Cần Giuộc, Long An'),
(100000013, 'Diem Nhu', 'Võ Lê Diễm Như', '0703683734', 'diemnhu.vo@gmail.com', '12345678', '2003-06-05', 'avatar_645fca905f4f13.22590588.jpg', 1, 'HCM, VN'),
(100000018, 'XuanDao', 'Trần Xuân Đào', '0987481006', 'daotran.xuan000@gmail.com', '12345678', '2002-12-01', 'avatar_645fcc31b57551.49302830.jpg', 1, 'HCM, VN'),
(100000020, 'Hoàng Tử Ca Lẻ', 'Phan Nhựt Hào', '0342876917', 'calenhuthao@gmail.com', '12345678', '2002-09-09', 'avatar_645e336a04f9e6.94344957.jpg', 1, 'Long Xuyên, An Giang');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `sanpham`
--

CREATE TABLE `sanpham` (
  `id_sp` int(11) UNSIGNED NOT NULL,
  `id_dmsp` int(5) UNSIGNED NOT NULL,
  `tensp` varchar(255) NOT NULL,
  `gia_sp` varchar(100) NOT NULL,
  `gia_khuyenmai` varchar(100) NOT NULL,
  `soluong` int(11) NOT NULL,
  `anh_sp` varchar(200) NOT NULL,
  `motasp` text DEFAULT NULL,
  `thongsokythuat` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `sanpham`
--

INSERT INTO `sanpham` (`id_sp`, `id_dmsp`, `tensp`, `gia_sp`, `gia_khuyenmai`, `soluong`, `anh_sp`, `motasp`, `thongsokythuat`) VALUES
(2000000001, 1001, 'iphone 14 pro max', '27.490.000', '20.999.000', 180, 'iphone-14-pro-max-vang-thumb.jpg', 'iPhone 14 Pro Max một siêu phẩm trong giới smartphone được nhà Táo tung ra thị trường vào tháng 09/2022. Máy trang bị con chip Apple A16 Bionic vô cùng mạnh mẽ, đi kèm theo đó là thiết kế hình màn hình mới, hứa hẹn mang lại những trải nghiệm đầy mới mẻ cho người dùng iPhone.<br>\nThiết kế cao cấp bền bỉ: iPhone năm nay sẽ được thừa hưởng nét đặc trưng từ người anh iPhone 13 Pro Max, vẫn sẽ là khung thép không gỉ và mặt lưng kính cường lực kết hợp với tạo hình vuông vức hiện đại thông qua cách tạo hình phẳng ở các cạnh và phần mặt lưng.<br>\nNổi bật với thiết kế màn hình mới: Điểm ấn tượng nhất trên điện thoại iPhone năm nay nằm ở thiết kế màn hình, có thể dễ dàng nhận thấy được là hãng cũng đã loại bỏ cụm tai thỏ truyền thống qua bao đời iPhone bằng một hình dáng mới vô cùng lạ mắt.<br>\nVới những bạn đang mong muốn có cho mình một thiết bị có ngoại hình đẹp, hiệu năng cao và kể cả chụp ảnh quay phim chuyên nghiệm thì iPhone 14 Pro Max có thể coi là sự lựa chọn rất phù hợp cho năm 2022 và 2023 sắp tới. So với những gì mà thiết bị mang lại cho chúng ta thì mức giá bán của điện thoại được xem là cực kỳ xứng đáng.\n', '<tr><td> Màn hình</td><td>OLED6.7\"Super Retina XDR </td></tr><tr><td>Hệ điều hành:</td><td>iOS 16</td></tr><tr><td>Camera sau:</td><td>Chính 48 MP & Phụ 12 MP, 12 MP </td></tr><tr><td>Camera trước:</td><td>12 MP</td></tr><tr><td> Chip:</td><td>Apple A16 Bionic </td></tr><tr><td> RAM:</td><td>6 GB </td></tr><tr><td>Dung lượng lưu trữ:</td><td>256 GB </td></tr><tr><td>SIM:</td><td>1 Nano SIM & 1 eSIMHỗ trợ 5G</td></tr><tr><td>Pin</td><td>4323 mAh20 W</td></tr>'),
(2000000002, 1001, 'iphone 11', '11.990.000', '10.999.000', 90, 'iphone-11-trang.jpg', 'Apple đã chính thức trình làng bộ 3 siêu phẩm iPhone 11, trong đó phiên bản iPhone 11 64GB có mức giá rẻ nhất nhưng vẫn được nâng cấp mạnh mẽ như iPhone Xr ra mắt trước đó.<br>Nâng cấp mạnh mẽ về camera: Nói về nâng cấp thì camera chính là điểm có nhiều cải tiến nhất trên thế hệ iPhone mới. Nếu như trước đây iPhone Xr chỉ có một camera thì nay với iPhone 11 chúng ta sẽ có tới hai camera ở mặt sau. Ngoài camera chính vẫn có độ phân giải 12 MP thì chúng ta sẽ có thêm một camera góc siêu rộng và cũng với độ phân giải tương tự. <br>Hiệu năng mạnh mẽ hàng đầu thế giới: Mỗi lần ra iPhone mới là mỗi lần Apple mang đến cho người dùng một trải nghiệm về hiệu năng \"chưa từng có\". Ở mức cấu hình trên giúp điện thoại chơi game tốt với các tựa game phổ biến hiện nay một cách mượt mà, ổn định. Mọi thao tác trên iPhone mới cũng cho tốc độ phản hồi nhanh mà bạn gần như sẽ không cảm nhận được sự giật lag cho dù có sử dụng trong một thời gian dài. <br>Với chừng đó tính năng, chừng đó cải tiến thì chiếc iPhone 11 này tự tin sẽ là một đối thủ đáng gờm với những chiếc flagship đến từ các hãng Android đang có mặt trên thị trường.', '<tr><td> Màn hình</td><td>IPS LCD6.1\"Liquid Retina </td></tr><tr><td>Hệ điều hành:</td><td>iOS 15</td></tr><tr><td>Camera sau:</td><td>Chính 48 MP & Phụ 12 MP, 12 MP </td></tr><tr><td>Camera trước:</td><td>12 MP</td></tr><tr><td> Chip:</td><td>Apple A13 Bionic </td></tr><tr><td> RAM:</td><td>4 GB </td></tr><tr><td>Dung lượng lưu trữ:</td><td>64 GB </td></tr><tr><td>SIM:</td><td>1 Nano SIM & 1 eSIMHỗ trợ 5G</td></tr><tr><td>Pin</td><td>3110 mAh18 W</td></tr>'),
(2000000003, 1001, 'iphone 12', '17.990.000', '14.990.000', 100, 'iphone-12-den-new-2.jpg', 'Trong những tháng cuối năm 2020, Apple đã chính thức giới thiệu đến người dùng cũng như iFan thế hệ iPhone 12 series mới với hàng loạt tính năng bứt phá, thiết kế được lột xác hoàn toàn, hiệu năng đầy mạnh mẽ và một trong số đó chính là iPhone 12 64GB.<br>Hiệu năng vượt xa mọi giới hạn: Apple đã trang bị con chip mới nhất của hãng (tính đến 11/2020) cho iPhone 12 đó là A14 Bionic, được sản xuất trên tiến trình 5 nm với hiệu suất ổn định hơn so với chip A13 được trang bị trên phiên bản tiền nhiệm iPhone 11. Chưa hết, Apple còn gây bất ngờ đến người dùng với hệ thống 5G lần đầu tiên được trang bị trên những chiếc iPhone, cho tốc độ truyền tải dữ liệu nhanh hơn, ổn định hơn.<br>Cụm camera không ngừng cải tiến: iPhone 12 được trang bị hệ thống camera kép bao gồm camera góc rộng và camera siêu rộng có cùng độ phân giải là 12 MP, chế độ ban đêm (Night Mode) trên bộ đôi camera này cũng đã được nâng cấp về phần cứng lẫn thuật toán xử lý, khi chụp những bức ảnh thiếu sáng bạn sẽ nhận được kết quả ấn tượng với màu sắc, độ chi tiết rõ nét đáng kinh ngạc. <br>Sự lột xác đầy mạnh mẽ lần này của Apple không chỉ gây bất ngờ đến người dùng mà còn đánh dấu một kỷ nguyên mới trong nền phát triển smartphone Apple. Và đây cũng được xem là một trong những bộ series iPhone mà Apple đặt nhiều tâm huyết, mục đích và đầy tính năng mạnh mẽ chưa từng thấy.', '<tr><td> Màn hình</td><td>IPS LCD6.1\"Liquid Retina </td></tr><tr><td>Hệ điều hành:</td><td>iOS 15</td></tr><tr><td>Camera sau:</td><td>Chính 48 MP & Phụ 12 MP, 12 MP </td></tr><tr><td>Camera trước:</td><td>12 MP</td></tr><tr><td> Chip:</td><td>Apple A13 Bionic </td></tr><tr><td> RAM:</td><td>4 GB </td></tr><tr><td>Dung lượng lưu trữ:</td><td>64 GB </td></tr><tr><td>SIM:</td><td>1 Nano SIM & 1 eSIMHỗ trợ 5G</td></tr><tr><td>Pin</td><td>3110 mAh18 W</td></tr>'),
(2000000004, 1001, 'iphone 14', '30.990.000', '19.490.000', 100, 'iphone-14-128gb-vang-thumb.jpeg', 'iPhone 14 một siêu phẩm trong giới smartphone được nhà Táo tung ra thị trường vào tháng 09/2022. Máy trang bị con chip Apple A16 Bionic vô cùng mạnh mẽ, đi kèm theo đó là thiết kế hình màn hình mới, hứa hẹn mang lại những trải nghiệm đầy mới mẻ cho người dùng iPhone.<br>Sau những gì mà mình trải nghiệm được trên iPhone 14 thì đây quả thực là một sự lựa chọn rất đáng để đầu tư, máy có gần như những loại công nghệ hàng đầu trên thị trường, có thể đáp ứng tốt cho mình mọi tác vụ sử dụng, và hơn hết là điện thoại được hỗ trợ hệ điều hành mới nhất, vậy nên ta cũng sẽ an tâm hơn vì Apple vẫn sẽ tiếp tục hỗ trợ và nâng cấp cho iPhone 14 nhiều phiên bản hệ điều hành mới trong tương lai.', '<tr><td> Màn hình</td><td>OLED6.7\"Super Retina XDR </td></tr><tr><td>Hệ điều hành:</td><td>iOS 16</td></tr><tr><td>Camera sau:</td><td>Chính 48 MP & Phụ 12 MP, 12 MP </td></tr><tr><td>Camera trước:</td><td>12 MP</td></tr><tr><td> Chip:</td><td>Apple A16 Bionic </td></tr><tr><td> RAM:</td><td>6 GB </td></tr><tr><td>Dung lượng lưu trữ:</td><td>256 GB </td></tr><tr><td>SIM:</td><td>1 Nano SIM & 1 eSIMHỗ trợ 5G</td></tr><tr><td>Pin</td><td>4323 mAh20 W</td></tr>'),
(2000000005, 1001, 'iphone 13', '24.990.000', '12.990.000', 100, 'iphone-13-pro-graphite.jpg', 'iPhone 13 một siêu phẩm trong giới smartphone được nhà Táo tung ra thị trường vào tháng 09/2021. Máy trang bị con chip Apple A16 Bionic vô cùng mạnh mẽ, đi kèm theo đó là thiết kế hình màn hình mới, hứa hẹn mang lại những trải nghiệm đầy mới mẻ cho người dùng iPhone.<br>Sau những gì mà mình trải nghiệm được trên iPhone 13 thì đây quả thực là một sự lựa chọn rất đáng để đầu tư, máy có gần như những loại công nghệ hàng đầu trên thị trường, có thể đáp ứng tốt cho mình mọi tác vụ sử dụng, và hơn hết là điện thoại được hỗ trợ hệ điều hành mới nhất, vậy nên ta cũng sẽ an tâm hơn vì Apple vẫn sẽ tiếp tục hỗ trợ và nâng cấp cho iPhone 13 nhiều phiên bản hệ điều hành mới trong tương lai.', '<tr><td> Màn hình</td><td>IPS LCD6.1\"Liquid Retina </td></tr><tr><td>Hệ điều hành:</td><td>iOS 15</td></tr><tr><td>Camera sau:</td><td>Chính 48 MP & Phụ 12 MP, 12 MP </td></tr><tr><td>Camera trước:</td><td>12 MP</td></tr><tr><td> Chip:</td><td>Apple A13 Bionic </td></tr><tr><td> RAM:</td><td>4 GB </td></tr><tr><td>Dung lượng lưu trữ:</td><td>64 GB </td></tr><tr><td>SIM:</td><td>1 Nano SIM & 1 eSIMHỗ trợ 5G</td></tr><tr><td>Pin</td><td>3110 mAh18 W</td></tr>'),
(2000000006, 1001, 'iphone se', '10.990.000', '4.000.000', 100, 'iphone-se-white.jpg', 'Như vậy là sau bao ngày chờ đợi thì iPhone SE 64GB (2022) cũng đã được giới thiệu tại sự kiện Apple Peek Performance. Thiết bị nổi bật với cấu hình mạnh mẽ, chạy chip hiện đại nhất của Apple hiện tại nhưng giá bán lại rất phải chăng. <br>Thiết kế hoài niệm: iPhone SE 64GB (2022) vẫn không thay đổi thiết kế nhiều so với phiên bản tiền nhiệm. Máy vẫn có màn hình 4.7 inch, viền màn hình trên và dưới được giữ lại để chứa camera selfie và nút Home “huyền thoại\". Màn hình iPhone SE 64GB (2022) sẽ sử dụng tấm nền IPS LCD, cho chất lượng hiển thị khá tốt. <br>Hiệu năng vượt trội với vi xử lý mới nhất: Mặc dù là dòng iPhone giá rẻ nhưng iPhone SE 64GB (2022) lại sử dụng con chip Apple A15 Bionic tiên tiến nhất tại thời điểm ra mắt. Vi xử lý này sẽ giúp thiết bị \"cân\" nhiều tựa game mobile hấp dẫn mà không lo giật lag. Ngoài ra iPhone SE 64GB (2022) cũng có viên pin được cải tiến, giúp bạn trải nghiệm rất lâu. <br>Camera cải tiến: Về thời lượng sử dụng cũng như chất lượng chụp ảnh cũng được nâng cấp khi trang bị viên pin 2018 mAh cùng camera sau 12 MP có khả năng quay video 4K. <br>Tổng kết lại thì đây là một chiếc iPhone giá rẻ những trang bị nhiều thông số cao cấp, nếu bạn muốn trải nghiệm hệ sinh thái của Apple nhưng đang cân nhắc về tài chính thì đây là một lựa chọn đáng lưu tâm. \n', '<tr><td> Màn hình</td><td>IPS LCD6.1\"Liquid Retina </td></tr><tr><td>Hệ điều hành:</td><td>iOS 15</td></tr><tr><td>Camera sau:</td><td>Chính 48 MP & Phụ 12 MP, 12 MP </td></tr><tr><td>Camera trước:</td><td>12 MP</td></tr><tr><td> Chip:</td><td>Apple A13 Bionic </td></tr><tr><td> RAM:</td><td>4 GB </td></tr><tr><td>Dung lượng lưu trữ:</td><td>64 GB </td></tr><tr><td>SIM:</td><td>1 Nano SIM & 1 eSIMHỗ trợ 5G</td></tr><tr><td>Pin</td><td>3110 mAh18 W</td></tr>'),
(2000000007, 1002, 'samsung galaxy-z flip4 5g', '25.990.000', '19.990.000', 100, 'samsung-galaxy-z-flip4-5g-128gb-thumb-tim.jpg', 'Tại sự kiện Samsung Unpacked thường niên, Samsung Galaxy Z Fold4 256GB chính thức được trình làng thị trường công nghệ, mang trên mình nhiều cải tiến đáng giá giúp Galaxy Z Fold trở thành dòng điện thoại gập đã tốt nay càng tốt hơn.<br>Kiểu dáng gập mở tinh tế tạo nên sự khác biệt: Galaxy Z Fold4 (2022) ra mắt với ngoại hình gần như là không đổi khi so với Galaxy Z Fold3, nếu bạn chỉ nhìn bề ngoài thì bạn sẽ khó lòng phân biệt được 2 sản phẩm này. Máy vẫn sử dụng khung viền Armor Aluminum bền bỉ, mặt kính màn hình phụ là Corning Gorilla Glass Victus+, mặt kính màn hình chính là Ultra Thin Glass.Và đây cũng là chiếc điện thoại gập bền bỉ nhất giới smartphone khi kết hợp với khả năng kháng nước chuẩn IPX8, có khả năng ngâm trong nước ngọt ở độ sâu tới 1.5 mét trong thời gian tối đa 30 phút* (máy không có khả năng kháng bụi). <br>Màn hình cực đại, trải nghiệm cực đã: Samsung Galaxy Z Fold4 có màn hình phụ bên ngoài kích thước 6.2 inch độ phân giải HD+. Màn hình chính 7.6 inch hỗ trợ cơ chế gập, sử dụng công nghệ màn hình Dynamic AMOLED 2X rực rỡ cùng một số công nghệ như hỗ trợ độ sáng tối đa 1200 nits, tần số quét 120 Hz có khả năng thích ứng tùy thuộc vào ứng dụng và cài đặt.<br>Năm nay Samsung đã tập trung vào nâng cấp phần mềm, camera cũng đã được nâng cấp mạnh mẽ và có một tỉ lệ màn hình mới nâng cao trải nghiệm người dùng. Hãy đến KING MOBILE gần nhất để cùng trải nghiệm siêu phẩm mới đến từ Samsung.', '<tr><td> Màn hình</td><td>Dynamic AMOLED 2XChính 7.6\" & Phụ 6.2\"Quad HD+ (2K+)</td></tr><tr><td>Hệ điều hành:</td><td>Android 12</td></tr><tr><td>Camera sau:</td><td>Chính 50 MP & Phụ 12 MP, 10 MP </td></tr><tr><td>Camera trước:</td><td>10 MP & 4 MP</td></tr><tr><td> Chip:</td><td>Snapdragon 8+ Gen 1 </td></tr><tr><td> RAM:</td><td>4 GB </td></tr><tr><td>Dung lượng lưu trữ:</td><td>256GB </td></tr><tr><td>SIM:</td><td>1 Nano SIM & 1 eSIMHỗ trợ 5G</td></tr><tr><td>Pin</td><td>4400 mAh25 W</td></tr>'),
(2000000008, 1002, 'samsung galaxy-z fold-3', '26.990.000', '17.990.000', 100, 'samsung-galaxy-z-fold-3-green-1.jpg', 'Tại sự kiện Samsung Unpacked thường niên, Samsung Galaxy Z Flip4 256GB chính thức được trình làng thị trường công nghệ, mang trên mình nhiều cải tiến đáng giá giúp Galaxy Z Flip trở thành dòng điện thoại gập đã tốt nay càng tốt hơn.<br>Kiểu dáng gập mở tinh tế tạo nên sự khác biệt: Galaxy Z Flip4 (2022) ra mắt với ngoại hình gần như là không đổi khi so với Galaxy Z Flip3, nếu bạn chỉ nhìn bề ngoài thì bạn sẽ khó lòng phân biệt được 2 sản phẩm này. Máy vẫn sử dụng khung viền Armor Aluminum bền bỉ, mặt kính màn hình phụ là Corning Gorilla Glass Victus+, mặt kính màn hình chính là Ultra Thin Glass.Và đây cũng là chiếc điện thoại gập bền bỉ nhất giới smartphone khi kết hợp với khả năng kháng nước chuẩn IPX8, có khả năng ngâm trong nước ngọt ở độ sâu tới 1.5 mét trong thời gian tối đa 30 phút* (máy không có khả năng kháng bụi). <br>Màn hình cực đại, trải nghiệm cực đã: Samsung Galaxy Z Flip4 có màn hình phụ bên ngoài kích thước 6.2 inch độ phân giải HD+. Màn hình chính 7.6 inch hỗ trợ cơ chế gập, sử dụng công nghệ màn hình Dynamic AMOLED 2X rực rỡ cùng một số công nghệ như hỗ trợ độ sáng tối đa 1200 nits, tần số quét 120 Hz có khả năng thích ứng tùy thuộc vào ứng dụng và cài đặt.<br>Năm nay Samsung đã tập trung vào nâng cấp phần mềm, camera cũng đã được nâng cấp mạnh mẽ và có một tỉ lệ màn hình mới nâng cao trải nghiệm người dùng. Hãy đến KING MOBILE gần nhất để cùng trải nghiệm siêu phẩm mới đến từ Samsung.\n', '<tr><td> Màn hình</td><td>Dynamic AMOLED 2XChính 7.6\" & Phụ 6.2\"Quad HD+ (2K+)</td></tr><tr><td>Hệ điều hành:</td><td>Android 12</td></tr><tr><td>Camera sau:</td><td>Chính 50 MP & Phụ 12 MP, 10 MP </td></tr><tr><td>Camera trước:</td><td>10 MP & 4 MP</td></tr><tr><td> Chip:</td><td>Snapdragon 8+ Gen 1 </td></tr><tr><td> RAM:</td><td>4 GB </td></tr><tr><td>Dung lượng lưu trữ:</td><td>256GB </td></tr><tr><td>SIM:</td><td>1 Nano SIM & 1 eSIMHỗ trợ 5G</td></tr><tr><td>Pin</td><td>4400 mAh25 W</td></tr>'),
(2000000009, 1002, 'samsung galaxy A32 5g', '15.990.000', '11.990.000', 100, 'samsung-galaxy-a32-5G--600x600.jpg', 'Samsung Galaxy A32 là chiếc điện thoại thuộc phân khúc tầm trung nhưng sở hữu nhiều ưu điểm vượt trội về màn hình lớn sắc nét, bộ bốn camera 64 MP cùng vi xử lý hiệu năng cao và được bán ra với mức giá vô cùng tốt. <br>Thiết kế thời thượng cùng màu sắc bắt mắt: Samsung Galaxy A32 có mặt lưng nhựa cao cấp với thiết kế đơn giản, trang nhã, không chỉ giúp bảo vệ máy mà còn tăng độ bóng bẩy cho smartphone, mang đến vẻ ngoài đẳng cấp cho người sở hữu. Tổng kích thước thân máy mỏng chỉ 8.4 mm và có trọng lượng 184 g, hai cạnh bên cũng được vát cong nhẹ nhàng nên việc cầm nắm cũng chắc chắn hơn và thuận tiện cho mọi tác vụ. <br>Màn hình giải trí sắc nét, đa chức năng: Galaxy A32 được trang bị màn hình giọt nước với viền mỏng hai bên ấn tượng, mang đến không gian hiển thị rộng rãi, sắc nét và chi tiết. Hơn thế nữa, màn hình trên Samsung Galaxy A32 còn hỗ trợ tần số quét cao 90 Hz giúp gia tăng trải nghiệm giải trí cho người dùng. <br>Bộ bốn camera sau đến 64 MP thỏa sức sáng tạo: Điện thoại Samsung A32 được trang bị cụm camera sau tận bốn ống kính bao gồm: Camera chính 64 MP, camera góc siêu rộng 8 MP, camera macro và camera cảm biến độ sâu cùng 5 MP. Mặt trước Samsung Galaxy A32 còn được trang bị camera selfie có độ phân giải 20 MP với khẩu độ f/2.2, hỗ trợ tính năng tự động lấy nét và nhận điện khuôn mặt thông minh giúp người dùng có những bức ảnh chụp trọn vẹn và đẹp mắt nhất. <br> Tạm kết, với những ưu điểm vượt trội về thiết kế sang trọng, cụm camera chất lượng hoàn hảo, màn hình sắc nét đi kèm hiệu năng tốt và có mức giá vô cùng hấp dẫn, đây hứa hẹn sẽ là smartphone phù hợp với đa dạng người tiêu dùng.', '<tr><td> Màn hình</td><td>Super AMOLED6.4\"Full HD+</td></tr><tr><td>Hệ điều hành:</td><td>Android 11</td></tr><tr><td>Camera sau:</td><td>Chính 64 MP & Phụ 8 MP, 5 MP, 5 MP</td></tr><tr><td>Camera trước:</td><td>20 MP</td></tr><tr><td>Chip:</td><td>MediaTek Helio G80</td></tr><tr><td> RAM:</td><td>4 GB </td></tr><tr><td>Dung lượng lưu trữ:</td><td>256GB </td></tr><tr><td>SIM:</td><td>1 Nano SIM & 1 eSIMHỗ trợ 5G</td></tr><tr><td>Pin</td><td>4400 mAh25 W</td></tr>\n'),
(2000000010, 1002, 'samsung galaxy a23 5g', '10.990.000', '9.990.000', 100, 'samsung-galaxy-a23-cam-thumb.jpg', 'Samsung Galaxy A23 5g 4GB sở hữu bộ thông số kỹ thuật khá ấn tượng trong phân khúc, máy có một hiệu năng ổn định, cụm 4 camera thông minh cùng một diện mạo trẻ trung phù hợp cho mọi đối tượng người dùng. <br> Xử lý mượt mà nhờ chipset đến từ Qualcomm: Để máy vận hành một cách ổn định hơn Samsung trang bị cho Galaxy A23 con chip quốc dân dành cho thị trường di động tầm trung hiện nay (04/2022) mang tên Snapdragon 680 8 nhân với hiệu suất tối đa đạt được là 2.4 GHz. Đánh giá sức mạnh của thiết bị qua hai ứng dụng thường được mọi người dùng để so sánh hiệu năng với kết quả đạt được như sau: 283 (đơn nhân), 1515 (đa nhân) trên Benchmark và 6830 cho ứng dụng PCMark. Máy trang bị 4 GB RAM cùng 128 GB bộ nhớ trong mang đến khả năng đa nhiệm một cách mượt mà cùng không gian lưu trữ đáp ứng vừa đủ cho người dùng cơ bản để tải xuống một lượng ứng dụng và hình ảnh khá lớn.<br>Chụp ảnh sắc nét với cụm camera thông minh: Máy sở hữu 4 camera với camera chính có độ phân giải lên đến 50 MP, camera góc siêu rộng 5 MP, cảm biến xóa phông và macro có cùng độ phân giải 2 MP, kèm với đó là nhiều tính năng chụp ảnh mới lạ giúp mình thỏa sức khám phá. Khá ấn tượng về kết quả thu lại trên bức hình mà mình có chụp từ điện thoại khi đang di chuyển ngoài đường, màu sắc ảnh có độ tương phản cao, các chi tiết nhỏ đều được máy thu lại rõ nét, ảnh không quá “bể” khi zoom hay hậu kỳ - chỉnh sửa. <br>Qua những trải nghiệm trên thì mình thấy Samsung Galaxy A23 đáp ứng tốt khả năng xử lý tốt các nhu cầu sử dụng cơ bản hàng ngày, thiết kế bắt mắt cùng thời lượng sử dụng lâu dài, thực sự là một lựa chọn đáng quan tâm trong phân khúc điện thoại tầm trung.', '<tr><td> Màn hình</td><td>PLS TFT LCD6.6\"Full HD+</td></tr><tr><td>Hệ điều hành:</td><td>Android 11</td></tr><tr><td>Camera sau:</td><td>Chính 64 MP & Phụ 8 MP, 5 MP, 5 MP</td></tr><tr><td>Camera trước:</td><td>20MP</td></tr><tr><td>Chip:</td><td>Snapdragon 680</td></tr><tr><td> RAM:</td><td>4 GB </td></tr><tr><td>Dung lượng lưu trữ:</td><td>256GB </td></tr><tr><td>SIM:</td><td>1 Nano SIM & 1 eSIMHỗ trợ 5G</td></tr><tr><td>Pin</td><td>4400 mAh25 W</td></tr>'),
(2000000011, 1002, 'samsung galaxy s23 5g', '22.990.000', '16.380.000', 100, 'samsung-galaxy-s23.jpg', 'Samsung Galaxy A23 4GB sở hữu bộ thông số kỹ thuật khá ấn tượng trong phân khúc, máy có một hiệu năng ổn định, cụm 4 camera thông minh cùng một diện mạo trẻ trung phù hợp cho mọi đối tượng người dùng. <br> Xử lý mượt mà nhờ chipset đến từ Qualcomm: Để máy vận hành một cách ổn định hơn Samsung trang bị cho Galaxy A23 con chip quốc dân dành cho thị trường di động tầm trung hiện nay (04/2022) mang tên Snapdragon 680 8 nhân với hiệu suất tối đa đạt được là 2.4 GHz. Đánh giá sức mạnh của thiết bị qua hai ứng dụng thường được mọi người dùng để so sánh hiệu năng với kết quả đạt được như sau: 283 (đơn nhân), 1515 (đa nhân) trên Benchmark và 6830 cho ứng dụng PCMark. Máy trang bị 4 GB RAM cùng 128 GB bộ nhớ trong mang đến khả năng đa nhiệm một cách mượt mà cùng không gian lưu trữ đáp ứng vừa đủ cho người dùng cơ bản để tải xuống một lượng ứng dụng và hình ảnh khá lớn.<br>Chụp ảnh sắc nét với cụm camera thông minh: Máy sở hữu 4 camera với camera chính có độ phân giải lên đến 50 MP, camera góc siêu rộng 5 MP, cảm biến xóa phông và macro có cùng độ phân giải 2 MP, kèm với đó là nhiều tính năng chụp ảnh mới lạ giúp mình thỏa sức khám phá. Khá ấn tượng về kết quả thu lại trên bức hình mà mình có chụp từ điện thoại khi đang di chuyển ngoài đường, màu sắc ảnh có độ tương phản cao, các chi tiết nhỏ đều được máy thu lại rõ nét, ảnh không quá “bể” khi zoom hay hậu kỳ - chỉnh sửa. <br>Qua những trải nghiệm trên thì mình thấy Samsung Galaxy A23 đáp ứng tốt khả năng xử lý tốt các nhu cầu sử dụng cơ bản hàng ngày, thiết kế bắt mắt cùng thời lượng sử dụng lâu dài, thực sự là một lựa chọn đáng quan tâm trong phân khúc điện thoại tầm trung.', '<tr><td> Màn hình</td><td>PLS TFT LCD6.6\"Full HD+</td></tr><tr><td>Hệ điều hành:</td><td>Android 11</td></tr><tr><td>Camera sau:</td><td>Chính 64 MP & Phụ 8 MP, 5 MP, 5 MP</td></tr><tr><td>Camera trước:</td><td>20MP</td></tr><tr><td>Chip:</td><td>Snapdragon 680</td></tr><tr><td> RAM:</td><td>4 GB </td></tr><tr><td>Dung lượng lưu trữ:</td><td>256GB </td></tr><tr><td>SIM:</td><td>1 Nano SIM & 1 eSIMHỗ trợ 5G</td></tr><tr><td>Pin</td><td>4400 mAh25 W</td></tr>'),
(2000000012, 1003, 'xiaomi 12T', '12.490.000', '9.490.000', 100, 'xiaomi-12t-thumb.jpg', 'Xiaomi 12T series đã ra mắt trong sự kiện của Xiaomi vào ngày 4/10, trong đó có Xiaomi 12T 5G 128GB - máy sở hữu nhiều công nghệ hàng đầu trong giới smartphone tiêu biểu như: Chipset mạnh mẽ đến từ MediaTek, camera 108 MP sắc nét cùng khả năng sạc 120 W siêu nhanh. <br>Ấn tượng với diện mạo sang trọng: Xiaomi 12T có thiết kế khá tương đồng với thế hệ tiền nhiệm, mặt lưng được làm bo cong ở hai cạnh kèm theo một dòng chữ “Xiaomi” bố trí ở góc dưới phần thân máy. Một thay đổi rõ rệt để người dùng có thể nhận biết được chiếc Xiaomi 12T nằm ở phần cụm camera, ống kính chính sẽ không được làm hình tròn như trên phiên bản Xiaomi 12 mà giờ đây hãng đã thiết kế nó dưới dạng một ô vuông trông khá là cứng cáp. <br>Đáp ứng tốt mọi nhu cầu giải trí nhờ màn hình chất lượng: Về phần màn hình thì có thể Xiaomi 12T sẽ được trang bị một tấm nền AMOLED có kích thước 6.67 inch và độ phân giải nằm ở mức 1220 x 2712 Pixels. Là một chiếc điện thoại flagship nên việc trang bị một màn hình có tần số quét 120 Hz là điều hiển nhiên trên chiếc Xiaomi 12T. <br>Hiệu năng cực khủng đến từ chipset nhà MediaTek: Lần ra mắt sản phẩm sắp tới đây của nhà Xiaomi không chỉ giới thiệu đến cho người dùng một siêu phẩm smartphone, mà đây cũng là một dịp để ta có thể chiêm ngưỡng được sức mạnh cực khủng trên con chip Dimensity 8100 Ultra mới nhất đến từ nhà MediaTek. <br> Là một người dùng đam mê công nghệ hay đang mong muốn tìm mua cho mình một chiếc điện thoại ưng ý để phục vụ tốt cho mọi tác vụ, Xiaomi 12T cũng như Xiaomi 12T Pro chắc hẳn là cái tên mà bạn không nên bỏ qua. \n', '<tr><td> Màn hình</td><td>AMOLED6.67\"1.5K</td></tr><tr><td>Hệ điều hành:</td><td>Android 12</td></tr><tr><td>Camera sau:</td><td>Chính 108 MP & Phụ 8 MP, 2 MP</td></tr><tr><td>Camera trước:</td><td>16MP</td></tr><tr><td>Chip:</td><td>MediaTek Dimensity 8100 Ultra 8 nhân</td></tr><tr><td> RAM:</td><td>4 GB </td></tr><tr><td>Dung lượng lưu trữ:</td><td>256GB </td></tr><tr><td>SIM:</td><td>2 Nano SIM (SIM 2 chung khe thẻ nhớ)Hỗ trợ 5G</td></tr><tr><td>Pin</td><td>5000 mAh25 W</td></tr>'),
(2000000013, 1003, 'xiaomi 13 series', '13.990.000', '8.490.000', 100, 'xiaomi-13-thumb-den.jpg', 'Thông tin ra mắt về Xiaomi 13 hiện đang là chủ đề cực kỳ hot trên các diễn đàn bởi lần ra mắt này Xiaomi mang đến cho chúng ta khá nhiều điều mới mẻ, từ con chip Snapdragon 8 Gen 2 cho đến camera hợp tác với hãng Leica cũng đủ để thu hút các Mi fan hay tín đồ đam mê công nghệ. <br> Thiết kế với thân hình sang trọng: Năm nay, nhà Xiaomi khoác lên mình sản phẩm mới với một vẻ ngoài hoàn toàn khác so với thế hệ cũ, từ màu sắc cho đến cách bố trí cụm camera trên Xiaomi 13 đều thể hiện lên một điểm độc lạ chưa từng có.Sử dụng kiểu dáng vuông vức cùng tone màu hiện đại, cả hai điều này đem đến cho chiếc máy một cái nhìn cực kỳ sang trọng và hợp thời, đây không đơn thuần là một chiếc điện thoại thông thường mà người dùng cũng có thể sử dụng như một món phụ kiện thời trang cao cấp mỗi khi cầm nắm trên tay. <br>Sở hữu con chip mạnh mẽ từ nhà Qualcomm: Xiaomi 13 sẽ được tích hợp con chip hàng đầu giới điện thoại Android hiện tại và cái tên được nhắc đến ở đây chính là mẫu chip Snapdragon 8 Gen 2 sở hữu cấu hình vượt trội với mức xung nhịp tối đa lên tới 3.2 GHz và được sản xuất trên tiến trình 4 nm hiện đại. <br>Với những ai là người hâm mộ của nhà Xiaomi hay hãng máy ảnh Leica thì Xiaomi 13 chắc hẳn là cái tên không thể bỏ qua ở thời điểm hiện tại, đây rất có thể là mẫu điện thoại đột phá trong năm 2023 ở mọi nhu cầu sử dụng từ chơi game cho đến chụp ảnh chuyên nghiệp.\n\n', '<tr><td> Màn hình</td><td>AMOLED6.36\"Full HD+</td></tr><tr><td>Hệ điều hành:</td><td>Android 13</td></tr><tr><td>Camera sau:</td><td>Chính 50 MP & Phụ 12 MP, 10 MP</td></tr><tr><td>Camera trước:</td><td>16MP</td></tr><tr><td>Chip:</td><td>Snapdragon 8 Gen 2 8 nhân</td></tr><tr><td> RAM:</td><td>4 GB </td></tr><tr><td>Dung lượng lưu trữ:</td><td>256GB </td></tr><tr><td>SIM:</td><td>2 Nano SIM (SIM 2 chung khe thẻ nhớ)Hỗ trợ 5G</td></tr><tr><td>Pin</td><td>4500 mAh67 W</td></tr>\n'),
(2000000014, 1003, 'xiaomi poco c40 5g', '20.490.000', '10.490.000', 100, 'xiaomi-poco-c40-thumb-vang.jpg', 'Tháng 06/2022 điện thoại POCO C40 đã chính thức được cho ra mắt tại thị trường Việt Nam, sở hữu màn hình kích thước lớn, viên pin dung lượng khủng và một con chip JR510 mới lạ trên thị trường công nghệ hiện nay.<br>Pin khỏe, vui lâu: Cung cấp năng lượng cho C40 là viên pin khủng với dung lượng 6000 mAh. Mình khá bất ngờ với thời gian sử dụng liên tục của điện thoại khi đạt đến hơn 10 tiếng* cho các tác vụ cơ bản như chơi game, xem phim, mạng xã hội. Đây quả thật là một chiếc điện thoại pin khủng để cho bạn thời gian trải nghiệm gần như 1 ngày với mọi tác vụ. Máy có công suất sạc tối đa 18 W nhưng trong hộp chỉ trang bị củ 10 W nên mình mất gần 3 giờ đồng hồ để sạc đầy sản phẩm. Nếu bạn có củ 18 W thì thời gian sẽ rút ngắn hơn, mình đã thử sạc lúc điện thoại còn 42% thì sau một tiếng sạc đã lên 72%.<br> Nâng tầm trải nghiệm màn ảnh: Một mẫu điện thoại có màn hình lớn sẽ đem đến cho bạn một không gian hiển thị rộng rãi hơn, hạn chế tình trạng mỏi mắt khi sử dụng thời gian dài, nắm bắt những lợi ích trên, hãng đã trang bị cho POCO C40 màn hình có kích thước 6.71 inch, kèm với tấm nền IPS LCD và độ phân giải HD+ (720 x 1650 Pixels). <br>POCO C40 - một sản phẩm có thiết kế cũng như màu sắc bắt mắt, màn hình được đầu tư để mang lại trải nghiệm rộng rãi, hiệu năng có thể cùng bạn xử lý các tác vụ cơ bản cùng một thông số pin ấn tượng. POCO C40 hứa hẹn sẽ khuynh đảo phân khúc tầm điện thoại giá rẻ trong thời gian tới.\n', '<tr><td> Màn hình</td><td>IPS LCD6.71\"HD+</td></tr><tr><td>Hệ điều hành:</td><td>Android 11</td></tr><tr><td>Camera sau:</td><td>Chính 13 MP & Phụ 2 MP</td></tr><tr><td>Camera trước:</td><td>16MP</td></tr><tr><td>Chip:</td><td>JLQ JR510</td></tr><tr><td> RAM:</td><td>4 GB </td></tr><tr><td>Dung lượng lưu trữ:</td><td>64 GB</td></tr><tr><td>SIM:</td><td>2 Nano SIM (SIM 2 chung khe thẻ nhớ)Hỗ trợ 5G</td></tr><tr><td>Pin</td><td>6000 mAh18 W</td></tr>'),
(2000000015, 1003, 'xiaomi redmi 10a 5g', '25.490.000', '15.990.000', 100, 'xiaomi-redmi-10a-thumb.jpg', 'Xiaomi Redmi 10A ra mắt tại thị trường Việt Nam vào tháng 07/2022, với ưu điểm là sở hữu pin trâu cùng một màn hình kích thước lớn giúp máy trở thành một smartphone lý tưởng cho những bạn đang tìm mua một thiết bị phục vụ nghe gọi hay xem phim cả ngày. Cùng với đó là giá thành phải chăng để người dùng có thể dễ dàng tiếp cận và mua sắm.<br>Kiểu dáng thiết kế trẻ trung: Là một chiếc điện thoại giá rẻ nhưng dường như hãng điện thoại Xiaomi vẫn dành sự chăm chút rất nhiều trên sản phẩm của mình, điều này được minh chứng qua vẻ ngoài có độ hoàn thiện cực tốt trên chiếc Redmi 10A. <br>Thoải mái sử dụng cả ngày dài: Viên pin được trang bị bên trong Redmi 10A có dung lượng lên đến 5000 mAh, qua một thời gian sử dụng thì mình thấy máy tụt pin rất chậm. Ở trạng thái đầy 100% thì máy đem đến cho mình một thời lượng dùng lên đến 8 giờ 38 phút* với các tác vụ như: Nhắn tin, xem phim, nghe nhạc hay chơi game.<br>Hiệu năng ổn định nhờ chipset đến từ MediaTek: Cấu hình của điện thoại chắc hẳn là điều được khá nhiều bạn quan tâm, bởi sau nhiều giờ làm việc hay liên lạc thì cũng cũng cần có một khoảng thời gian giải trí như chơi game chẳng hạn. Vì thế nên mình cũng đã chơi qua một vài tựa game nhằm kiểm chứng sức mạnh của con chip MediaTek Helio G25 có thể mang đến trải nghiệm ra sao. <br>Chụp ảnh tốt hơn với bộ đôi camera: Tuy là sản phẩm giá rẻ nhưng Xiaomi vẫn đầu tư cho chiếc điện thoại Redmi này bộ camera kép với camera chính có độ phân giải 13 MP và cảm biến phụ 2 MP. Với thông số như vậy thì máy hoàn toàn có thể đem đến cho mình những bức ảnh rất ổn áp. <br>Redmi 10A được xem là một trong những chiếc smartphone chính hãng có giá thành tốt nhất thị trường hiện nay, sở hữu trong máy là một viên pin có dung lượng 5000 mAh cùng kích thước màn hình lớn giúp bạn trải nghiệm tốt hơn trên các tác vụ xem phim hay chơi game lâu dài.', '<tr><td> Màn hình</td><td>IPS LCD6.53\"HD+</td></tr><tr><td>Hệ điều hành:</td><td>Android 11</td></tr><tr><td>Camera sau:</td><td>Chính 13 MP & Phụ 2 MP</td></tr><tr><td>Camera trước:</td><td>16MP</td></tr><tr><td>Chip:</td><td>MediaTek Helio G25</td></tr><tr><td> RAM:</td><td>2 GB </td></tr><tr><td>Dung lượng lưu trữ:</td><td>32 GB</td></tr><tr><td>SIM:</td><td>2 Nano SIM, Hỗ trợ 4G</td></tr><tr><td>Pin</td><td>5000 mAh10 W</td></tr>'),
(2000000016, 1003, 'xiaomi redmi a1', '30.490.000', '14.390.000', 100, 'xiaomi-Redmi-A1-thumb-xanh-duong.jpg', 'Mới đây chiếc điện thoại Xiaomi Redmi A1 cũng đã được nhà Xiaomi chính thức cho ra mắt cùng một mức giá bán khá ấn tượng, phù hợp với những bạn học sinh - sinh viên đang mong muốn chọn mua cho mình một thiết bị có giá thành vừa phải nhằm đáp ứng nhu cầu học tập cũng như tra cứu thông tin nhẹ nhàng.<br>Thiết kế trẻ trung: Sở hữu thiết kế giả da sang trọng mang đến cho thiết bị một diện mạo cuốn hút thời trang, đi kèm với đó sẽ là những màu sắc vô cùng cá tính và trẻ trung.Các phím nguồn hay tăng/giảm âm lượng cũng đã được bố trí hết sang một bên để người dùng có thể thuận tiện hơn trong việc thao tác. Phía cạnh dưới điện thoại sẽ là jack tai nghe 3.5 mm đi cùng với cổng sạc Micro USB và micro thoại. <br>Tích hợp bộ đôi camera: Tuy là một thiết bị có mức giá bán không quá cao nhưng hãng điện thoại Xiaomi lại rất là hào phóng khi bổ sung tận hai ống kính, trong đó camera chính có độ phân giải 8 MP. Không chỉ đem đến những bức ảnh có chất lượng tốt hơn mà Redmi A1 cũng sẽ mang lại cho người dùng nhiều tính năng chụp ảnh để bạn có thể thỏa sức nhiếp ảnh trên chiếc điện thoại của mình. <br>Hiệu năng ổn định: Lần này Xiaomi trang bị cho máy bộ vi xử lý Helio A22 được sản xuất bởi MediaTek, đảm bảo thiết bị của bạn có thể vận hành ổn định khi sử dụng cho các tác vụ liên lạc, lướt web hay xem phim.<br>Xiaomi Redmi A1 không chỉ sở hữu thiết kế đẹp, một màn hình lớn mà đây còn là thiết bị có viên pin khủng với thời lượng dùng dài lâu, với mức giá bán cực kỳ ưu đãi nên đây chắc hẳn là sản phẩm mà những bạn đang là học sinh - sinh viên không nên bỏ qua khi có cho mình hầu bao không quá lớn.', '<tr><td> Màn hình</td><td>PS LCD6.52\"HD+</td></tr><tr><td>Hệ điều hành:</td><td>Android 12 (Go Edition)</td></tr><tr><td>Camera sau:</td><td>Chính 8 MP & Phụ QVGA</td></tr><tr><td>Camera trước:</td><td>16MP</td></tr><tr><td>Chip:</td><td>MediaTek MT6761 (Helio A22)</td></tr><tr><td> RAM:</td><td>4 GB </td></tr><tr><td>Dung lượng lưu trữ:</td><td>64GB</td></tr><tr><td>SIM:</td><td>2 Nano SIMHỗ trợ 4G</td></tr><tr><td>Pin</td><td>5000 mAh10 W</td></tr>'),
(2000000017, 1003, 'xiaomi redmi a1 5g', '10.550.000', '9.999.000', 100, 'xiaomi-Redmi-A1.jpg', 'Mới đây chiếc điện thoại Xiaomi Redmi A1 Pro cũng đã được nhà Xiaomi chính thức cho ra mắt cùng một mức giá bán khá ấn tượng, phù hợp với những bạn học sinh - sinh viên đang mong muốn chọn mua cho mình một thiết bị có giá thành vừa phải nhằm đáp ứng nhu cầu học tập cũng như tra cứu thông tin nhẹ nhàng.<br>Thiết kế trẻ trung: Sở hữu thiết kế giả da sang trọng mang đến cho thiết bị một diện mạo cuốn hút thời trang, đi kèm với đó sẽ là những màu sắc vô cùng cá tính và trẻ trung.Các phím nguồn hay tăng/giảm âm lượng cũng đã được bố trí hết sang một bên để người dùng có thể thuận tiện hơn trong việc thao tác. Phía cạnh dưới điện thoại sẽ là jack tai nghe 3.5 mm đi cùng với cổng sạc Micro USB và micro thoại. <br>Tích hợp bộ đôi camera: Tuy là một thiết bị có mức giá bán không quá cao nhưng hãng điện thoại Xiaomi lại rất là hào phóng khi bổ sung tận hai ống kính, trong đó camera chính có độ phân giải 8 MP. Không chỉ đem đến những bức ảnh có chất lượng tốt hơn mà Redmi A1 cũng sẽ mang lại cho người dùng nhiều tính năng chụp ảnh để bạn có thể thỏa sức nhiếp ảnh trên chiếc điện thoại của mình. <br>Hiệu năng ổn định: Lần này Xiaomi trang bị cho máy bộ vi xử lý Helio A22 được sản xuất bởi MediaTek, đảm bảo thiết bị của bạn có thể vận hành ổn định khi sử dụng cho các tác vụ liên lạc, lướt web hay xem phim.<br>Xiaomi Redmi A1 Pro không chỉ sở hữu thiết kế đẹp, một màn hình lớn mà đây còn là thiết bị có viên pin khủng với thời lượng dùng dài lâu, với mức giá bán cực kỳ ưu đãi nên đây chắc hẳn là sản phẩm mà những bạn đang là học sinh - sinh viên không nên bỏ qua khi có cho mình hầu bao không quá lớn.', '<tr><td> Màn hình</td><td>PS LCD6.52\"HD+</td></tr><tr><td>Hệ điều hành:</td><td>Android 12 (Go Edition)</td></tr><tr><td>Camera sau:</td><td>Chính 8 MP & Phụ QVGA</td></tr><tr><td>Camera trước:</td><td>16MP</td></tr><tr><td>Chip:</td><td>MediaTek MT6761 (Helio A22)</td></tr><tr><td> RAM:</td><td>4 GB </td></tr><tr><td>Dung lượng lưu trữ:</td><td>64GB</td></tr><tr><td>SIM:</td><td>2 Nano SIMHỗ trợ 5G</td></tr><tr><td>Pin</td><td>5000 mAh10 W</td></tr>'),
(2000000018, 1003, 'xiaomi redmi note 11 pro 5g', '12.490.000', '9.490.000', 100, 'xiaomi-redmi-note-11-pro-trang-thumb.jpg', 'Điện thoại Xiaomi Redmi Note 11 Pro 5G hội tụ đủ những yếu tố ấn tượng của một chiếc smartphone tầm trung: Camera 108 MP số 1 phân khúc, màn hình AMOLED 120 Hz, pin 5000 mAh, sạc nhanh 67 W, hỗ trợ 5G cùng con chip Snapdragon 695 mạnh mẽ.<br>Camera độ phân giải cao: Redmi Note 11 Pro 5G có camera chính 108 MP, camera góc siêu rộng 8 MP và một camera macro 2 MP, máy chỉ có 3 camera và không có camera xóa phông như Redmi Note 11 Pro 4G. Chế độ chụp đêm vẫn tái hiện được màu sắc cảnh vật, nhìn chung thì ảnh chụp ban đêm có chất lượng tương đối tốt, độ nhiễu ít, tuy nhiên cũng có hiện tượng lóe sáng ở các cột đèn. Tuy không có camera xóa phông nhưng Redmi Note 11 Pro 5G vẫn có thể chụp xóa phông, chất lượng đem lại vẫn rất ổn áp, xóa phông rất mịn và nét, không bị lấn vào chủ thể nhiều. <br>Hiệu năng ổn định, hỗ trợ 5G: Điện thoại Xiaomi sở hữu con chip Snapdragon 695 5G được đánh giá tốt, khi chơi Asphalt 9 chất lượng đồ họa cao FPS ổn định ở mức 30, di chuyển trái phải mượt mà. Liên Quân Mobile chơi max cấu hình FPS ổn định ở mức 60, di chuyển mượt mà, combat ổn định, tung chiêu nhanh, không bị giật lag kể cả khi giao tranh tổng. <br> Với các đặc điểm trên, Xiaomi Redmi Note 11 Pro 5G là một sản phẩm không thể bỏ qua trong phân khúc tầm trung. Cấu hình ổn định, màn hình mượt mà cùng cụm camera chụp tốt, phù hợp hầu hết với mọi đối tượng người dùng.\n', '<tr><td> Màn hình</td><td>AMOLED6.67\"Full HD+</td></tr><tr><td>Hệ điều hành:</td><td>Android 11</td></tr><tr><td>Camera sau:</td><td>Chính 108 MP & Phụ 8 MP, 2 MP</td></tr><tr><td>Camera trước:</td><td>16MP</td></tr><tr><td>Chip:</td><td>Snapdragon 695 5G</td></tr><tr><td> RAM:</td><td>4 GB </td></tr><tr><td>Dung lượng lưu trữ:</td><td>256GB </td></tr><tr><td>SIM:</td><td>2 Nano SIM (SIM 2 chung khe thẻ nhớ)Hỗ trợ 5G</td></tr><tr><td>Pin</td><td>5000 mAh25 W</td></tr>'),
(2000000019, 1003, 'xiaomi redmi note 11s 5g', '12.990.000', '7.990.000', 100, 'xiaomi-redmi-note-11s-xanh-thumb-1.jpg', 'Điện thoại Xiaomi Redmi Note 11S sẵn sàng đem đến cho bạn những trải nghiệm vô cùng hoàn hảo về chơi game, các tác vụ sử dụng hằng ngày hay sự ấn tượng từ vẻ đẹp bên ngoài.<br>Ấn tượng với màn hình AMOLED 6.43 inch: Màn hình của Redmi Note 11S được thiết kế dạng nốt ruồi cho không gian hiển thị rộng lớn với các viền khá mỏng giúp máy trở nên đẹp và thanh thoát hơn. Dù chỉ thuộc phân khúc giá tầm trung nhưng Xiaomi đã trang bị cho Note 11S tấm nền AMOLED mang lại khả năng hiển thị tốt, màu đen sâu hơn, độ tương phản cao và còn nâng cao khả năng hiển thị màu sắc sống động nhờ dải màu rộng DCI-P3. Nên có thể nói dù xem phim trên YouTube hay chơi game thì mình thật sự cảm thấy mãn nhãn với màn hình này. <br> Ảnh chụp đẹp và siêu rõ nét với hệ thống bốn camera AI 108 MP: Ảnh chụp bởi Redmi Note 11S ở điều kiện đủ sáng thu lại chi tiết tốt, màu sắc tươi tắn, độ tương phản cao. Hình ảnh sau khi chụp xong đều được xử lý lại, chụp ngược sáng cũng không bị cháy sáng nhờ tích hợp HDR và AI, đặc biệt là hình ảnh khi chụp ở chế độ chụp đêm cũng rất tuyệt vời, cân bằng được ánh sáng và bù sáng tốt cho các vùng quá tối. <br>Hiệu năng ổn định với MediaTek Helio G96: Điện thoại có RAM 8 GB nên khả năng đa nhiệm rất tốt, mở/tắt ứng dụng và chuyển tab đều mượt mà, ít gặp tình trạng đứng hay giật lag. Với dòng chip Helio G96 thì Note 11S có thể nói chiến game khá tốt trong tầm giá. Một số tựa game như Liên Quân Mobile hay PUBG Mobile có thể bật đồ họa trung bình, thao tác khá êm và mượt, cũng ít thấy tình trạng bị drop khung hình. Một điểm nữa để Note 11S giúp bạn cày game là nhờ hệ thống tản nhiệt đa chiều vô cùng đặc biệt. Công nghệ Liquid Cool bao gồm nhiều lớp than chì và lá đồng, diện tích tản nhiệt 10005 mm2 giúp làm mát nhanh hơn. Vì vậy nên dù đã chiến qua 2 trận PUBG (mỗi trận khoảng 30 phút) khi cầm máy trên tay mình vẫn không bị quá nóng. <br> Nói tóm lại, ở phân khúc giá tầm trung này thì Note 11S là một chiến binh được đánh giá khá cao với tập hợp các ưu điểm như màn hình hiển thị tốt ngay cả khi ngoài trời, hiệu năng ổn định thích hợp để cày game, sạc nhanh hơn, viên pin lớn nằm trong một thân máy vẫn mỏng nhẹ và tinh tế như vậy.', '<tr><td> Màn hình</td><td>AMOLED6.67\"Full HD+</td></tr><tr><td>Hệ điều hành:</td><td>Android 11</td></tr><tr><td>Camera sau:</td><td>Chính 108 MP & Phụ 8 MP, 2 MP</td></tr><tr><td>Camera trước:</td><td>16MP</td></tr><tr><td>Chip:</td><td>Snapdragon 695 5G</td></tr><tr><td> RAM:</td><td>4 GB </td></tr><tr><td>Dung lượng lưu trữ:</td><td>256GB </td></tr><tr><td>SIM:</td><td>2 Nano SIM (SIM 2 chung khe thẻ nhớ)Hỗ trợ 5G</td></tr><tr><td>Pin</td><td>5000 mAh25 W</td></tr>'),
(2000000020, 1003, 'xiaomi redmi note 12', '10.490.000', '9.410.000', 100, 'xiaomi-redmi-note-12-den-thumb.jpg', 'Xiaomi Redmi Note 12 là mẫu điện thoại thuộc dòng Redmi Note được chính thức ra mắt trong năm 2023, máy mang trên mình những cải tiến vượt trội về thiết kế, camera và hiệu năng, đáp ứng mượt mà hầu hết các nhu cầu khác nhau của người dùng. <br>Ngoại hình trẻ trung, màu sắc thời trang: Xiaomi Redmi Note 12 có kiểu dáng tổng thể khá hợp thời và trẻ trung với các phiên bản màu sắc lần lượt là: Xanh, Trắng và Đen. Máy sở hữu mặt lưng bằng chất liệu kính và khung viền vuông vức từ nhựa, hơi bo cong nhẹ hứa hẹn sẽ mang đến trải nghiệm cầm nắm dễ chịu, thoải mái trong quá trình sử dụng. <br>Màn hình rực nét, vuốt chạm mượt mà: Khả năng hiển thị trên Xiaomi Redmi Note 12 dường như đã đạt đến tiêu chuẩn cao nhất của thiết bị tầm trung. Chiếc smartphone sở hữu tấm nền AMOLED lớn lên tới 6.67 inch, đi cùng độ phân giải Full HD+ thể hiện tốt nhiều nội dung giải trí hơn với chất lượng sắc nét, màu sắc chính xác. Màn hình hỗ trợ tần số quét 120 Hz là một trong những điểm ấn tượng của chiếc điện thoại này, giúp các thao tác vuốt chạm trở nên mượt mà và chính xác hơn, đặc biệt là khi chơi game, xem phim hay chỉ lướt web đơn giản. <br> Dùng cả ngày dài, đầy pin nhanh chóng: Không chỉ sở hữu cấu hình mạnh mẽ, Xiaomi Redmi Note 12 còn có viên pin dung lượng khủng 5.000 mAh hỗ trợ sạc nhanh 67 W, bạn chỉ cần 15 phút sạc là đã thoải mái sử dụng điện thoại cho hầu như mọi nhu cầu suốt cả ngày, khi đầy pin hoàn toàn có thể duy trì hoạt động trong 1 đến 2 ngày. Tuy nhiên, thời gian sạc và sử dụng có thể thay đổi tuỳ vào nhu cầu. <br> Xiaomi Redmi Note 12 là một sự lựa chọn khá hoàn hảo nếu bạn đang tìm kiếm một chiếc điện thoại tầm trung có thiết kế đẹp mắt, hiệu năng mạnh mẽ, hệ thống camera chất lượng cùng thời lượng pin lâu dài.', '<tr><td> Màn hình</td><td>AMOLED6.67\"Full HD+</td></tr><tr><td>Hệ điều hành:</td><td>Android 12</td></tr><tr><td>Camera sau:</td><td>Chính 50 MP & Phụ 8 MP, 2 MP</td></tr><tr><td>Camera trước:</td><td>16MP</td></tr><tr><td>Chip:</td><td>MediaTek Dimensity 1080 8 nhân</td></tr><tr><td> RAM:</td><td>4 GB </td></tr><tr><td>Dung lượng lưu trữ:</td><td>256GB </td></tr><tr><td>SIM:</td><td>1 Nano SIM & 1 eSIMHỗ trợ 5G</td></tr><tr><td>Pin</td><td>5000 mAh25 W</td></tr>'),
(2000000021, 1003, 'xiaomi redmi note 12 pro 5g', '20.490.000', '19.999.000', 100, 'xiaomi-redmi-note-12-pro-xanh-thumb.jpg', 'Xiaomi Redmi Note 12 Pro 5G là mẫu điện thoại thuộc dòng Redmi Note được chính thức ra mắt trong năm 2023, máy mang trên mình những cải tiến vượt trội về thiết kế, camera và hiệu năng, đáp ứng mượt mà hầu hết các nhu cầu khác nhau của người dùng. <br>Ngoại hình trẻ trung, màu sắc thời trang: Xiaomi Redmi Note 12 Pro 5G có kiểu dáng tổng thể khá hợp thời và trẻ trung với các phiên bản màu sắc lần lượt là: Xanh, Trắng và Đen. Máy sở hữu mặt lưng bằng chất liệu kính và khung viền vuông vức từ nhựa, hơi bo cong nhẹ hứa hẹn sẽ mang đến trải nghiệm cầm nắm dễ chịu, thoải mái trong quá trình sử dụng. <br>Màn hình rực nét, vuốt chạm mượt mà: Khả năng hiển thị trên Xiaomi Redmi Note 12 Pro 5G dường như đã đạt đến tiêu chuẩn cao nhất của thiết bị tầm trung. Chiếc smartphone sở hữu tấm nền AMOLED lớn lên tới 6.67 inch, đi cùng độ phân giải Full HD+ thể hiện tốt nhiều nội dung giải trí hơn với chất lượng sắc nét, màu sắc chính xác. Màn hình hỗ trợ tần số quét 120 Hz là một trong những điểm ấn tượng của chiếc điện thoại này, giúp các thao tác vuốt chạm trở nên mượt mà và chính xác hơn, đặc biệt là khi chơi game, xem phim hay chỉ lướt web đơn giản. <br> Dùng cả ngày dài, đầy pin nhanh chóng: Không chỉ sở hữu cấu hình mạnh mẽ, Xiaomi Redmi Note 12 Pro 5G còn có viên pin dung lượng khủng 5.000 mAh hỗ trợ sạc nhanh 67 W, bạn chỉ cần 15 phút sạc là đã thoải mái sử dụng điện thoại cho hầu như mọi nhu cầu suốt cả ngày, khi đầy pin hoàn toàn có thể duy trì hoạt động trong 1 đến 2 ngày. Tuy nhiên, thời gian sạc và sử dụng có thể thay đổi tuỳ vào nhu cầu. <br> Xiaomi Redmi Note 12 Pro 5G là một sự lựa chọn khá hoàn hảo nếu bạn đang tìm kiếm một chiếc điện thoại tầm trung có thiết kế đẹp mắt, hiệu năng mạnh mẽ, hệ thống camera chất lượng cùng thời lượng pin lâu dài.', '<tr><td> Màn hình</td><td>AMOLED6.67\"Full HD+</td></tr><tr><td>Hệ điều hành:</td><td>Android 12</td></tr><tr><td>Camera sau:</td><td>Chính 50 MP & Phụ 8 MP, 2 MP</td></tr><tr><td>Camera trước:</td><td>16MP</td></tr><tr><td>Chip:</td><td>MediaTek Dimensity 1080 8 nhân</td></tr><tr><td> RAM:</td><td>4 GB </td></tr><tr><td>Dung lượng lưu trữ:</td><td>256GB </td></tr><tr><td>SIM:</td><td>1 Nano SIM & 1 eSIMHỗ trợ 5G</td></tr><tr><td>Pin</td><td>5000 mAh25 W</td></tr>'),
(2000000022, 1004, 'Cáp Lightning MFI 0.9m Anker Select+ A8012', '360.000', '215.000', 100, 'cap-lightning-mfi-09m-anker-a8012-thumb.jpg', 'Thiết kế đơn giản cùng với chất liệu nylon kép cho độ bền cao: Cáp Lightning MFI 0.9m Anker A8012 thiết kế nhỏ gọn với độ dài 0.9 m dễ dàng kết nối với các thiết bị ở gần mà không bị vướng víu bởi độ dài của dây. Đặc biệt, cáp sạc sử dụng vỏ nylon kép giúp gia tăng độ bền và thời gian sử dụng lâu.<br>Cổng kết nối USB thông dụng: Cáp sạc phù hợp với nhiều thiết bị như laptop, adapter sạc, pin sạc dự phòng có cổng USB. <br>Tốc độ truyền dữ liệu ổn định: Ngoài việc sử dụng cáp sạc để cung cấp năng lượng cho các thiết bị thì sản phẩm còn dùng để truyền dữ liệu giữa máy tính và điện thoại hay máy tính và tablet với đường truyền ổn định và nhanh chóng.<br>Cáp Lightning MFI 0.9m Anker A8012 với thiết kế nhỏ gọn, độ bền cao cùng tốc độ sạc nhanh và khả năng truyền dữ liệu ổn định thì đây chính là sản phẩm lý tưởng cho khách hàng đang sở hữu các sản phẩm của Apple.', '<tr><td>Chức năng:</td><td>Truyền dữ liệu, Sạc</td></tr><tr><td>Jack kết nối:</td><td>iPhone (Lightning)</td></tr><tr><td>Đầu vào:</td><td>USB Type-A</td></tr><tr><td>Đầu ra:</td><td>Lightning: 5V - 3A</td></tr><tr><td>Công suất tối đa:</td><td>15 W</td></tr><tr><td>Độ dài dây:</td><td>0.9 m</td></tr><tr><td>Sản xuất tại:</td><td>Việt Nam</td></tr><tr><td>Hãng</td><td>ANKER</td></tr>'),
(2000000023, 1004, 'Cáp Micro USB 0.2m AVA Speed II', '35.000', '10.000', 200, 'cap-micro-20cm-ava-speed-ii-thumb.jpg', 'Cáp Micro 0.2 m AVA Speed II với thiết kế nhỏ gọn cùng màu sắc trang nhã, dây cáp chỉ dài 0.2 m tiện mang theo bất cứ đâu, không lo bị rối. Với chất liệu nhựa mềm dẻo bạn không cần lo bị gãy hay hư hỏng khi gập dây.<br>Sử dụng cổng đầu vào USB phổ biến, tương thích với nhiều loại thiết bị như adapter sạc, laptop, sạc dự phòng,...<br>Cáp sạc phù hợp với nhiều thiết bị điện thoại, tablet, sạc dự phòng sử dụng cổng micro USB. Với dòng sạc tối đa là 2A giúp cho thiết bị của bạn được sạc nhanh chóng, tiết kiệm được thời gian.<br>Ngoài việc dùng để sạc các thiết bị, dây cáp còn dùng để truyền dữ liệu, sao chép dữ liệu như phim, hình ảnh, tài liệu,... một cách dễ dàng giữa điện thoại với máy tính hay tablet với máy tính,...<br>Cáp Micro 0.2 m AVA Speed II với thiết kế nhỏ gọn cùng khả năng sạc tốt và truyền dữ liệu ổn định thì đây chính là sản phẩm phù hợp cho bạn khi đang sở hữu cho mình những thiết bị có cổng micro USB với mức giá của sản phẩm vô cùng hợp lý.', '<tr><td>Chức năng:</td><td>Truyền dữ liệu, Sạc</td></tr><tr><td>Jack kết nối:</td><td>Micro USB</td></tr><tr><td>Đầu vào:</td><td>USB Type-A</td></tr><tr><td>Đầu ra:</td><td>Micro USB: 5V - 2A</td></tr><tr><td>Công suất tối đa:</td><td>10 W</td></tr><tr><td>Độ dài dây:</td><td>0.2 m</td></tr><tr><td>Sản xuất tại:</td><td>Trung Quốc</td></tr><tr><td>Hãng</td><td>AVA</td></tr>'),
(2000000024, 1004, 'Cáp Type C 0.2m Xmobile TC200B', '100.000', '90.000', 300, 'cap-type-c-20cm-xmobile-tc200b-avatar1.jpg', 'Kiểu dáng đơn giản, dây dài 0.2 m: Kết cấu gọn gàng, chất liệu dây mềm mại, kháng vỡ, uốn cong dễ dàng, có thể cuộn lại và cho vào túi xách, balo để mang đi làm, đi học, du lịch mà không lo chiếm nhiều diện tích.<br>Công suất sạc mạnh mẽ 15 W: Tích hợp dòng sạc lớn, Xmobile TC200B sạc đầy pin điện thoại nhanh chóng, đảm bảo bất cứ khi nào cần sử dụng, điện thoại luôn sẵn sàng để bạn chơi game, xem phim trực tuyến, duyệt web,...<br>Chép dữ liệu mượt mà: Cáp sạc Xmobile cho khả năng truyền tải tài liệu, hình ảnh, video số lượng lớn với đường truyền ổn định giữa điện thoại, máy tính bảng với laptop, PC.<br>Có đầu ra Type-C 5V - 3A: Hỗ trợ jack kết nối phổ biến, cho phép phối ghép cáp sạc với các điện thoại Samsung, Huawei, LG, Xiaomi và các thiết bị có cổng Type-C tương thích khác để sạc và truyền dữ liệu dễ dàng.<br>Có thể thấy rằng với thiết kế hiện đại, chiều dài 0.2 m, công suất sạc tới 15 W, đầu cắm quen thuộc, độ tương thích cao với nhiều thiết bị, giá rẻ, cáp Type C 0.2 m Xmobile TC200B là phụ kiện cần thiết cho dân văn phòng, học sinh, sinh viên. ', '<tr><td>Chức năng:</td><td>Truyền dữ liệu, Sạc</td></tr><tr><td>Jack kết nối:</td><td>Type-C</td></tr><tr><td>Đầu vào:</td><td>USB Type-A</td></tr><tr><td>Đầu ra:</td><td>Type C: 5V - 3A</td></tr><tr><td>Công suất tối đa:</td><td>15 W</td></tr><tr><td>Độ dài dây:</td><td>0.2 m</td></tr><tr><td>Sản xuất tại:</td><td>Trung Quốc</td></tr><tr><td>Hãng</td><td>Xmobile</td></tr>');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `chitiethd`
--
ALTER TABLE `chitiethd`
  ADD PRIMARY KEY (`id_hd`,`id_sp`),
  ADD KEY `id_sp` (`id_sp`),
  ADD KEY `id_hd` (`id_hd`);

--
-- Chỉ mục cho bảng `danhmucsp`
--
ALTER TABLE `danhmucsp`
  ADD PRIMARY KEY (`id_dmsp`);

--
-- Chỉ mục cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `id_sp` (`id_sp`),
  ADD KEY `id_kh` (`id_kh`);

--
-- Chỉ mục cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD PRIMARY KEY (`id_hd`),
  ADD KEY `id_kh` (`id_kh`);

--
-- Chỉ mục cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  ADD PRIMARY KEY (`id_kh`);

--
-- Chỉ mục cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD PRIMARY KEY (`id_sp`),
  ADD KEY `id_dmsp` (`id_dmsp`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `danhmucsp`
--
ALTER TABLE `danhmucsp`
  MODIFY `id_dmsp` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1005;

--
-- AUTO_INCREMENT cho bảng `giohang`
--
ALTER TABLE `giohang`
  MODIFY `id_cart` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  MODIFY `id_hd` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100000002;

--
-- AUTO_INCREMENT cho bảng `khach_hang`
--
ALTER TABLE `khach_hang`
  MODIFY `id_kh` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100000044;

--
-- AUTO_INCREMENT cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  MODIFY `id_sp` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2000000025;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `chitiethd`
--
ALTER TABLE `chitiethd`
  ADD CONSTRAINT `chitiethd_ibfk_1` FOREIGN KEY (`id_hd`) REFERENCES `hoadon` (`id_hd`),
  ADD CONSTRAINT `chitiethd_ibfk_2` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`);

--
-- Các ràng buộc cho bảng `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`id_kh`) REFERENCES `khach_hang` (`id_kh`),
  ADD CONSTRAINT `giohang_ibfk_2` FOREIGN KEY (`id_sp`) REFERENCES `sanpham` (`id_sp`);

--
-- Các ràng buộc cho bảng `hoadon`
--
ALTER TABLE `hoadon`
  ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`id_kh`) REFERENCES `khach_hang` (`id_kh`);

--
-- Các ràng buộc cho bảng `sanpham`
--
ALTER TABLE `sanpham`
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`id_dmsp`) REFERENCES `danhmucsp` (`id_dmsp`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
