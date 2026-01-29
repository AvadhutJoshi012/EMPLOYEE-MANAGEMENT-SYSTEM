<!-- PHP CODE START -->

<?php include('dbconnect/connect.php') ?>
<?php session_start(); ?>

<?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

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
        $_SESSION['addEmp'] = true;
?>
        <!-- <script>
            alert('INSERTED SUCCESSFULLY');
        </script> -->
        

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
                        <i class="fa fa-solid fa-user"></i><span style="margin-left: 12px; font-size:20px;"">Employee</span><i class=" fa-solid fa-caret-down" style="margin-left: 5px;"></i>
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
                        <i class="fa-regular fa-calendar-check"></i><span style="margin-left: 12px; font-size:20px;">Attendance</span>
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
            <?php
            if ($_SESSION['addEmp']) {
                echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
            Employee Added Successfully...!
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>';
                $_SESSION['addEmp'] = false;
            } 

            ?>
            <!-- <center>
        <h3>Module Not Received</h3>

      </center> -->


            <!-- Add_Employee code -->

            <form name="form" id="form" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="POST">

                <!-- PERSONAL INFORMATION START -->

                <div class="row">

                    <h3>Personal Details</h3><br>
                    <hr width="100%" size="4">

                    <div class="col">
                        <input type="text" class="form-control" placeholder="Full Name" name="fullname" id="fullname" autocomplete="off" required>
                        <span id="nameError" class="error"><i class="fa fa-exclamation-circle" style="color:red"></i>Please enter a valid name (letters, spaces, and hyphens only)</span>
                    </div>
                </div>
                <br>


                <div class="row">
                    <div class="col">
                        <!-- <input type="date" class="form-control" placeholder="Date Of Birth" name="dob" id="dob" autocomplete="off" required> -->
                        <input placeholder="Enter Date of Birth" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="dob" name="dob" required>
                        <span id="dobError" class="error" style="color: red; display: none;"><i class="fa fa-exclamation-circle" style="color:red"></i>Please Enter a Valid Date of Birth.</span>
                        <span id="dobError2" class="error" style="color: red; display: none;"><i class="fa fa-exclamation-circle" style="color:red"></i>Employee must be at least 18 years old.</span>

                    </div>
                    <div class="col">
                        <!-- <input type="date" class="form-control" placeholder="Joining Date" name="joining_date" id="joining_date" autocomplete="off" required> -->
                        <input placeholder="Enter Joining Date" class="form-control" type="text" onfocus="(this.type='date')" onblur="(this.type='text')" id="joining_date" name="joining_date" required>
                        <span id="joining_dateError" class="error" style="color: red; display: none;"><i class="fa fa-exclamation-circle" style="color:red"></i>Please Enter a Valid Joining Date.</span>
                        <span id="joining_dateError2" class="error" style="color: red; display: none;"><i class="fa fa-exclamation-circle" style="color:red"></i>Date of Birth and Joining Date cannot be the same.</span>

                    </div>
                </div><br>

                <div class="row">

                    <div class="col">
                        <input type="decimal" class="form-control" placeholder="Salary" name="salary" id="salary" autocomplete="off" required>
                        <span id="salaryError" class="error" style="color: red; display: none;"><i class="fa fa-exclamation-circle" style="color:red"></i>Please Enter the Salary(Example:12345,1234.12)</span>

                    </div>
                    <div class="col">
                        <select class="form-control" name="gender" id="gender" autocomplete="off" required>
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                            <option value="Other">Other</option>
                        </select>
                        <span id="genderError" class="error" style="color: red; display: none;"><i class="fa fa-exclamation-circle" style="color:red"></i>Please Select a Valid Gender (Male, Female, or Other)</span>

                    </div>

                </div><br>

                <div class="row">
                    <div class="col">
                        <input type="email" class="form-control" placeholder="Enter Email ID" name="email_id" id="email_id" autocomplete="off" required>
                        <span id="emailError" class="error" style="color: red; display: none;"><i class="fa fa-exclamation-circle" style="color:red"></i>Please Enter a Valid Email ID(Example:abc@email.com).</span>

                    </div>

                    <div class="col">
                        <input type="tel" class="form-control" placeholder="Contact Number" name="contact_no" id="contact_no" autocomplete="off" required>
                        <span id="contact_noError" class="error" style="color: red; display: none;"><i class="fa fa-exclamation-circle" style="color:red"></i>Please Enter a Valid Contact Number</span>

                    </div>
                </div><br>

                <div class="row">

                    <div class="col">
                        <input type="text" class="form-control" placeholder="Enter Aadhaar Number" name="aadhaar_no" id="aadhaar_no" autocomplete="off" required>
                        <span id="aadhaar_noError" class="error" style="color: red; display: none;"><i class="fa fa-exclamation-circle" style="color:red"></i>Please Enter a Valid Aadhaar Number(12 Digits)</span>

                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Enter PAN Card Number (OPTIONAL)" name="pan_no" id="pan_no" autocomplete="off">
                        <span id="panError" class="error" style="color: red; display: none;"><i class="fa fa-exclamation-circle" style="color:red"></i>Please Enter a Valid Pan Number(Example:AAAAA1234A)</span>

                    </div>

                </div>
                <!-- PERSONAL INFORMATION END -->

                <br>

                <!-- ADDRESS START -->
                <div class="row">
                    <h3>Address Details</h3><br><br>
                    <hr width="100%" size="4">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Enter Address" name="address" id="address" autocomplete="off" required>
                        <span id="addressError" class="error" style="color: red; display: none;"><i class="fa fa-exclamation-circle" style="color:red"></i>Please Enter a Valid Address.(Example:A/P-xyz, House No.-10, Street Name-xyz)</span>

                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Enter ZIP Code" name="zip_code" id="zip_code" autocomplete="off" required>
                        <span id="zip_codeError" class="error" style="color: red; display: none;"><i class="fa fa-exclamation-circle" style="color:red"></i>Please Enter a Valid Zip Number.(Must be 6 Digits)</span>

                    </div>
                </div><br>

                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Enter City" name="city" id="city" autocomplete="off" required>
                        <span id="cityError" class="error" style="color: red; display: none;"><i class="fa fa-exclamation-circle" style="color:red"></i>Please Enter a City.</span>

                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Enter State" name="state" id="state" autocomplete="off" required>
                        <span id="stateError" class="error" style="color: red; display: none;"><i class="fa fa-exclamation-circle" style="color:red"></i>Please Enter a State.</span>

                    </div>
                </div>
                <!-- ADDRESS END -->

                <br>

                <!-- EXPERIENCE DETAIL START -->
                <div class="row">
                    <h3>Experience Details</h3>
                    <hr width="100%" size="4">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Enter Experience" name="experience" id="experience" autocomplete="off" required>
                        <span id="experienceError" class="error" style="color: red; display: none;"><i class="fa fa-exclamation-circle" style="color:red"></i>Please Enter a Experience.(Example:Two Years, 2years)</span>

                    </div>
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Enter Company Name" name="company_name" id="company_name" autocomplete="off" required>
                        <span id="company_nameError" class="error" style="color: red; display: none;"><i class="fa fa-exclamation-circle" style="color:red"></i>Please Enter a Company Name.</span>

                    </div>
                </div>
                <!-- EXPERIENCE DETAIL END -->

                <br>

                <!-- REFERENCE DETAIL START -->
                <div class="row">
                    <h3>Reference Details</h3>
                    <hr width="100%" size="4">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Reference Person" name="refer_person" id="refer_person" autocomplete="off" required>
                        <span id="refer_personError" class="error" style="color: red; display: none;"><i class="fa fa-exclamation-circle" style="color:red"></i>Please Enter a Reference Person's Name.</span>

                    </div>
                </div><br>

                <div class="row">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Reference Relation" name="refer_relation" id="refer_relation" autocomplete="off" required>
                        <span id="refer_relationError" class="error" style="color: red; display: none;"><i class="fa fa-exclamation-circle" style="color:red"></i>Please Enter a Relation with Reference Person.</span>

                    </div>
                    <div class="col">
                        <input type="tel" class="form-control" placeholder="Reference Contact Number" name="refer_contact" id="refer_contact" autocomplete="off" required>
                        <span id="refer_contactError" class="error" style="color: red; display: none;"><i class="fa fa-exclamation-circle" style="color:red"></i>Please Enter a Reference Person's Contact Number.</span>

                    </div>
                </div>
                <!-- REFERENCE DETAIL END -->

                <br>

                <!-- SHIFT DETAIL START -->
                <div class="row">
                    <h3>Shift Details</h3><br><br>
                    <hr width="100%" size="4">
                    <div class="col">
                        <input type="text" class="form-control" placeholder="Enter Designation" id="designation" name="designation" autocomplete="off">
                        <span id="designationError" class="error" style="color: red; display: none;"><i class="fa fa-exclamation-circle" style="color:red"></i>Please Enter a Employee's Designation.</span>

                    </div>
                    <div class="col">
                        <select class="form-control" id="shift" autocomplete="off" name="shift">
                            <option value="">Select Shift</option>
                            <option value="Morning">Morning</option>
                            <option value="Night">Night</option>
                            <option value="Other">Other</option>
                        </select>
                        <span id="shiftError" class="error" style="color: red; display: none;"><i class="fa fa-exclamation-circle" style="color:red"></i>Please Select a Valid Shift (Morning, Night, or Other)</span>

                    </div>
                </div><br>

                <div class="row">
                    <div class="col">
                        <!-- <input type="time" class="form-control" placeholder="Shift Start Time" id="shift_start" name="shift_start" autocomplete="off"> -->
                        <input placeholder="Shift Start Time" class="form-control" type="text" onfocus="(this.type='time')" onblur="(this.type='text')" id="shift_start" name="shift_start">
                        <span id="shift_startError" class="error" style="color: red; display: none;"><i class="fa fa-exclamation-circle" style="color:red"></i>Please Enter a Employee's Shift Start Time.</span>

                    </div>
                    <div class="col">
                        <!-- <input type="time" class="form-control" placeholder="Shift End Time" id="shift_end" name="shift_end" autocomplete="off"> -->
                        <input placeholder="Shift End Time" class="form-control" type="text" onfocus="(this.type='time')" onblur="(this.type='text')" id="shift_end" name="shift_end">
                        <span id="shift_endError" class="error" style="color: red; display: none;"><i class="fa fa-exclamation-circle" style="color:red"></i>Please Enter a Employee's Shift End Time.</span>

                    </div>

                </div>
                <!-- SHIFT DETAILS END -->

                <br>

                <!-- SUBMIT AND RESET BUTTON START -->
                <center>
                    <div class="row">

                        <div class="col">
                            <input type="submit" class="btn btn-primary" id="submitButton" name="submit" value="Submit" style="width: 75px;">
                        </div>

                        <div class="col">
                            <input type="reset" class="btn btn-danger" id="resetButton" value="Reset" style="width: 75px;">
                        </div>

                    </div>
                </center>
                <!-- SUBMIT AND RESET BUTTON END -->

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
        document.addEventListener('DOMContentLoaded', function() {

            // Form Submission Validation
            // document.getElementById('form').addEventListener('submit', function(event) {
            //     var isValid = true;


            // Initialize the isValid variable as true
            let isValid = true;

            // Function to check if the form is valid
            function checkValidity() {
                // Reset isValid
                isValid = true;

                // Validate Full Name
                document.getElementById('fullname').addEventListener('input', function() {
                    var nameField = document.getElementById('fullname');
                    var nameError = document.getElementById('nameError');
                    var name = nameField.value.trim();

                    if (name === '') {
                        nameError.style.display = 'inline'; // Show error message
                        isValid = false;
                    } else {
                        // Validate name format: only letters, spaces, and hyphens
                        var nameRegex = /^[a-zA-Z \-\']+$/;
                        if (!nameRegex.test(name)) {
                            nameError.style.display = 'inline'; // Show error message
                            isValid = false;
                        } else {
                            nameError.style.display = 'none'; // Hide error message
                        }
                    }
                });

                // Validate Date of Birth
                document.getElementById('dob').addEventListener('input', function() {
                    var dobField = document.getElementById('dob');
                    var dobError = document.getElementById('dobError');
                    var dob = dobField.value.trim();
                    // Validate dob format: YYYY-MM-DD
                    var dobRegex = /^\d{4}-\d{2}-\d{2}$/;

                    if (dob === '' || !dobRegex.test(dob)) {
                        dobError.style.display = 'inline'; // Show error message
                        isValid = false;
                    } else {
                        dobError.style.display = 'none'; // Hide error message
                    }

                    // Additional validation for Date of Birth
                    let dobDate = new Date(dob);
                    let today = new Date();
                    let age = today.getFullYear() - dobDate.getFullYear();
                    let monthDiff = today.getMonth() - dobDate.getMonth();
                    if (monthDiff < 0 || (monthDiff === 0 && today.getDate() < dobDate.getDate())) {
                        age--;
                    }
                    if (age < 18) {
                        //dobError.textContent = 'Employee must be at least 18 years old.';
                        dobError2.style.display = 'inline'; // Show error message
                        isValid = false;
                    } else {
                        dobError2.style.display = 'none'; // Hide error message
                    }

                });

                // Validate Joining Date
                document.getElementById('joining_date').addEventListener('input', function() {
                    var dobField = document.getElementById('dob');
                    var joining_dateField = document.getElementById('joining_date');
                    var joining_dateError = document.getElementById('joining_dateError');
                    // var joining_dateError2 = document.getElementById('joining_dateError2');
                    var joining_date = joining_dateField.value.trim();
                    var dob = dobField.value.trim();


                    // Validate joining date format: YYYY-MM-DD
                    var joining_dateRegex = /^\d{4}-\d{2}-\d{2}$/;
                    if (joining_date === '' || !joining_dateRegex.test(joining_date)) {
                        joining_dateError.style.display = 'inline'; // Show error message
                        isValid = false;
                    } else {
                        joining_dateError.style.display = 'none'; // Hide error message

                        // Additional validation for Joining Date
                        // let jdDate = new Date(joining_date);
                        if (dob === joining_date) {
                            // joining_dateError.textContent = 'Date of Birth and Joining Date cannot be the same.';
                            joining_dateError2.style.display = 'inline'; // Show error message
                            isValid = false;
                        } else {
                            joining_dateError2.style.display = 'none'; // Hide error message
                        }
                    }

                });
                //Validate Salary
                document.getElementById('salary').addEventListener('input', function() {
                    var salaryField = document.getElementById('salary');
                    var salaryError = document.getElementById('salaryError');
                    var salary = salaryField.value.trim();

                    if (salary === '') {
                        salaryError.style.display = 'inline'; // Show error message
                    } else {
                        // Validate email format using a simple regex
                        var salaryRegex = /^\d+(\.\d{1,2})?$/;
                        if (!salaryRegex.test(salary)) {
                            salaryError.style.display = 'inline'; // Show error message
                        } else {
                            salaryError.style.display = 'none'; // Hide error message
                        }
                    }
                });

                //Validate Gender
                document.getElementById('gender').addEventListener('input', function() {
                    var genderField = document.getElementById('gender');
                    var genderError = document.getElementById('genderError');
                    var gender = genderField.value.trim().toLowerCase(); // Convert to lowercase for consistency

                    if (gender === '') {
                        // genderError.textContent = 'Please select a gender.'; // Error message for empty field
                        genderError.style.display = 'inline'; // Show error message
                    } else {
                        // Validate gender using a regular expression
                        var genderRegex = /^(male|female|other)$/;

                        if (!genderRegex.test(gender)) {
                            // genderError.textContent = 'Please enter a valid gender (male, female, or other).'; // Error message for invalid format
                            genderError.style.display = 'inline'; // Show error message
                        } else {
                            genderError.style.display = 'none'; // Hide error message if gender is valid
                        }
                    }
                });



                // Validate Email
                document.getElementById('email_id').addEventListener('input', function() {
                    var emailField = document.getElementById('email_id');
                    var emailError = document.getElementById('emailError');
                    var email = emailField.value.trim();

                    if (email === '') {
                        emailError.style.display = 'inline'; // Show error message
                    } else {
                        // Validate email format using a simple regex
                        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                        if (!emailRegex.test(email)) {
                            emailError.style.display = 'inline'; // Show error message
                        } else {
                            emailError.style.display = 'none'; // Hide error message
                        }
                    }
                });

                // Validate Contact Number
                document.getElementById('contact_no').addEventListener('input', function() {
                    var contact_noField = document.getElementById('contact_no');
                    var contact_noError = document.getElementById('contact_noError');
                    var contact_no = contact_noField.value.trim();

                    if (contact_no === '') {
                        contact_noError.style.display = 'inline'; // Show error message
                    } else {
                        // Validate contact number format: 10 digits
                        var contact_noRegex = /^\d{10}$/;
                        if (!contact_noRegex.test(contact_no)) {
                            contact_noError.style.display = 'inline'; // Show error message
                        } else {
                            contact_noError.style.display = 'none'; // Hide error message
                        }
                    }
                });

                // Validate Aadhaar Number
                document.getElementById('aadhaar_no').addEventListener('input', function() {
                    var aadhaar_noField = document.getElementById('aadhaar_no');
                    var aadhaar_noError = document.getElementById('aadhaar_noError');
                    var aadhaar_no = aadhaar_noField.value.trim();

                    if (aadhaar_no === '') {
                        aadhaar_noError.style.display = 'inline'; // Show error message
                    } else {
                        // Validate Aadhaar number format: 12 digits
                        var aadhaar_noRegex = /^\d{12}$/;
                        if (!aadhaar_noRegex.test(aadhaar_no)) {
                            aadhaar_noError.style.display = 'inline'; // Show error message
                        } else {
                            aadhaar_noError.style.display = 'none'; // Hide error message
                        }
                    }
                });

                // Optional: Validate PAN Card Number
                document.getElementById('pan_no').addEventListener('input', function() {
                    var panField = document.getElementById('pan_no');
                    var panError = document.getElementById('panError');
                    var pan = panField.value.trim().toUpperCase(); // Convert to uppercase for consistency

                    if (pan === '') {
                        panError.style.display = 'inline'; // Show error message if PAN is empty
                    } else {
                        // Validate PAN format: AAAAA9999A (5 uppercase letters, 4 digits, 1 uppercase letter)
                        var panRegex = /^[A-Z]{5}[0-9]{4}[A-Z]$/;

                        if (!panRegex.test(pan)) {
                            panError.style.display = 'inline'; // Show error message if PAN format is incorrect
                        } else {
                            panError.style.display = 'none'; // Hide error message if PAN format is correct
                        }
                    }
                });

                // VALIDATE ADDRESS
                document.getElementById('address').addEventListener('input', function() {
                    var addressField = document.getElementById('address');
                    var addressError = document.getElementById('addressError');
                    var address = addressField.value.trim();

                    if (address === '') {
                        addressError.style.display = 'inline'; // Show error message if address is empty
                    } else {
                        // Perform additional validation if needed
                        // Address can only contain letters, numbers, spaces, and common symbols (.,#-).
                        var addressRegex = /^[a-zA-Z0-9\s\.,#-]+$/;
                        // For simplicity, let's assume we just check if the address has some content
                        if (address.length <= 3) {
                            addressError.style.display = 'inline'; // Show error message if address is too short
                        } else {
                            addressError.style.display = 'none'; // Hide error message if address is valid
                        }
                    }
                });


                // VALIDATE ZIP CODE
                document.getElementById('zip_code').addEventListener('input', function() {
                    var zip_codeField = document.getElementById('zip_code');
                    var zip_codeError = document.getElementById('zip_codeError');
                    var zip_code = zip_codeField.value.trim();

                    if (zip_code === '') {
                        zip_codeError.style.display = 'inline'; // Show error message
                    } else {
                        // Validate zip number format: 6 digits
                        var zip_codeRegex = /^\d{6}$/;
                        if (!zip_codeRegex.test(zip_code)) {
                            zip_codeError.style.display = 'inline'; // Show error message
                        } else {
                            zip_codeError.style.display = 'none'; // Hide error message
                        }
                    }
                });

                // VALIDATE CITY
                document.getElementById('city').addEventListener('input', function() {
                    var cityField = document.getElementById('city');
                    var cityError = document.getElementById('cityError');
                    var city = cityField.value.trim();

                    if (city === '') {
                        cityError.style.display = 'inline'; // Show error message if city is empty
                    } else {
                        // Perform additional validation if needed
                        // City can only contain letters, numbers, spaces, and common symbols (.,#-).
                        var cityRegex = /^[a-zA-Z0-9\s\.,#-]+$/;
                        // For simplicity, let's assume we just check if the city has some content
                        if (city.length <= 3) {
                            cityError.style.display = 'inline'; // Show error message if city is too short
                        } else {
                            cityError.style.display = 'none'; // Hide error message if city is valid
                        }
                    }
                });


                // VALIDATE STATE
                document.getElementById('state').addEventListener('input', function() {
                    var stateField = document.getElementById('state');
                    var stateError = document.getElementById('stateError');
                    var state = stateField.value.trim();

                    if (state === '') {
                        stateError.style.display = 'inline'; // Show error message if state is empty
                    } else {
                        // Perform additional validation if needed
                        // state can only contain letters, numbers, spaces, and common symbols (.,#-).
                        var stateRegex = /^[a-zA-Z0-9\s\.,#-]+$/;
                        // For simplicity, let's assume we just check if the state has some content
                        if (state.length <= 3) {
                            stateError.style.display = 'inline'; // Show error message if state is too short
                        } else {
                            stateError.style.display = 'none'; // Hide error message if state is valid
                        }
                    }
                });


                // VALIDATE EXPERIENCE DETAILS
                document.getElementById('experience').addEventListener('input', function() {
                    var experienceField = document.getElementById('experience');
                    var experienceError = document.getElementById('experienceError');
                    var experience = experienceField.value.trim();

                    if (experience === '') {
                        //experienceError.textContent = 'Please enter your experience.'; // Error message for empty field
                        experienceError.style.display = 'inline'; // Show error message
                    } else {
                        // Validate experience using a regular expression
                        var experienceRegex = /^[a-zA-Z0-9 \-\']+$/;

                        if (!experienceRegex.test(experience)) {
                            // experienceError.textContent = 'Experience can only contain letters, numbers, spaces, hyphens, and apostrophes.'; // Error message for invalid format
                            experienceError.style.display = 'inline'; // Show error message
                        } else {
                            experienceError.style.display = 'none'; // Hide error message if experience is valid
                        }
                    }
                });

                // VALIDATE COMPANY NAME
                document.getElementById('company_name').addEventListener('input', function() {
                    var company_nameField = document.getElementById('company_name');
                    var company_nameError = document.getElementById('company_nameError');
                    var company_name = company_nameField.value.trim();

                    if (company_name === '') {
                        company_nameError.style.display = 'inline'; // Show error message
                    } else {
                        // Validate name format: only letters, spaces, and hyphens
                        var company_nameRegex = /^[a-zA-Z0-9\s\-,'.()&]+$/;
                        if (!company_nameRegex.test(company_name)) {
                            company_nameError.style.display = 'inline'; // Show error message
                        } else {
                            company_nameError.style.display = 'none'; // Hide error message
                        }
                    }
                });

                // VALIDATE REFERENCE PERSON'S NAME
                document.getElementById('refer_person').addEventListener('input', function() {
                    var refer_personField = document.getElementById('refer_person');
                    var refer_personError = document.getElementById('refer_personError');
                    var refer_person = refer_personField.value.trim();

                    if (refer_person === '') {
                        refer_personError.style.display = 'inline'; // Show error message
                    } else {
                        // Validate name format: only letters, spaces, and hyphens
                        var refer_personRegex = /^[a-zA-Z \-\']+$/;
                        if (!refer_personRegex.test(refer_person)) {
                            refer_personError.style.display = 'inline'; // Show error message
                        } else {
                            refer_personError.style.display = 'none'; // Hide error message
                        }
                    }
                });

                // VALIDATE RELATION WITH REFERENCE PERSON
                document.getElementById('refer_relation').addEventListener('input', function() {
                    var refer_relationField = document.getElementById('refer_relation');
                    var refer_relationError = document.getElementById('refer_relationError');
                    var refer_relation = refer_relationField.value.trim();

                    if (refer_relation === '') {
                        refer_relationError.style.display = 'inline'; // Show error message
                    } else {
                        // Validate name format: only letters, spaces, and hyphens
                        var refer_relationRegex = /^[a-zA-Z \-\']+$/;
                        if (!refer_relationRegex.test(refer_relation)) {
                            refer_relationError.style.display = 'inline'; // Show error message
                        } else {
                            refer_relationError.style.display = 'none'; // Hide error message
                        }
                    }
                });

                // VALIDATE REFERENCE PERSON'S CONTACT NUMBER
                document.getElementById('refer_contact').addEventListener('input', function() {
                    var refer_contactField = document.getElementById('refer_contact');
                    var refer_contactError = document.getElementById('refer_contactError');
                    var refer_contact = refer_contactField.value.trim();

                    if (refer_contact === '') {
                        refer_contactError.style.display = 'inline'; // Show error message
                    } else {
                        // Validate contact number format: 10 digits
                        var refer_contactRegex = /^\d{10}$/;
                        if (!refer_contactRegex.test(refer_contact)) {
                            refer_contactError.style.display = 'inline'; // Show error message
                        } else {
                            refer_contactError.style.display = 'none'; // Hide error message
                        }
                    }
                });

                // VALIDATE DESIGNATION OF EMPLOYEE
                document.getElementById('designation').addEventListener('input', function() {
                    var designationField = document.getElementById('designation');
                    var designationError = document.getElementById('designationError');
                    var designation = designationField.value.trim();

                    if (designation === '') {
                        designationError.style.display = 'inline'; // Show error message
                    } else {
                        // Validate contact number format: 10 digits
                        var designationRegex = /^[a-zA-Z \-\']+$/;
                        if (!designationRegex.test(designation)) {
                            designationError.style.display = 'inline'; // Show error message
                        } else {
                            designationError.style.display = 'none'; // Hide error message
                        }
                    }
                });

                //VALIDATE EMPLOYEE'S SHIFT
                document.getElementById('shift').addEventListener('input', function() {
                    var shiftField = document.getElementById('shift');
                    var shiftError = document.getElementById('shiftError');
                    var shift = shiftField.value.trim().toLowerCase(); // Convert to lowercase for consistency

                    if (shift === '') {
                        // shiftError.textContent = 'Please select a gender.'; // Error message for empty field
                        shiftError.style.display = 'inline'; // Show error message
                    } else {
                        // Validate gender using a regular expression
                        var shiftRegex = /^(morning|night|other)$/;

                        if (!shiftRegex.test(shift)) {
                            // shiftError.textContent = 'Please enter a valid gender (male, female, or other).'; // Error message for invalid format
                            shiftError.style.display = 'inline'; // Show error message
                        } else {
                            shiftError.style.display = 'none'; // Hide error message if gender is valid
                        }
                    }
                });

                //VALIDATE EMPLOYEE'S SHIFT START TIME
                document.getElementById('shift_start').addEventListener('input', function() {
                    var shift_startField = document.getElementById('shift_start');
                    var shift_startError = document.getElementById('shift_startError');
                    var shift_start = shift_startField.value.trim();

                    if (shift_start === '') {
                        shift_startError.style.display = 'inline'; // Show error message
                    } else {
                        // Validate dob format: YYYY-MM-DD
                        var shift_startRegex = /^([01]?[0-9]|2[0-3]):[0-5][0-9]$/;
                        if (!shift_startRegex.test(shift_start)) {
                            shift_startError.style.display = 'inline'; // Show error message
                        } else {
                            shift_startError.style.display = 'none'; // Hide error message
                        }
                    }
                });

                //VALIDATE EMPLOYEE'S SHIFT END TIME
                document.getElementById('shift_end').addEventListener('input', function() {
                    var shift_endField = document.getElementById('shift_end');
                    var shift_endError = document.getElementById('shift_endError');
                    var shift_end = shift_endField.value.trim();

                    if (shift_end === '') {
                        shift_endError.style.display = 'inline'; // Show error message
                    } else {
                        // Validate dob format: YYYY-MM-DD
                        var shift_endRegex = /^([01]?[0-9]|2[0-3]):[0-5][0-9]$/;
                        if (!shift_endRegex.test(shift_end)) {
                            shift_endError.style.display = 'inline'; // Show error message
                        } else {
                            shift_endError.style.display = 'none'; // Hide error message
                        }
                    }
                });

                // Optionally, you can add further validations for other fields here

                // FORM SUBMISSION
                document.getElementById('myForm').addEventListener('submit', function(event) {
                    checkValidity();

                    if (!isValid) {
                        event.preventDefault(); // Prevent form submission
                    }
                });
            }

            checkValidity(); // Call the validation function
        });
    </script>



    <!-- JAVASCRIPT END (VALIDATION) -->


</body>

</html>