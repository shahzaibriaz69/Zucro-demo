<?php

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

        $sql = "INSERT INTO agency_leads (name, email, service, message) VALUES (:name, :email, :service, :message)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'name' => $name,
            'email' => $email,
            'service' => $service,
            'message' => $message
        ]);


        $mail = new PHPMailer(true);


        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'zucroexperts@gmail.com';
        $mail->Password = 'ohkc dqrk dxyl ybaj';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;


        $mail->setFrom('zucroexperts@gmail.com', 'Zucro Experts Web');
        $mail->addAddress('zucroexperts@gmail.com');


        $mail->isHTML(true);
        $mail->Subject = "🚀 New Lead Acquired: " . $name;

        $mail->Body = "
            <div style='font-family: Arial, sans-serif; padding: 15px; background-color: #f4f4f4; margin: 0;'>
                <div style='max-width: 550px; margin: 0 auto; background-color: #ffffff; padding: 24px; border-radius: 12px; border-top: 5px solid #FF6A00; box-shadow: 0 4px 6px rgba(0,0,0,0.05);'>
                    
                    <h2 style='color: #111111; margin-top: 0; font-size: 20px; font-weight: 800; letter-spacing: -0.5px;'>New Strategy Evaluation Request</h2>
                    <p style='color: #64748b; font-size: 13px; line-height: 1.5; margin-bottom: 20px;'>A potential client has deployed a contact parameter from the website.</p>
                    
                    <hr style='border: 0; border-top: 1px solid #e2e8f0; margin: 16px 0;'>
                    
                    <div style='margin-bottom: 14px;'>
                        <span style='font-size: 11px; text-transform: uppercase; color: #94a3b8; font-weight: bold; display: block; margin-bottom: 2px;'>Client Name</span>
                        <span style='font-size: 14px; color: #0f172a; font-weight: 600;'>{$name}</span>
                    </div>
                    
                    <div style='margin-bottom: 14px;'>
                        <span style='font-size: 11px; text-transform: uppercase; color: #94a3b8; font-weight: bold; display: block; margin-bottom: 2px;'>Business Email</span>
                        <span style='font-size: 14px; color: #0f172a;'><a href='mailto:{$email}' style='color: #22d3ee; text-decoration: none; font-weight: 500;'>{$email}</a></span>
                    </div>
                    
                    <div style='margin-bottom: 14px;'>
                        <span style='font-size: 11px; text-transform: uppercase; color: #94a3b8; font-weight: bold; display: block; margin-bottom: 2px;'>Selected Service</span>
                        <span style='font-size: 13px; color: #FF6A00; font-weight: 700; background-color: rgba(255,106,0,0.06); padding: 3px 8px; border-radius: 4px; display: inline-block; margin-top: 2px;'>{$service}</span>
                    </div>
                    
                    <div style='margin-bottom: 10px;'>
                        <span style='font-size: 11px; text-transform: uppercase; color: #94a3b8; font-weight: bold; display: block; margin-bottom: 4px;'>Requirements Matrix</span>
                        <div style='font-size: 13px; color: #334155; line-height: 1.6; background-color: #f8fafc; padding: 12px; border-radius: 8px; border: 1px solid #edf2f7; white-space: pre-line;'>{$message}</div>
                    </div>
                    
                    <hr style='border: 0; border-top: 1px solid #e2e8f0; margin: 20px 0;'>
                    
                    <p style='font-size: 10px; color: #94a3b8; text-align: center; margin-bottom: 0; font-family: monospace;'>Zucro Experts Automated Routing System</p>
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