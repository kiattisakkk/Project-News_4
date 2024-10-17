<?php
require_once '../db.php';  // เชื่อมต่อฐานข้อมูล
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define UPLOAD_BASE_PATH if it's not defined in db.php or another file
if (!defined('UPLOAD_BASE_PATH')) {
    define('UPLOAD_BASE_PATH', '/P2/uploads/');  // Example path
}

// ตรวจสอบว่ามีการส่งค่า id มาหรือไม่
if (isset($_GET['id'])) {
    $article_id = intval($_GET['id']);  // ดึง id จาก URL

    // ดึงข้อมูลไฟล์สื่อที่เกี่ยวข้อง เพื่อใช้ในการลบไฟล์
    $sql_media = "SELECT m.file_name, m.file_type 
                  FROM media m 
                  INNER JOIN article_media am ON m.id = am.media_id 
                  WHERE am.article_id = ?";
    $stmt_media = $conn->prepare($sql_media);
    $stmt_media->bind_param("i", $article_id);
    $stmt_media->execute();
    $media_result = $stmt_media->get_result();
    $media_files = $media_result->fetch_all(MYSQLI_ASSOC);

    // ลบไฟล์สื่อที่เกี่ยวข้อง
    foreach ($media_files as $media) {
        $file_name = $media['file_name'];
        $file_type = $media['file_type'];
        $file_path = '';

        if ($file_type === 'pdf') {
            $file_path = $_SERVER['DOCUMENT_ROOT'] . UPLOAD_BASE_PATH . 'pdf/' . $file_name;
        } elseif ($file_type === 'image') {
            $file_path = $_SERVER['DOCUMENT_ROOT'] . UPLOAD_BASE_PATH . 'images/' . $file_name;
        } elseif ($file_type === 'video') {
            $file_path = $_SERVER['DOCUMENT_ROOT'] . UPLOAD_BASE_PATH . 'videos/' . $file_name;
        }

        // ตรวจสอบและลบไฟล์
        if (file_exists($file_path)) {
            unlink($file_path);
        }
    }

    // ลบข้อมูลสื่อที่เกี่ยวข้องในฐานข้อมูล
    $sql_delete_media = "DELETE FROM article_media WHERE article_id = ?";
    $stmt_delete_media = $conn->prepare($sql_delete_media);
    $stmt_delete_media->bind_param("i", $article_id);
    $stmt_delete_media->execute();

    // ลบบทความ
    $sql_delete_article = "DELETE FROM articles WHERE id = ?";
    $stmt_delete_article = $conn->prepare($sql_delete_article);
    $stmt_delete_article->bind_param("i", $article_id);

    if ($stmt_delete_article->execute()) {
        // ลบสำเร็จ กลับไปหน้าหลัก
        header("Location: /P2/HOME/manage/academic.php");
        exit();
    } else {
        echo "เกิดข้อผิดพลาดในการลบบทความ.";
    }

    // ปิด statement หลังใช้งานเสร็จ
    $stmt_media->close();
    $stmt_delete_media->close();
    $stmt_delete_article->close();

} else {
    die("ไม่พบรหัสบทความ.");
}
?>
