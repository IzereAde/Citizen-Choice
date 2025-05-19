<?php
include "backend/connect.php";


// // Email and DB config
// $senderEmail = "izerimanaadeline2@gmail.com"; 
// $servername = "localhost";
// $username = "root";
// $password = "";
// $dbname = "mvp";

// // Connect to database
// $conn = new mysqli($servername, $username, $password, $dbname);
// if ($conn->connect_error) {
//     die("Database connection failed: " . $conn->connect_error);
// }

// // Handle form submission
// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $citizenEmail = $_POST["email"];

//     // Query complaints matching citizen email
//     $sql = "SELECT * FROM complaints WHERE email = '$citizenEmail'";
//     $result = $conn->query($sql);

//     if ($result->num_rows > 0) {
//         // Prepare email content
//         $message = "Dear citizen,\n\nHere’s the status of your complaints:\n\n";
//         while ($row = $result->fetch_assoc()) {
//             $message .= "Complaint ID: " . $row["complaints_id"] . "\n";
//             $message .= "Title: " . $row["title"] . "\n";
//             $message .= "Status: " . $row["status"] . "\n";
//             $message .= "Submitted: " . $row["submitted_at"] . "\n\n";
//         }
//         $message .= "Thank you for using CITIZEN CHOICE.";

//         // Send email
//         $subject = "Your Complaint Status - CITIZEN CHOICE";
//         $headers = "From: $senderEmail";

//         if (mail($citizenEmail, $subject, $message, $headers)) {
//             echo "<script>alert('Complaint status sent to your email. Please check your inbox.');</script>";
//         } else {
//             echo "<script>alert('Failed to send email.');</script>";
//         }
//     } else {
//         echo "<script>alert('No complaints found for this email.');</script>";
//     }
// }


?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>CITIZEN CHOICE</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="shortcut icon" type="image/png" href="assets/images/logos/favicon.png" />
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

</head>
<style>
  html {
  scroll-behavior: smooth;
}
.navbar {
  position: sticky;
  top: 0;
  z-index: 1030;
  background-color: #f8f9fa; /* Bootstrap bg-light */
  box-shadow: 0 2px 4px rgba(0, 0, 0, 0.05);
  transition: all 0.3s ease;
}

/* Optional: add a slight background change on scroll */
.navbar.scrolled {
  background-color: #ffffff;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
}

/* Nav link hover effect */
.navbar .nav-link:hover {
  color: #0d6efd;
  text-decoration: none;
}

/* Active nav link style */
.navbar .nav-link.active {
  color: #0d6efd;
  font-weight: 600;
}

/* Adjust brand font size */
.navbar-brand {
  font-size: 1.5rem;
}

/* Button spacing */
.navbar .btn {
  border-radius: 50px;
  padding: 0.5rem 1rem;
}

     .about-section {
      background-color: #f9f9f9;
      padding: 60px 20px;
    }
    .about-section h1 {
      font-size: 2.5rem;
      font-weight: bold;
      margin-bottom: 30px;
      color: #333;
    }
    .about-img {
      max-width: 100%;
      height: 70vh;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
    .about-text p {
      font-size: 1.1rem;
      line-height: 1.8;
      color: #555;
    }
    .about-text strong {
      color: #0d6efd; /* Bootstrap primary color */
    }

    .journey-section {
      background-color: #f9f9f9;
      padding: 60px 20px;
    }
    .journey-section h1 {
      font-size: 2.5rem;
      font-weight: bold;
      text-align: center;
      margin-bottom: 40px;
      color: #333;
    }
    .journey-item {
      margin-bottom: 30px;
      display: flex;
      align-items: flex-start;
      gap: 20px;
    }
    .journey-item button {
      font-size: 1.2rem;
      font-weight: bold;
      color: white;
      background-color: #0d6efd; /* Bootstrap primary color */
      border: none;
      border-radius: 50px;
      padding: 10px 20px;
      cursor: pointer;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
    }
    .journey-item button:hover {
      background-color: #0b5ed7;
    }
    .journey-item p {
      font-size: 1.1rem;
      line-height: 1.8;
      color: #555;
      margin: 0;
    }
    

    .achievement-section {
      padding: 60px 20px;
      background-color: #f9f9f9;
    }
    .achievement-section h1 {
      font-size: 2.5rem;
      font-weight: bold;
      text-align: center;
      margin-bottom: 40px;
      color: #333;
    }
    .achievement-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
      gap: 20px;
    }
    .achievement-item {
      background-color: #ffffff;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
      padding: 20px;
      text-align: center;
    }
    .achievement-item img {
      max-width: 90%;
      height: auto;
      margin-bottom: 15px;
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
    }
    .achievement-item p {
      font-size: 1.1rem;
      color: #555;
      margin: 0;
    }

    .contact-section {
      padding: 60px 20px;
      background-color: #f9f9f9;
    }
    .contact-section h1 {
      font-size: 2.5rem;
      font-weight: bold;
      text-align: center;
      margin-bottom: 30px;
      color: #333;
    }
    .contact-info {
      display: flex;
      flex-direction: column;
      align-items: center;
      gap: 20px;
      margin-bottom: 40px;
    }
    .contact-info div {
      display: flex;
      align-items: center;
      gap: 10px;
    }
    .contact-info i {
      font-size: 1.5rem;
      color: #007bff;
    }
    .contact-info p {
      font-size: 1.2rem;
      color: #555;
      margin: 0;
    }
    .contact-form {
      display: flex;
      flex-direction: column;
      gap: 15px;
      background-color: #ffffff;
      padding: 30px;
      border-radius: 10px;
      box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    }
    .contact-form input,
    .contact-form textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 5px;
    }
    .contact-form textarea {
      resize: none;
      height: 120px;
    }
    .contact-form button {
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      color: #ffffff;
      border: none;
      border-radius: 5px;
      font-size: 1rem;
      font-weight: bold;
    }
    .contact-form button:hover {
      background-color: #0056b3;
    }
    .journey-item button, 
.contact-form button, 
.btn-primary {
  background: linear-gradient(45deg, #007bff, #6610f2);
  border: none;
  transition: 0.4s ease;
}

.journey-item button:hover, 
.contact-form button:hover, 
.btn-primary:hover {
  background: linear-gradient(45deg, #6610f2, #007bff);
  transform: scale(1.05);
}

.hero-title {
  animation: fadeInDown 2s ease;
}

@keyframes fadeInDown {
  0% { opacity: 0; transform: translateY(-50px); }
  100% { opacity: 1; transform: translateY(0); }
}
#home {
  background-attachment: fixed;
}
#topBtn {
  display: none;
  position: fixed;
  bottom: 40px;
  right: 30px;
  z-index: 99;
  font-size: 18px;
  border: none;
  outline: none;
  background-color: #007bff;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 50%;
}
#topBtn:hover {
  background-color: #6610f2;
}
</style>
<body>

  <nav class="navbar navbar-expand-sm navbar-light bg-light p-3 mb-3 shadow-sm border-bottom">
    <div class="container-fluid">
      <a class="navbar-brand fw-bold text-primary" href="#home">
      <img src="assets/images/logos/favicon.png" alt="">
         CITIZEN CHOICE
        </a>
  
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#mynavbar">
        <span class="navbar-toggler-icon"></span>
      </button>
  
      <div class="collapse navbar-collapse" id="mynavbar">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link text-dark fw-semibold" href="#home">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark fw-semibold" href="#about">About Us</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-dark fw-semibold" href="html/citizen.php">complaints/feedback</a>
          </li>
          
          
        </ul>
        <div class="d-flex">
          <a href="#contact" class="btn btn-primary ms-2">tracking status</a>
        </div>
      </div>
    </div>
  </nav>
  

<!-- home -->
<div id="home" style="
  background: linear-gradient(rgba(0, 0, 0, 0.37), rgba(0, 0, 0, 0.69)), url('html/background.jpeg');
  background-size: cover;
  background-repeat: no-repeat;
  background-position: center;
  height: 500px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  text-align: center;">
  
  <span style="color: #b3b3b3; font-size: 1.2rem; letter-spacing: 1px;">Welcome To</span>
  
  <h2  class="hero-title" style="color: #ffffff69; font-size: 2.5rem; margin: 10px 0; font-weight: bold;">CITIZEN CHOICE</h2>
  
  
  <p style="
    color: #dcdcdc; 
    font-size: 1.1rem; 
    line-height: 1.6; 
    max-width: 600px; 
    margin: 10px auto;">
    allows citizens to submit complaints or feedback on public services. <br> The system should be able to receive, categorize, and route submissions to the appropriate government agency.
  </p>
  <button class="btn btn-secondary" type="button"><a href="html/citizen.php" class="btn btn-secondary" target="_blank" >
  submit complaints or feedback on public services.
  </a></button>
</div>

  <div class="about-section" id="about" data-aos="fade-up">
    <div class="container">
      <h1 class="text-center">About us</h1>
      <div class="row align-items-center">
        
        <div class="col-md-12">
          <div class="about-text">
            
            <p>
            CITIZEN CHOICE is system of a Citizen Engagement  that allows citizens to submit complaints or feedback  on public services. <br>The system should be able to receive, categorize, and route submissions to the appropriate government agency. 


            </p>
          </div>
        </div>
      </div>
    </div>
  </div>

  

  

  

  

  <div class="contact-section" id="contact" data-aos="fade-up">
    <div class="container">
      <h1>tracking status</h1>
      
      <!-- Contact Information -->
      
      
      <!-- Contact Form -->
      <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
        <form class="contact-form" action="html/citizen-truck.php" method="post">
  <input type="text" name="name" id="name" placeholder="Your Name" required>
  <input type="email" name="email" id="email" placeholder="Your Email" required>
  <button type="submit" name="track">Track</button>
</form>

         



        </div>
      </div>
    </div>
  </div>

  <button onclick="topFunction()" id="topBtn" title="Go to top">↑</button>
  <!-- Include Bootstrap JS -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script>
    window.addEventListener('scroll', function () {
  const navbar = document.querySelector('.navbar');
  if (window.scrollY > 20) {
    navbar.classList.add('scrolled');
  } else {
    navbar.classList.remove('scrolled');
  }
});
    AOS.init();
  
    let topBtn = document.getElementById("topBtn");
  
    window.onscroll = function() {
      if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        topBtn.style.display = "block";
      } else {
        topBtn.style.display = "none";
      }
    };
  
    function topFunction() {
      document.body.scrollTop = 0;
      document.documentElement.scrollTop = 0;
    }

    function toggleMenu() {
      const navLinks = document.getElementById('navLinks');
      navLinks.classList.toggle('active');
    }
  </script>
</body>
</html>