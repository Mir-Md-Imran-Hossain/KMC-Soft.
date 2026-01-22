<?php
session_start();

if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true) {
    header("Location: admin_login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>অ্যাডমিন প্যানেল</title>
    <style>
        body { background: #E0F7FA; text-align: center; }
        button { padding: 20px; font-size: 28px; color: white; border: none; cursor: pointer; margin: 20px; border-radius: 10px; }
        .btn-lab { background: #2196F3; }
        .btn-pharma { background: #4CAF50; }
    </style>
</head>
<body>
    <h1>অ্যাডমিন প্যানেল</h1>

    <button class="btn-lab" onclick="window.location.href = '../dashboards/lab_dashboard.php'">ল্যাব কন্ট্রোল</button>
    <button class="btn-pharma" onclick="window.location.href = '../dashboards/pharma_dashboard.php'">ফার্মা কন্ট্রোল</button>

    <div class="logout">
        <a href="logout.php">লগআউট</a>
    </div>
</body>
</html>