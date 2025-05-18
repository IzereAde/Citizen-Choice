<?php
session_start();
include("../backend/connect.php");

// Redirect to login if not logged in
if (!isset($_SESSION['admin_id'])) {
    header("Location: authentication-login.php");
    exit();
}

// Fetch admin (customer) data
$user_id = $_SESSION['admin_id'];
$sql = "SELECT * FROM `admins` WHERE admin_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $user_id);
$stmt->execute();
$user_data = $stmt->get_result()->fetch_assoc();
$stmt->close();
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CITIZEN CHOICE Admin</title>
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>
<body>
<div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full">
  <!-- Sidebar -->
  <aside class="left-sidebar">
    <div>
      <div class="brand-logo d-flex align-items-center justify-content-between">
        <a href="#" class="text-nowrap logo-img" style="font-size: large;"><b>CITIZEN CHOICE</b></a>
        <div class="close-btn d-xl-none d-block sidebartoggler cursor-pointer" id="sidebarCollapse">
          <i class="ti ti-x fs-8"></i>
        </div>
      </div>
      <nav class="sidebar-nav scroll-sidebar" data-simplebar="">
        <ul id="sidebarnav">
          <li class="nav-small-cap"><span class="hide-menu">Home</span></li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="#" aria-expanded="false">
              <i class="ti ti-layout-dashboard"></i>
              <span class="hide-menu">Dashboard</span>
            </a>
          </li>
          <li class="sidebar-item">
            <a class="sidebar-link" href="./authentication-login.php" aria-expanded="false">
              <i class="ti ti-login"></i>
              <span class="hide-menu">Logout</span>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </aside>
  
  <!-- Main Content -->
  <div class="body-wrapper">
    <!-- Header -->
    <header class="app-header">
      <nav class="navbar navbar-expand-lg navbar-light">
        <ul class="navbar-nav">
          <li class="nav-item d-block d-xl-none">
            <a class="nav-link sidebartoggler nav-icon-hover" id="headerCollapse" href="javascript:void(0)">
              <i class="ti ti-menu-2"></i>
            </a>
          </li>
        </ul>
        <div class="navbar-collapse justify-content-end px-0" id="navbarNav">
          <ul class="navbar-nav flex-row ms-auto align-items-center justify-content-end">
            <a href="#" class="btn btn-primary">IZERIMANA Adeline</a>
          </ul>
        </div>
      </nav>
    </header>

    <!-- Content -->
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
          <div class="card w-100">
            <div class="card-body p-4">
              <h5 class="card-title fw-semibold mb-4">Complaints</h5>
              <div class="table-responsive">
                <table class="table text-nowrap mb-0 align-middle">
                  <thead class="text-dark fs-4">
                    <tr>
                      <th>Citizen Name</th>
                      <th>Category</th>
                      <th>Description</th>
                      <th>Status</th>
                      <th>Submitted</th>
                      <th>Last Updated</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <!-- Example row (you’ll replace this with dynamic rows later) -->
                    <tr>
                      <td>Mukamana Jeannine</td>
                      <td>Transport</td>
                      <td>Rwamagana to Kigali road was so damaged</td>
                      <td>Closed</td>
                      <td>12 April 2024</td>
                      <td>12 April 2024</td>
                      <td><a href="#" class="btn btn-sm btn-primary">Update</a></td>
                    </tr>
                    <!-- Add PHP loop here in future -->
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

<!-- Scripts -->
<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/js/sidebarmenu.js"></script>
<script src="../assets/js/app.min.js"></script>
<script src="../assets/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="../assets/libs/simplebar/dist/simplebar.js"></script>
<script src="../assets/js/dashboard.js"></script>
</body>
</html>
