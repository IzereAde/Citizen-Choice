<?php session_start(); 


?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>CITIZEN CHOICE - Admin Sign Up</title>
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
  <link rel="shortcut icon" type="image/png" href="../assets/images/logos/favicon.png" />
</head>

<body>
<div class="page-wrapper" id="main-wrapper">
  <div class="d-flex align-items-center justify-content-center min-vh-100">
    <div class="col-md-8 col-lg-5">
      <div class="card">
        <div class="card-body">
          <h4 class="text-center">Government Agencies - Admin Sign Up</h4>

          <?php
          if (isset($_SESSION['signup_error'])) {
              echo "<div class='alert alert-danger'>{$_SESSION['signup_error']}</div>";
              unset($_SESSION['signup_error']);
          }
          if (isset($_SESSION['signup_success'])) {
              echo "<div class='alert alert-success'>{$_SESSION['signup_success']}</div>";
              unset($_SESSION['signup_success']);
          }
          ?>

          <form method="POST" action="process_signup.php">
            <div class="mb-3">
              <label class="form-label">Full Name</label>
              <input type="text" class="form-control" name="full_name" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Email Address</label>
              <input type="email" class="form-control" name="email" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="password" class="form-control" name="password" required>
            </div>

            <div class="mb-4">
              <label class="form-label">Agency</label>
              <select class="form-select" name="agency_id" required>
                <option value="">-- Select Agency --</option>
                <option value="1">Health Ministry</option>
                <option value="2">Water Board</option>
                <option value="3">Education Office</option>
              </select>
            </div>

            <button type="submit" class="btn btn-primary w-100">Sign Up</button>
          </form>

          <div class="text-center mt-3">
            <p>Already have an account? <a href="authentication-login.php" class="text-primary">Sign in</a></p>
          </div>

        </div>
      </div>
    </div>
  </div>
</div>

<script src="../assets/libs/jquery/dist/jquery.min.js"></script>
<script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
