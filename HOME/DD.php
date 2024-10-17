<?php
session_start();
require_once 'db.php';  // เชื่อมต่อฐานข้อมูล

// ตรวจสอบว่าผู้ใช้ล็อกอินหรือไม่
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>เพิ่มข่าวสารใหม่</title>

    <!-- CKEditor -->
    <script src="https://cdn.ckeditor.com/ckeditor5/36.0.1/classic/ckeditor.js"></script>

    <style>
        form {
            width: 80%;
            margin: 0 auto;
        }
        label {
            display: block;
            margin-bottom: 5px;
        }
        input, textarea, select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        .submit-button {
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            cursor: pointer;
        }
        .submit-button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>

    <h1>เพิ่มข่าวสารใหม่</h1>

    <form action="save.php" method="post" enctype="multipart/form-data">
        <!-- ประเภทข่าว -->
        <div class="form-group">
            <label for="type">ประเภทข่าว *</label>
            <select name="type" id="type" required>
                <?php
                // ดึงหมวดหมู่ข่าวจากตาราง categories
                $sql = "SELECT id, name FROM categories";
                $result = $conn->query($sql);
                while ($category = $result->fetch_assoc()) {
                    echo '<option value="' . $category['id'] . '">' . $category['name'] . '</option>';
                }
                ?>
            </select>
        </div>

        <!-- หัวข้อข่าว -->
        <div class="form-group">
            <label for="title">หัวข้อข่าว *</label>
            <input type="text" name="title" id="title" required>
        </div>

        <!-- เนื้อข่าว -->
        <div class="form-group">
            <label for="content">เนื้อข่าว *</label>
            <textarea name="content" id="editor" required></textarea>
        </div>

        <!-- แนบไฟล์รูปภาพ -->
        <div class="form-group">
            <label for="images">แนบไฟล์ภาพ</label>
            <input type="file" name="images[]" id="images" multiple>
        </div>

        <!-- แนบไฟล์ PDF -->
        <div class="form-group">
            <label for="pdf_file">แนบไฟล์ PDF</label>
            <input type="file" name="pdf_file" id="pdf_file" accept=".pdf">
        </div>

        <!-- วันที่เสนอข่าว -->
        <div class="form-group">
            <label for="start_date">เริ่มเสนอข่าวตั้งแต่ *</label>
            <input type="date" name="start_date" id="start_date" required>
        </div>

        <!-- ปุ่มส่งฟอร์ม -->
        <button type="submit" name="submit" class="submit-button">บันทึก</button>
    </form>

    <!-- CKEditor Integration -->
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .catch(error => {
                console.error(error);
            });
    </script>

</body>
</html>
