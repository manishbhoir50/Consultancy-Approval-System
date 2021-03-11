<?php
 require 'PHPMailerAutoload.php';
 define('EMAIL', 'internshipapprovalrait@gmail.com');
    define('PASS', 'Internship@123');
function sendMail($email, $subject, $body){
    // Instantiation and passing `true` enables exceptions
    $mail = new PHPMailer;

    try {
        //Server settings
        $mail->SMTPDebug = 0;                      // Enable verbose debug output
        $mail->isSMTP();                                            // Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                    // Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
        $mail->Username   = EMAIL;                     // SMTP username
        $mail->Password   = PASS;                               // SMTP password
        $mail->SMTPSecure = 'tls';         // Enable TLS encryption; `PHPMailer::ENCRYPTION_SMTPS` encouraged
        $mail->Port       = 587;                                    // TCP port to connect to, use 465 for `PHPMailer::ENCRYPTION_SMTPS` above

        //Recipients
        $mail->setFrom(EMAIL, 'internshipapprovalrait@gmail.com');
        $mail->addAddress($email);     // Add a recipient
       // $mail->addAddress('');               // Name is optional
        $mail->addReplyTo(EMAIL);
        /*$mail->addCC('cc@example.com');
        $mail->addBCC('bcc@example.com');

        // Attachments
        $mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
        $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); */   // Optional name

        // Content
        $mail->isHTML(true);                                  // Set email format to HTML
        $mail->Subject = $subject;
        $mail->Body    = $body;
        $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}
?>