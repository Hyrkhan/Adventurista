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
    <title>WanderLog</title>


    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Oswald&family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=Poppins:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/css_ToursAndTravel2.css">
    <script src="./javascript/script.js" defer></script>
	<script src="./css/journal.js" defer></script>
</head>
<body>
    <div class="logo">
    <center><img src="./images/wd.png" alt="WanderLog"> </center> 

    <?php 
    echo '<center><ul><span class="welcome-message">Welcome, ' . $_SESSION["user_name"] . '!</span></ul></center>';
    ?>
    <br>

    </div>
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
 <!-- Recommend Spots For Tours And Travel. --> 	
 <section class="recommended-spots">
    <center><h2>Travel Spots</h2></center>
	<br>
    <div class="spot">
      <img src="./images/CapeSantiagoLighthousetower.jpg" alt="CapeSantiagoLighthousetower">
      <h3><i class="fa fa-map-marker" aria-hidden="true">&nbsp </i>Cape Santiago Lighthouse</h3>
      <p>Cape Santiago Light house towerAlso known as Punta de Santiago or Faro de Punta Santiago or simply Calatagan Lighthouse, Cape Santiago is an imposing 51-foot tall white and red brick lighthouse
	  that was built in the late 1800's to guide seafarers passing Verde Island passage, San Bernardino Strait and the Manila Bay. </p>
	  <center><a href="#" class="comment-link" onclick="toggleCommentSection(this, event)">See Review</a></center>
      <div class="comment-section">
      <p><i class="fa fa-user-circle-o" aria-hidden="true"></i> &nbsp <strong>VinceD: </strong>This place have a nice view and look interesting.</p>
    </div>
  </div>
    <div class="spot">
      <img src="./images/FortuneIsland.png" alt="Fortune Island">
      <h3><i class="fa fa-map-marker" aria-hidden="true">&nbsp </i>Fortune Island</h3>
      <p>Fortune Island is a resort island of Batangas province in the Philippines.</p> 
        <center><a href="#" class="comment-link" onclick="toggleCommentSection(this, event)">See Review</a></center>
      <div class="comment-section">
      <p><i class="fa fa-user-circle-o" aria-hidden="true"></i> &nbsp <strong>Hannah: </strong>Wonderful views and structure. It also have a beautiful scenery</p>
    </div>	  
    </div>
	  <div class="spot">
      <img src="./images/Caleruega.jpg" alt="Caleruega">
      <h3><i class="fa fa-map-marker" aria-hidden="true">&nbsp </i>Caleruega Church</h3>
      <p>Caleruega Church is one of the most famous churches in Batangas.
	  Caleruega Church has beautiful architecture and a tranquil natural environment that makes it ideal for religious activities and spiritual retreats. In fact, it has become a well-known wedding venue. </p>
	     <center><a href="#" class="comment-link" onclick="toggleCommentSection(this, event)">See Review</a></center>
      <div class="comment-section">
      <p><i class="fa fa-user-circle-o" aria-hidden="true"></i> &nbsp <strong>RoseAnn: </strong>This church and grounds have a spiritual feel.</p>
	  <p><i class="fa fa-user-circle-o" aria-hidden="true"></i> &nbsp <strong>Alvin Trq: </strong>Great Place.</p>
    </div>		
    </div>
	 <div class="spot">
      <img src="./images/VillaEscudero.jpg" alt="villaescudero">
      <h3><i class="fa fa-map-marker" aria-hidden="true">&nbsp </i>Villa Escudero Plantations and Resort</h3>
      <p>Experience the allure of Philippine country life at Villa Escudero Plantations and Resort. A self-contained working coconut plantation.</p>
	   <center><a href="#" class="comment-link" onclick="toggleCommentSection(this, event)">See Review</a></center>
      <div class="comment-section">
      <p><i class="fa fa-user-circle-o" aria-hidden="true"></i> &nbsp <strong>Kath Any: </strong>This is a great place for vacations and family gatherings.</p>
	  <p><i class="fa fa-user-circle-o" aria-hidden="true"></i> &nbsp <strong>Ivan12: </strong>Good Food and a great to take some picture.</p>
    </div>	
    </div>
  </section>
 <!-- Number Navigation --> 
    <footer>
        <div class="pagenum">
            <a href="ToursAndTravel.php">1</a>
            <a href="#">2</a>
			<a href="#">3</a>
        </div>
    </footer>
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
 
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