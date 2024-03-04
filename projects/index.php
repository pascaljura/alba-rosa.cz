<!DOCTYPE html>
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
    <li><a href="../">Home</a></li>
    <li><a href="#">Projects</a></li>
    <li><a href="../games/">GameHub</a></li>
    <li><button onclick="signup()">Sign Up</button></li>
    <li><button onclick="login()">Login</button></li>
  </ul>

  <!-- Úvodní text -->
  <div>
    <h1>Vítejte na projects!</h1>
    <p>Zde můžete najít nejnovější projekty.</p>
  </div>

  <!-- Pop-up pro Sign Up -->
  <div class="popup" id="popupSignup">
    <button class="signupClose" onclick="signup(true)">X</button>
    <form id="signupForm">
      <input type="text" placeholder="Username" required>
      <input type="email" placeholder="Email" required>
      <input type="password" placeholder="Password" required>
      <input type="submit" class="submitbtn">
    </form>
    <button onclick="login()" class='svitch'>Login</button>
  </div>

  <!-- Pop-up pro Login -->
  <div class="popup" id="popupLogin">
    <button class="signupClose" onclick="login(true)">X</button>
    <form id="loginForm">
      <input type="email" placeholder="Email" required>
      <input type="password" placeholder="Password" required>
      <input type="submit" class="submitbtn">
    </form>
    <button onclick="signup()" class='svitch'>Sign Up</button>
  </div>

  <!-- Přidat skripty nebo odkazy na skripty pro funkcionalitu -->
  <script src="../assets/script.js">
    
  </script>

</body>

</html>