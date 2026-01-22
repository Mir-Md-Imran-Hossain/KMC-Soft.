<?php
session_start();
session_destroy();
header("Location: ../login_common.php");
exit();
?>