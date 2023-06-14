<?php
// Kết nối đến cơ sở dữ liệu MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "lesson6";

// Tạo kết nối
$dbh = mysqli_connect($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if (!$dbh)     
die("Unable to connect to MySQL: " . mysqli_error()); 
// Nếu kết nối thất bại thì đưa ra thông báo lỗi 

if (!mysqli_select_db($dbh, $dbname))     
die("Unable to select database: " . mysqli_error()); 
// Thông báo lỗi nếu chọn CSDL thất bại

// Create table
$sql_stmt  = "CREATE TABLE IF NOT EXISTS `sinhvien` (
    `MaSV` varchar(10) NOT NULL,
  `HoTen` varchar(50) NOT NULL,
  `NgaySinh` datetime NOT NULL,
  `LopHoc` varchar(10) NOT NULL,
  `DTB` float NOT NULL,
  PRIMARY KEY (`MaSV`)
)";
$result = mysqli_query($dbh, $sql_stmt); // Thực thi câu lệnh SQL

if (!$result) {
    die("Create failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "Create success";
}

// Insert 
$sql_stmt = "INSERT INTO `sinhvien`(`MaSV`, `HoTen`, `NgaySinh`, `LopHoc`, `DTB`)"; 
$sql_stmt .= "VALUES('SV001','Nguyen Van A', '2002-01-01', 'K60', '8.6'),
                    ('SV002','Tran Thi B', '2002-02-02', 'K60', '7.5'),
                    ('SV003','Le Van C', '2002-03-03', 'K61', '9.0'),
                    ('SV004','Pham Thi D', '2002-04-04', 'K61', '6.5'),
                    ('SV005','Bui Van E', '2002-05-05', 'K62', '8.0')"; 

$result = mysqli_query($dbh, $sql_stmt); // Thực thi câu lệnh SQL

if (!$result) {
    die("Add failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "Add success";
};

//Update 
$sql_stmt = "UPDATE `sinhvien` SET `DTB` = '8.5'";
$sql_stmt .= "WHERE `MaSV` = 'SV001'";

$result = mysqli_query($dbh, $sql_stmt); // Thực thi câu lệnh SQL

if (!$result) {
    die("Update failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "Update success";
};

//Delete 
$sql_stmt = "DELETE FROM `sinhvien` WHERE `MaSV` = 'SV003'"; 
// Câu lệnh SQL Delete

$result = mysqli_query($dbh, $sql_stmt); // Thực thi câu lệnh SQL

if (!$result) {
    die("Delete failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "Delete success";
};

//Select
$sql_stmt = "SELECT * FROM sinhvien";
//Câu lệnh select
$result = mysqli_query($dbh, $sql_stmt); // Thực thi câu lệnh SQL
    
if (!$result) 
    die("Select failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại

    $rows = mysqli_num_rows($result); 
    //Lấy số hàng trả về
if($rows){
    while($row =mysqli_fetch_array($result)) { 
        echo 'MaSV: ' .$row['MaSV'] . '<br>';
        echo 'Hoten: ' .$row['HoTen'] . '<br>';
        echo 'NgaySinh: ' .$row['NgaySinh'] . '<br>';
        echo 'Lophoc: ' .$row['LopHoc'] . '<br>';
        echo 'DTB: ' .$row['DTB'] . '<br>';
    } 
}


?>