<?php
$servername = "localhost";
$username = "root"; // ชื่อผู้ใช้ฐานข้อมูลของคุณ
$password = ""; // รหัสผ่านของผู้ใช้ฐานข้อมูลของคุณ
$dbname = "registration_db"; // ชื่อฐานข้อมูลของคุณ

// สร้างการเชื่อมต่อกับฐานข้อมูล
$conn = new mysqli($servername, $username, $password, $dbname);

// ตรวจสอบการเชื่อมต่อ
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// รับข้อมูลจากฟอร์ม
$user = $_POST['username'];
$email = $_POST['email'];
$pass = password_hash($_POST['password'], PASSWORD_DEFAULT);

// สร้างคำสั่ง SQL สำหรับบันทึกข้อมูล
$sql = "INSERT INTO users (username, email, password) VALUES ('$user', '$email', '$pass')";

if ($conn->query($sql) === TRUE) {
    echo "สมัครสมาชิกสำเร็จ!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// ปิดการเชื่อมต่อ
$conn->close();
?>