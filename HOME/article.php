<?php
// เริ่มการเชื่อมต่อฐานข้อมูล
require_once 'db.php';

// ตรวจสอบว่าได้รับค่า article_id จาก URL หรือไม่
if (isset($_GET['id'])) {
    $article_id = intval($_GET['id']);  // ดึง article_id จาก URL และแปลงให้เป็นจำนวนเต็ม

    // รับข้อมูลจากฐานข้อมูล
    $sql = "SELECT a.*, c.name AS category_name, ad.username AS author_name
            FROM articles a
            LEFT JOIN categories c ON a.category_id = c.id
            LEFT JOIN admin ad ON a.author_id = ad.id
            WHERE a.id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $article_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $article = $result->fetch_assoc();

    // ตรวจสอบว่ามีบทความนี้ในฐานข้อมูลหรือไม่
    if (!$article) {
        echo "ไม่พบข้อมูลบทความที่คุณต้องการ.";
        exit;
    }

    // ดึงไฟล์สื่อที่เชื่อมโยงกับบทความนี้
    $sql_media = "SELECT m.file_name, m.file_type FROM media m
                  JOIN article_media am ON m.id = am.media_id
                  WHERE am.article_id = ?";
    $stmt_media = $conn->prepare($sql_media);
    $stmt_media->bind_param("i", $article_id);
    $stmt_media->execute();
    $media_result = $stmt_media->get_result();
    $media_files = $media_result->fetch_all(MYSQLI_ASSOC);
} else {
    echo "ไม่พบรหัสบทความ.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <title><?= htmlspecialchars($article['title']) ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }
        h1 {
            font-size: 24px;
            color: #333;
        }
        p {
            font-size: 16px;
        }
        img {
            margin: 10px;
        }
        .media {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <h1><?= htmlspecialchars($article['title']) ?></h1>
    <p>โดย: <?= htmlspecialchars($article['author_name']) ?> | หมวดหมู่: <?= htmlspecialchars($article['category_name']) ?></p>
    <p><?= htmlspecialchars($article['description']) ?></p>

    <!-- แสดงไฟล์สื่อ -->
    <div class="media">
        <?php if (!empty($media_files)): ?>
            <h2>สื่อที่เกี่ยวข้อง</h2>
            <?php foreach ($media_files as $media): ?>
                <?php if ($media['file_type'] === 'pdf'): ?>
                    <p><strong>ดาวน์โหลดไฟล์ PDF:</strong> <a href="uploads/pdf/<?= htmlspecialchars($media['file_name']) ?>" target="_blank"><?= htmlspecialchars($media['file_name']) ?></a></p>
                <?php else: ?>
                    <img src="uploads/images/<?= htmlspecialchars($media['file_name']) ?>" alt="image" width="200">
                <?php endif; ?>
            <?php endforeach; ?>
        <?php else: ?>
            <p>ไม่มีสื่อที่เกี่ยวข้องกับข่าวนี้</p>
        <?php endif; ?>
    </div>
</body>
</html>
