 <!-- php code here -->
 <?php

    session_start();

    include ('dbconnect/connect.php');
    // include ('login_process.php');

    $showError = false;  

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
     <link rel="stylesheet" href="fontawsome/css/all.min.css">
     <style>
         body {
             background: rgb(2, 0, 36);
             background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(9, 9, 121, 1) 13%, rgba(0, 212, 255, 1) 100%);
             /* background: linear-gradient(90deg, rgb(0, 0, 0) 0%, rgb(89, 89, 89) 13%, rgb(255, 255, 255) 100%); */
         }



         .b:hover {
             border: 1px solid #0d6efd;
             color: #0d6efd;
             background-color: #fff;
         }

         .b {
             color: #fff;
             background-color: #0d6efd;
         }
     </style>
 </head>

 <body>


     <div class="container">
         <div class="content shadow-lg p-3">


             <h2 style="text-align: center;" class="heading m-5">Login</h2>
             <form action="login_process.php" method="post">

             <div>
                <?php if (isset($_SESSION['login_error'])) {echo '<p class="text-danger text-center">Please Enter a valid Username or Password...!</p>';}
                unset($_SESSION['error_message']); ?>
             </div>

                 <div class="mb-3">
                     <input type="text" placeholder="Enter Username" name="username" class="form-control" required>
                 </div>
                 <div class="mb-3">

                     <div class="input-group">
                         <input type="password" placeholder="Enter Password" name="password" class="form-control" id="passwordInput" required>
                         <button type="button" class="btn btn-outline-secondary" onclick="togglePasswordVisibility()" style="width: 50px;">
                             <!-- <i id="togglePasswordIcon" class="bi bi-eye"></i> -->
                             <i id="togglePasswordIcon" class="fa-solid fa-eye"></i>
                         </button>
                     </div>

                 </div>

                 <div class="mb-3">
                     <a href="forgotpassword.php" style="margin-left: 13px; color: #0d6efd;
            text-decoration: none; ">Forgot Password?</a>
                 </div>


                 <div class="mb-3 button">


                     <input type="submit" value="Login" class="btn b" name="login" style="width: 75px;">

                 </div>

             </form>
         </div>

     </div>



     <script src="js/bootstrap.bundle.js"></script>
     <script src="js/navbar.js"></script>

     <script>
         function togglePasswordVisibility() {
             var passwordInput = document.getElementById("passwordInput");
             var togglePasswordIcon = document.getElementById("togglePasswordIcon");

             if (passwordInput.type === "password") {
                 passwordInput.type = "text";
                 togglePasswordIcon.classList.remove("fa-eye");
                 togglePasswordIcon.classList.add("fa-eye-slash");
             } else {
                 passwordInput.type = "password";
                 togglePasswordIcon.classList.remove("fa-eye-slash");
                 togglePasswordIcon.classList.add("fa-eye");
             }
         }
     </script>



 </body>

 </html>