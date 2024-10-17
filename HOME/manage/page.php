<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>โรงเรียนอนุบาลกุลจินต์</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }


        .nav {
            background-color: #006080;
            overflow: hidden;
        }
        .nav h1 {
            font-size: 24px;
            float: left;
            color: white;
            text-align: center;
            text-decoration: none;
        }

        .nav a {
            float: right;
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        .nav a:hover {
            background-color: #005075;
        }

        .content {
            text-align: center;
            margin-top: 20px;
        }

        .category {
            margin: 20px auto;
            width: 80%;
            padding: 50px;
            color: black;
            font-size: 28px;
            font-weight: bold;
            text-align: center;
            border-radius: 10px;
            text-decoration: none;
            display: block;
        }

        .category-academic {
            background-color: #00b359;
        }

        .category-train {
            background-color: #66cc66;
        }

        .category-activity {
            background-color: #b3ff66;
        }

        .category:hover {
            opacity: 0.8;
        }
    </style>
</head>
<body>
     <!-- Navigation Bar -->
    <div class="nav">
        <h1>โรงเรียนอนุบาลกุลจินต์</h1>
        <a href="/P2/logout.php">ออกจากระบบ</a>
        <a href="/P2/CRUD/home.php">จัดการผู้ใช้</a>
        <a href="/P2/HOME/home.php">เพิ่มข่าวสารใหม่</a>
    </div>

    <!-- Main Content -->
    <div class="content">
        <a href="/P2/HOME/manage/academic.php" class="category category-academic">งานวิชาการ</a>
        <a href="/P2/HOME/manage/Train.php" class="category category-train">อบรม/สัมมนา</a>
        <a href="/P2/HOME/manage/activity.php" class="category category-activity">กิจกรรม</a>
    </div>

</body>
</html>
