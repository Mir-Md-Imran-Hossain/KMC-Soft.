<?php
session_start();

if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: admin_panel.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>অ্যাডমিন লগইন</title>
    <style>
        body { background: #E0F7FA; text-align: center; }
        form { width: 400px; margin: auto; }
        input { width: 100%; padding: 10px; margin: 10px 0; }
        button { background: #2196F3; color: white; padding: 10px; font-size: 18px; border: none; }
    </style>
</head>
<body>
    <h1>অ্যাডমিন লগইন</h1>
    <form method="post" action="admin_action.php">
        <input type="email" name="email" value="admin@mir.enterprise" readonly>
        <input type="password" name="password" placeholder="পাসওয়ার্ড" required>
        <button type="submit">লগইন</button>
    </form>
</body>
</html>