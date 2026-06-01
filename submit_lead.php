<?php
// submit_lead.php (Aapki Form Handling Code Matrix)
require_once 'db_config.php';

require 'vendor/autoload.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = strip_tags(trim($_POST['client_name'] ?? ''));
    $email = filter_var(trim($_POST['client_email'] ?? ''), FILTER_VALIDATE_EMAIL);
    $service = strip_tags(trim($_POST['service_selection'] ?? ''));
    $message = strip_tags(trim($_POST['client_message'] ?? ''));

    if (empty($name) || !$email || empty($service) || empty($message)) {
        header("Location: index.php?status=error#contact");
        exit;
    }

    try {
        // Database Entry Pipeline
        $sql = "INSERT INTO agency_leads (name, email, service, message) VALUES (:name, :email, :service, :message)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'name' => $name,
            'email' => $email,
            'service' => $service,
            'message' => $message
        ]);

        // PHPMailer System Setup
        $mail = new PHPMailer(true);

        // 🛠️ FIX 1: Character Encoding Setup (Emoji Bug Fix)
        $mail->CharSet = 'UTF-8';

        // Server Settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'zucroexperts@gmail.com';
        $mail->Password = 'ohkc dqrk dxyl ybaj';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Routing Parameters
        $mail->setFrom('zucroexperts@gmail.com', 'Zucro Experts Web');
        $mail->addAddress('zucroexperts@gmail.com');

        // Email Content Setup
        $mail->isHTML(true);
        $mail->Subject = "🚀 New Lead Acquired: " . $name;

        // 🛠️ FIX 2: Premium Navy & Light Blue Dynamic Template
        $mail->Body = "
            <div style='font-family: Arial, sans-serif; padding: 20px; background-color: #f1f5f9; margin: 0;'>
                <div style='max-width: 550px; margin: 0 auto; background-color: #ffffff; padding: 28px; border-radius: 16px; border-top: 6px solid #0f172a; border-bottom: 4px solid #06b6d4; box-shadow: 0 10px 15px -3px rgba(0,0,0,0.05);'>
                    
                    <div style='margin-bottom: 24px;'>
                        <span style='font-size: 10px; text-transform: uppercase; color: #06b6d4; font-weight: 800; letter-spacing: 0.1em; background-color: rgba(6,182,212,0.08); padding: 4px 10px; border-radius: 9999px;'>Strategy Inbound</span>
                        <h2 style='color: #0f172a; margin-top: 10px; margin-bottom: 0; font-size: 22px; font-weight: 800; letter-spacing: -0.5px;'>Evaluation Parameter Deployed</h2>
                        <p style='color: #64748b; font-size: 13px; margin-top: 4px; margin-bottom: 0;'>A potential client has requested a professional growth audit routing.</p>
                    </div>
                    
                    <hr style='border: 0; border-top: 1px solid #e2e8f0; margin: 20px 0;'>
                    
                    <div style='margin-bottom: 16px;'>
                        <span style='font-size: 10px; text-transform: uppercase; color: #94a3b8; font-weight: 700; display: block; letter-spacing: 0.05em; margin-bottom: 3px;'>Client Framework Identity</span>
                        <span style='font-size: 15px; color: #0f172a; font-weight: 700;'>{$name}</span>
                    </div>
                    
                    <div style='margin-bottom: 16px;'>
                        <span style='font-size: 10px; text-transform: uppercase; color: #94a3b8; font-weight: 700; display: block; letter-spacing: 0.05em; margin-bottom: 3px;'>Secure Business Email</span>
                        <span style='font-size: 14px;'><a href='mailto:{$email}' style='color: #06b6d4; text-decoration: none; font-weight: 600;'>{$email}</a></span>
                    </div>
                    
                    <div style='margin-bottom: 16px;'>
                        <span style='font-size: 10px; text-transform: uppercase; color: #94a3b8; font-weight: 700; display: block; letter-spacing: 0.05em; margin-bottom: 3px;'>Target Operations Unit</span>
                        <span style='font-size: 12px; color: #ffffff; background-color: #0f172a; padding: 4px 10px; border-radius: 6px; display: inline-block; font-weight: 600; margin-top: 2px;'>{$service}</span>
                    </div>
                    
                    <div style='margin-bottom: 10px;'>
                        <span style='font-size: 10px; text-transform: uppercase; color: #94a3b8; font-weight: 700; display: block; letter-spacing: 0.05em; margin-bottom: 5px;'>Project Requirements Matrix</span>
                        <div style='font-size: 13px; color: #334155; line-height: 1.6; background-color: #f8fafc; padding: 14px; border-radius: 10px; border: 1px solid #e2e8f0; white-space: pre-line; font-style: italic;'>\"{$message}\"</div>
                    </div>
                    
                    <hr style='border: 0; border-top: 1px solid #e2e8f0; margin: 24px 0;'>
                    
                    <p style='font-size: 10px; color: #94a3b8; text-align: center; margin-bottom: 0; font-family: monospace; letter-spacing: 0.05em;'>Zucro Experts Web Routing Security System</p>
                </div>
            </div>
        ";

        $mail->send();

        header("Location: index.php?status=success#contact");
        exit;

    } catch (Exception $e) {
        header("Location: index.php?status=mail_error#contact");
        exit;
    }
} else {
    header("Location: index.php");
    exit;
}
?>