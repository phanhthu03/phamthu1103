<?php
$db_server ="localhost";
$db_username = "root";
$db_password ="";
$db_name ="lesson6";

// Tạo kết nối
$dbh = mysqli_connect($db_server, $db_username, $db_password, $db_name);

// Kiểm tra kết nối
if (!$dbh)     
die("Unable to connect to MySQL: " . mysqli_error()); 
// Thông báo lỗi nếu kết nối thất bại 

if (!mysqli_select_db($dbh, '$db_name'))     
die("Unable to select database: " . mysqli_error()); 
// Thông báo lỗi nếu chọn CSDL thất bại

// Create table
$sql_stmt  = "CREATE TABLE IF NOT EXISTS `lsgiaodich` (
        `Id` int NOT NULL AUTO_INCREMENT,
      `Ngay_giao_dich` datetime NOT NULL,
      `Loai_giao_dich` varchar(50) NOT NULL,
      `So_tien` char(20) NOT NULL,
      `Mo_ta` varchar(100) NOT NULL,
      PRIMARY KEY (`Id`)
    )";
    
$result = mysqli_query($dbh, $sql_stmt); // Thực thi câu lệnh SQL

if (!$result) {
    die("Create failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "Create success";
};

// Insert 
$sql_stmt = "INSERT INTO `lsgiaodich`(`Ngay_giao_dich`, `Loai_giao_dich`, `So_tien`, `Mo_ta`)"; 
$sql_stmt .= "VALUES('2023-07-05','Rut tien', '500','Rut tien ATM'),
                    ('2023-07-06','Rut tien', '2300','Rut tien ATM'),
                    ('2023-08-07','Rut tien', '8000','Rut tien ATM'),
                    ('2023-09-02','Vay tien', '1000','Vay tien ATM'),
                    ('2023-09-09','Vay tien', '3800','Vay tien ATM')"; 

$result = mysqli_query($dbh, $sql_stmt); // Thực thi câu lệnh SQL

if (!$result) {
    die("Adding record failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "History transaction has been successfully added in your data";
};

//Update 
$sql_stmt = "UPDATE `lsgiaodich` SET `So_tien` = '1000'";
$sql_stmt .= "WHERE `Id` = '3'";

$result = mysqli_query($dbh, $sql_stmt); // Thực thi câu lệnh SQL

if (!$result) {
    die("Update failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "History transaction has been successfully updated in your data";
};

//Delete 
$sql_stmt = "DELETE FROM `lsgiaodich` WHERE `Id` = '5'"; 
// Câu lệnh SQL Delete

$result = mysqli_query($dbh, $sql_stmt); // Thực thi câu lệnh SQL

if (!$result) {
    die("Deleting record failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "History transaction has been successfully deleted in your data";
};
?>