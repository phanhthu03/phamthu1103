<?php
$db_type ='mysql';
$db_host ="localhost";
$user_name = "root";
$user_password ="";
$db_name ="lesson6";

//connect
$conn = new PDO("$db_type:host=$db_host;dbname=$db_name",$user_name,$user_password);
if ($conn) {
   echo "Connected to the $db_host successfully!";
}

// Create table
$stsm = $conn->prepare('CREATE TABLE IF NOT EXISTS `sinhvien` (
    `MaSV` varchar(10) NOT NULL,
  `HoTen` varchar(50) NOT NULL,
  `NgaySinh` datetime NOT NULL,
  `LopHoc` varchar(10) NOT NULL,
  `DTB` float NOT NULL,
  PRIMARY KEY (`MaSV`)
)');
$result=$stsm-> execute();
if (!$result) {
    die("Create failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "Create success";
};

// Insert 
$stsm = $conn->prepare('INSERT INTO `sinhvien`(`MaSV`, `HoTen`, `NgaySinh`, `LopHoc`, `DTB`) 
VALUE (?, ?, ?, ?, ?)');
$data = array('SV001','Nguyen Van A', '2002-01-01', 'K60', '8.6');
$data2 = array('SV002','Tran Thi B', '2002-02-02', 'K60', '7.5');
$data3 = array('SV003','Le Van C', '2002-03-03', 'K61', '9.0');
$data4 = array('SV004','Pham Thi D', '2002-04-04', 'K61', '6.5');
$data5 = array('SV005','Bui Van D', '2002-05-05', 'K62', '8.0');

$result=$stsm-> execute($data);
if (!$result) {
    die("Add failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "Add success";
}
$result2=$stsm-> execute($data2);
if (!$result2) {
    die("Add failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "Add success";
}
$result3=$stsm-> execute($data3);
if (!$result3) {
    die("Add failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "Add success";
}
$result4=$stsm-> execute($data4);
if (!$result4) {
    die("Add failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "Add success";
}
$result5=$stsm-> execute($data5);
if (!$result5) {
    die("Add failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "Add success";
};

//Update 
$stsm = $conn->prepare("UPDATE sinhvien SET DTB = ?  WHERE MaSV=?");
$data = [8.5,'SV001'];

$result=$stsm-> execute($data);
if (!$result) {
    die("Update failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "Update success";
};

//Delete 
$stsm = $conn->prepare("DELETE FROM sinhvien WHERE MaSV=?");
$data = ['SV003'];

$result=$stsm-> execute($data);
if (!$result) {
    die("Delete failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "Delete success";
};
?>