<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Agar pehle se logged in hai toh direct dashboard par bhej do
if (isset($_SESSION['admin_logged_in']) && $_SESSION['admin_logged_in'] === true) {
    header("Location: admin_dashboard.php");
    exit();
}

require_once 'db_config.php';
$error = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (!empty($username) && !empty($password)) {
        // Database se user check karna
        $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        // Plain text password validation
        if ($user && $password === $user['password']) {
            // Session variables set karna
            $_SESSION['admin_logged_in'] = true;
            $_SESSION['admin_username'] = $user['username'];

            header("Location: admin_dashboard.php");
            exit();
        } else {
            $error = "Invalid username or password token.";
        }
    } else {
        $error = "Please fill all fields.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zucro Core Engine - Secure Login</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            background-color: #0B111E;
            color: #FFFFFF;
            font-family: 'Segoe UI', sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .login-card {
            background: rgba(255, 255, 255, 0.03);
            border: 1px solid rgba(255, 255, 255, 0.08);
            padding: 2.5rem;
            border-radius: 12px;
            width: 100%;
            max-width: 400px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.3);
        }

        .gate-badge {
            text-align: center;
            font-size: 0.75rem;
            text-transform: uppercase;
            letter-spacing: 0.05em;
            color: #FF6A00;
            background: rgba(255, 106, 0, 0.1);
            padding: 0.25rem 0.75rem;
            border-radius: 20px;
            display: inline-block;
            margin: 0 auto 1rem auto;
        }

        .center-wrapper {
            text-align: center;
        }

        h2 {
            margin: 0 0 1.5rem 0;
            font-size: 1.75rem;
            font-weight: 800;
        }

        .error-box {
            background: rgba(239, 68, 68, 0.1);
            border: 1px solid #EF4444;
            color: #FCA5A5;
            padding: 0.75rem;
            border-radius: 6px;
            font-size: 0.85rem;
            margin-bottom: 1.25rem;
        }

        .form-group {
            margin-bottom: 1.25rem;
        }

        label {
            display: block;
            font-size: 0.75rem;
            color: #9CA3AF;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }

        .form-control {
            width: 100%;
            padding: 0.75rem;
            background: rgba(0, 0, 0, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.08);
            border-radius: 6px;
            color: white;
            box-sizing: border-box;
        }

        .form-control:focus {
            outline: none;
            border-color: #FF6A00;
        }

        .btn-login {
            background: linear-gradient(90deg, #06B6D4, #FF6A00);
            color: white;
            border: none;
            width: 100%;
            padding: 0.8rem;
            font-weight: 700;
            border-radius: 6px;
            cursor: pointer;
            margin-top: 0.5rem;
        }
    </style>
</head>

<body>

    <div class="login-card">
        <div class="center-wrapper">
            <span class="gate-badge">Secure Routing Gate</span>
            <h2>Zucro Core Engine</h2>
        </div>

        <?php if (!empty($error)): ?>
            <div class="error-box"><i class="fas fa-exclamation-circle"></i> <?php echo $error; ?></div>
        <?php endif; ?>

        <form action="admin_login.php" method="POST">
            <div class="form-group">
                <label>SYSTEM OPERATOR IDENTITY</label>
                <input type="text" name="username" class="form-control" placeholder="admin" required>
            </div>
            <div class="form-group">
                <label>ACCESS PASSKEY TOKEN</label>
                <input type="password" name="password" class="form-control" placeholder="••••••••" required>
            </div>
            <button type="submit" class="btn-login">Deploy Session Authenticator</button>
        </form>
    </div>

</body>

</html>