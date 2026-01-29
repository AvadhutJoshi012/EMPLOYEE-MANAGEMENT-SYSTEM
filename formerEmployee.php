<?php include('dbconnect/connect.php') ?>
<?php session_start(); ?>

<?php if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
  header('Location: login.php');
  exit;
}

?>

<?php

error_reporting(E_ERROR | E_PARSE);

// SQL query to fetch data from users table
$sql = "SELECT * FROM employee WHERE flag = False";
$result = $conn->query($sql);

// Check if any rows were returned
if ($result->num_rows > 0) {
  // Initialize an empty array to store fetched data
  $data = array();

  // Fetch associative array
  while ($row = $result->fetch_assoc()) {
    $data[] = $row;
  }
 } //else {
//   echo "0 results";
// }  

// Close connection
$conn->close();

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Former Employee</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
  <link rel="stylesheet" href="css/style.css">


  <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
  <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script> -->
  <script src="js/script.js"></script>

  <link rel="shortcut icon" href="images/LTlogo.png" type="image/x-icon">
  <style>
    .wrapper {
      display: flex;
    }

    .main {
      flex: 1;
      /* margin: 25px; */
      padding: 10px;
    }


    .b:hover {
      border: 1px solid #0d6efd;
      color: #0d6efd;
      background-color: #fff;
    }

    .b {
      color: #fff;
      background-color: #0d6efd;
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
            <i class="fa fa-solid fa-user"></i><span style="margin-left: 12px; font-size:20px">Employee</span><i class="fa-solid fa-caret-down" style="margin-left: 5px;"></i>
          </button>
          <div class="collapse drop-down-menu show" id="home-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 ">
              <li><a href="employee.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded my-1" style="margin-left: 40px;"><i class="fa-solid fa-users" style="margin-top: 8px;" ></i><span style="margin-left: 12px;  font-size:20px">View Employee</a></span></li>
              <li><a href="addEmployee.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded my-1" style="margin-left: 40px;"> <i class="fa fa-solid fa-user-plus"  style="margin-top: 8px;"></i><span style="margin-left: 12px; font-size:20px">Add Employee</a></li></span>
              <li><a href="updateEmployee.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded my-1" style="margin-left: 40px;"><i class="fa fa-solid fa-user-pen"  style="margin-top: 8px;"></i><span style="margin-left: 12px; font-size:20px">Update Employee</a></span></li>
              <li><a href="formerEmployee.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded my-1" style="margin-left: 40px;"><i class="fa fa-solid fa-user-slash"  style="color:#0d6efd;margin-top: 8px;"></i><span style="margin-left: 12px; font-size:20px; color:#0d6efd; font-size:20px">Former Employee</a></span></li>
            </ul>
          </div>
        </li>
        <li>
          <a href="attendence.php" class="nav-link link-dark">
            <i class="fa-regular fa-calendar-check"></i><span style="margin-left: 12px; font-size:20px">Attendence</span>
          </a>
        </li>
        <li>
          <a href="support.php" class="nav-link link-dark">
            <i class="fa-solid fa-headset"></i><span style="margin-left: 12px; font-size:20px">Support</span>
          </a>
        </li>
      </ul>
    </div>
    <div class="main" style="overflow-y: auto ; max-height:92vh;">
      <div class="container table">
        <table id="example" class="table table-striped" style="width:100%; text-align:start">
          <thead>
            <tr>
              <th style="text-align: start;">ID</th>
              <th style="text-align: start;">Employee Name</th>
              <th style="text-align: start;">Designation</th>
              <th style="text-align: start;">Shift</th>
              <th style="text-align: start;">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($data as $row) : ?>
              <tr>
                <td style="text-align: start;"><?php echo $row['emp_id']; ?></td>
                <td><?php echo $row['fullname']; ?></td>
                <td><?php echo $row['designation']; ?></td>
                <td><?php echo $row['shift']; ?></td>
                <td><a href="viewFormerEmployee.php?emp_id=<?php echo $row['emp_id']; ?>"><input type="button" value="View" class="btn btn-outline-primary b" style="width: 75px;"></a></td>
              </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <?php include 'chatbot.php'; ?>
    </div>

  </div>
  <?php include('footer.php')?>



  <!-- <h3>Employee Page</h3> -->

  <!-- <script src="js/bootstrap.bundle.js"></script>
    <script src="js/navbar.js"></script> -->

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
  <script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>

  <script>
    $(document).ready(function() {
      $('#example').DataTable();
    });
  </script>

</body>

</html>