<?php

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
    $from = "dhvsupythonproject123@gmail.com"; // Your sending email address

    // Headers for HTML email
    $headers = "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
    $headers .= "From: " . $from . "\r\n";

    // Send the email
    if (mail($email, $subject, $message, $headers)) {
        return true; // Email sent successfully
    } else {
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
