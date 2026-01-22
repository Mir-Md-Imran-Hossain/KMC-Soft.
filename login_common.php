<?php
session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    if ($_SESSION['system'] === 'lab') {
        header("Location: login_system/lab_staff_login.php");
    } else {
        header("Location: login_system/pharma_staff_login.php");
    }
    exit();
}
?>
<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MIR Enterprise - লগইন</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            background: #ffffff;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: sans-serif;
            position: relative;
        }
        .container {
            text-align: center;
        }
        h1 {
            font-size: 140px;
            color: #000;
            font-weight: bold;
            margin: 0;
            letter-spacing: 10px;
        }
        .buttons {
            margin-top: 80px;
            display: flex;
            flex-direction: column;
            gap: 30px;
        }
        .btn {
            display: block;
            width: 380px;
            padding: 25px;
            margin: 0 auto;
            font-size: 32px;
            font-weight: bold;
            color: white;
            text-decoration: none;
            border-radius: 12px;
            transition: 0.3s;
            cursor: pointer;
            border: none;
        }
        .btn-lab {
            background: #2196F3;
        }
        .btn-pharma {
            background: #4CAF50;
        }
        .btn:hover {
            opacity: 0.9;
            transform: scale(1.05);
        }
        .login-form {
            display: none;
            margin-top: 40px;
            background: #f9f9f9;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            width: 380px;
            margin-left: auto;
            margin-right: auto;
        }
        input {
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
        button[type="submit"] {
            width: 100%;
            padding: 14px;
            font-size: 20px;
            font-weight: bold;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        .btn-lab-submit {
            background: #2196F3;
        }
        .btn-pharma-submit {
            background: #4CAF50;
        }
        .error {
            color: red;
            font-size: 16px;
            margin-top: 10px;
        }
        .admin-slider {
            position: absolute;
            top: 10px;
            right: 10px;
            background: #eee;
            padding: 10px;
            border-radius: 5px;
            cursor: move;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>MIR Enterprise</h1>

        <div class="buttons">
            <button class="btn btn-lab" onclick="showForm('lab')">KMC LAB</button>
            <button class="btn btn-pharma" onclick="showForm('pharma')">KMC Pharma</button>
        </div>

        <div id="labForm" class="login-form">
            <form method="post" action="login_system/login_action.php">
                <input type="hidden" name="system" value="lab">
                <input type="text" name="email" value="kmc@lab" readonly>
                <div class="password-container">
                    <input type="password" name="password" id="lab_password" placeholder="পাসওয়ার্ড" required>
                    <span class="eye-icon" onclick="togglePassword('lab_password')">👁️</span>
                </div>
                <button type="submit" class="btn-lab-submit">লগইন</button>
            </form>
        </div>

        <div id="pharmaForm" class="login-form">
            <form method="post" action="login_system/login_action.php">
                <input type="hidden" name="system" value="pharma">
                <input type="text" name="email" value="kmc@pharma" readonly>
                <div class="password-container">
                    <input type="password" name="password" id="pharma_password" placeholder="পাসওয়ার্ড" required>
                    <span class="eye-icon" onclick="togglePassword('pharma_password')">👁️</span>
                </div>
                <button type="submit" class="btn-pharma-submit">লগইন</button>
            </form>
        </div>

        <div class="error">
            <?php if (isset($_GET['error'])) echo "ভুল পাসওয়ার্ড"; ?>
        </div>
    </div>

    <div class="admin-slider" id="adminSlider" draggable="true" ondragend="checkSlide()">admin</div>

    <script>
        function showForm(system) {
            document.getElementById('labForm').style.display = 'none';
            document.getElementById('pharmaForm').style.display = 'none';
            document.getElementById(system + 'Form').style.display = 'block';
        }

        function togglePassword(id) {
            var field = document.getElementById(id);
            field.type = (field.type === 'password') ? 'text' : 'password';
        }

        function checkSlide() {
            var slider = document.getElementById('adminSlider');
            var mir = document.querySelector('h1');
            if (slider.getBoundingClientRect().left < mir.getBoundingClientRect().right) {
                window.location.href = "admin_system/admin_login.php";
            }
        }
    </script>
</body>
</html>