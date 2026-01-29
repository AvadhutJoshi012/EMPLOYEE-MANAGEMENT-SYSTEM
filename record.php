<?php
include('dbconnect/connect.php');

date_default_timezone_set('Asia/Kolkata');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $emp_id = $_POST['emp_id'];
    $type = $_POST['type'];
    $current_time = date('Y-m-d H:i:s');
    $date = date('l d M Y');
    // $status = "Present";

    if ($type == 'in') {
      
       // $check_in_time = $_POST['in_time'];
        
        // Here, you should save $check_in_time to the database for the given $emp_id
        // Assuming a table structure where you store attendance records

        // Example SQL to update the employee's check-in time
        $query = "INSERT INTO attendance (emp_id, check_in, date, status) VALUES  ($emp_id, '$current_time', '$date', $status)";
        // $update_query = "UPDATE attendance SET check_in = '$current_time' and WHERE emp_id = '$emp_id'";
        mysqli_query($conn, $update_query);

        

      

        // $update_query = "INSERT INTO attendance(emp_id, check_in, date) VALUES ($emp_id, $current_time, $date); ";
        // mysqli_query($conn, $update_query);
        
        echo "Check-in recorded at $current_time"; // This will be displayed as a response
    } else if ($type == 'out') {
        // Handle the out time logic here
        // Example: Update the out time in the database
        $update_query = "UPDATE attendance SET check_out = '$current_time' WHERE emp_id = '$emp_id'";
        mysqli_query($conn, $update_query);
        
        echo "Check-out recorded at $current_time"; // This will be displayed as a response
        
    }
}
?>
