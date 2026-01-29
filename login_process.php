<?php include('dbconnect/connect.php') ?>
<?php session_start(); ?>

<?php

if (isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];
}

$query = "Select * from `admin` where `username` = '$username' and BINARY `password` = '$password' ";

$result = mysqli_query($conn, $query);

if (!$result) {
    die("Query Failed");
} else {
    $rows = mysqli_num_rows($result);

    if ($rows == 1) {
        $_SESSION['username'] = $username;
        $_SESSION['loggedin'] = true;
        header('location:index.php');
    } else {
        $_SESSION['login_error'] = "Please Enter a valid Username or Password...!";
        header('location:login.php');
    }
}

?>