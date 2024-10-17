<?php
require_once '../db.php';  // เรียกใช้การเชื่อมต่อฐานข้อมูล

// ดึงข้อมูลข่าวจากฐานข้อมูลตามประเภท "งานวิชาการ" (type = 1)
// และเรียงลำดับ id จากมากไปน้อย
$sql = "SELECT * FROM articles WHERE category_id = 1 ORDER BY id DESC";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="th">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ข่าววิชาการ</title>
    <style> 
        body { 
            font-family: Arial, sans-serif; 
            background-color: #f4f4f4; 
            margin: 0; 
            padding: 0; 
        } 
        
        .header {
            background-color: #00A19D;
            color: white;
            padding: 10px 0;
            text-align: center;
        }
        
        .header-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            width: 80%;
            margin: 0 auto;
        }
        
        .school-name {
            font-size: 24px;
            font-weight: bold;
        }
        
        .nav-links a {
            display: block;
            color: white;
            text-decoration: none;
            margin-left: 20px;
        }
 
        .container { 
            width: 80%; 
            margin: 20px auto; 
            background-color: white; 
            border-radius: 8px; 
            padding: 20px; 
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); 
        } 
 
        h1 { 
            font-size: 24px; 
            color: #333; 
            margin-bottom: 20px; 
        } 
 
        h1::before { 
            content: "🧪";  /* ไอคอนก่อนหัวข้อ */ 
            margin-right: 10px; 
        } 
 
        .news-list { 
            overflow-y: auto;
        } 
 
        .news-list ul { 
            list-style-type: none; 
            padding: 0; 
            margin: 0; 
        } 
 
        .news-list li { 
            margin-bottom: 15px; 
            padding-bottom: 10px; 
            border-bottom: 1px solid #ddd; 
        } 
 
        .news-title { 
            font-size: 18px; 
            color: #333; 
            text-decoration: none; 
        } 
 
        .news-title:hover { 
            color: #ff5722; 
        } 
 
        .news-detail { 
            font-size: 14px; 
            color: #777; 
        } 
    </style> 
</head>

<body>
    <div class="header">
        <div class="header-content">
            <div class="school-name">โรงเรียนอนุบาลกุลจิตต์</div>
            <div class="nav-links">
                <a href="/P2/HOME/manage/page.php">หน้าหลัก</a>

            </div>
        </div>
    </div>
    <div class="container">
        <h1>ข่าววิชาการ</h1>


        <!-- แสดงรายการข่าว -->
        <div class="news-list">
            <ul>
                <?php while ($news = $result->fetch_assoc()): ?>
                    <li>
                        <a class="news-title" href="news_detail.php?id=<?= $news['id']; ?>">
                            <?= htmlspecialchars($news['title']); ?>
                        </a>
                        <span class="news-detail">[<?= $news['id']; ?>]</span>
                    </li>
                <?php endwhile; ?>
            </ul>
        </div>
    </div>

</body>

</html>