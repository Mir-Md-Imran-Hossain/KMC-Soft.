<?php
session_start();

// যদি লগইন না করা থাকে → কমন লগইন পেজে ফিরে যাও
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || $_SESSION['system'] !== 'lab') {
    header("Location: login_common.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KMC LAB - ড্যাশবোর্ড</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: sans-serif;
            background: #E0F7FA;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .dashboard {
            background: white;
            padding: 50px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.15);
            max-width: 800px;
            width: 90%;
            text-align: center;
        }
        h1 {
            color: #2196F3;
            font-size: 42px;
            margin-bottom: 20px;
        }
        p {
            font-size: 22px;
            color: #333;
            margin: 20px 0;
        }
        .logout-btn {
            margin-top: 40px;
        }
        .logout-btn a {
            background: #f44336;
            color: white;
            padding: 14px 40px;
            text-decoration: none;
            border-radius: 8px;
            font-size: 20px;
            font-weight: bold;
        }
        .logout-btn a:hover {
            background: #d32f2f;
        }
    </style>
</head>
<body>
    <div class="dashboard">
        <h1>সফলভাবে লগইন হয়েছে!</h1>
        <p>আপনি এখন KMC LAB ড্যাশবোর্ডে আছেন।</p>
        <p>এখানে পরে ল্যাবের সকল ফিচার (রোগী এন্ট্রি, টেস্ট বিলিং, রিপোর্ট, পেন্ডিং লিস্ট ইত্যাদি) আসবে।</p>

        <div class="logout-btn">
            <a href="login_system/logout.php">লগআউট করুন</a>
        </div>
    </div>
    <div class="logout">
    <a href="../login_system/logout.php">লগআউট করুন (মূল পেজে ফিরে যান)</a>
</div>
</body>
</html>