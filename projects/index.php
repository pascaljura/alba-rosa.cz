<!DOCTYPE html>
<?php
session_start();
include('../assets/config.php');
if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
  $username = $_SESSION['username'];
  $query = "SELECT project_access FROM users WHERE id = $user_id";
  $result = $conn->query($query);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $project_access = $row['project_access'];
  } else {
    $project_access = 0;
  }
  $conn->close();
  echo '
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/style.css">
  <link rel="shortcut icon" href="../assets/icon.png" type="image/x-icon">
  <title>Alba-rosa.cz</title>
</head>

<body>
  <ul class="navbar">
    <li><a href="../" ><i class="fas fa-home"></i> Home</a></li>
    <li><a href="../projects/" class="active"><i class="fas fa-project-diagram"></i> Projects</a></li>
    <li><a href="../gamehub/"><i class="fas fa-gamepad"></i> GameHub</a></li>
    <li><button onclick="location.href=\'../logout.php\'"><i class="fas fa-sign-in-alt"></i> Logout</button></li>
  </ul>
  <!-- Úvodní text -->
  <div>';
  echo "
    <h1>Welcome to Projects, $username!</h1>";
    if ($project_access == 1) {
      echo '<p>Here you can find the latest projects.</p>';
      echo '<div class="showcont">';
      
      echo '<div class="show" id="projshow" onclick="window.open(\'../bezier/\');">
              <div class="button-text">
                  <h2><i class="fa-solid fa-up-right-from-square"></i>Bezier\'s curve!</h2>
                  <p>A simple program to calculate a bezier\'s curve with unlimited points.</p>
              </div>
            </div>';
            
      echo '<div class="show" id="projshow" onclick="window.open(\'../parlament/\');">
              <div class="button-text">
                  <h2><i class="fa-solid fa-up-right-from-square"></i>Parlament!</h2>
                  <p>Exclusive site for our school parliament to store all records.</p>
              </div>
            </div>';
            
      echo '<div class="show" id="projshow" onclick="window.open(\'../qr/\');">
              <div class="button-text">
                  <h2><i class="fa-solid fa-up-right-from-square"></i>Qr code!</h2>
                  <p>A simple QR code generator for all of your needs.</p>
              </div>
            </div>';
            
      echo '</div>';
  } else {
      echo '<p>Sorry, you don\'t have access :D</p>';
  }
  echo '
  <!-- Přidat skripty nebo odkazy na skripty pro funkcionalitu -->
  <script src="https://kit.fontawesome.com/865012b7e6.js" crossorigin="anonymous"></script>
</body>
</html>';
  exit();
}
?>


<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/style.css">
  <link rel="shortcut icon" href="../assets/icon.png" type="image/x-icon">
  <title>Alba-rosa.cz</title>
</head>

<body>

  <!-- Menu -->
  <ul class="navbar">
    <li><a href="../"><i class="fas fa-home"></i> Home</a></li>
    <li><a href="../projects/" class="active"><i class="fas fa-project-diagram"></i> Projects</a></li>
    <li><a href="../gamehub/"><i class="fas fa-gamepad"></i> GameHub</a></li>
    <li><button onclick="signup()"><i class="fas fa-user-plus"></i> Sign Up</button></li>
    <li><button onclick="login()"><i class="fas fa-sign-in-alt"></i> Login</button></li>
  </ul>

  <!-- Úvodní text -->
  <div>
    <h1>Welcome to Projects!</h1>
    <p>Here you can find the latest projects.</p>
  </div>

  <!-- Tlačítka pro Sign Up a Login -->
  <div>

  </div>

  <!-- Pop-up pro Sign Up -->
  <div class="popup" id="popupSignup">
    <button class="popClose" onclick="signup(true)">X</button>
    <form id="signupForm" method="post" action="../sign-up.php">
      <h2>Sign Up</h2>
      <input type="text" name="username" placeholder="Username" required>
      <input type="email" name="email" placeholder="Email" required>
      <div id='pasdiv' class='pasdiv'><input type="password" name="password" placeholder="Password" id='signpas'
          required><button onclick='passhow(document.getElementById("signpas"))' class='swbtn'><img
            src='../assets/eye.png'></button></div>
      <input type="submit" class="submitbtn" value="Sign Up">
    </form>
    <button onclick="login()" class='svitch'>Login</button>
  </div>

  <!-- Pop-up pro Login -->
  <div class="popup" id="popupLogin">
    <button class="popClose" onclick="login(true)">X</button>
    <form id="loginForm" method="post" action="../login.php">
      <h2>Login</h2>
      <input type="email" name="email" placeholder="Email" required>
      <div id='pasdiv' class='pasdiv'><input type="password" name='password' placeholder="Password" id='logpas'
          required><button onclick='passhow(document.getElementById("logpas"))' class='swbtn'><img
            src='../assets/eye.png'></button></div>
      <input type="submit" class="submitbtn" value="Login">
    </form>
    <button onclick="signup()" class='svitch'>Sign Up</button>
  </div>
  <div class="nolog" id="nolog">
    <h2> Ready to dive in? Log in now to unlock all of our content! </h2>
  </div>

  <!-- Přidat skripty nebo odkazy na skripty pro funkcionalitu -->
  <script src="../assets/script.js"></script>
  <script src="https://kit.fontawesome.com/865012b7e6.js" crossorigin="anonymous"></script>
</body>

</html>