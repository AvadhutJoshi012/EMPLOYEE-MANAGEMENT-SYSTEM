<?php
// Debugging to check form submission
// var_dump($_POST);  // Check what data is being received via POST

include('dbconnect/connect.php');
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: login.php');
    exit;
}

if (isset($_GET['emp_id'])) {
    $emp_id = $_GET['emp_id'];
}

if (isset($_POST['filterDate'])) {
    $month = $_POST['month'];
    

    // Perform the query only if fromDate and toDate are set
    // $query = "SELECT * FROM `attendance` WHERE `date` BETWEEN '$fromDate' AND '$toDate' AND `emp_id` = '$emp_id'";
    $query = "SELECT * FROM `attendance` WHERE MONTH(date) = '$month'";
    $fetch_rows = mysqli_query($conn, $query);

    if (!$fetch_rows) {
        die('Query failed: ' . mysqli_error($conn));
    }

    $filterRows = mysqli_num_rows($fetch_rows);


    // Example of fetching data from result set

}

?>
