<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="fontawsome/css/all.min.css">
    <!-- <link rel="stylesheet" href="datatables/css/dataTables.dataTables.min.css"> -->
    <!-- <link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" /> -->
    <link rel="stylesheet" href="css/style.css">
    <style>
        .navbar-nav>li {
            padding-right: 80px;
        }

        .navbar-custom {
            /* background-color: rgb(52, 122, 235) !important; */
            background-color: rgb(248, 249, 250) !important;
            /* background: rgb(2, 0, 36);
            background: linear-gradient(90deg, rgba(2, 0, 36, 1) 0%, rgba(9, 9, 121, 1) 13%, rgba(0, 212, 255, 1) 100%); */
        }

        .nlc {
            color: black;
        }

        .nlc:hover {
            color: black;
            /* text-decoration: underline; */
            /* background-color: #fff; */
            /* border-radius: 5px; */

        }

      
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-custom" style="height: 50px;">
        <div class="container-fluid">
            <a class="navbar-brand" href="index.php" style="padding-left:30px; font-size:35px"><span>EMS</span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false" style="font-size:20px;">
                            Profile
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="profile.php">Profile</a></li>
                            <li><a class="dropdown-item" href="logout_process.php">Logout</a></li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item" href="support.php">Tech Support</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- <ul class="nav nav-tabs justify-content-center navbar-custom nav-fill">
        <li class="nav-item nlc">
            <a class="nav-link active nlc" aria-current="page" href="#">Home</a>
        </li>
        <li class="nav-item nlc">
            <a class="nav-link nlc" href="#">Employee</a>
        </li>
        <li class="nav-item nlc">
            <a class="nav-link nlc" href="#">Attendence</a>
        </li>
    </ul> -->

    <script src="js/bootstrap.bundle.js"></script>
    <!-- <script src="datatables/js/dataTables.min.js"></script> -->
    <!-- <script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script> -->
    <script src="js/navbar.js"></script>
</body>

</html>