<?php include('dbconnect/connect.php') ?>
<?php session_start();
error_reporting(E_ERROR | E_PARSE); ?>


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

    <!-- Include jQuery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <!-- Include FullCalendar -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>

    <style>
        .wrapper {
            display: flex;
        }

        .main {
            flex: 1;
            padding: 0px;
        }

        #calendar {
            max-width: 750px;
            margin: 5px;
        }
    </style>

    <script>
        $(document).ready(function() {
            $('#calendar').fullCalendar({
                events: [
                    <?php
                    if (isset($_GET['emp_id'])) {
                        $emp_id = $_GET['emp_id'];
                    }

                    $currentMonth = date('m');
                    $currentYear = date('Y');

                    // $fetch_status = mysqli_query($conn, "SELECT * FROM attendance WHERE emp_id = '$emp_id' AND MONTH(date) = '$currentMonth' AND YEAR(date) = '$currentYear' ");



                    $fetch_status = mysqli_query($conn, "SELECT * FROM attendance WHERE emp_id = '$emp_id' ");


                    $rows = mysqli_num_rows($fetch_status);
                    if (!$fetch_status) {
                        die("Query failed: " . mysqli_error($conn));
                    }

                    // Debug: Output fetched data
                    while ($result = mysqli_fetch_array($fetch_status)) {
                        if ($result['status'] == "Late") {
                            echo "{ title: '" . $result['status'] . "', start: '" . $result['date'] . "', color: 'orange' },";
                        } else {
                            echo "{ title: '" . $result['status'] . "', start: '" . $result['date'] . "', color: 'green' },";
                        }
                    }
                    ?>
                ]
            });
        });
    </script>


</head>

<body>
    <?php include('header.php'); ?>

    <div class="wrapper">
        <div class="d-flex flex-column flex-shrink-0 p-3 bg-light" style="width: 280px; height:92vh;">
            <ul class="nav nav-pills flex-column mb-auto">
                <li class="nav-item">
                    <a href="index.php" class="nav-link link-dark" aria-current="page">
                        <i class="fa-solid fa-house"></i><span style="margin-left: 8px;  font-size:20px">Home</span>
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
                            <li><a href="formerEmployee.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded my-1" style="margin-left: 40px;"><i class="fa fa-solid fa-user-slash" style="margin-top: 8px;"></i><span style="margin-left: 12px; font-size:20px">Former Employee</a></span></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="attendence.php" class="nav-link link active">
                        <i class="fa-regular fa-calendar-check"></i><span style="margin-left: 12px;  font-size:20px">Attendance</span>
                    </a>
                </li>
                <li>
                    <a href="support.php" class="nav-link link-dark">
                        <i class="fa-solid fa-headset"></i><span style="margin-left: 12px;  font-size:20px">Support</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main" style="overflow-y: auto ; max-height:92vh; overflow-x:hidden">

            <div class="wrapper">
                <div id='calendar'></div>

                <div class="data">
                    <!-- <table>
                        <tr>
                            <td><b>Number of Days Present - </b></td>
                            <td><?php
                                //  echo "$rows";
                                ?></td>
                        </tr>

                    </table> -->




                    <!-- <form action="filterDays.php?emp_id=<?php echo "$emp_id" ?>" method="post" name="filterDate">
                        <table>
                            <tr>
                                <td>
                                    <input placeholder="Enter Starting Date" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="dob" name="from_date" required>
                                </td>
                                <td>
                                    <input placeholder="Enter Ending Date" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="dob" name="to_date" required>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button type="submit" class="btn btn-primary">Show</button>
                                </td>

                            </tr>

                            <tr>
                                <td>
                                    <div>
                                        <b>No. of Present Days - </b> <?php echo "" ?>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </form> -->
                    <?php
                    $filterRows = '';

                    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
                        header('Location: login.php');
                        exit;
                    }

                    if (isset($_GET['emp_id'])) {
                        $emp_id = $_GET['emp_id'];
                    }

                    if (isset($_POST['filterDate'])) {
                        $fromDate = $_POST['from_date'];
                        $toDate = $_POST['to_date'];

                        // Perform the query only if fromDate and toDate are set
                        $query = "SELECT * FROM `attendance` WHERE `date` BETWEEN '$fromDate' AND '$toDate' AND `emp_id` = '$emp_id'";
                        $fetch_rows = mysqli_query($conn, $query);

                        if (!$fetch_rows) {
                            die('Query failed: ' . mysqli_error($conn));
                        }

                        $filterRows = mysqli_num_rows($fetch_rows);


                        //    $diffInSeconds = strtotime($fromDate) - strtotime($toDate);
                        $currentDate = date('Y-m-d');

                        if ($toDate > $currentDate) {
                            $diffInSeconds = strtotime($fromDate) - strtotime($currentDate);
                            $totalDays = abs(floor($diffInSeconds / (60 * 60 * 24)));
                            $absentDays = abs((int)$totalDays - (int)$filterRows + 1);
                            echo "$absentDays";
                        } else {

                            $diffInSeconds = strtotime($fromDate) - strtotime($toDate);
                            // Convert the difference to days
                            $totalDays = abs(floor($diffInSeconds / (60 * 60 * 24)));

                            $absentDays = abs((int)$totalDays - (int)$filterRows + 1);



                            if (array_key_exists('filterDate', $_POST)) {
                                // button1(); 

                            }
                        }


                        // Example of fetching data from result set

                    }
                    ?>
                    <div style="margin-left: 20px;">
                        <form action="" method="post" name="filterDate">
                            <table>
                                <tr>
                                    <td>
                                        <div class="block">
                                            <label for="from_date"><b> From: </b></label><input placeholder="Enter Starting Date" class="form-control" type="date" id="from_date" name="from_date" required><br>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <div class="block">
                                        <td>
                                            <label for="to_date"><b> To: </b></label><input placeholder="Enter Ending Date" class="form-control" type="date" id="to_date" name="to_date" required><br>
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <td>
                                        <button type="submit" class="btn btn-primary" name="filterDate">Show</button><br><br><br>
                                    </td>
                                </tr>
                            </table>
                        </form>

                        <?php
                        // Debugging to check form submission
                        // var_dump($_POST);  // Check what data is being received via POST


                        if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
                            header('Location: login.php');
                            exit;
                        }

                        if (isset($_GET['emp_id'])) {
                            $emp_id = $_GET['emp_id'];
                        }

                        if (isset($_POST['filterMonth'])) {
                            $month = $_POST['month'];


                            // Perform the query only if fromDate and toDate are set
                            // $query = "SELECT * FROM `attendance` WHERE `date` BETWEEN '$fromDate' AND '$toDate' AND `emp_id` = '$emp_id'";
                            $query = "SELECT * FROM `attendance` WHERE MONTH(date) = '$month' and `emp_id`='$emp_id'";
                            $fetch_rows = mysqli_query($conn, $query);

                            if (!$fetch_rows) {
                                die('Query failed: ' . mysqli_error($conn));
                            }

                            $filterRows = mysqli_num_rows($fetch_rows);


                            // Example of fetching data from result set

                            $currentDate = date('Y-m-d');
                            $firstDay = date('Y-m-01');
                            $year = date("Y");
                            $days = cal_days_in_month(CAL_GREGORIAN, $month, $year);


                            if ($month < date('m')) {
                                $absentDays = (int)$days - (int)$filterRows;
                                // echo "$absentDays";
                            } else if ($month == date('m')) {
                                $diffInSeconds = strtotime($firstDay) - strtotime($currentDate);
                                $totalDays = abs(floor($diffInSeconds / (60 * 60 * 24)));
                                $absentDays = abs((int)$totalDays - (int)$filterRows + 1);
                                // echo "$absentDays";
                            }
                        }

                        ?>

                        <form action="" name="filterMonth" method="post">
                            <table>
                                <tr>
                                    <div class="block">
                                        <td>
                                            <label for="to_date"><b> Select Month: &nbsp;</label></b><select name="month" id="" class="form form-control" required>
                                                <option value="">Select Month</option>
                                                <option value="1">January</option>
                                                <option value="2">February</option>
                                                <option value="3">March</option>
                                                <option value="4">April</option>
                                                <option value="5">May</option>
                                                <option value="6">June</option>
                                                <option value="7">July</option>
                                                <option value="8">August</option>
                                                <option value="9">September</option>
                                                <option value="10">October</option>
                                                <option value="11">November</option>
                                                <option value="12">December</option>
                                            </select><br>
                                        </td>
                                    </div>
                                </tr>
                                <tr>
                                    <td>
                                        <button type="submit" class="btn btn-primary" name="filterMonth">Show</button><br><br>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div>
                                            <br> <b>No. of Present Days - </b> <?php echo "$filterRows"; ?>
                                        </div>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <div>
                                            <br> <b>No. of Absent Days - </b>

                                            <?php



                                            // //    $diffInSeconds = strtotime($fromDate) - strtotime($toDate);
                                            // $currentDate = date('Y-m-d');

                                            // if ($toDate > $currentDate) {
                                            //     $diffInSeconds = strtotime($fromDate) - strtotime($currentDate);
                                            //     $totalDays = abs(floor($diffInSeconds / (60 * 60 * 24)));
                                            //     $absentDays = abs((int)$totalDays - (int)$filterRows + 1);
                                            //     echo "$absentDays";
                                            // } else {

                                            //     $diffInSeconds = strtotime($fromDate) - strtotime($toDate);
                                            //     // Convert the difference to days
                                            //     $totalDays = abs(floor($diffInSeconds / (60 * 60 * 24)));

                                            //     $absentDays = abs((int)$totalDays - (int)$filterRows + 1);



                                            //     if (array_key_exists('filterDate', $_POST)) {
                                            //         // button1(); 
                                            //         echo $absentDays;
                                            //     }
                                            // }

                                            echo $absentDays;
                                            ?>

                                        </div>
                                    </td>
                                </tr>
                            </table>
                        </form>
                    </div>


                </div>

            </div>
        </div>
    </div>


    <!-- <script src="js/bootstrap.bundle.js"></script>
    <script src="js/navbar.js"></script> -->

</body>

</html>