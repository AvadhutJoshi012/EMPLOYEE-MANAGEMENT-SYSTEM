<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
  <link rel="stylesheet" href="css/style.css">

  <link rel="shortcut icon" href="images/LTlogo.png" type="image/x-icon">
  <style>
    .wrapper {
      display: flex;
    }

    .sidebar {
      width: 280px;
      height: 92vh;
      background-color: #f8f9fa; /* Added background color for better visibility */
    }

    .content {
      flex: 1;
      padding: 20px;
    }
  </style>
</head>

<body>
  <?php include('header.php'); ?>
  <div class="wrapper">
    <div class="sidebar d-flex flex-column flex-shrink-0 p-3">
      <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
          <a href="emshome.php" class="nav-link link-dark" aria-current="page">
            <i class="fa-solid fa-house"></i><span style="margin-left: 19px;">Home</span>
          </a>
        </li>
        <li class="mb-1">
          <button class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed nav-link link-dark" data-bs-toggle="collapse" data-bs-target="#home-collapse">
            <i class="fa fa-solid fa-user"></i><span style="margin-left: 12px;">Employee</span><i class="fa-solid fa-caret-down" style="margin-left: 5px;"></i>
          </button>
          <div class="collapse drop-down-menu show" id="home-collapse">
            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1">
              <li><a href="employee.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded my-1" style="margin-left: 40px;"><i class="fa-solid fa-users" style="color:#0d6efd;"></i><span style="margin-left: 12px; color:#0d6efd">View Employee Data</a></li>
              <li><a href="addEmployee.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded my-1" style="margin-left: 40px;"> <i class="fa fa-solid fa-user-plus"></i><span style="margin-left: 12px;">Add Employee</a></li>
              <li><a href="updateEmployee.php" class="link-body-emphasis d-inline-flex text-decoration-none rounded my-1" style="margin-left: 40px;"><i class="fa fa-solid fa-user-pen"></i><span style="margin-left: 12px;">Update Employee</a></li>
            </ul>
          </div>
        </li>
        <li>
          <a href="attendence.php" class="nav-link link-dark">
            <i class="fa-regular fa-calendar-check"></i><span style="margin-left: 12px;">Attendance</span>
          </a>
        </li>
        <li>
          <a href="support.php" class="nav-link link-dark">
            <i class="fa-solid fa-headset"></i><span style="margin-left: 12px;">Support</span>
          </a>
        </li>
      </ul>
    </div>

    <div class="content">
      <div class="container" style="width: 1000px;">
        <table id="example" class="table table-striped" style="width:100%">
          <thead>
            <tr>
              <th>Sr.No</th>
              <th>Employee Name</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1</td>
              <td>Tiger Nixon</td>
            </tr>
            <tr>
              <td>2</td>
              <td>Garrett Winters</td>
            </tr>
            <tr>
              <td>3</td>
              <td>Ashton Cox</td>
            </tr>
            <tr>
              <td>4</td>
              <td>Cedric Kelly</td>
            </tr>
            <tr>
              <td>5</td>
              <td>Airi Satou</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
  </div>

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
