<?php include('dbconnect/connect.php') ?>
<?php session_start(); ?>

<?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Support</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/LTlogo.png" type="image/x-icon">
    <style>
        .wrapper {
            display: flex;
        }

        .main {
            flex: 1;
            padding: 10px;
        }
    </style>
</head>

<body>
    <?php include('header.php'); ?>


    <div class="wrapper">
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px; height:92vh;">
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="index.php" class="nav-link link-dark" aria-current="page">
                        <i class="fa-solid fa-house"></i><span style="margin-left: 8px; font-size:20px">Home</span>
                    </a>
                </li>
                <!-- <li>
                <a href="addemployee.php" class="nav-link link-dark">
                    <i class="fa fa-solid fa-user"></i><span style="margin-left: 12px;">Employee</span>
                </a>
            </li> -->
                <li class="mb-1">
                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed nav-link link-dark" data-bs-toggle="collapse" data-bs-target="#home-collapse">
                        <i class="fa fa-solid fa-user"></i><span style="margin-left: 12px;  font-size:20px">Employee</span><i class="fa-solid fa-caret-down" style="margin-left: 5px;"></i>
                    </button>
                    <div class="collapse" id="home-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ">
                            <li><a href="employee.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded my-1" style="margin-left: 40px;"><i class="fa-solid fa-users" style="margin-top: 8px;"></i><span style="margin-left: 12px;  font-size:20px">View Employee</a></li></span>
                            <li><a href="addEmployee.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded my-1" style="margin-left: 40px;"> <i class="fa fa-solid fa-user-plus" style="margin-top: 8px;"></i><span style="margin-left: 12px;  font-size:20px">Add Employee</a></li></span>
                            <li><a href="updateEmployee.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded my-1" style="margin-left: 40px;"><i class="fa fa-solid fa-user-pen" style="margin-top: 8px;"></i><span style="margin-left: 12px;  font-size:20px">Update Employee</a></span></li>
                            <li><a href="formerEmployee.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded my-1" style="margin-left: 40px;"><i class="fa fa-solid fa-user-slash"  style="margin-top: 8px;"></i><span style="margin-left: 12px; font-size:20px">Former Employee</a></span></li>

                        </ul>
                    </div>
                </li>
                <li>
                    <a href="attendence.php" class="nav-link link-dark">
                        <i class="fa-regular fa-calendar-check"></i><span style="margin-left: 12px;  font-size:20px">Attendence</span>
                    </a>
                </li>
                <li>
                    <a href="support.php" class="nav-link link active">
                        <i class="fa-solid fa-headset"></i><span style="margin-left: 12px;  font-size:20px">Support</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main">
            <center>
                <h3>Under Development</h3>
            </center>
            <?php include 'chatbot.php'; ?>
        </div>
    </div>
    <?php include('footer.php')?>



    <!-- <script src="js/bootstrap.bundle.js"></script>
    <script src="js/navbar.js"></script> -->
</body>

</html>