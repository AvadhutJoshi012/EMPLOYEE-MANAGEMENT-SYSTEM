<?php
session_start();

if (!isset($_SESSION['otp'])) {
    header("Location: forgotPassword.php");
    exit;
}

echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
 OTP sent to your email. Please check your inbox.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $otp_entered = $_POST['otp'];

    if ($_SESSION['otp'] != $otp_entered) {
        
        echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
            Invalid OTP. Please try again.
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        exit;
    }

    // OTP verification successful, proceed to reset password form
    $_SESSION['otp_verified'] = true;
    header("Location: resetPassword.php");
    exit;
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMS | Login</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/LTlogo.png" type="image/x-icon">
    <style>

        body {
            background: rgb(2, 0, 36);
            background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(9, 9, 121, 1) 13%, rgba(0, 212, 255, 1) 100%);
            /* background: linear-gradient(90deg, rgb(0, 0, 0) 0%, rgb(89, 89, 89) 13%, rgb(255, 255, 255) 100%); */
        }

    </style>
</head>

<body>
    <div class="container">
        <div class="content shadow-lg p-3">


            <h2 style="text-align: center;" class="heading m-5">OTP Verification</h2>
            <form action="otpverification.php" method="post">

                <div class="mb-3">
                    <input type="text" placeholder="Enter OTP" name="otp" class="form-control" required>
                </div>


                <div class="mb-3 button">

                    <!-- <button type="button" class="btn btn-secondary btn-lg btn-block">Block level button</button> -->
                    <input type="submit" value="Verify" class="btn btn-outline-primary btn-block b" style="width: 75px" ;>
                    <!-- <input type="reset" value="Clear" class="btn btn-outline-warning" style="width: 75px;"> -->
                </div>

            </form>
        </div>

    </div>



    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/navbar.js"></script>
</body>

</html>