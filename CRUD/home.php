<?php
session_start();
require_once 'db.php';  // เรียกการเชื่อมต่อฐานข้อมูล

// ตรวจสอบสถานะการล็อกอิน
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit();
}

// ดึงข้อมูลผู้ใช้จากฐานข้อมูล
$sql = "SELECT * FROM admin ORDER BY id ASC";  // ลิสต์ตาม id
$stmt = $conn->prepare($sql);
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css"> <!-- ใส่ไฟล์ CSS หากมี -->
    <title>จัดการผู้ใช้</title>
    <style>
        .container {
            width: 80%;
            margin: 0 auto;
        }
        .add-user {
            display: block;
            text-align: right;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        .action-buttons a {
            margin-right: 10px;
        }
        .action-buttons a.edit {
            color: green;
        }
        .action-buttons a.delete {
            color: red;
        }
        .alert {
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid transparent;
            border-radius: 4px;
        }
        .alert-success {
            color: #155724;
            background-color: #d4edda;
            border-color: #c3e6cb;
        }
        .alert-error {
            color: #721c24;
            background-color: #f8d7da;
            border-color: #f5c6cb;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>จัดการผู้ใช้</h1>

        <!-- แสดงข้อความแจ้งเตือน -->
        <?php if (isset($_SESSION['message'])): ?>
            <div class="alert alert-<?= $_SESSION['msg_type']; ?>">
                <?= $_SESSION['message']; ?>
            </div>
            <?php unset($_SESSION['message']); ?>
        <?php endif; ?>

        <div class="add-user">
            <a href="create.php" class="button">เพิ่มผู้ใช้</a> 
            <a href="/P2/HOME/manage/page.php">หน้าหลัก</a><!-- ปุ่มเพิ่มผู้ใช้ -->
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Username</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($user = $result->fetch_assoc()) : ?>
                <tr>
                    <td><?= htmlspecialchars($user['id']); ?></td>
                    <td><?= htmlspecialchars($user['username']); ?></td>
                    <td><?= htmlspecialchars($user['first_name']); ?></td>
                    <td><?= htmlspecialchars($user['last_name']); ?></td>
                    <td class="action-buttons">
                        <a href="update.php?id=<?= $user['id']; ?>" class="edit">แก้ไข</a>
                        <a href="delete.php?id=<?= $user['id']; ?>" class="delete" onclick="return confirm('คุณแน่ใจหรือไม่ที่จะลบผู้ใช้นี้?');">ลบ</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
