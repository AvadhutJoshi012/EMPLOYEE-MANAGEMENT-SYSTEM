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
    <title>Attendance</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/LTlogo.png" type="image/x-icon">
    <style>
        .wrapper {
            display: flex;
        }

        .main {
            flex: 1;
            padding: 0px;
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

<?php
      if ($_SESSION['check_in']) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
           Checked In Successfully...!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        $_SESSION['check_in'] = false;
      }
      if ($_SESSION['check_out']) {
        echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
           Checked Out Successfully...!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        $_SESSION['check_out'] = false;
      }
      if ($_SESSION['checked_in']) {
        echo '<div class="alert alert-warning alert-dismissible fade show" role="alert">
           You have already checked in for today...!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
        $_SESSION['checked_in'] = false;
      }

      ?>

            <table id="example" class="table table-striped" style="width:100%">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Shift</th>
                        <th scope="col">Shift Start</th>
                        <th scope="col">Shift End</th>
                        <th scope="col">Day/Date</th>
                        <th scope="col">Check In</th>
                        <th scope="col">Check Out</th>
                        
                        <th scope="col">Status</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $selectquery = "SELECT emp_id, fullname, shift, shift_start, shift_end FROM employee where flag = '1'";
                    $query = mysqli_query($conn, $selectquery);

                    while ($res = mysqli_fetch_array($query)) {
                        $emp_id = $res['emp_id'];
                        $shift_start = $res['shift_start'];
                    ?>
                        <tr id="row-<?php echo $emp_id; ?>">
                            <td> <?php echo $emp_id; ?> </td>
                            <td> <?php echo $res['fullname']; ?> </td>
                            <td> <?php echo $res['shift']; ?> </td>
                            <td> <?php echo $shift_start; ?> </td>
                            <td> <?php echo $res['shift_end']; ?> </td>
                            <td> <?php echo date('l d M Y'); ?> </td>

                            <form action="check_in.php?emp_id=<?php echo $res['emp_id']; ?>" method="post">
                                <td>
                                    <button type="submit" class="btn btn-outline-primary b in-time" style="width: 100px;" name="check_in">Check In</button>
                                </td>
                            </form>

                            <form action="check_out.php?emp_id=<?php echo $res['emp_id']; ?>" method="post">
                                <td>
                                    <button type=" submit" class="btn btn-outline-primary b in-time" style="width: 100px;" name="check_out">Check Out</button>
                                </td>
                            </form>
                           
                            <td id="status-<?php echo $emp_id; ?>">
                                <a href="calView.php?emp_id=<?php echo $res['emp_id']; ?>"><button class="btn btn-primary b" style="width: 100px;">View</button></a>
                            </td>
                        </tr>
                    <?php
                    }
                    ?>

                </tbody>
            </table>
            <?php include 'chatbot.php'; ?>
        </div>
    </div>
    <?php include('footer.php')?>


    <!-- <script src="js/bootstrap.bundle.js"></script>
    <script src="js/navbar.js"></script> -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>
    <script>
        $(document).ready(function() {
            $('#example').DataTable();
        });
    </script>

</body>

</html>