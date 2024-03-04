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
    <li><a href="#">Home</a></li>
    <li><a href="./projects/">Projects</a></li>
    <li><a href="./games/">GameHub</a></li>
    <li><button onclick="signup()">Sign Up</button></li>
    <li><button onclick="login()">Login</button></li>
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
    <button class="signupClose" onclick="signup(true)">X</button>
    <form id="signupForm" method="post" action="sign-up.php">
      <h2>Sign Up</h2>
      <input type="text" name="username" placeholder="Username" required>
      <input type="email" name="email" placeholder="Email" required>
      <input type="password" name="password" placeholder="Password" required>
      <div id='pasdiv' class='pasdiv'><input type="password" name="password" placeholder="Password" id='signpas' required><button onclick='passhow(document.getElementById("signpas"))' class='swbtn'><img src='../assets/eye.png'></button></div>
      <input type="submit" class="submitbtn" value="Sign Up">
    </form>
    <button onclick="login()" class='svitch'>Login</button>
  </div>

  <!-- Pop-up pro Login -->
  <div class="popup" id="popupLogin">
    <button class="signupClose" onclick="login(true)">X</button>
    <form id="loginForm" method="post" action="login.php">
      <h2>Login</h2>
      <input type="email" name="email" placeholder="Email" required>
      <div id='pasdiv' class='pasdiv'><input type="password" name='password' placeholder="Password" id='logpas' required><button onclick='passhow(document.getElementById("logpas"))' class='swbtn'><img src='../assets/eye.png' ></button></div>
      <input type="submit" class="submitbtn" value="Login">
    </form>
    <button onclick="signup()" class='svitch'>Sign Up</button>
  </div>

  <!-- Přidat skripty nebo odkazy na skripty pro funkcionalitu -->
  <script src="./assets/script.js">

  </script>

</body>

</html>