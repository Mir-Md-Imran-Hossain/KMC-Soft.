<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || $_SESSION['system'] !== 'pharma') {
    header("Location: ../login_common.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>KMC Pharma - ড্যাশবোর্ড</title>
    <style>
        body { background: #E0F7FA; text-align: center; }
        h1 { color: #4CAF50; font-size: 36px; }
        p { color: #333; font-size: 22px; }
        .logout { margin-top: 40px; }
        .logout a { background: #f44336; color: white; padding: 12px 30px; text-decoration: none; border-radius: 6px; }
    </style>
</head>
<body>
    <h1>KMC Pharma ড্যাশবোর্ড</h1>
    <p>এখন পর্যন্ত এটার কাজ চলতেছে তাই এই ড্যাশবোর্ড টা এখনো ইনএকটিভ</p>

    <div class="logout">
        <a href="../login_system/logout.php">লগআউট করুন (মূল পেজে ফিরে যান)</a>
    </div>
</body>
</html>