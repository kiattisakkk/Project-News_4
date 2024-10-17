<?php
require_once 'db.php';  // เชื่อมต่อฐานข้อมูล
include 'crud.php';     // เรียกใช้ฟังก์ชันจาก crud.php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $password = $_POST['password'];

    // เรียกฟังก์ชันสร้างแอดมินจาก crud.php
    createAdmin($username, $first_name, $last_name, $password);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Admin</title>
</head>
<body>

    <h1>สร้างผู้ใช้แอดมินใหม่</h1>
    <!-- ฟอร์มส่งข้อมูลไปที่ create.php -->
    <form action="create.php" method="POST">
        <label for="username">Username:</label>
        <input type="text" name="username" required><br><br>

        <label for="first_name">First Name:</label>
        <input type="text" name="first_name" required><br><br>

        <label for="last_name">Last Name:</label>
        <input type="text" name="last_name" required><br><br>

        <label for="password">Password:</label>
        <input type="password" name="password" required><br><br>

        <input type="submit" value="Create Admin">
    </form>

</body>
</html>
