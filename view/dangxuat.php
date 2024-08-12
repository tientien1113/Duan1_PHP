<?php
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}

// Xóa toàn bộ session
session_unset();
session_destroy();

// Chuyển hướng về trang chủ hoặc trang đăng nhập nếu muốn
header("Location: http://localhost/webthoitrang_DAO/index.php");
exit();
?>
