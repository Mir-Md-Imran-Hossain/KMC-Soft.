<?php
session_start();

if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    header("Location: ../login_common.php");
    exit();
}

include '../db_Setup/db.php';
?>
<!DOCTYPE html>
<html lang="bn">
<head>
    <meta charset="UTF-8">
    <title>রোগী সার্চ</title>
    <style>
        body { background: #E0F7FA; text-align: center; }
        input { padding: 10px; font-size: 18px; border: 1px solid #2196F3; }
        .popup { display: none; background: #fff; padding: 20px; border: 2px solid #FF0000; border-radius: 10px; margin: 20px auto; width: 300px; }
        table { margin: auto; border-collapse: collapse; }
        th, td { padding: 10px; border: 1px solid #ccc; }
    </style>
</head>
<body>
    <h1>রোগী সার্চ</h1>
    <input type="text" id="mobile" placeholder="মোবাইল নাম্বার" oninput="checkMobile(this.value)">
    <div id="popup" class="popup">ডুপ্লিকেট মোবাইল! <button onclick="addToFamily()">ফ্যামিলি অ্যাড করুন</button></div>
    <div id="results"></div>

    <script>
        function checkMobile(mobile) {
            if (mobile.length < 10) return;
            var xhr = new XMLHttpRequest();
            xhr.open("POST", "check_mobile.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onreadystatechange = function () {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    var response = JSON.parse(xhr.responseText);
                    if (response.duplicate) {
                        document.getElementById('popup').style.display = 'block';
                    } else {
                        document.getElementById('popup').style.display = 'none';
                    }
                    document.getElementById('results').innerHTML = response.table;
                }
            };
            xhr.send("mobile=" + mobile);
        }

        function addToFamily() {
            alert("ফ্যামিলি গ্রুপ অ্যাড করা হলো!");
            // পরে কোড অ্যাড করো
        }
    </script>
</body>
</html>