<!DOCTYPE html>
<?php
session_start();

if (isset($_SESSION['user_id'])) {
  // Uživatel je přihlášen, zobrazíte požadovaný obsah
  $username = $_SESSION['username'];
  echo "<h1>Vítejte, $username!</h1>";
  echo '
<form id="logoutForm" method="post" action="logout.php">
    <input type="submit" class="submitbtn" value="Logout">
</form>';
  echo '<ul class="navbar">';
  echo '<li><a href="./" class="active"><i class="fas fa-home"></i> Home</a></li>';
  echo '<li><a href="./projects/"><i class="fas fa-project-diagram"></i> Projects</a></li>';
  echo '<li><a href="./games/"><i class="fas fa-gamepad"></i> GameHub</a></li>';
  echo '<li><button onclick="signup()"><i class="fas fa-user-plus"></i> Sign Up</button></li>';
  echo '<li><button onclick="login()"><i class="fas fa-sign-in-alt"></i> Login</button></li>';
  echo '</ul>';

  echo '<div>';
  echo '<h1>Vítejte na našem webu!</h1>';
  echo '<p>Zde můžete najít nejnovější projekty a hry.</p>';
  echo '</div>';

  echo '<div></div>';

  echo '<div class="popup" id="popupSignup">';
  echo '<button class="popClose" onclick="signup(true)">X</button>';
  echo '<form id="signupForm" method="post" action="sign-up.php">';
  echo '<h2>Sign Up</h2>';
  echo '<input type="text" name="username" placeholder="Username" required>';
  echo '<input type="email" name="email" placeholder="Email" required>';
  echo '<div id="pasdiv" class="pasdiv"><input type="password" name="password" placeholder="Password" id="signpas" required>';
  echo '<button onclick="passhow(document.getElementById("signpas"))" class="swbtn"><img src="./assets/eye.png"></button></div>';
  echo '<input type="submit" class="submitbtn" value="Sign Up">';
  echo '</form>';
  echo '<button onclick="login()" class="svitch">Login</button>';
  echo '</div>';

  echo '<div class="popup" id="popupLogin">';
  echo '<button class="popClose" onclick="login(true)">X</button>';
  echo '<form id="loginForm" method="post" action="login.php">';
  echo '<h2>Login</h2>';
  echo '<input type="email" name="email" placeholder="Email" required>';
  echo '<div id="pasdiv" class="pasdiv"><input type="password" name="password" placeholder="Password" id="logpas" required>';
  echo '<button onclick="passhow(document.getElementById("logpas"))" class="swbtn"><img src="./assets/eye.png" ></button></div>';
  echo '<input type="submit" class="submitbtn" value="Login">';
  echo '</form>';
  echo '<button onclick="signup()" class="svitch">Sign Up</button>';
  echo '</div>';
  exit();
}
?>


<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/style.css">
  <link rel="shortcut icon" href="./assets/icon.png" type="image/x-icon">
  <title>Alba-rosa.cz</title>
</head>

<body>

  <!-- Menu -->
  <ul class="navbar">
    <li><a href="./" class="active"><i class="fas fa-home"></i> Home</a></li>
    <li><a href="./projects/"><i class="fas fa-project-diagram"></i> Projects</a></li>
    <li><a href="./games/"><i class="fas fa-gamepad"></i> GameHub</a></li>
    <li><button onclick="signup()"><i class="fas fa-user-plus"></i> Sign Up</button></li>
    <li><button onclick="login()"><i class="fas fa-sign-in-alt"></i> Login</button></li>
  </ul>

  <!-- Úvodní text -->
  <div>
    <h1>Vítejte na našem webu!</h1>
    <p>Zde můžete najít nejnovější projekty a hry.</p>
  </div>

  <!-- Tlačítka pro Sign Up a Login -->
  <div>

  </div>

  <!-- Pop-up pro Sign Up -->
  <div class="popup" id="popupSignup">
    <button class="popClose" onclick="signup(true)">X</button>
    <form id="signupForm" method="post" action="sign-up.php">
      <h2>Sign Up</h2>
      <input type="text" name="username" placeholder="Username" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <div id='pasdiv' class='pasdiv'><input type="password" name="password" placeholder="Password" id='signpas'
          required><button onclick='passhow(document.getElementById("signpas"))' class='swbtn'><img
            src='./assets/eye.png'></button></div>
      <input type="submit" class="submitbtn" value="Sign Up">
    </form>
    <button onclick="login()" class='svitch'>Login</button>
  </div>

  <!-- Pop-up pro Login -->
  <div class="popup" id="popupLogin">
    <button class="popClose" onclick="login(true)">X</button>
    <form id="loginForm" method="post" action="login.php">
      <h2>Login</h2>
      <input type="email" name="email" placeholder="Email" required>
      <div id='pasdiv' class='pasdiv'><input type="password" name='password' placeholder="Password" id='logpas'
          required><button onclick='passhow(document.getElementById("logpas"))' class='swbtn'><img
            src='./assets/eye.png'></button></div>
      <input type="submit" class="submitbtn" value="Login">
    </form>
    <button onclick="signup()" class='svitch'>Sign Up</button>
  </div>

  <!-- Přidat skripty nebo odkazy na skripty pro funkcionalitu -->
  <script src="./assets/script.js"></script>
  <script src="https://kit.fontawesome.com/865012b7e6.js" crossorigin="anonymous"></script>
</body>

</html>