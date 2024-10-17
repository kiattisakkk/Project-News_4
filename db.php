<?php
$servername = "localhost";  // ชื่อเซิร์ฟเวอร์
$username = "root";  // ชื่อผู้ใช้ MySQL
$password = "";  // รหัสผ่าน MySQL
$dbname = "news_page";  // ชื่อฐานข้อมูล

// สร้างการเชื่อมต่อฐานข้อมูล
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("การเชื่อมต่อล้มเหลว: " . $conn->connect_error);
} else {
    echo "เชื่อมต่อฐานข้อมูลสำเร็จ!";
}
?>
