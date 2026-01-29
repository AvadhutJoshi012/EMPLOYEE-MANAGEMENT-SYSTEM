<?php include('dbconnect/connect.php') ?>
<?php session_start();
$_SESSION['addEmp'] = '';
$_SESSION['updateEmp'] = '';
$_SESSION['deleteEmp'] = '';
$_SESSION['check_in'] = '';
$_SESSION['check_out'] = ''; 
$_SESSION['checked_in'] = '';
?>

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
    <title>Document</title>
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

        .sidebar {
            width: 280px;
            /* Default width for larger screens */
            height: 92vh;
        }

        @media (max-width: 992px) {
            .sidebar {
                width: 220px;
                /* Adjusted width for tablets */
            }
        }

        /* Media query for phones and smaller screens */
        @media (max-width: 768px) {
            .sidebar {
                width: 180px;
                /* Adjusted width for phones */
            }
        }

        .dashicon {
            border-radius: 10px;
            margin: 20px;
            height: 200px;
            box-shadow: 0 4px 8px rgba(1, 1, 1, 1);
            transition: transform 0.3s ease;

        }

        .dashicon:hover {
            transform: scale(1.15);
        }

        .dashicon>p {
            font-size: 25px;
            font-weight: 600;
            color: white;
        }

        .value{
            font-size: 50px;
            font-weight: 600;
            color: white;
        }
    </style>
</head>

<body>
    <?php include('header.php'); ?>
    <!-- <ul class="nav nav-tabs justify-content-center navbar-custom nav-fill">
        <li class="nav-item nlc">
            <a class="nav-link active nlc" aria-current="page" href="emshome.php">Home</a>
        </li>
        <li class="nav-item nlc">
            <a class="nav-link nlc" href="employee.php">Employee</a>
        </li>
        <li class="nav-item nlc">
            <a class="nav-link nlc" href="attendence.php">Attendence</a>
        </li>
    </ul> -->
    <div class="wrapper">
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-light sidebar" style="height:92vh;">
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="index.php" class="nav-link link active" aria-current="page">
                        <i class="fa-solid fa-house"></i><span style="margin-left: 8px; font-size:20px">Home</span>
                    </a>
                </li>

                <li class="mb-1">
                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed nav-link link-dark" data-bs-toggle="collapse" data-bs-target="#home-collapse">
                        <i class="fa fa-solid fa-user"></i><span style="margin-left: 12px; font-size:20px">Employee</span><i class="fa-solid fa-caret-down" style="margin-left: 5px;"></i>
                    </button>
                    <div class="collapse" id="home-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ">
                            <li><a href="employee.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded my-1" style="margin-left: 40px;"><i class="fa-solid fa-users" style="margin-top: 8px;"></i><span style="margin-left: 12px; font-size:20px">View Employee</a></li></span>
                            <li><a href="addEmployee.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded my-1" style="margin-left: 40px;"> <i class="fa fa-solid fa-user-plus" style="margin-top: 8px;"></i><span style="margin-left: 12px; font-size:20px">Add Employee</a></li></span>
                            <li><a href="updateEmployee.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded my-1" style="margin-left: 40px;"><i class="fa fa-solid fa-user-pen" style="margin-top: 8px;"></i><span style="margin-left: 12px; font-size:20px">Update Employee</a></span></li>
                            <li><a href="formerEmployee.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded my-1" style="margin-left: 40px;"><i class="fa fa-solid fa-user-slash" style="margin-top: 8px;"></i><span style="margin-left: 12px; font-size:20px">Former Employee</a></span></li>
                        </ul>

                    </div>
                </li>
                <li>
                    <a href="attendence.php" class="nav-link link-dark">
                        <i class="fa-regular fa-calendar-check"></i><span style="margin-left: 12px; font-size:20px">Attendence</span>
                    </a>
                </li>
                <li>
                    <a href="support.php" class="nav-link link-dark">
                        <i class="fa-solid fa-headset"></i><span style="margin-left: 12px; font-size:20px">Support</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="main" style="overflow-y: auto ; max-height:92vh;">
            <!-- <center>
                <h3>Under Development</h3>
            </center> -->

            <?php

            $empQuery = "Select * from `employee` where `flag` = 1";

            $empResult = mysqli_query($conn, $empQuery);

            if (!$empResult) {
                die("Query Failed");
            } else {
                $empRows = mysqli_num_rows($empResult);
            }

            $presentQuery = "Select * from `attendance` where `status` = 'present' and date = curdate()";

            $presentResult = mysqli_query($conn, $presentQuery);

            if (!$presentResult) {
                die("Query Failed");
            } else {
                $presentRows = mysqli_num_rows($presentResult);
            }

            $lateQuery = "Select * from `attendance` where `status` = 'late' and date = curdate()";

            $lateResult = mysqli_query($conn, $lateQuery);

            if (!$lateResult) {
                die("Query Failed");
            } else {
                $lateRows = mysqli_num_rows($lateResult);
            }


            ?>
            <div class="wrapper container">
                <div class="main dashicon" style="background-color: #f7c63e;">
                    <p>Number Of Total <br>Employees</p><br>
                    <span class="value"><?php echo "$empRows";?></span>
                </div>
                <div class="main dashicon" style="background-color: #ff5733;">
                    <p>Number Of Present <br>Employees</p><br>
                    <span class="value"><?php echo "$presentRows";?></span>
                </div>
                <div class="main dashicon" style="background-color: #0d6efd;">
                    <p>Number Of Late <br>Employees</p><br>
                    <span class="value"><?php echo "$lateRows";?></span>
                </div>
            </div>
            <?php
            include 'chatbot.php';
            ?>
        </div>
    </div>
    <?php include('footer.php') ?>




    <!-- <h3>Home Page</h3> -->

    <!-- <script src="js/bootstrap.bundle.js"></script>
    <script src="js/navbar.js"></script> -->
</body>

</html>