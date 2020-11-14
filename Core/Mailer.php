<?php
// Import PHPMailer classes into the global namespace
// These must be at the top of your script, not inside a function
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
    require '../vendor/autoload.php';
    require_once '../config.php';

// Instantiation and passing `true` enables exceptions
    function sendEmail(string $receiver, string $subject, string $message)
    {
        $mail = new PHPMailer(true);

        try {
            //Server settings
            $mail->SMTPDebug = $_ENV['APP_MAILER_DEBUG'];                      // Enable verbose debug output
            $mail->isSMTP();                                            // Send using SMTP
            $mail->Host = $_ENV['APP_MAILER_HOST'];                    // Set the SMTP server to send through
            $mail->SMTPAuth = $_ENV['APP_MAILER_SMTPAUTH'];                                   // Enable SMTP authentication
            $mail->Username = $_ENV['APP_MAILER_USERNAME'];                     // SMTP username
            $mail->Password = $_ENV['APP_MAILER_PASSWORD'];                               // SMTP password
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
            $mail->Port = $_ENV['APP_MAILER_PORT'];                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

            //Recipients
            $mail->setFrom($_ENV['APP_MAILER_FROM'], $_ENV['APP_MAILER_FROM_NAME']);
            $mail->addAddress($receiver);     // Add a recipient

            // Content
            $mail->isHTML(true);                                  // Set email format to HTML
            $mail->Subject = $subject;
            $mail->Body = $message;
            $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

            $mail->send();

        } catch (Exception $e) {
//            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    }

