<?php
require_once '../db.php';  // เชื่อมต่อฐานข้อมูล
error_reporting(E_ALL);
ini_set('display_errors', 1);

// กำหนดค่าคงที่สำหรับเส้นทางหลักของไฟล์อัปโหลด
define('UPLOAD_BASE_PATH', '/P2/HOME/uploads/');

// ตรวจสอบว่ามีการส่งค่า id มาหรือไม่
if (isset($_GET['id'])) {
    $article_id = intval($_GET['id']);  // ดึง id จาก URL และแปลงเป็นจำนวนเต็ม

    // ดึงข้อมูลบทความจากตาราง articles
    $sql_article = "SELECT a.title, a.description, a.created_at, 
                           IFNULL(ad.first_name, 'ไม่ทราบชื่อผู้เขียน') AS author_name, 
                           c.name AS category_name 
                    FROM articles a 
                    LEFT JOIN admin ad ON a.author_id = ad.id
                    LEFT JOIN categories c ON a.category_id = c.id
                    WHERE a.id = ?";
    $stmt_article = $conn->prepare($sql_article);
    if ($stmt_article === false) {
        die("เกิดข้อผิดพลาดในการเตรียม SQL สำหรับบทความ: " . $conn->error);
    }
    $stmt_article->bind_param("i", $article_id);
    $stmt_article->execute();
    $article_result = $stmt_article->get_result();
    $article = $article_result->fetch_assoc();

    if (!$article) {
        die("ไม่พบบทความที่ต้องการ.");
    }

    // ดึงข้อมูลไฟล์สื่อที่เกี่ยวข้องจากตาราง article_media และ media
    $sql_media = "SELECT m.file_name, m.file_type 
                  FROM media m 
                  INNER JOIN article_media am ON m.id = am.media_id 
                  WHERE am.article_id = ?";
    $stmt_media = $conn->prepare($sql_media);
    if ($stmt_media === false) {
        die("เกิดข้อผิดพลาดในการเตรียม SQL สำหรับสื่อ: " . $conn->error);
    }
    $stmt_media->bind_param("i", $article_id);
    $stmt_media->execute();
    $media_result = $stmt_media->get_result();
    $media_files = $media_result->fetch_all(MYSQLI_ASSOC);

    // ปิด statement หลังใช้งานเสร็จ
    $stmt_article->close();
    $stmt_media->close();

    // จัดลำดับไฟล์สื่อตามลำดับที่ต้องการ: PDF, Video, Image
    usort($media_files, function($a, $b) {
        $order = ['pdf' => 1, 'video' => 2, 'image' => 3];
        return $order[$a['file_type']] - $order[$b['file_type']];
    });

} else {
    die("ไม่พบรหัสบทความ.");
}
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= htmlspecialchars($article['title']) ?></title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            
        }

        .header {
            background-color: #00838f;
            color: white;
            padding: 10px 0;
            
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

       

        .header a {
            color: white;
            text-decoration: none;
            padding: 0 15px;
        }

        .container {
            max-width: 900px;
            margin: 0 auto;
            padding: 20px;
        }

        h1 {
            font-size: 24px;
            color: #333;
            padding-bottom: 10px;
        }

        p {
            font-size: 16px;
        }

        img,
        video {
            max-width: 100%;
            height: auto;
            margin: 10px 0;
        }

        .media {
            margin-top: 20px;
            border-top: 1px solid #ccc;
            padding-top: 20px;
        }

        .media-item {
            margin-bottom: 20px;
        }

        .error {
            color: red;
            font-weight: bold;
        }

        /* จัดการภาพแนวนอน */
        .horizontal-images img {
            width: 500px;
            height: 250px;
            margin-bottom: 20px;
            display: block;
            margin-left: auto;
            margin-right: auto;
        }

        /* จัดการภาพแนวตั้ง เรียง 3 รูปในหนึ่งแถว */
        .vertical-images {
            display: flex;
            justify-content: space-between;
            margin-bottom: 20px;
        }

        .vertical-images img {
            max-width: 300px;
            max-height: 400px;
            margin-bottom: 10px;
            flex: 1;
            margin-right: 15px;
        }

        .vertical-images img:last-child {
            margin-right: 0;
        }
    </style>
</head>

<body>
    <header class="header">
        <h1>โรงเรียนอนุบาลกุลจินต์</h1>
    
   
        <a href="/P2/HOME/manage/page.php">หน้าหลัก</a>
        <a href="/P2/HOME/edit.php?id=<?= $article_id ?>">แก้ไข</a>
        <a href="/P2/HOME/delete.php?id=<?= $article_id ?>" onclick="return confirm('คุณต้องการลบบทความนี้หรือไม่?')">ลบ</a>

    </header>
    <div class="container">
        <h1><?= htmlspecialchars($article['title']) ?></h1>
        <p><strong>โดย:</strong> <?= htmlspecialchars($article['author_name']) ?> | <strong>หมวดหมู่:</strong> <?= htmlspecialchars($article['category_name']) ?></p>
        <p><?= nl2br(htmlspecialchars($article['description'])) ?></p>

        <!-- แสดงไฟล์สื่อ -->
        <div class="media">
            <h2>สื่อที่เกี่ยวข้อง</h2>
            <?php if (!empty($media_files)): ?>
                <?php foreach ($media_files as $media): ?>
                    <?php
                    $file_name = htmlspecialchars($media['file_name']);
                    $file_type = $media['file_type'];
                    $file_path = '';
                    $error_message = '';

                    // กำหนดเส้นทางไฟล์ตามประเภท
                    if ($file_type === 'pdf') {
                        $file_path = UPLOAD_BASE_PATH . 'pdf/' . $file_name;
                    } elseif ($file_type === 'image') {
                        $file_path = UPLOAD_BASE_PATH . 'images/' . $file_name;
                    } elseif ($file_type === 'video') {
                        $file_path = UPLOAD_BASE_PATH . 'videos/' . $file_name;
                    }

                    // ตรวจสอบการมีอยู่ของไฟล์
                    if (!file_exists($_SERVER['DOCUMENT_ROOT'] . $file_path)) {
                        $error_message = "ไม่พบไฟล์: {$file_name}";
                    }
                    ?>
                    <div class="media-item">
                        <?php if (!empty($error_message)): ?>
                            <p class="error"><?= $error_message ?></p>
                        <?php else: ?>
                            <?php if ($file_type === 'pdf'): ?>
                                <p><strong>ดาวน์โหลดไฟล์ PDF:</strong> <a href="<?= $file_path ?>" target="_blank"><?= $file_name ?></a></p>
                            <?php elseif ($file_type === 'image'): ?>
                                <img src="<?= $file_path ?>" alt="<?= $file_name ?>" onclick="showPopupImage(this.src)">
                            <?php elseif ($file_type === 'video'): ?>
                                <video controls>
                                    <source src="<?= $file_path ?>" type="video/mp4">
                                    Your browser does not support the video tag.
                                </video>
                            <?php else: ?>
                                <p>ไฟล์นี้ไม่รองรับการแสดงผลในหน้านี้: <?= $file_name ?> (<?= $file_type ?>)</p>
                            <?php endif; ?>
                        <?php endif; ?>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p>ไม่มีสื่อที่เกี่ยวข้องกับบทความนี้</p>
            <?php endif; ?>
        </div>
    </div>

    <!-- ป๊อปอัพรูปภาพขนาดเต็ม -->
    <div class="popup-img" id="popupImg">
        <span class="close" onclick="closePopupImage()">&times;</span>
        <img id="popupImgSrc" src="">
    </div>

    <script>
        // ฟังก์ชันสำหรับแสดงรูปภาพขนาดเต็ม
        function showPopupImage(src) {
            const popup = document.getElementById('popupImg');
            const popupImgSrc = document.getElementById('popupImgSrc');
            popupImgSrc.src = src;
            popup.style.display = 'flex';
        }

        // ฟังก์ชันสำหรับปิดป๊อปอัพรูปภาพ
        function closePopupImage() {
            const popup = document.getElementById('popupImg');
            popup.style.display = 'none';
        }
    </script>
</body>

</html>