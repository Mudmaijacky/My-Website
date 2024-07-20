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
$pass = $_POST['password'];

// สร้างคำสั่ง SQL สำหรับตรวจสอบข้อมูลผู้ใช้
$sql = "SELECT * FROM users WHERE username='$user'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // ดึงข้อมูลผู้ใช้จากผลลัพธ์
    $row = $result->fetch_assoc();
    if (password_verify($pass, $row['password'])) {
        echo "เข้าสู่ระบบสำเร็จ! ยินดีต้อนรับ " . $row['username'];
    } else {
        echo "รหัสผ่านไม่ถูกต้อง!";
    }
} else {
    echo "ไม่พบชื่อผู้ใช้นี้!";
}

// ปิดการเชื่อมต่อ
$conn->close();
?>
