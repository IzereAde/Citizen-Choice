<?php 
session_start(); 

// Database connection
$host = 'localhost';
$dbname = 'mvp';
$username = 'root';
$password = '';

$conn = new mysqli($host, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Form submission
if(isset($_POST['submit'])){
    $name = $_POST['full_name'];
    $email = $_POST['email'];
    $citizen_phone_number = $_POST['citizen_phone_number'];
    $agency_id = $_POST['agency_id'];
    $Description = $_POST['Description'];

    // Check if citizen already exists by email
    $select_citizen = mysqli_query($conn, "SELECT * FROM `citizens` WHERE `citizen_email`='$email'");

    if (mysqli_num_rows($select_citizen) > 0) {
        $fetch = mysqli_fetch_array($select_citizen);
        $citizen_id = $fetch['citizen_id'];

    } else {
        // Insert new citizen
        $insert_citizen = mysqli_query($conn, "INSERT INTO `citizens`(`citizen_full_name`, `citizen_email`, `citizen_phone_number`) VALUES ('$name','$email','$citizen_phone_number')");

        if ($insert_citizen) {
            $citizen_id = mysqli_insert_id($conn);
        } else {
            echo "<script>alert('Error inserting citizen.');</script>";
            exit();
        }
    }

    // Insert complaint
    $insert_complaint = mysqli_query($conn, "INSERT INTO `complaints`(`citizen_id`, `agencie_id`, `description`, `status_id`, `submission_date`, `last_updated`) VALUES ('$citizen_id','$agency_id','$Description','pending',NOW(),NOW())");

    if ($insert_complaint) {
      echo "<script>
      alert('Thank you! Your complaint has been submitted.');
      window.location.href = '../index.php';
    </script>";
    } else {
        echo "<script>alert('Error submitting your complaint.');</script>";
    }
}

?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Citizen Choice - Complaint Submission</title>
  <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>

<body>
<div class="page-wrapper" id="main-wrapper">
  <div class="d-flex align-items-center justify-content-center min-vh-100">
    <div class="col-md-8 col-lg-5">
      <div class="card">
        <div class="card-body">
          <h4 class="text-center">Citizen Complaints or Feedback Submission</h4>

          <form method="POST" action="">
            <div class="mb-3">
              <label class="form-label">Full Name</label>
              <input type="text" class="form-control" name="full_name" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Email Address</label>
              <input type="email" class="form-control" name="email" required>
            </div>

            <div class="mb-3">
              <label class="form-label">Phone Number</label>
              <input type="number" class="form-control" name="citizen_phone_number" required>
            </div>

            <div class="mb-4">
              <label class="form-label">Agency</label>
              <select class="form-select" name="agency_id" required>
                <option value="" disabled selected>-- Select Agency --</option>
                <?php
                $select = mysqli_query($conn,"SELECT * FROM `agencies`");
                while ($fetch = mysqli_fetch_array($select)) {
                  echo "<option value='{$fetch['agencie_id']}'>{$fetch['agencie_name']}</option>";
                }
                ?>
              </select>
            </div>

            <div class="mb-4">
              <label class="form-label">Description</label>
              <textarea name="Description" class="form-control" required></textarea>
            </div>

            <button type="submit" name="submit" class="btn btn-primary w-100">Submit</button>
          </form>

          <div class="text-center mt-3">
            <p><a href="index.php" class="text-primary">Back to home</a></p>
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
