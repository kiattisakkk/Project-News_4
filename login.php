<?php
session_start();
require_once 'db.php';  // เรียกไฟล์เชื่อมต่อฐานข้อมูล

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // ดึงข้อมูลผู้ใช้จากฐานข้อมูล
    $sql = "SELECT * FROM admin WHERE username = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();
    $user = $result->fetch_assoc();

    // ตรวจสอบว่าผู้ใช้มีอยู่และรหัสผ่านถูกต้องหรือไม่
    if ($user && password_verify($password, $user['password'])) {
        // เก็บสถานะการล็อกอินในเซสชัน
        $_SESSION['loggedin'] = true;
        // เปลี่ยนเส้นทางไปยังหน้า HOME/home.php
        header('Location: /P2/HOME/manage/page.php');
        exit();
    } else {
        echo "Username หรือ Password ไม่ถูกต้อง!";
    }
}
ob_end_flush();
?>

<form method="POST" action="">
    <input type="text" name="username" placeholder="Username" required>
    <input type="password" name="password" placeholder="Password" required>
    <button type="submit" name="login">Login</button>
</form>