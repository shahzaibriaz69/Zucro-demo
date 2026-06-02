<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

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
        $stmt = $pdo->prepare("SELECT * FROM admin_users WHERE username = ?");
        $stmt->execute([$username]);
        $user = $stmt->fetch();

        if ($user && $password === $user['password']) {
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
        /* Base Setup & Premium Space Background */
        body {
            background-color: #030712;
            color: #FFFFFF;
            font-family: 'Segoe UI', system-ui, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            overflow: hidden;
            position: relative;
        }

        body::before {
            content: '';
            position: absolute;
            width: 100%;
            height: 100%;
            background-image: radial-gradient(rgba(6, 182, 212, 0.04) 1px, transparent 0);
            background-size: 32px 32px;
            z-index: 1;
        }

        /* ----------------------------------------------------
           🤖 CARTOON SHUTTER OVERLAY ANIMATION
        ---------------------------------------------------- */
        .shutter-container {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            display: flex;
            flex-direction: column;
            z-index: 999;
            pointer-events: none;
        }

        /* Split Shutter Plates */
        .shutter-plate {
            width: 100%;
            height: 50vh;
            background: #0B1329;
            display: flex;
            justify-content: center;
            align-items: flex-end;
            position: relative;
            transition: transform 1s cubic-bezier(0.85, 0, 0.15, 1);
            border-bottom: 2px solid #06B6D4;
        }

        .shutter-plate.bottom {
            align-items: flex-start;
            border-bottom: none;
            border-top: 2px solid #FF6A00;
        }

        /* The Cartoon Mascot Character */
        .cartoon-mascot {
            position: absolute;
            bottom: -65px;
            left: 50%;
            transform: translateX(-50%);
            width: 130px;
            height: 130px;
            z-index: 1000;
            text-align: center;
            animation: characterBounce 2s infinite ease-in-out;
            transition: all 0.5s ease;
        }

        /* Mascot Head & Face Layout */
        .mascot-head {
            width: 90px;
            height: 80px;
            background: linear-gradient(135deg, #06B6D4, #0891B2);
            border-radius: 24px;
            margin: 0 auto;
            position: relative;
            box-shadow: 0 8px 20px rgba(6, 182, 212, 0.3), inset 0 4px 8px rgba(255, 255, 255, 0.2);
            display: flex;
            justify-content: center;
            align-items: center;
            gap: 12px;
            border: 3px solid #030712;
        }

        /* Animated Glowing Tech Eyes */
        .mascot-eye {
            width: 16px;
            height: 16px;
            background: #FFF;
            border-radius: 50%;
            box-shadow: 0 0 10px #FFF, 0 0 20px #06B6D4;
            animation: mascotBlink 4s infinite linear;
        }

        /* Cute Robot Ears/Antennas */
        .mascot-head::before,
        .mascot-head::after {
            content: '';
            position: absolute;
            top: 25px;
            width: 10px;
            height: 20px;
            background: #FF6A00;
            border-radius: 4px;
        }

        .mascot-head::before {
            left: -11px;
            border-radius: 6px 0 0 6px;
        }

        .mascot-head::after {
            right: -11px;
            border-radius: 0 6px 6px 0;
        }

        /* Mascot Custom Hands grabbing the gate line */
        .mascot-hand {
            position: absolute;
            bottom: 25px;
            width: 22px;
            height: 22px;
            background: #FF6A00;
            border-radius: 50%;
            border: 3px solid #030712;
            box-shadow: 0 4px 10px rgba(255, 106, 0, 0.4);
        }

        .mascot-hand.left {
            left: 2px;
            animation: pullLeftHand 1s forwards;
        }

        .mascot-hand.right {
            right: 2px;
            animation: pullRightHand 1s forwards;
        }

        /* TRIGGER TRIGGER KEYFRAMES */
        @keyframes characterBounce {

            0%,
            100% {
                transform: translateX(-50%) translateY(0);
            }

            50% {
                transform: translateX(-50%) translateY(-6px);
            }
        }

        @keyframes mascotBlink {

            0%,
            45%,
            55%,
            100% {
                transform: scaleY(1);
            }

            50% {
                transform: scaleY(0.1);
            }
        }

        /* TRIGGER SHUTTER PULL LIFT TIMINGS */
        .shutter-container.active .shutter-plate.top {
            transform: translateY(-100%);
        }

        .shutter-container.active .shutter-plate.bottom {
            transform: translateY(100%);
        }

        .shutter-container.active .cartoon-mascot {
            opacity: 0;
            transform: translateX(-50%) scale(0.5);
        }

        /* ----------------------------------------------------
           👑 THE PREMIUM CARD LAYOUT (Matches image_5650cd.png)
        ---------------------------------------------------- */
        .ambient-glow-1 {
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(6, 182, 212, 0.1) 0%, transparent 70%);
            top: 20%;
            left: 25%;
            z-index: 1;
            filter: blur(40px);
        }

        .ambient-glow-2 {
            position: absolute;
            width: 400px;
            height: 400px;
            background: radial-gradient(circle, rgba(255, 106, 0, 0.06) 0%, transparent 70%);
            bottom: 20%;
            right: 25%;
            z-index: 1;
            filter: blur(40px);
        }

        .login-card-wrapper {
            position: relative;
            padding: 1px;
            border-radius: 20px;
            overflow: hidden;
            background: rgba(255, 255, 255, 0.04);
            z-index: 2;
            box-shadow: 0 30px 70px rgba(0, 0, 0, 0.7);
        }

        .login-card-wrapper::before {
            content: '';
            position: absolute;
            top: -50%;
            left: -50%;
            width: 200%;
            height: 200%;
            background: conic-gradient(transparent, rgba(6, 182, 212, 0.3), transparent, rgba(255, 106, 0, 0.3), transparent);
            animation: rotateLaser 6s linear infinite;
            z-index: 0;
        }

        @keyframes rotateLaser {
            100% {
                transform: rotate(360deg);
            }
        }

        .login-card {
            position: relative;
            z-index: 1;
            background: rgba(10, 15, 30, 0.85);
            backdrop-filter: blur(25px);
            -webkit-backdrop-filter: blur(25px);
            padding: 3rem 2.5rem;
            border-radius: 19px;
            width: 380px;
            box-sizing: border-box;
        }

        .center-wrapper {
            text-align: center;
            margin-bottom: 2.2rem;
        }

        .gate-badge {
            font-size: 0.68rem;
            text-transform: uppercase;
            letter-spacing: 0.12em;
            color: #06B6D4;
            background: rgba(6, 182, 212, 0.06);
            padding: 0.4rem 1.2rem;
            border-radius: 30px;
            display: inline-block;
            margin-bottom: 0.8rem;
            border: 1px solid rgba(6, 182, 212, 0.15);
            font-weight: 700;
        }

        h2 {
            margin: 0;
            font-size: 2rem;
            font-weight: 800;
            letter-spacing: -0.03em;
            background: linear-gradient(135deg, #FFFFFF 40%, #9CA3AF 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .subtitle-tracker {
            font-size: 0.78rem;
            color: #6B7280;
            margin-top: 0.4rem;
            font-family: monospace;
        }

        /* Input Customizations */
        .form-group {
            margin-bottom: 1.6rem;
            position: relative;
        }

        label {
            display: block;
            font-size: 0.7rem;
            color: #9CA3AF;
            margin-bottom: 0.6rem;
            font-weight: 700;
            letter-spacing: 0.08em;
            text-transform: uppercase;
        }

        .input-wrapper {
            position: relative;
        }

        .input-wrapper i {
            position: absolute;
            left: 1.1rem;
            top: 50%;
            transform: translateY(-50%);
            color: #4B5563;
            font-size: 0.95rem;
            transition: color 0.3s ease;
        }

        .form-control {
            width: 100%;
            padding: 1rem 1rem 1rem 2.8rem;
            background: rgba(3, 7, 18, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.05);
            border-radius: 10px;
            color: white;
            box-sizing: border-box;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            outline: none;
            border-color: rgba(6, 182, 212, 0.5);
            background: rgba(2, 6, 14, 0.9);
            box-shadow: 0 0 20px rgba(6, 182, 212, 0.08);
        }

        .form-control:focus+i {
            color: #06B6D4;
        }

        /* Premium Initialize Button */
        .btn-login {
            position: relative;
            background: linear-gradient(90deg, #0284c7, #FF6A00);
            color: white;
            border: none;
            width: 100%;
            padding: 1.05rem;
            font-weight: 700;
            font-size: 0.9rem;
            letter-spacing: 0.06em;
            border-radius: 10px;
            cursor: pointer;
            margin-top: 0.8rem;
            text-transform: uppercase;
            box-shadow: 0 4px 20px rgba(255, 106, 0, 0.15);
            transition: all 0.4s cubic-bezier(0.16, 1, 0.3, 1);
        }

        .btn-login:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(255, 106, 0, 0.3), 0 0 20px rgba(6, 182, 212, 0.2);
            filter: brightness(1.1);
        }

        .error-box {
            background: rgba(239, 68, 68, 0.05);
            border: 1px solid rgba(239, 68, 68, 0.3);
            color: #FCA5A5;
            padding: 0.9rem 1.1rem;
            border-radius: 10px;
            font-size: 0.85rem;
            margin-bottom: 1.5rem;
            display: flex;
            align-items: center;
            gap: 0.6rem;
        }
    </style>
</head>

<body>

    <div class="shutter-container" id="shutterGate">
        <div class="shutter-plate top">
            <div class="cartoon-mascot">
                <div class="mascot-head">
                    <div class="mascot-eye"></div>
                    <div class="mascot-eye"></div>
                </div>
                <div class="mascot-hand left"></div>
                <div class="mascot-hand right"></div>
            </div>
        </div>
        <div class="shutter-plate bottom"></div>
    </div>

    <div class="ambient-glow-1"></div>
    <div class="ambient-glow-2"></div>

    <div class="login-card-wrapper">
        <div class="login-card">
            <div class="center-wrapper">
                <span class="gate-badge"><i class="fas fa-shield-alt"></i> Auth Network Core</span>
                <h2>Zucro Engine</h2>
                <p class="subtitle-tracker">Enter credentials to access the admin dashboard</p>
            </div>

            <?php if (!empty($error)): ?>
                <div class="error-box">
                    <i class="fas fa-satellite-dish" style="color: #EF4444;"></i>
                    <?php echo $error; ?>
                </div>
            <?php endif; ?>

            <form action="admin_login.php" method="POST">
                <div class="form-group">
                    <label>Operator Identity</label>
                    <div class="input-wrapper">
                        <input type="text" name="username" class="form-control" placeholder="Identify Code"
                            value="admin" required autocomplete="off">
                        <i class="fas fa-user-astronaut"></i>
                    </div>
                </div>

                <div class="form-group">
                    <label>Passkey Token</label>
                    <div class="input-wrapper">
                        <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                        <i class="fas fa-user-secret"></i>
                    </div>
                </div>

                <button type="submit" class="btn-login">🚀 Launch Engine</button>
            </form>
        </div>
    </div>

    <script>
        window.addEventListener('DOMContentLoaded', () => {

            setTimeout(() => {
                document.getElementById('shutterGate').classList.add('active');
            }, 600);
        });
    </script>

</body>

</html>