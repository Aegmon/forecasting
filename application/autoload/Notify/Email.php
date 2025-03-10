<?php

require 'PHPMailer\PHPMailer.php';
require 'PHPMailer\Exception.php';
require 'PHPMailer\SMTP.php';

class Notify_Email
{
    protected $contents;
    protected $values = [];

    public static function _init()
    {
        global $config;
        $sysEmail = $config['sysEmail'];
        $sysCompany = $config['CompanyName'];
        $mail = new PHPMailer();
        $mail->CharSet = 'UTF-8';
        $mail->SetFrom($sysEmail, $sysCompany);
        $mail->AddReplyTo($sysEmail, $sysCompany);
        return $mail;
    }

    public static function _log($userid, $email, $subject, $message, $iid = '0')
    {
        $date = date('Y-m-d H:i:s');
        $d = ORM::for_table('sys_email_logs')->create();
        $d->userid = $userid;
        $d->sender = '';
        $d->email = $email;
        $d->subject = $subject;
        $d->message = $message;
        $d->date = $date;
        $d->iid = $iid;
        $d->save();
        $id = $d->id();
        return $id;
    }

    public static function _send($fullname, $email, $subject, $message)
    {
        // Initialize PHPMailer
        $mail = new PHPMailer(true);

        try {
            // Set up SMTP
            $mail->isSMTP();  // Use SMTP
            $mail->Host = 'smtp.gmail.com';  // Set Gmail SMTP server
            $mail->SMTPAuth = true;  // Enable SMTP authentication
            $mail->Username = 'krmusngi26@gmail.com';  // Your Gmail address
            $mail->Password = 'gpnyinrhuhcmqvds';  // Your Gmail App Password (not the regular password)
            $mail->SMTPSecure = 'ssl';  // Enable SSL encryption
            $mail->Port = 465;  // Gmail's SMTP port for SSL

            // Optional: disable SSL certificate verification (for testing only, not for production)
            // $mail->SMTPOptions = array(
            //     'ssl' => array(
            //         'verify_peer' => false,
            //         'verify_peer_name' => false,
            //         'allow_self_signed' => true
            //     )
            // );

            // Set email headers and body
            $mail->setFrom('krmusngi26@gmail.com', 'Financial Forecasting');  // Set sender's email
            $mail->addReplyTo('krmusngi26@gmail.com', 'Financial Forecasting');  // Add reply-to address

            // Add recipient
            $mail->addAddress($email, $fullname);  // Add recipient email

            // Email subject and body
            $mail->Subject = $subject;
            $mail->Body    = $message;  // Set the email body
            $mail->isHTML(true);  // Enable HTML content if needed

            // Send the email
            $mail->send();
            return true; // Email sent successfully
        } catch (Exception $e) {
            // Handle error if sending email fails
            echo 'Mailer Error: ' . $mail->ErrorInfo;
            return false; // Failed to send email
        }
    }

    public static function _test()
    {
        // Sender email address
        $from = "dhvsupythonproject123@gmail.com";
        
        // Recipient email address
        $to = "";
        
        // Email subject
        $subject = "Password Reset";
        
        // Email body with the reset link
        $message = "
           text email
        ";
        
        // Headers for HTML email
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= "From:" . $from;

        // Send the email
        if (mail($to, $subject, $message, $headers)) {
            echo '<script>alert("Link was sent to your email for password reset")</script>';
        } else {
            echo '<script>alert("Error: Unable to send email.")</script>';
        }
    }

    public static function _otp($otp, $name, $email)
    {
        $mail = self::_init();
        global $config;

        $sysCompany = $config['CompanyName'];
        $mail_subject = $sysCompany . ' OTP (One Time Password)';

        $body =
            'Your ' .
            $sysCompany .
            ' password has been verified and OTP is required to proceed further. Your current session OTP is ' .
            $otp .
            ' and only valid for this session. If you didn\'t login, please contact us immediately.';
        $mail->AddAddress($email, $name);
        $mail->Subject = $mail_subject;
        $mail->MsgHTML($body);
        $mail->Send();
    }
}
