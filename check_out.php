<?php session_start(); ?>
<?php
// if(isset($_POST['check_out']))
// {
//     date_default_timezone_set("Asia/Kolkata");
//     $check_out = date('H:i:s');;
//     echo "Check Out button was clicked: " . $check_out . "<br>";
// }

    include('dbconnect/connect.php');

    if (isset($_POST['check_out'])) {
        date_default_timezone_set("Asia/Kolkata");
        $check_out = date('H:i:s');
        $emp_id = $_GET['emp_id'];
        $date = date('Y/m/d');

        // Prepare the SQL statement
        $updatequery = "UPDATE `attendance` SET `check_out`='$check_out' where `emp_id`='$emp_id' and `date`='$date'";

        // Bind parameters and execute the statement
        $query = mysqli_query($conn, $updatequery);

        if (!$query) {
            echo '<script> alert("Error") </script>';
        } else {

            $_SESSION['check_out'] = true;
            header('location:attendence.php');
        }
    }

?>
