<?php
session_start();
require_once 'db.php';  // เรียกการเชื่อมต่อฐานข้อมูล

// ตรวจสอบว่ายังล็อกอินอยู่หรือไม่
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit();
}

// ตั้งค่าพื้นฐานสำหรับการอัปโหลดไฟล์
$Upload_Dir = "upload/"; // โฟลเดอร์สำหรับเก็บไฟล์ที่ถูกอัปโหลด
$Max_File_Size = 1000000; // กำหนดขนาดไฟล์สูงสุด (1MB)
$File_Type_Allow = array(
    "application/x-zip-compressed", // .zip
    "text/plain", // .txt
    "application/msword", // .doc
    "application/vnd.ms-excel", // .xls
    "application/pdf", // .pdf
    "image/bmp", // .bmp
    "image/gif", // .gif
    "image/jpeg", // .jpg, .jpeg
    "image/pjpeg", // .jpg, .jpeg
);

// ตรวจสอบและสร้างโฟลเดอร์ 'upload' ถ้าไม่มี
if (!is_dir($Upload_Dir)) {
    mkdir($Upload_Dir, 0777, true);
}

// ฟังก์ชันตรวจสอบไฟล์ที่อัปโหลด
function validate_form($file_input, $file_size, $file_type) {
    global $Max_File_Size, $File_Type_Allow;

    if ($file_input == "") {
        return "ไม่มีไฟล์ให้ Upload";
    } elseif ($file_size > $Max_File_Size) {
        return "ขนาดไฟล์ใหญ่กว่า " . $Max_File_Size . " ไบต์";
    } elseif (!check_type($file_type)) {
        return "ไฟล์ประเภทนี้ไม่อนุญาตให้ Upload";
    }
    return false;
}

// ฟังก์ชันตรวจสอบประเภทของไฟล์
function check_type($type_check) {
    global $File_Type_Allow;
    return in_array($type_check, $File_Type_Allow);
}

// ตรวจสอบว่ามีไฟล์ที่ถูกอัปโหลดมาหรือไม่
if (isset($_FILES['userfile'])) {
    $userfile = $_FILES['userfile']['tmp_name'];
    $userfile_name = $_FILES['userfile']['name'];
    $userfile_size = $_FILES['userfile']['size'];
    $userfile_type = $_FILES['userfile']['type'];

    // ตรวจสอบไฟล์
    $error_msg = validate_form($userfile, $userfile_size, $userfile_type);

    if ($error_msg) {
        echo $error_msg; // แสดงข้อความข้อผิดพลาด
    } else {
        // ย้ายไฟล์ไปยังโฟลเดอร์ upload
        if (move_uploaded_file($userfile, $Upload_Dir . $userfile_name)) {
            echo "ไฟล์ " . htmlspecialchars($userfile_name) . " ถูกอัปโหลดไปยัง " . $Upload_Dir . " เรียบร้อย";
        } else {
            echo "การอัปโหลดไฟล์มีปัญหา";
        }
    }
}
?>

<!-- HTML ฟอร์มสำหรับการอัปโหลดไฟล์ -->
<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>อัปโหลดไฟล์</title>
</head>
<body>

<h2>อัปโหลดไฟล์</h2>

<form action="" method="post" enctype="multipart/form-data">
    เลือกไฟล์: <input type="file" name="userfile" required>
    <br><br>
    <button type="submit">อัปโหลด</button>
</form>

</body>
</html>
