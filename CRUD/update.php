<?php
require_once 'db.php';
include 'crud.php';

// ตรวจสอบว่าได้รับ ID ของผู้ใช้หรือไม่
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // ดึงข้อมูลผู้ใช้จากฐานข้อมูลเพื่อนำมาแสดงในฟอร์ม
    $sql = "SELECT * FROM admin WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);
    $stmt->execute();
    $result = $stmt->get_result();
    $admin = $result->fetch_assoc();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $username = $_POST['username'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $password = $_POST['password'];

    // อัปเดตข้อมูลผู้ใช้
    updateAdmin($id, $username, $first_name, $last_name, $password); 
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Admin</title>
</head>
<body>

    <h1>อัปเดตข้อมูลผู้ใช้แอดมิน</h1>
    <form action="update.php?id=<?= $admin['id']; ?>" method="POST">
        <input type="hidden" name="id" value="<?= $admin['id']; ?>">

        <label for="username">Username:</label>
        <input type="text" name="username" value="<?= $admin['username']; ?>" required><br><br>

        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" value="<?= $admin['first_name']; ?>" required><br><br>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" value="<?= $admin['last_name']; ?>" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" placeholder="Leave blank if no change"><br><br>

        <input type="submit" value="Update Admin">
    </form>

</body>
</html>
