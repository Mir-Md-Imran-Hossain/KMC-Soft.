<?php
session_start();

if (isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) {
    header("Location: ../" . strtolower($_SESSION['system']) . "_dashboard.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>কামরুন্নাহার মেডিকেল সেন্টার - লগইন</title>
    <style>
        body { background: #E0F7FA; font-family: sans-serif; text-align: center; }
        .container { background: white; padding: 20px; border-radius: 10px; max-width: 400px; margin: 100px auto; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        .logo { width: 300px; height: auto; }
        h1 { color: #FF0000; font-size: 28px; font-weight: bold; }
        .slogan { color: #000000; font-size: 18px; font-style: italic; }
        .buttons { margin: 20px 0; }
        .btn { padding: 10px; font-size: 16px; color: white; border: none; cursor: pointer; width: 100%; margin-bottom: 10px; border-radius: 5px; }
        .btn-lab { background: #2196F3; }
        .btn-pharma { background: #4CAF50; }
        .login-form { display: none; margin-top: 20px; }
        input { width: 100%; padding: 10px; margin-bottom: 10px; border: 1px solid #ccc; border-radius: 5px; }
        .eye-icon { position: relative; top: -35px; right: -10px; cursor: pointer; }
        .error { color: #FF0000; font-size: 14px; margin: 10px 0; }
    </style>
</head>
<body>
    <div class="container">
        <img src="../documents/KMC LOGO TB..svg" alt="লোগো" class="logo">
        <h1>কামরুন্নাহার মেডিকেল সেন্টার<br>Kamrunnahar Medical Center</h1>
        <p class="slogan">আমাদের সেবার মান-ই আমাদের পরিচয়</p>

        <div class="buttons">
            <button class="btn btn-lab" onclick="showLogin('Lab')">KMC LAB লগইন</button>
            <button class="btn btn-pharma" onclick="showLogin('Pharma')">KMC Pharma লগইন</button>
        </div>

        <div class="login-form" id="loginForm">
            <form action="login_action.php" method="POST">
                <input type="hidden" name="system" id="system">

                <select name="role" required>
                    <option value="">রোল সিলেক্ট করুন</option>
                    <option value="Admin">Admin</option>
                    <option value="Manager">Manager</option>
                    <option value="Counter">Counter</option>
                    <option value="Lab">Lab Technologist</option>
                    <option value="Doctor">Doctor</option>
                </select>

                <input type="email" name="email" placeholder="ইমেইল" required>

                <input type="password" name="password" id="password" placeholder="পাসওয়ার্ড" required>
                <span class="eye-icon" onclick="togglePassword()">👁️</span>

                <button type="submit" class="btn">লগইন</button>

                <div class="error">
                    <?php if (isset($_GET['error'])) echo "ভুল ইমেইল বা পাসওয়ার্ড"; ?>
                </div>
            </form>
        </div>
    </div>

    <script>
        function showLogin(system) {
            document.getElementById('system').value = system;
            document.getElementById('loginForm').style.display = 'block';
        }

        function togglePassword() {
            var pass = document.getElementById('password');
            pass.type = (pass.type === 'password') ? 'text' : 'password';
        }

        <?php if (isset($_GET['error'])) echo "document.getElementById('loginForm').style.display = 'block';"; ?>
    </script>
</body>
</html>