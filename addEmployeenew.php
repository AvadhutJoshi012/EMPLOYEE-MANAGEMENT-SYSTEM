<!-- PHP CODE START -->

<?php include('dbconnect/connect.php') ?>
<?php session_start(); ?>

<?php 
// if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
//     header('Location: login.php');
//     exit;
// }

?>

<?php

if (isset($_POST['submit'])) {
    $fullname = trim($_POST['fullname']);
    $dob = trim($_POST['dob']);
    $joining_date = trim($_POST['joining_date']);
    $salary = trim($_POST['salary']);
    $gender = trim($_POST['gender']);
    $email_id = trim($_POST['email_id']);
    $contact_no = trim($_POST['contact_no']);
    $aadhaar_no = trim($_POST['aadhaar_no']);
    $pan_no = trim($_POST['pan_no']);
    $address = trim($_POST['address']);
    $zip_code = trim($_POST['zip_code']);
    $city = trim($_POST['city']);
    $state = trim($_POST['state']);
    $experience = trim($_POST['experience']);
    $company_name = trim($_POST['company_name']);
    $refer_person = trim($_POST['refer_person']);
    $refer_relation = trim($_POST['refer_relation']);
    $refer_contact = trim($_POST['refer_contact']);
    $designation = trim($_POST['designation']);
    $shift = trim($_POST['shift']);
    $shift_start = trim($_POST['shift_start']);
    $shift_end = trim($_POST['shift_end']);

    $insertquery = "INSERT INTO employee(fullname, dob, joining_date, salary, gender, email_id, contact_no, aadhaar_no, pan_no, address, zip_code, city, state, experience, company_name, refer_person, refer_relation, refer_contact, designation, shift, shift_start, shift_end) VALUES ('$fullname', '$dob', '$joining_date', '$salary', '$gender', '$email_id', '$contact_no', '$aadhaar_no', '$pan_no', '$address', '$zip_code', '$city', '$state', '$experience', '$company_name', '$refer_person', '$refer_relation', '$refer_contact', '$designation', '$shift', '$shift_start', '$shift_end')";

    $query = mysqli_query($conn, $insertquery);

    if ($query) {
?>
        <script>
            alert('INSERTED SUCCESSFULLY');
        </script>

    <?php
    } else {
    ?>
        <script>
            alert('NOT INSERTED')
        </script>
<?php
    }
}

?>


<!-- PHP CODE END -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Employee</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="images/LTlogo.png" type="image/x-icon">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

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

        .error {
            color: red;
            display: none;
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
                        <i class="fa-solid fa-house"></i><span style="margin-left: 8px; font-size:20px;">Home</span>
                    </a>
                </li>
                <li class="mb-1">
                    <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed nav-link link-dark" data-bs-toggle="collapse" data-bs-target="#home-collapse">
                        <i class="fa fa-solid fa-user"></i><span style="margin-left: 12px; font-size:20px;">Employee</span><i class=" fa-solid fa-caret-down" style="margin-left: 5px;"></i>
                    </button>
                    <div class="collapse drop-down-menu show" id="home-collapse">
                        <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ">


                            <li><a href="employee.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded my-1" style="margin-left: 40px;"><i class="fa-solid fa-users" style="margin-top: 8px;"></i><span style="margin-left: 12px;  font-size:20px">View Employee</a></li></span>
                            <li><a href="addEmployee.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded my-1" style="margin-left: 40px;"> <i class="fa fa-solid fa-user-plus" style="color:#0d6efd; margin-top: 8px;"></i><span style="margin-left: 12px;color:#0d6efd;  font-size:20px">Add Employee</a></li></span>
                            <li><a href="updateEmployee.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded my-1" style="margin-left: 40px;"><i class="fa fa-solid fa-user-pen" style="margin-top: 8px;"></i><span style="margin-left: 12px;  font-size:20px">Update Employee</a></span></li>
                            <li><a href="formerEmployee.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded my-1" style="margin-left: 40px;"><i class="fa fa-solid fa-user-slash" style="margin-top: 8px;"></i><span style="margin-left: 12px; font-size:20px">Former Employee</a></span></li>

                        </ul>
                    </div>
                </li>
                <li>
                    <a href="attendence.php" class="nav-link link-dark">
                        <i class="fa-regular fa-calendar-check"></i><span style="margin-left: 12px; font-size:20px;">Attendence</span>
                    </a>
                </li>
                <li>
                    <a href="support.php" class="nav-link link-dark">
                        <i class="fa-solid fa-headset"></i><span style="margin-left: 12px; font-size:20px;">Support</span>
                    </a>
                </li>
            </ul>
        </div>
        <div class="main" style="overflow-y: auto ; max-height:92vh;">
            <!-- <center>
        <h3>Module Not Received</h3>

      </center> -->
            <div class="container mt-5">

                <!-- Add_Employee code -->

                <form id="registrationForm" name="form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" class="needs-validation" novalidate method="POST">

                    <!-- PERSONAL DETAILS START -->
                    <h3>Personal Details</h3>
                    <hr width="100%" size="10">

                    <!-- <div class="row mb-3"> -->
                    <input type="text" class="form-control" id="fullname" name="fullname" placeholder="Full Name" pattern="^[a-zA-Z\s-]+$" required>
                    <div class="invalid-feedback">Please enter a valid name (only characters, hyphens, and spaces are allowed).</div>
                    <!-- </div> -->
                    <br>

                    <div class="row mb-3">

                        <div class="col-md-6">
                            <input class="form-control" id="dob" placeholder="Date of Birth" name="dob" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" required>
                            <div class="invalid-feedback">Please enter a valid date of birth (must be 18+ years).</div>
                        </div>
                        <div class="col-md-6">
                            <input class="form-control" id="joining_date" name="joining_date" placeholder="Joining Date" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" required>
                            <div class="invalid-feedback">Please enter a valid joining date (cannot be a future date or same as date of birth).</div>
                        </div>

                    </div>

                    <div class="row mb-3">

                        <div class="col-md-6">
                            <input type="number" class="form-control" id="salary" name="salary" placeholder="Salary" required>
                            <div class="invalid-feedback">Please enter your salary.</div>
                        </div>
                        <div class="col-md-6">
                            <select class="form-select" id="gender" name="gender" placeholder="Gender" required>
                                <option value="" disabled selected>Select your gender</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                                <option value="Other">Other</option>
                            </select>
                            <div class="invalid-feedback">Please select your gender.</div>
                        </div>

                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <input type="email" class="form-control" id="email_id" name="email_id" placeholder="Email ID" required>
                            <div class="invalid-feedback">Please enter a valid email.</div>
                        </div>
                        <div class="col-md-6">
                            <input type="tel" class="form-control" id="contact_no" name="contact_no" placeholder="Contact Number" pattern="^\d{10}$" required>
                            <div class="invalid-feedback">Please enter a valid contact number (10 digits).</div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="aadhaar_no" name="aadhaar_no" placeholder="Aadhaar Number" pattern="^\d{12}$" required>
                            <div class="invalid-feedback">Please enter a valid Aadhaar number (12 digits).</div>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="pan_no" name="pan_no" placeholder="PAN Number" pattern="^[A-Z]{5}\d{4}[A-Z]$" required>
                            <div class="invalid-feedback">Please enter a valid PAN number (e.g., AAAAA1234A).</div>
                        </div>
                    </div>
                    <!-- PERSONAL DETAILS END -->

                    <!-- ADDRESS DETAILS START -->
                    <h3>Address Details</h3>
                    <hr width="100%" size="10">

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="address" name="address" placeholder="Address" required>
                            <div class="invalid-feedback">Please enter your address.</div>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="zip_code" name="zip_code" placeholder="Zip Code" pattern="^\d{6}$" required>
                            <div class="invalid-feedback">Please enter a valid zip code (6 digits).</div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="city" name="city" placeholder="City" pattern="^[a-zA-Z\s]+$" required>
                            <div class="invalid-feedback">Please enter a valid city (only characters and spaces are allowed).</div>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="state" name="state" placeholder="State" pattern="^[a-zA-Z\s]+$" required>
                            <div class="invalid-feedback">Please enter a valid state (only characters and spaces are allowed).</div>
                        </div>
                    </div>
                    <!-- ADDRESS DETAILS END -->

                    <!-- EXPERIENCE DETAILS START -->
                    <h3>Experience Details</h3>
                    <hr width="100%" size="10">

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <input type="number" class="form-control" id="experience" name="experience" placeholder="Experience (in years)" required>
                            <div class="invalid-feedback">Please enter your experience in years.</div>
                        </div>
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="company_name" name="company_name" placeholder="Company Name" required>
                            <div class="invalid-feedback">Please enter your company name.</div>
                        </div>
                    </div>
                    <!-- EXPERIENCE DETAILS END -->

                    <!-- REFERENCE DETAILS START -->
                    <h3>Reference Details</h3>
                    <hr width="100%" size="10">

                    <!-- <div class="row mb-3"> -->
                    <!-- <div class="col-md-6"> -->
                    <input type="text" class="form-control" id="refer_person" name="refer_person" placeholder="Reference Person Name" required>
                    <div class="invalid-feedback">Please enter the reference person name.</div>
                    <br>
                    <!-- </div> -->

                    <!-- </div> -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="refer_relation" name="refer_relation" placeholder="Relation with Reference Person" required>
                            <div class="invalid-feedback">Please enter your relation with the reference person.</div>
                        </div>
                        <div class="col-md-6">
                            <input type="tel" class="form-control" id="refer_contact" name="refer_contact" placeholder="Reference Contact Number" pattern="^\d{10}$" required>
                            <div class="invalid-feedback">Please enter the reference contact number (10 digits).</div>
                        </div>

                    </div>
                    <!-- REFERENCE DETAILS END -->

                    <!-- SHIFT DETAILS START -->
                    <h3>Shift Details</h3>
                    <hr width="100%" size="10">

                    <div class="row mb-3">
                        <div class="col-md-6">
                            <input type="text" class="form-control" id="designation" name="designation" placeholder="Designation" required>
                            <div class="invalid-feedback">Please enter your designation.</div>
                        </div>
                        <div class="col-md-6">
                            <select class="form-select" id="shift" name="shift" placeholder="Shift" required>
                                <option value="" disabled selected>Select your shift</option>
                                <option value="Morning">Morning</option>
                                <option value="Afternoon">Afternoon</option>
                                <option value="Night">Night</option>
                                <option value="Other">Other</option>
                            </select>
                            <div class="invalid-feedback">Please select your shift.</div>
                        </div>

                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <input type="time" class="form-control" id="shift_start" name="shift_start" placeholder="Shift Start Time" required>
                            <div class="invalid-feedback">Please enter your shift start time.</div>
                        </div>
                        <div class="col-md-6">
                            <input type="time" class="form-control" id="shift_end" name="shift_end" placeholder="Shift End Time" required>
                            <div class="invalid-feedback">Please enter your shift end time.</div>
                        </div>
                    </div>

                    <!-- SHIFT DETAILS END -->

                    <!-- Additional Fields from Previous Code -->

                    <!-- SUBMIT AND RESET BUTTON START -->
                    <center>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <!-- <div class="mb-3"> -->
                                <button type="submit" class="btn btn-primary" name="submit" style="width: 75px;">Submit</button>
                            </div>
                            <div class="col-md-6">

                                <button type="reset" class="btn btn-danger" style="width: 75px;">Reset</button>
                            </div>
                        </div>
                    </center>
                    <!-- SUBMIT AND RESET BUTTON END -->

            </div>
            </form>

            <?php include 'chatbot.php'; ?>
        </div>

    </div>
    <?php include('footer.php') ?>
    <!-- <h3>Employee Page</h3> -->

    <!-- <script src="js/bootstrap.bundle.js"></script>
    <script src="js/navbar.js"></script> -->

    <!-- JAVASCRIPT START (VALIDATION) -->

    <script>
        (function() {
            'use strict';

            var forms = document.querySelectorAll('.needs-validation');

            Array.prototype.slice.call(forms).forEach(function(form) {
                form.addEventListener('submit', function(event) {
                    var dob = new Date(document.getElementById('dob').value);
                    var joining_date = new Date(document.getElementById('joining_date').value);
                    var today = new Date();

                    var age = today.getFullYear() - dob.getFullYear();
                    var monthDiff = today.getMonth() - dob.getMonth();
                    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dob.getDate())) {
                        age--;
                    }

                    if (dob.getTime() === joining_date.getTime()) {
                        document.getElementById('joining_date').setCustomValidity('Joining date cannot be the same as date of birth.');
                    } else {
                        document.getElementById('joining_date').setCustomValidity('');
                    }

                    if (joining_date > today) {
                        document.getElementById('joining_date').setCustomValidity('Joining date cannot be a future date.');
                    } else {
                        document.getElementById('joining_date').setCustomValidity('');
                    }

                    if (age < 18) {
                        document.getElementById('dob').setCustomValidity('You must be at least 18 years old.');
                    } else {
                        document.getElementById('dob').setCustomValidity('');
                    }

                    if (!form.checkValidity()) {
                        event.preventDefault();
                        event.stopPropagation();
                    }

                    form.classList.add('was-validated');
                }, false);
            });
        })();
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <!-- JAVASCRIPT END (VALIDATION) -->


</body>

</html>