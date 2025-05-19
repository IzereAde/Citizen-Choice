<?php
session_start();
include("../backend/connect.php");

// Redirect to login if not logged in
if (!isset($_POST['track'])) {
    header("Location: ../index.php");
    exit();
}

$citizen_email=$_POST['email'];
$name=$_POST['name'];

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
            <a class="sidebar-link" href="../index.php" aria-expanded="false">
              <i class="ti ti-login"></i>
              <span class="hide-menu">back to home</span>
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
            <a href="../index.php" class="btn btn-primary">
            back to home
            </a>
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
                <?php
                // Correct JOIN query: complaints INNER JOIN citizens and agencies
                $select = mysqli_query($conn, "
                SELECT complaints.*, citizens.citizen_full_name, agencies.agencie_name
                FROM complaints
                INNER JOIN citizens ON complaints.citizen_id = citizens.citizen_id
                INNER JOIN agencies ON complaints.agencie_id = agencies.agencie_id
                INNER JOIN admins ON admins.agencie_id = agencies.agencie_id
                WHERE citizens.citizen_email='$citizen_email';
            ");

                if (mysqli_num_rows($select) > 0) {
                ?>
                  <table class="table text-nowrap mb-0 align-middle">
                    <thead class="text-dark fs-4">
                      <tr>
                        
                        <th>Agency</th>
                        <th>Description</th>
                        <th>Status</th>
                        <th>Submitted</th>
                        <th>Last Updated</th>
                       
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                    while ($fetch = mysqli_fetch_array($select)) {
                    ?>
                      <tr>
                        
                        <td><?php echo $fetch['agencie_name']; ?></td>
                        <td><?php echo $fetch['description']; ?></td>
                        <td><?php echo $fetch['status_id']; ?></td>
                        <td><?php echo $fetch['submission_date']; ?></td>
                        <td><?php echo $fetch['last_updated']; ?></td>
                        

                      </tr>
                    <?php
                    }
                    ?>
                    </tbody>
                  </table>
                <?php
                } else {
                  echo "<p>No complaints found for you.</p>";
                }
                ?>
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
