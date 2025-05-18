<?php
session_start();
include("../backend/connect.php");

if (!isset($_SESSION['admin_id'])) {
    header("Location: authentication-login.php");
    exit();
}

if (!isset($_GET['id'])) {
    header("Location: complaints.php"); // if no id provided, redirect back
    exit();
}

$complaint_id = $_GET['id'];

// Get complaint details
$query = mysqli_query($conn, "
    SELECT complaints.*, citizens.citizen_full_name, agencies.agencie_name 
    FROM complaints
    INNER JOIN citizens ON complaints.citizen_id = citizens.citizen_id
    INNER JOIN agencies ON complaints.agencie_id = agencies.agencie_id
    WHERE complaints.complaints_id = $complaint_id
");

if ($query) {
   
    $complaint = mysqli_fetch_assoc($query);
}else {
    die("Query Failed: " . mysqli_error($conn));
}

// if (mysqli_num_rows($query) >0) {
//     echo "Invalid complaint ID.";
//     exit();
// }




// Handle form submission
if (isset($_POST['update_status'])) {
    $new_status = $_POST['status_id'];

    $update = mysqli_query($conn, "
        UPDATE complaints SET status_id = '$new_status' , last_updated = NOW() 
WHERE complaints_id = '$complaint_id'
    ");

    if ($update) {
        echo "<script>alert('Status updated successfully.'); window.location='admin_dashboard.php';</script>";
    } else {
        echo "<script>alert('Failed to update status.');</script>";
        die("Query Failed: " . mysqli_error($conn));
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Update Complaint Status</title>
    <link rel="stylesheet" href="../assets/css/styles.min.css" />
</head>
<body>
<div class="container mt-5">
    <h2>Update Status for Complaint </h2>
    <form method="POST" action="">
        
       
        <div class="mb-3">
            <label>Current Status</label>
            <input type="text" class="form-control" value="<?php echo $complaint['status_id']; ?>" readonly>
        </div>
        <div class="mb-3">
            <label>New Status</label>
            <select name="status_id" class="form-control" required>
                <option value="">-- Select New Status --</option>
                <option value="Pending">Pending</option>
                <option value="In Progress">In Progress</option>
                <option value="Resolved">Resolved</option>
                <option value="Rejected">Rejected</option>
            </select>
        </div>
        <button type="submit" name="update_status" class="btn btn-primary">Update Status</button>
        <a href="admin_dashboard.php" class="btn btn-secondary">Cancel</a>
    </form>
</div>
</body>
</html>
