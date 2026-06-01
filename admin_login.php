<?php
// admin_login.php
session_start();

if (isset($_SESSION['admin_logged_in'])) {
    header("Location: admin_dashboard.php");
    exit;
}

$error = '';
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);


    if ($username === 'admin' && $password === 'admin123') {
        $_SESSION['admin_logged_in'] = true;
        $_SESSION['admin_user'] = 'Shahzaib Riaz';
        header("Location: admin_dashboard.php");
        exit;
    } else {
        $error = 'Invalid authentication parameters.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zucro Experts | Admin Gate</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body style="margin:0; padding:0;">
    <div class="auth-wrapper">
        <div class="auth-card">
            <div style="text-align: center; margin-bottom: 2rem;">
                <span class="auth-badge">Secure Routing Gate</span>
                <h2 style="font-size: 24px; font-weight: 800; color:#fff; margin-top: 12px; margin-bottom: 0;">Zucro
                    Core Engine</h2>
            </div>

            <?php if ($error): ?>
                <div class="auth-alert-error">
                    <i class="fas fa-circle-exclamation"></i> <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form action="" method="POST">
                <div class="form-input-group">
                    <label class="field-label">System Operator Identity</label>
                    <input type="text" name="username" required class="system-text-field" placeholder="Username">
                </div>
                <div class="form-input-group">
                    <label class="field-label">Access Passkey Token</label>
                    <input type="password" name="password" required class="system-text-field" placeholder="••••••••">
                </div>
                <button type="submit" class="btn-auth-deploy">Deploy Session Authenticator</button>
            </form>
        </div>
    </div>
</body>

</html>