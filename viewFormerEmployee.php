<?php include('dbconnect/connect.php') ?>
<?php session_start(); ?>

<?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
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
                        <i class="fa-solid fa-house"></i><span style="margin-left: 8px; font-size:20px">Home</span>
                    </a>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed nav-link link-dark" data-bs-toggle="collapse" data-bs-target="#home-collapse">
                        <i class="fa fa-solid fa-user"></i><span style="margin-left: 12px;  font-size:20px">Employee</span><i class="fa-solid fa-caret-down" style="margin-left: 5px;"></i>
                    </button>
                    <div class="collapse drop-down-menu show" id="home-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ">
                            <li><a href="employee.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded my-1" style="margin-left: 40px;"><i class="fa-solid fa-users" style="margin-top: 8px;"></i><span style="margin-left: 12px;   font-size:20px">View Employee</a></span></li>
                            <li><a href="addEmployee.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded my-1" style="margin-left: 40px;"> <i class="fa fa-solid fa-user-plus" style="margin-top: 8px;"></i><span style="margin-left: 12px;  font-size:20px">Add Employee</a></li></span>
                            <li><a href="updateEmployee.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded my-1" style="margin-left: 40px;"><i class="fa fa-solid fa-user-pen" style="margin-top: 8px;"></i><span style="margin-left: 12px;  font-size:20px">Update Employee</a></span></li>
                            <li><a href="formerEmployee.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded my-1" style="margin-left: 40px;"><i class="fa fa-solid fa-user-slash" style="color:#0d6efd; margin-top: 8px;"></i><span style=" color:#0d6efd; margin-left: 12px; font-size:20px">Former Employee</a></span></li>

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

            <form name="form" id="form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">

                <!-- PERSONAL INFORMATION START -->

                <div class="row">

                    <h4>Personal Details</h4><br>
                    <hr width="100%" size="4">

                    <div class="col">
                        <input type="text" class="form-control" placeholder="Full Name" name="fullname" id="fullname" autocomplete="off" required value="<?php echo $row['fullname'] ?> " disabled>

                    </div>
                </div>
                <br>


                <div class="row">
                    <div class="col">
                        <!-- <input type="date" class="form-control" placeholder="Date Of Birth" name="dob" id="dob" autocomplete="off" required> -->
                        <input placeholder="Enter Date of Birth" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="dob" required value="<?php echo $row['dob'] ?> " disabled>

                    </div>
                    <div class="col">
                        <!-- <input type="date" class="form-control" placeholder="Joining Date" name="joining_date" id="joining_date" autocomplete="off" required> -->
                        <input placeholder="Enter Joining Date" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="joining_date" required value="<?php echo $row['joining_date'] ?> " disabled>

                    </div>
                </div><br>

                <div class="row">

                    <div class="col">
                        <input type="text" class="form-control" placeholder="Salary" name="salary" id="salary" autocomplete="off" required value="<?php echo $row['salary'] ?> " disabled>

                    </div>
                    <div class="col">
                        <select class="form-control" name="gender" id="gender" autocomplete="off" required disabled>
                            <option value=""><?php echo $row['gender'] ?></option>
                            <option value="Male">Male</option>
                            <option value="Memale">Female</option>
                            <option value="Other">Other</option>
                        </select>

                    </div>

                </div><br>

                <div class="row">
                    <div class="col">
                        <input type="email" class="form-control" placeholder="Enter Email ID" name="email_id" id="email_id" autocomplete="off" required value="<?php echo $row['email_id'] ?> " disabled>

                    </div>

                    <div class="col">
                        <input type="tel" class="form-control" placeholder="Contact Number" name="contact_no" id="contact_no" autocomplete="off" required value="<?php echo $row['contact_no'] ?> " disabled>

                    </div>
                </div><br>

                <div class="row">

                    <div class="col">
                        <input type="text" class="form-control" placeholder="Enter Aadhaar Number" name="aadhaar_no" id="aadhaar_no" autocomplete="off" required value="<?php echo $row['aadhaar_no'] ?> " disabled>

                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Enter PAN Card Number (OPTIONAL)" name="pan_no" id="pan_no" autocomplete="off" value="<?php echo $row['pan_no'] ?> " disabled>

                    </div>

                </div>

                <!-- PERSONAL INFORMATION END -->

                <br>

                <!-- ADDRESS START -->
                <div class=" row">
                    <h4>Address Details</h4><br>
                    <hr width="100%" size="4">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Enter Address" name="address" id="address" autocomplete="off" required value="<?php echo $row['address'] ?> " disabled>

                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Enter ZIP Code" name="zip_code" id="zip_code" autocomplete="off" required value="<?php echo $row['zip_code'] ?> " disabled>

                    </div>
                </div><br>

                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Enter City" name="city" id="city" autocomplete="off" required value="<?php echo $row['city'] ?> " disabled>

                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Enter State" name="state" id="state" autocomplete="off" required value="<?php echo $row['state'] ?> " disabled>

                    </div>
                </div>
                <!-- ADDRESS END -->

                <br>

                <!-- EXPERIENCE DETAIL START -->
                <div class="row">
                    <h4>Experience Details</h4><br>
                    <hr width="100%" size="4">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Enter Experience" name="experience" id="experience" autocomplete="off" required value="<?php echo $row['experience'] ?> " disabled>

                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Enter Company Name" name="company_name" id="company_name" autocomplete="off" required value="<?php echo $row['company_name'] ?> " disabled>

                    </div>
                </div>
                <!-- EXPERIENCE DETAIL END -->

                <br>

                <!-- REFERENCE DETAIL START -->
                <div class=" row">
                    <h4>Reference Details</h4><br>
                    <hr width="100%" size="4">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Reference Person" name="refer_person" id="refer_person" autocomplete="off" required value="<?php echo $row['refer_person'] ?> " disabled>

                    </div>
                </div><br>

                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Reference Relation" name="refer_relation" id="refer_relation" autocomplete="off" required value="<?php echo $row['refer_relation'] ?> " disabled>

                    </div>
                    <div class="col">
                        <input type="tel" class="form-control" placeholder="Reference Contact Number" name="refer_contact" id="refer_contact" autocomplete="off" required value="<?php echo $row['refer_contact'] ?> " disabled>

                    </div>
                </div>
                <!-- REFERENCE DETAIL END -->

                <br>

                <!-- SHIFT DETAIL START -->
                <div class="row">
                    <h4>Shift Details</h4><br>
                    <hr width="100%" size="4">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Enter Designation" id="designation" name="designation" autocomplete="off" value="<?php echo $row['designation'] ?> " disabled>

                    </div>
                    <div class="col">
                        <select class="form-control" id="shift" autocomplete="off" name="shift" disabled>
                            <option value=""><?php echo $row['shift'] ?></option>
                            <option value="Morning">Morning</option>
                            <option value="Night">Night</option>
                            <option value="Other">Other</option>
                        </select>

                    </div>
                </div><br>

                <div class="row">
                    <div class="col">
                        <!-- <input type="time" class="form-control" placeholder="Shift Start Time" id="shift_start" name="shift_start" autocomplete="off"> -->
                        <input placeholder="Shift Start Time" class="form-control" type="text" onfocus="(this.type='time')" onblur="(this.type='text')" id="shift_start" value="<?php echo $row['shift_start'] ?> " disabled>

                    </div>
                    <div class="col">
                        <!-- <input type="time" class="form-control" placeholder="Shift End Time" id="shift_end" name="shift_end" autocomplete="off"> -->
                        <input placeholder="Shift End Time" class="form-control" type="text" onfocus="(this.type='time')" onblur="(this.type='text')" id="shift_end" value="<?php echo $row['shift_end'] ?> " disabled>

                    </div>
                </div>
                <!-- SHIFT DETAILS END -->

                <br>

                <!-- SUBMIT AND RESET BUTTON START -->
                <!-- <center>
              <div class="row">

                <div class="col">
                  <input type="submit" class="btn btn-outline-success" id="submitButton" name="submit" value="Update" style="width: 75px">
                </div>

                <div class="col">
                  <a href="updateEmployee.php"><input type="button" class="btn btn-outline-danger" id="" value="Cancel" style="width: 75px"></a>
                </div>

              </div>
            </center> -->
                <!-- SUBMIT AND RESET BUTTON END -->

            </form>


        </div>
    </div>
    <?php include('footer.php') ?>
    <!-- <h3>Employee Page</h3> -->

    <!-- <script src="js/bootstrap.bundle.js"></script>
    <script src="js/navbar.js"></script> -->
</body>

</html>