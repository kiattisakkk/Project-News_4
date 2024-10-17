<?php
require_once 'db.php';
include 'crud.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // เรียกฟังก์ชันลบผู้ใช้
    deleteAdmin($id);
}
?>
