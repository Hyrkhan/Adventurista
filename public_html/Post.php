<?php
// Start the session
session_start();

// Check if the user is not logged in
if (!isset($_SESSION["user_id"])) {
  // Redirect to the login page
  header("Location: index.html");
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./css/css_journal.css">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Oswald&family=Poppins:wght@300&display=swap"
    rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Poppins:wght@300&display=swap" rel="stylesheet">
  <script src="./javascript/script.js" defer></script>
  <script src="./css/journal.js" defer></script>
  <title>WanderLog Journal</title>
</head>
<!-- Profile -->
<div class="header">
  <div class="logo">
    <center><img src="./images/wd.png" alt="WanderLog"> </center>
  </div>

  <!-- Sidebar -->
  <div id="toggle-btn">&#9776;</div>
  <div id="sidebar">
    <div class="profile-pic-div">
      <img src="./images/Profile.jpg" id="photo">
      <input type="file" id="file">
      <label for="file" id="uploadBtn">Change Photo</label>
    </div><br><br><br><br><br><br><br><br><br>
    <span id="close-btn" onclick="closeSidebar()">&#10006; Close</span>
    <?php
    echo '<center><ul><span class="welcome-message">' . $_SESSION["user_name"] . '</span></ul></center>';
    ?>
    <a href="Post.php">My Post</a>
    <a href="Journal.php">My Gallery</a>
  </div>
  <!-- Navbar -->
  <div class="navbar">
    <span class="menu-btn material-symbols-outlined">menu</span>
    <nav>
      <ul class="links">
        <span class="close-btn material-symbols-outlined">close</span>
        <li> <a href="index2.php">Home</a></li>
        <li> <a href="ToursAndTravel.php">Tours and Travels</a></li>
        <li> <a href="Post.php">Journal</a></li>
        <li> <a href="about.php">About</a></li>
        <?php
        echo '<li><a href="logout.php">Logout</a></li>';
        ?>


      </ul>
    </nav>
  </div>
</div>
<!-- FYP -->
<div class="row">
  <div class="leftcolumn">

    <div class="card">
      <!-- Comment box starts here -->
      <div class="comment-box">
        <form>
          <textarea id="comment" name="comment" placeholder="Whats on your Mind"></textarea>
          <button type="submit" class="upload-btn">Post</button>
        </form>
      </div>
    </div>

    <div class="card">
      <h2>Lipa Cathedral</h2>
      <h5>#Lipa Cathedral, Dec 7, 2023</h5>
      <img src="./images/Cathedral.jpg" alt="Cathedral">
    </div>

    <div class="card">
      <h2>TheOldGrove</h2>
      <h5>#TheOldGrove, Nov 2, 2023</h5>
      <img src="./images/TheOldGrove.jpg" alt="TheOldGrove">
    </div>

    <div class="card">
      <h2>The Farm At San Benito</h2>
      <h5>#TheFarmAtSanBenito, Nov 21, 2022</h5>
      <img src="./images/TheFarmAt.jpg" alt="">
    </div>

  </div>

  <div class="rightcolumn">
    <div class="card">
      <h2>About Me</h2>
      <p>I enjoy travelling and discovering the beauty of Batangas.</p>
    </div>

    <div class="card">
      <h3>Popular Post</h3><br>
      <h5>Lipa Cathedral</h5>
      <img src="./images/Cathedral.jpg" alt="Cathedral"><br>
      <h5>The Farm</h5>
      <img src="./images/TheFarmAt.jpg" alt="TheFarm"><br>
      <h5>Casa Segunda</h5>
      <img src="./images/CASA SEGUNDA.jpg" alt="CASA SEGUNDA">
    </div>
  </div>
</div>

<!-- Popup Form -->
<div class="blur-bg-overlay"></div>
<div class="form-popup" id="popup">
  <span class="close-btn material-symbols-outlined">close</span>
  <div class="form-box login">
    <div class="form-details">
      <h2>Welcome Back</h2>
      <p>Please log in using your personal information to stay with us.</p>
    </div>
    <div class="form-content">
      <h2>LOGIN</h2>
      <form action="login.php" method="post">
        <div class="input-field">
          <input type="text" name="emailaddress" required>
          <label>Email</label>
        </div>

        <div class="input-field">
          <input type="password" name="pw" required>
          <label>Password</label>
        </div>

        <a href="#" class="forgot-pass">Forgot password?</a>

        <button type="submit">Log In</button>
      </form>
      <div class="bottom-link">
        Don't have an account?
        <a href="#" id="signup-link">Signup</a>
      </div>
    </div>
  </div>

  <div class="form-box signup">
    <div class="form-details">
      <h2>Create an account</h2>
      <p>To become a part of our community, please sign up using your personal information.</p>
    </div>
    <div class="form-content">
      <h2>SIGN UP</h2>
      <form action="reg.php" method="post">
        <div class="input-field">
          <input type="text" name="name" required>
          <label>Name</label>
        </div>

        <div class="input-field">
          <input type="email" name="emailaddress" required>
          <label>Email</label>
        </div>

        <div class="input-field">
          <input type="password" name="pw" required>
          <label>Create password</label>
        </div>

        <div class="input-field">
          <input type="password" name="cpw" required>
          <label>Confirm password</label>
        </div>

        <div class="policy-text">
          <input type="checkbox" id="policy" required>
          <label for="policy">
            I agree to the
            <a href="#">Terms and Conditions</a>
          </label>
        </div>

        <a href="#" class="forgot-pass">Forgot password?</a>

        <button type="submit">Sign up</button>


        <!-- Optional: Display errors or notifications -->
        <div id="error-message"></div>

        <script>
          // Optional: You can handle additional validation here using JavaScript

          // Example: Display error message using JavaScript
          function submitForm() {
            var policyCheckbox = document.getElementById("policy");

            if (!policyCheckbox.checked) {
              document.getElementById("error-message").innerText = "Please agree to the Terms and Conditions.";
              return false; // Prevent form submission
            }

            // Additional validation logic can be added as needed

            // If all validation passes, the form will be submitted
            return true;
          }
        </script>
      </form>

      <div class="bottom-link">
        Already have an account?
        <a href="" id="login-link">Login</a>
      </div>
    </div>
  </div>

</div>


</html>