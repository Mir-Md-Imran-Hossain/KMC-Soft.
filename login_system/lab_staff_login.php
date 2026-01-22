<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || $_SESSION['system'] !== 'lab') {
    header("Location: ../../login_common.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>KMC LAB - স্টাফ লগইন</title>
    <style>
        body { background: #E0F7FA; text-align: center; }
        img { width: 300px; }
        h1 { color: #FF0000; font-size: 28px; }
        p { color: #000000; font-size: 18px; }
        form { width: 400px; margin: auto; }
        select, input { width: 100%; padding: 10px; margin: 10px 0; }
        button { background: #2196F3; color: white; padding: 10px; font-size: 18px; border: none; }
    </style>
</head>
<body>
    <img src="../../documents/KMC LOGO TB..svg" alt="লোগো">
    <h1>কামরুন্নাহার মেডিকেল সেন্টার<br>Kamrunnahar Medical Center</h1>
    <p>আমাদের সেবার মান-ই আমাদের পরিচয়</p>

    <form action="login_staff_action.php" method="post">
        <select name="role" required>
            <option value="">রোল সিলেক্ট করুন</option>
            <option value="Admin">Admin</option>
            <option value="Manager">Manager</option>
            <option value="Counter">Counter</option>
            <option value="Lab">Lab</option>
            <option value="Doctor">Doctor</option>
        </select>
        <input type="email" name="email" placeholder="ইমেইল" required>
        <input type="password" name="password" placeholder="পাসওয়ার্ড" required>
        <button type="submit">লগইন</button>
    </form>
</body>
</html>