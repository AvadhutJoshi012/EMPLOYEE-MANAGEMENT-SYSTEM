<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMS | Forgot Password</title>
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


            <h2 style="text-align: center;" class="heading m-5 ">Forgot Password</h2>
            <form action="sendotp.php" method="post">

                <div class="mb-3">
                    <input type="text" placeholder="Enter your email id" name="email" class="form-control" required>
                </div>


                <div class="mb-3 button">
            
                <!-- <button type="button" class="btn btn-secondary btn-lg btn-block">Block level button</button> -->
                    <input type="submit" value="Submit" class="btn btn-outline-primary btn-block b" style="width: 75px";>
                    <!-- <input type="reset" value="Clear" class="btn btn-outline-warning" style="width: 75px;"> -->
                </div>

            </form>
        </div>
        
    </div>



    <script src="js/bootstrap.bundle.js"></script>
    <script src="js/navbar.js"></script>
</body>

</html>