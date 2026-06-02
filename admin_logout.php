<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// 1. Session clear aur destroy karein
$_SESSION = array();

if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params["path"],
        $params["domain"],
        $params["secure"],
        $params["httponly"]
    );
}

session_destroy();

// 2. Direct home page (index.php) par redirect karein
header("Location: index.php");
exit();