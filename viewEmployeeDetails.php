<?php include('dbconnect/connect.php')?>
<?php session_start(); ?>

<?php if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true){
     header('Location: login.php');
     exit;
}

?>

<?php

if (isset($_GET['emp_id'])) {
    $emp_id = $_GET['emp_id'];
}


$query = "SELECT * FROM `employee` where `emp_id` = '$emp_id' ";
$result = $conn->query($query);

if (!$result) {
    die("query Failed");
} else {
    $row = mysqli_fetch_assoc($result);
    // print_r($row);
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


        /* Add_Employee CSS */

        #form {
            background-color: rgb(251, 253, 254);
            margin: 25px;
            padding-left: 50px;
            padding-right: 50px;
            padding-bottom: 50px;
            align-items: center;
            /* border: black; */
        }

        .formerror {
            color: #f44336;
        }

        .submitButton {
            background-color: #4caf50;
            color: rgb(0, 0, 0);
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-left: 300px;
        }

        .resetButton {
            background-color: #f44336;
            color: rgb(0, 0, 0);
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            /* margin-left: 20px; */
        }

        button:hover,
        .resetButton:hover {
            opacity: 0.8;
        }

        @media(max-width:998px) {
            .container {
                width: calc(100vw - 35vw);
                max-width: 100%;
            }
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
                        <i class="fa-solid fa-house"></i><span style="margin-left: 8px;font-size:20px;">Home</span>
                    </a>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed nav-link link-dark" data-bs-toggle="collapse" data-bs-target="#home-collapse">
                        <i class="fa fa-solid fa-user"></i><span style="margin-left: 12px; font-size:20px">Employee</span><i class="fa-solid fa-caret-down" style="margin-left: 5px;"></i>
                    </button>
                    <div class="collapse drop-down-menu show" id="home-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ">
                            <li><a href="employee.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded my-1" style="margin-left: 40px;"><i class="fa-solid fa-users" style="color:#0d6efd;"></i><span style="margin-left: 12px; color:#0d6efd">View Employee Data</a></span></li>
                            <li><a href="addEmployee.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded my-1" style="margin-left: 40px;"> <i class="fa fa-solid fa-user-plus"></i><span style="margin-left: 12px; font-size:20px">Add Employee</a></li></span>
                            <li><a href="updateEmployee.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded my-1" style="margin-left: 40px;"><i class="fa fa-solid fa-user-pen"></i><span style="margin-left: 12px;  font-size:20px">Update Employee</a></span></li>
                        </ul>
                    </div>
                </li>
                <li>
                    <a href="attendence.php" class="nav-link link-dark">
                        <i class="fa-regular fa-calendar-check"></i><span style="margin-left: 12px;  font-size:20px">Attendence</span>
                    </a>
                </li>
                <li>
                    <a href="support.php" class="nav-link link-dark">
                        <i class="fa-solid fa-headset"></i><span style="margin-left: 12px;  font-size:20px">Support</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main" style="overflow-y: auto ; max-height:92vh;">
            <!-- <center>
        <h3>Module Not Received</h3>

      </center> -->


            <!-- Add_Employee code -->

            <div class="container my-5 d-flex flex-column" style="border: 1px solid black; border-radius: 10px">
       
        <table class="table table-borderless">
            <tr>
                <h4 class="my-4">Personal Details</h4>
            </tr>
            <hr>
            <tr>
                <td><b>Full Name:</b> <?php echo $row['fullname'] ?></td>
            </tr>
            <tr>
                <td class="col-6"><b>Birth Date:</b> <?php echo $row['dob'] ?></td>
                <td class="col-6"><b>Joining Date:</b> <?php echo $row['joining_date'] ?></td>
            </tr>
            <tr>
                <td class="col-6"><b>Salary:</b> <?php echo $row['salary'] ?></td>
                <td class="col-6"><b>Gender:</b> <?php echo $row['gender'] ?></td>
            </tr>
            <tr>
                <td class="col-6"><b>Email id:</b> <?php echo $row['email_id'] ?></td>
                <td class="col-6"><b>Contact Number:</b> <?php echo $row['contact_no'] ?></td>
            </tr>
            <tr>
                <td class="col-6"><b>Aadhaar No:</b> <?php echo $row['aadhaar_no'] ?></td>
                <td class="col-6"><b>PAN:</b> <?php echo $row['pan_no'] ?></td>
            </tr>

        </table>

        <table class="table table-borderless">
            <tr>
                <h4 class="my-4">Address Details</h4>
            </tr>
            <hr>
            <tr>
                <td class="col-6"><b>Address:</b> <?php echo $row['address'] ?></td>
                <td class="col-6"><b>ZIP Code:</b> <?php echo $row['zip_code'] ?></td>
            </tr>
            <tr>
                <td class="col-6"><b>City:</b> <?php echo $row['city'] ?></td>
                <td class="col-6"><b>State:</b> <?php echo $row['state'] ?></td>
            </tr>
    

        </table>

        

        <table class="table table-borderless">
            <tr>
            <h4 class="my-4">Experience Details</h4>
            </tr>
            <hr>
            <tr>
                <td class="col-6"><b>Experience:</b> <?php echo $row['experience'] ?></td>
                <td class="col-6"><b>Company Name:</b> <?php echo $row['company_name'] ?></td>
            </tr>
            

        </table>

        <table class="table table-borderless">
            <tr>
            <h4 class="my-4">Reference Details</h4>
            </tr>
            <hr>
            <tr>
                <td class=""><b>Reference Person:</b> <?php echo $row['refer_person'] ?></td>
            </tr>
            <tr>
                <td class="col-6"><b>Reference Relation:</b> <?php echo $row['refer_relation'] ?></td>
                <td class="col-6"><b>Reference Contact Number:</b> <?php echo $row['refer_contact'] ?></td>
            </tr>   
            

        </table>

        <table class="table table-borderless">
            <tr>
            <h4 class="my-4">Shift Details</h4>
            </tr>
            <hr>
            <tr>
                <td class="col-6"><b>Designation:</b> <?php echo $row['designation'] ?></td>
                <td class="col-6"><b>Shift:</b> <?php echo $row['shift'] ?></td>
            </tr>
            <tr>
                <td class="col-6"><b>Shift Start:</b> <?php echo $row['shift_start'] ?></td>
                <td class="col-6"><b>Shift End:</b> <?php echo $row['shift_end'] ?></td>
            </tr>   
            

        </table>
    </div>


        </div>
    </div>
    <!-- <h3>Employee Page</h3> -->

    <!-- <script src="js/bootstrap.bundle.js"></script>
    <script src="js/navbar.js"></script> -->
</body>

</html>