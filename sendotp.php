<?php
// send_otp.php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

    require 'PHPMailer/src/PHPMailer.php';
    require 'PHPMailer/src/Exception.php';
    require 'PHPMailer/src/SMTP.php';

// require 'vendor/autoload.php'; // Path to autoload.php from PHP Mailer

session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form submission
    $email = $_POST['email'];

    // Validate email (you might want to add more validation here)
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "Invalid email format";
        exit;
    }

    // Generate a random OTP (6-digit number)
    $otp = mt_rand(100000, 999999);

    // Store OTP in session (for verification later)
    $_SESSION['otp'] = $otp;
    $_SESSION['email'] = $email;

    // Send the OTP to the user's email using PHP Mailer
    $mail = new PHPMailer(true);

    try {
        //Server settings
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; // Specify your SMTP server
        $mail->SMTPAuth = true;
        $mail->Username = 'emails.laurel@gmail.com'; // SMTP username
        $mail->Password = 'osanrctuzxqoyhog'; // SMTP password
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption
        $mail->Port = 587; // TCP port to connect to

        //Recipients
        $mail->setFrom('emails.laurel@gmail.com', 'Laurel Technologies'); // Replace with sender's email and name
        $mail->addAddress($email); // Add a recipient

        // Content
        $mail->isHTML(true); // Set email format to HTML
        $mail->Subject = 'Forgot Password OTP';
        $mail->Body    = "Your OTP for password reset is: $otp";

        $mail->send();
        echo "OTP sent to your email. Please check your inbox.";
        
        header("Location: otpverification.php");
        exit;
    } catch (Exception $e) {
        echo "Failed to send OTP. Error: {$mail->ErrorInfo}";
    }
}
?>
