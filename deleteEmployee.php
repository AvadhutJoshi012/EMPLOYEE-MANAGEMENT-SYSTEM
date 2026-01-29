<?php 
include ('dbconnect/connect.php'); 
?>
<?php 
session_start();$_SESSION['deleteEmp'] = false
 ?>
<?php

    


    if(isset($_GET['emp_id'])){
        $id = $_GET['emp_id'];

        // $query = "Delete from `employee` where `emp_id` = '$id'";
        $query = "UPDATE `employee` SET `flag` = '0' where `emp_id` = '$id'";

        $result = mysqli_query($conn, $query);

        if(!$result){
            die("Query Failed");
        }
        else{
            $_SESSION['deleteEmp'] = true;
            header('location:updateEmployee.php');
        }
    }

?>