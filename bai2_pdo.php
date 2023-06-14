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
$stsm = $conn->prepare('CREATE TABLE IF NOT EXISTS `lsgiaodich` (
    `Id` int NOT NULL AUTO_INCREMENT,
  `Ngay_giao_dich` datetime NOT NULL,
  `Loai_giao_dich` varchar(50) NOT NULL,
  `So_tien` char(20) NOT NULL,
  `Mo_ta` varchar(100) NOT NULL,
  PRIMARY KEY (`Id`)
)');
$result=$stsm-> execute();
if (!$result) {
    die("Create failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "Create success";
};

// Insert 
$stsm = $conn->prepare('INSERT INTO `lsgiaodich`(`Ngay_giao_dich`, `Loai_giao_dich`, `So_tien`, `Mo_ta`) 
VALUE (?, ?, ?, ?)');
$data = array('2023-07-05','Rut tien', '500','Rut tien ATM');
$data2 = array('2023-07-06','Rut tien', '2300','Rut tien ATM');
$data3 = array('2023-08-07','Rut tien', '8000','Rut tien ATM');
$data4 = array('2023-09-02','Vay tien', '1000','Vay tien ATM');
$data5 = array('2023-09-09','Vay tien', '3800','Vay tien ATM');

$result=$stsm-> execute($data);
if (!$result) {
    die("Adding record failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "History transaction has been successfully added in your data";
}
$result2=$stsm-> execute($data2);
if (!$result2) {
    die("Adding record failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "History transaction has been successfully added in your data";
}
$result3=$stsm-> execute($data3);
if (!$result3) {
    die("Adding record failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "History transaction has been successfully added in your data";
}
$result4=$stsm-> execute($data4);
if (!$result4) {
    die("Adding record failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "History transaction has been successfully added in your data";
}
$result5=$stsm-> execute($data5);
if (!$result5) {
    die("Adding record failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "History transaction has been successfully added in your data";
};


//Update 
$stsm = $conn->prepare("UPDATE lsgiaodich SET So_tien = ?  WHERE Id=?");
$data = [1000,3];

$result=$stsm-> execute($data);
if (!$result) {
    die("Update failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "History transaction has been successfully updated in your data";
}

//Delete 
$stsm = $conn->prepare("DELETE FROM lsgiaodich WHERE Id=?");
$data = [5];

$result=$stsm-> execute($data);
if (!$result) {
    die("Deleting record failed: " . mysqli_error()); 
    // Thông báo lỗi nếu thực thi câu lệnh thất bại
} else {
    echo "History transaction has been successfully deleted in your data";
}
?>