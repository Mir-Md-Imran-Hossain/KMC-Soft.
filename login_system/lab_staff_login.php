<?php
session_start();

// যদি KMC LAB-এ লগইন না করা থাকে → কমন পেজে ফিরে যাও
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true || $_SESSION['system'] !== 'lab') {
    header("Location: ../login_common.php");
    exit();
}

// যদি স্টাফ লগইন করা থাকে → ড্যাশবোর্ডে যাও (পরে ফাইল তৈরি করবো)
if (isset($_SESSION['staff_logged_in']) && $_SESSION['staff_logged_in'] === true) {
    header("Location: ../" . strtolower($_SESSION['role']) . "_dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>KMC LAB - স্টাফ লগইন</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background: #E0F7FA;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: sans-serif;
        }
        .container {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 8px 30px rgba(0,0,0,0.15);
            max-width: 500px;
            width: 90%;
            text-align: center;
        }
        .logo {
            max-width: 280px;
            height: auto;
            margin-bottom: 20px;
        }
        h1 {
            color: #FF0000;
            font-size: 28px;
            font-weight: bold;
            margin: 10px 0;
        }
        .slogan {
            color: #000000;
            font-size: 18px;
            font-style: italic;
            margin: 0 0 40px 0;
        }
        select, input {
            width: 100%;
            padding: 14px;
            margin: 12px 0;
            font-size: 18px;
            border: 1px solid #ccc;
            border-radius: 6px;
            box-sizing: border-box;
        }
        .password-container {
            position: relative;
        }
        .eye-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            font-size: 24px;
        }
        button {
            width: 100%;
            padding: 16px;
            font-size: 20px;
            font-weight: bold;
            color: white;
            background: #2196F3;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 10px;
        }
        button:hover {
            background: #1976D2;
        }
        .error {
            color: #FF0000;
            font-size: 16px;
            margin-top: 15px;
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="../documents/KMC LOGO TB..svg" alt="KMC লোগো" class="logo">
        <h1>কামরুন্নাহার মেডিকেল সেন্টার<br>Kamrunnahar Medical Center</h1>
        <p class="slogan">আমাদের সেবার মান-ই আমাদের পরিচয়</p>

        <form method="post" action="login_staff_action.php">
            <input type="hidden" name="system" value="lab">

            <select name="role" required>
                <option value="">রোল সিলেক্ট করুন</option>
                <option value="Admin">Admin</option>
                <option value="Manager">Manager</option>
                <option value="Counter">Counter</option>
                <option value="Lab">Lab Technologist</option>
                <option value="Doctor">Doctor</option>
            </select>

            <input type="email" name="email" placeholder="ইমেইল (যেমন: admin@kmc)" required>

            <div class="password-container">
                <input type="password" name="password" id="password" placeholder="পাসওয়ার্ড" required>
                <span class="eye-icon" onclick="togglePassword()">👁️</span>
            </div>

            <button type="submit">লগইন করুন</button>

            <div class="error">
                <?php if (isset($_GET['error'])) echo "ভুল ইমেইল বা পাসওয়ার্ড। আবার চেষ্টা করুন।"; ?>
            </div>
        </form>
    </div>

    <script>
        function togglePassword() {
            var pass = document.getElementById('password');
            pass.type = (pass.type === 'password') ? 'text' : 'password';
        }
    </script>
</body>
</html>