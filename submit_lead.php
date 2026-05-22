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
        $mail->Username = 'zucroexperts@gmail.com'; // 👈 Apni Gmail Id yahan likhein
        $mail->Password = 'xxxx xxxx xxxx xxxx';   // 👈 Gmail ka 16-digit App Password yahan paste karein
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;


        $mail->setFrom('zucroexperts@gmail.com', 'Zucro Experts System');
        $mail->addAddress('zucroexperts@gmail.com'); // 👈 Jahan aapko notification chahiye (Aapki apni email)

        // Email Content (HTML Template)
        $mail->isHTML(true);
        $mail->Subject = "🚀 New Lead Acquired: " . $name;


        $mail->Body = "
            <div style='font-family: Arial, sans-serif; padding: 20px; background-color: #f4f4f4;'>
                <div style='max-width: 600px; margin: 0 auto; background-color: #ffffff; padding: 30px; border-radius: 8px; border-top: 4px solid #FF6A00;'>
                    <h2 style='color: #111111; margin-top: 0;'>New Strategy Evaluation Request</h2>
                    <p style='color: #555555;'>A potential client has deployed a contact parameter from the website.</p>
                    <hr style='border: 0; border-top: 1px solid #eeeeee; margin: 20px 0;'>
                    <table style='width: 100%; border-collapse: collapse;'>
                        <tr>
                            <td style='padding: 8px 0; color: #777777; width: 30%; font-weight: bold;'>Client Name:</td>
                            <td style='padding: 8px 0; color: #333333;'>{$name}</td>
                        </tr>
                        <tr>
                            <td style='padding: 8px 0; color: #777777; font-weight: bold;'>Business Email:</td>
                            <td style='padding: 8px 0; color: #333333;'><a href='mailto:{$email}'>{$email}</a></td>
                        </tr>
                        <tr>
                            <td style='padding: 8px 0; color: #777777; font-weight: bold;'>Selected Service:</td>
                            <td style='padding: 8px 0; color: #333333; font-weight: bold; color: #FF6A00;'>{$service}</td>
                        </tr>
                        <tr>
                            <td style='padding: 8px 0; color: #777777; font-weight: bold; vertical-align: top;'>Requirements:</td>
                            <td style='padding: 8px 0; color: #333333; line-height: 1.5;'>{$message}</td>
                        </tr>
                    </table>
                    <hr style='border: 0; border-top: 1px solid #eeeeee; margin: 20px 0;'>
                    <p style='font-size: 11px; color: #999999; text-align: center; margin-bottom: 0;'>Zucro Experts Automated Routing System</p>
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