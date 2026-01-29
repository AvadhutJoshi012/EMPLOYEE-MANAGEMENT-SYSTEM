<?php
// include('dbconnect/connect.php');
// session_start();

// if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
//     header('Location: login.php');
//     exit;
// }

// if (isset($_GET['emp_id'])) {
//     $emp_id = $_GET['emp_id'];
// }

// if (isset($_POST['filterDate'])) {
//     $fromDate = $_POST['from_date'];
//     $toDate = $_POST['to_date'];

//     echo "$fromDate";
//     echo "$toDate";

    // Perform the query only if fromDate and toDate are set
    // $query = "SELECT * FROM `attendance` WHERE `date` BETWEEN '$fromDate' AND '$toDate' AND `emp_id` = '$emp_id'";
    // $fetch_rows = mysqli_query($conn, $query);

    // if (!$fetch_rows) {
    //     die('Query failed: ' . mysqli_error($conn));
    // }

    // $filterRows = mysqli_num_rows($fetch_rows);

    // echo "Number of rows: $filterRows";
// }
?>

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
    $fromDate = $_POST['from_date'];
    $toDate = $_POST['to_date'];

    // Perform the query only if fromDate and toDate are set
    $query = "SELECT * FROM `attendance` WHERE `date` BETWEEN '$fromDate' AND '$toDate' AND `emp_id` = '$emp_id'";
    $fetch_rows = mysqli_query($conn, $query);

    if (!$fetch_rows) {
        die('Query failed: ' . mysqli_error($conn));
    }

    $filterRows = mysqli_num_rows($fetch_rows);


    // Example of fetching data from result set
   
}
?>


<!-- Your HTML form to input fromDate and toDate -->
