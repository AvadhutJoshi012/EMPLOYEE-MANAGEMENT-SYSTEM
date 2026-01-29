<?php session_start(); ?>

<?php
include('dbconnect/connect.php');

// Start the session (assuming session_start() is called before this point)
session_start();

if (isset($_POST['check_in'])) {
    date_default_timezone_set("Asia/Kolkata");
    $check_in = date('H:i:s');
    $emp_id = $_GET['emp_id'];
    $date = date('Y-m-d');  // Use Y-m-d format for MySQL DATE type

    // Check if the employee has already checked in today
    $check_query = "SELECT COUNT(*) as count FROM attendance WHERE emp_id = ? AND date = ?";
    $stmt_check = mysqli_prepare($conn, $check_query);
    mysqli_stmt_bind_param($stmt_check, "ss", $emp_id, $date);
    mysqli_stmt_execute($stmt_check);
    $result_check = mysqli_stmt_get_result($stmt_check);
    $row_check = mysqli_fetch_assoc($result_check);
    
    if ($row_check['count'] > 0) {
        // echo '<script> alert("You have already checked in for today.") </script>';
        $_SESSION['checked_in'] = true;
        header('location:attendence.php');
        exit();
    } else {
        // Retrieve shift information from the employee table
        $query = "SELECT shift_start, shift_end FROM employee WHERE emp_id = ?";
        $stmt = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($stmt, "s", $emp_id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);

        $shift_start = $row['shift_start'];
        $shift_end = $row['shift_end'];

        // Calculate the allowed check-in window based on shift start time (+15 minutes tolerance)
        $shift_start_time = strtotime($shift_start);
        $last_checkin_time = $shift_start_time + (15 * 60);  // 15 minutes tolerance
        $last_checkin = date('H:i:s', $last_checkin_time);

        // Determine if the employee is present or late
        if ($check_in <= $last_checkin) {
            $status = "Present";
        } else {
            $status = "Late";
        }

        // Insert the attendance record
        $insertquery = "INSERT INTO attendance(emp_id, check_in, date, status) VALUES (?, ?, ?, ?)";
        $stmt_insert = mysqli_prepare($conn, $insertquery);
        mysqli_stmt_bind_param($stmt_insert, "ssss", $emp_id, $check_in, $date, $status);
        $query_insert = mysqli_stmt_execute($stmt_insert);

        if (!$query_insert) {
            echo '<script> alert("Error inserting attendance record.") </script>';
        } else {
            $_SESSION['check_in'] = true;
            header('location:attendence.php');
            exit(); // Ensure no further output after header redirection
        }
    }
}
?>
