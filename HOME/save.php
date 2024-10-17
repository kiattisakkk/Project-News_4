<?php
session_start();
require_once 'db.php'; // เรียกการเชื่อมต่อฐานข้อมูล

// ตรวจสอบว่าฟอร์มถูกส่งมาหรือไม่
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errors = []; // อาร์เรย์สำหรับเก็บข้อความข้อผิดพลาด

    $type = htmlspecialchars($_POST['type']);
    $title = htmlspecialchars($_POST['title']);
    $content = htmlspecialchars($_POST['content']);
    $start_date = htmlspecialchars($_POST['start_date']);

    // ตรวจสอบข้อมูลที่จำเป็น
    if (empty($title)) {
        $errors[] = "กรุณากรอกหัวข้อข่าว";
    }
    if (empty($content)) {
        $errors[] = "กรุณากรอกเนื้อข่าว";
    }
    if (empty($start_date)) {
        $errors[] = "กรุณาเลือกวันที่เริ่มเสนอข่าว";
    }

    // ตรวจสอบว่าโฟลเดอร์อัปโหลดไฟล์มีอยู่หรือไม่ ถ้าไม่มีก็สร้างใหม่
    $upload_dir_images = "uploads/images/";
    $upload_dir_pdf = "uploads/pdf/";
    $upload_dir_videos = "uploads/videos/";

    if (!file_exists($upload_dir_images)) {
        mkdir($upload_dir_images, 0777, true);  // สร้างโฟลเดอร์สำหรับอัปโหลดภาพ
    }
    if (!file_exists($upload_dir_pdf)) {
        mkdir($upload_dir_pdf, 0777, true);  // สร้างโฟลเดอร์สำหรับอัปโหลด PDF
    }
    if (!file_exists($upload_dir_videos)) {
        mkdir($upload_dir_videos, 0777, true);  // สร้างโฟลเดอร์สำหรับอัปโหลดวิดีโอ
    }

    // จัดการการอัปโหลดภาพ (ถ้ามี)
    $images = [];
    if (isset($_FILES['images'])) {
        foreach ($_FILES['images']['tmp_name'] as $key => $tmp_name) {
            $file_name = uniqid() . '_' . $_FILES['images']['name'][$key];  // ป้องกันไฟล์ชื่อซ้ำ
            $file_tmp = $_FILES['images']['tmp_name'][$key];
            $file_size = $_FILES['images']['size'][$key];
            $file_ext = pathinfo($file_name, PATHINFO_EXTENSION);

            // ตรวจสอบขนาดไฟล์และประเภทไฟล์
            if ($file_size > 5242880) {  // ขนาดไม่เกิน 2 MB
                $errors[] = "ไฟล์ภาพ {$file_name} มีขนาดใหญ่เกิน 5 MB";
            } elseif (!in_array($file_ext, ['jpg', 'jpeg', 'png', 'gif', 'webp'])) {
                $errors[] = "ไฟล์ภาพ {$file_name} ไม่ใช่ไฟล์ประเภทที่รองรับ (jpg, jpeg, png, gif, webp)";
            } else {
                if (move_uploaded_file($file_tmp, $upload_dir_images . $file_name)) {
                    $images[] = $file_name;
                } else {
                    $errors[] = "ไม่สามารถอัปโหลดไฟล์ภาพ {$file_name} ได้";
                }
            }
        }
    }

    // จัดการการอัปโหลด PDF (ถ้ามี)
    $pdf_file = null;
    if (isset($_FILES['pdf_file']) && $_FILES['pdf_file']['size'] > 0) {
        $pdf_name = uniqid() . '_' . $_FILES['pdf_file']['name'];  // ป้องกันไฟล์ชื่อซ้ำ
        $pdf_tmp = $_FILES['pdf_file']['tmp_name'];
        $pdf_size = $_FILES['pdf_file']['size'];
        $pdf_ext = pathinfo($pdf_name, PATHINFO_EXTENSION);

        // ตรวจสอบขนาดไฟล์และประเภทไฟล์
        if ($pdf_size > 12428800) {  // ขนาดไม่เกิน 5 MB
            $errors[] = "ไฟล์ PDF มีขนาดใหญ่เกิน 10 MB";
        } elseif ($pdf_ext !== 'pdf') {
            $errors[] = "ไฟล์ PDF ต้องเป็นไฟล์นามสกุล .pdf เท่านั้น";
        } else {
            if (move_uploaded_file($pdf_tmp, $upload_dir_pdf . $pdf_name)) {
                $pdf_file = $pdf_name;
            } else {
                $errors[] = "ไม่สามารถอัปโหลดไฟล์ PDF ได้";
            }
        }
    }

    // จัดการการอัปโหลดวิดีโอ (ถ้ามี)
    $video_file = null;
    if (isset($_FILES['video_file']) && $_FILES['video_file']['size'] > 0) {
        $video_name = uniqid() . '_' . $_FILES['video_file']['name'];  // ป้องกันไฟล์ชื่อซ้ำ
        $video_tmp = $_FILES['video_file']['tmp_name'];
        $video_size = $_FILES['video_file']['size'];
        $video_ext = pathinfo($video_name, PATHINFO_EXTENSION);

        // ตรวจสอบขนาดไฟล์และประเภทไฟล์
        if ($video_size > 5368709120) {  // ขนาดไม่เกิน 10 MB
            $errors[] = "ไฟล์วิดีโอมีขนาดใหญ่เกิน  5 GB";
        } elseif (!in_array($video_ext, ['mp4', 'avi', 'mov'])) {
            $errors[] = "ไฟล์วิดีโอต้องเป็นไฟล์นามสกุล mp4, avi, หรือ mov เท่านั้น";
        } else {
            if (move_uploaded_file($video_tmp, $upload_dir_videos . $video_name)) {
                $video_file = $video_name;
            } else {
                $errors[] = "ไม่สามารถอัปโหลดไฟล์วิดีโอได้";
            }
        }
    }

    // ตรวจสอบว่ามีข้อผิดพลาดหรือไม่
    if (empty($errors)) {
        // แทรกข้อมูลบทความลงในฐานข้อมูล
        $sql = "INSERT INTO articles (title, description, category_id, created_at) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssis", $title, $content, $type, $start_date);

        if ($stmt->execute()) {
            $article_id = $stmt->insert_id;  // เก็บ ID บทความที่เพิ่งถูกเพิ่ม

            // บันทึกไฟล์ภาพลงในฐานข้อมูล
            if (!empty($images)) {
                foreach ($images as $image) {
                    $sql_media = "INSERT INTO media (file_name, file_type, file_path) VALUES (?, 'image', ?)";
                    $stmt_media = $conn->prepare($sql_media);
                    $file_path = $upload_dir_images . $image;
                    $stmt_media->bind_param("ss", $image, $file_path);
                    $stmt_media->execute();

                    // เชื่อมโยง media กับ article
                    $media_id = $stmt_media->insert_id;
                    $sql_article_media = "INSERT INTO article_media (article_id, media_id) VALUES (?, ?)";
                    $stmt_article_media = $conn->prepare($sql_article_media);
                    $stmt_article_media->bind_param("ii", $article_id, $media_id);
                    $stmt_article_media->execute();
                }
            }

            // บันทึกไฟล์ PDF ลงในฐานข้อมูล (ถ้ามี)
            if ($pdf_file) {
                $sql_media = "INSERT INTO media (file_name, file_type, file_path) VALUES (?, 'pdf', ?)";
                $stmt_media = $conn->prepare($sql_media);
                $file_path = $upload_dir_pdf . $pdf_file;
                $stmt_media->bind_param("ss", $pdf_file, $file_path);
                $stmt_media->execute();

                $media_id = $stmt_media->insert_id;
                $sql_article_media = "INSERT INTO article_media (article_id, media_id) VALUES (?, ?)";
                $stmt_article_media = $conn->prepare($sql_article_media);
                $stmt_article_media->bind_param("ii", $article_id, $media_id);
                $stmt_article_media->execute();
            }

            // บันทึกไฟล์วิดีโอลงในฐานข้อมูล (ถ้ามี)
            if ($video_file) {
                $sql_media = "INSERT INTO media (file_name, file_type, file_path, duration) VALUES (?, 'video', ?, ?)";
                $stmt_media = $conn->prepare($sql_media);
                $file_path = $upload_dir_videos . $video_file;
                $duration = null;  // สามารถเพิ่มการคำนวณระยะเวลาของวิดีโอได้หากต้องการ
                $stmt_media->bind_param("ssi", $video_file, $file_path, $duration);
                $stmt_media->execute();

                $media_id = $stmt_media->insert_id;
                $sql_article_media = "INSERT INTO article_media (article_id, media_id) VALUES (?, ?)";
                $stmt_article_media = $conn->prepare($sql_article_media);
                $stmt_article_media->bind_param("ii", $article_id, $media_id);
                $stmt_article_media->execute();
            }

            // บันทึกข้อมูลสำเร็จ เก็บข้อความแจ้งเตือนใน session
            $_SESSION['success'] = "บันทึกข้อมูลสำเร็จ";
            header('Location: home.php');
            exit();
        } else {
            // มีข้อผิดพลาดในการบันทึก
            $_SESSION['error'] = "เกิดข้อผิดพลาด: " . $conn->error;
            header('Location: home.php');
            exit();
        }
    } else {
        // มีข้อผิดพลาด เก็บข้อความแจ้งเตือนใน session
        $_SESSION['error'] = implode("<br>", $errors);
        header('Location: home.php');
        exit();
    }
} else {
    $_SESSION['error'] = "ฟอร์มไม่ได้ถูกส่ง";
    header('Location: home.php');
    exit();
}
?>