<?php
session_start();  // ใช้งาน session
require_once 'db.php';  // เชื่อมต่อฐานข้อมูล

// ฟังก์ชันสร้างผู้ใช้แอดมินใหม่ (Create)
function createAdmin($username, $first_name, $last_name, $password) {
    global $conn;

    // ตรวจสอบว่ามีชื่อผู้ใช้อยู่แล้วหรือไม่
    $sql_check = "SELECT * FROM admin WHERE username = ?";
    $stmt_check = $conn->prepare($sql_check);
    $stmt_check->bind_param("s", $username);
    $stmt_check->execute();
    $result_check = $stmt_check->get_result();

    if ($result_check->num_rows > 0) {
        $_SESSION['message'] = "ชื่อผู้ใช้ '$username' ถูกใช้งานแล้ว กรุณาเลือกชื่อผู้ใช้อื่น.";
        $_SESSION['msg_type'] = "error";
    } else {
        // เข้ารหัสรหัสผ่าน
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        
        // เพิ่มผู้ใช้ใหม่
        $sql = "INSERT INTO admin (username, first_name, last_name, password) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssss", $username, $first_name, $last_name, $hashed_password);
        
        if ($stmt->execute()) {
            $_SESSION['message'] = "เพิ่มผู้ใช้แอดมินเรียบร้อยแล้ว.";
            $_SESSION['msg_type'] = "success";
        } else {
            $_SESSION['message'] = "Error: " . $conn->error;
            $_SESSION['msg_type'] = "error";
        }
    }

    // เปลี่ยนเส้นทางกลับไปหน้า "จัดการผู้ใช้"
    header("Location: home.php");
    exit();
}

// ฟังก์ชันอัปเดตผู้ใช้แอดมิน (Update)
function updateAdmin($id, $username, $first_name, $last_name, $password = null) {
    global $conn;

    if (!empty($password)) {
        $hashed_password = password_hash($password, PASSWORD_BCRYPT);
        $sql = "UPDATE admin SET username = ?, first_name = ?, last_name = ?, password = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssi", $username, $first_name, $last_name, $hashed_password, $id);
    } else {
        $sql = "UPDATE admin SET username = ?, first_name = ?, last_name = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("sssi", $username, $first_name, $last_name, $id);
    }

    if ($stmt->execute()) {
        $_SESSION['message'] = "อัปเดตข้อมูลผู้ใช้แอดมินเรียบร้อยแล้ว.";
        $_SESSION['msg_type'] = "success";
    } else {
        $_SESSION['message'] = "Error: " . $conn->error;
        $_SESSION['msg_type'] = "error";
    }

    // เปลี่ยนเส้นทางกลับไปหน้า "จัดการผู้ใช้"
    header("Location: home.php");
    exit();
}

// ฟังก์ชันลบผู้ใช้แอดมิน (Delete)
function deleteAdmin($id) {
    global $conn;

    $sql = "DELETE FROM admin WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        $_SESSION['message'] = "ลบผู้ใช้แอดมินเรียบร้อยแล้ว.";
        $_SESSION['msg_type'] = "success";
    } else {
        $_SESSION['message'] = "Error: " . $conn->error;
        $_SESSION['msg_type'] = "error";
    }

    // เปลี่ยนเส้นทางกลับไปหน้า "จัดการผู้ใช้"
    header("Location: home.php");
    exit();
}

// ฟังก์ชันอ่านข้อมูลผู้ใช้แอดมิน (Read)
function getAllAdmins() {
    global $conn;

    $sql = "SELECT * FROM admin";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<p>ID: " . $row['id'] . " - Username: " . $row['username'] . " - Name: " . $row['first_name'] . " " . $row['last_name'] . "</p>";
        }
    } else {
        echo "ไม่มีผู้ใช้.";
    }
}
?>
