<?php
session_start();

include ('dbconnect/connect.php');

if (!isset($_SESSION['otp_verified']) || $_SESSION['otp_verified'] !== true) {
    header("Location: forgotPassword.php");
    exit;
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Process form submission to reset password
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Validate new password and confirm password
    if ($new_password != $confirm_password) {
        echo "Passwords do not match. Please try again.";
        exit;
    }

    // Update password in your database (replace with your database update code)
    $email = $_SESSION['email'];
    // Example SQL query:

    $updatequery="UPDATE admin SET password='$new_password' WHERE email='$email'";

    $query = mysqli_query($conn, $updatequery);
    

    // Clear session variables
    unset($_SESSION['otp']);
    unset($_SESSION['otp_verified']);
    unset($_SESSION['email']);

    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
 Password Changed Successfully.
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>';

    header('location:login.php');
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

        a:hover {
            /* text-decoration: underline; */
            color: #0d6efd;
        }

        a{
            color: #0d6efd;
            text-decoration: none; 
        }
   
        .b:hover {
            border: 1px solid #0d6efd;
            color: #0d6efd;
            background-color: #fff;
        }

        .b{
            color: #fff;
            background-color: #0d6efd;
        }

        

    </style>
</head>

<body>
    <div class="container">
        <div class="content shadow-lg p-3">


            <h2 style="text-align: center;" class="heading m-5">Reset Password</h2>
            <form action="resetPassword.php" method="post">

                <!-- <div class="mb-3">
                    <input type="text" placeholder="Enter Username" name="username" class="form-control" required>
                </div> -->
                <div class="mb-3">
                    <input type="password" placeholder="Enter Password" name="new_password" id="new_password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <input type="password" placeholder="Confirm Password" name="confirm_password" id="confirm_password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <input type="checkbox" name="show_password" id="show_password"> <label for="show_password"> Show Password</label>
                    
                </div>



                <div class="mb-3 button">


                    <input type="submit" value="Reset" class="btn b" style="width: 75px;" >

                </div>

            </form>
        </div>

    </div>



    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/navbar.js"></script>
    <script>
     document.addEventListener("DOMContentLoaded", function() {
            var checkbox = document.getElementById('show_password');
            var newPassword = document.getElementById('new_password');
            var confirmPassword = document.getElementById('confirm_password');

            checkbox.addEventListener('change', function() {
                if (this.checked) {
                    newPassword.type = 'text';
                    confirmPassword.type = 'text';
                } else {
                    newPassword.type = 'password';
                    confirmPassword.type = 'password';
                }
            });
        });
    </script>
</body>

</html>