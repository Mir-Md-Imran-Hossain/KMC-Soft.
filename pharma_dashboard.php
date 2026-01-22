<?php
session_start();

// লগইন চেক
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || $_SESSION['system'] !== 'pharma') {
    header("Location: login_system/index.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>KMC Pharma ড্যাশবোর্ড</title>
    <style>
        body { font-family: sans-serif; background: #E0F7FA; padding: 40px; text-align: center; }
        h1 { color: #4CAF50; }
        .message { font-size: 20px; margin: 20px 0; color: #333; }
        .logout a { background: #f44336; color: white; padding: 12px 30px; text-decoration: none; border-radius: 6px; font-size: 18px; }
    </style>
</head>
<body>
    <h1>সফলভাবে লগইন হয়েছে!</h1>
    <p class="message">স্বাগতম KMC Pharma ড্যাশবোর্ডে।<br>আপনি এখন লগইন সিস্টেম টেস্ট সাকসেসফুল করেছেন।</p>
    <p class="message">পরের ফেজে এখানে ফার্মার সকল ফিচার আসবে।</p>

    <div class="logout">
        <a href="login_system/logout.php">লগআউট করুন</a>
    </div>
</body>
</html>