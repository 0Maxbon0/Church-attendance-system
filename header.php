<?php
session_start();

// Function to check if the user is logged in
function is_logged_in()
{
  return isset($_SESSION['user_id']);
}

// Function to logout the user
// function logout()
// {
//   // Unset all session variables
//   $_SESSION = array();
//   // Destroy the session
//   session_destroy();
//   // Redirect to the login page or any other page
//   header("Location: login_connection.php");
//   exit();
// }

// Function to check if the user has the required role
// Function to check if the user has the required role
function has_role($roles)
{
  // Check if the user is logged in and has one of the required roles
  return is_logged_in() && isset($_SESSION['role']) && in_array($_SESSION['role'], $roles);
}

?>
<link rel="stylesheet" href="/Web Project/header.css" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet" />
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
<script src="https://kit.fontawesome.com/4f2a7393d6.js" crossorigin="anonymous"></script>
<div class="HomePage_Content" id="HomePage" style="background-color: rgba(83, 148, 190, 0.778);">
  <aside>
    <input type="checkbox" id="checkbox" />
    <label for="checkbox">
      <i class="fa-solid fa-bars" name="menu" style="color: white; transform: translateY(5px);" id="menu"></i>
      <i class="fa-solid fa-xmark" style="transform: translateY(15px); color: white;" name="x-square" id="x-square"></i>
    </label>
    <span class="stripes">
      <div class="font-style">
        <ul>
          <li>
            <a href="homepage.html"><b>Home</b></a>
          </li>
          <li>
            <a href="AboutUs.html#about"><b>About Us</b></a>
          </li>
          <li>
            <a href="index.php"><b>Events</b></a>
          </li>
          <!-- Check if the user has the 'admin' role to display the link -->
          <?php if (has_role(['5adm', 'amin'])) : ?>
            <li>
              <a href="DashBoard.php#dash"><b>Dash Board</b></a>
            </li>
          <?php endif; ?>

          <li>
            <a id="scrollToContactUs" href="#foot"><b>Contact Us</b></a>
          </li>
          <li>
            <a href="login.html#login"> <b>Login</b></a>
          </li>
        </ul>
      </div>
    </span>
  </aside>
  <div class="title-and-button">
    <?php if (is_logged_in()) : ?>
      <h1 class="homePage-title logged-in">St.Mary Church</h1>
      <a href="logout_connection.php"><button class="logout">Logout</button></a>
    <?php else : ?>
      <h1 class="homePage-title">St.Mary Church</h1>
    <?php endif; ?>
  </div>
</div>