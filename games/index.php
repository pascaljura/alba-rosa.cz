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
    <li><a href="../"><i class="fas fa-home"></i> Home</a></li>
    <li><a href="../projects/"><i class="fas fa-project-diagram"></i> Projects</a></li>
    <li><a href="../games/"><i class="fas fa-gamepad"></i> GameHub</a></li>
    <li><button onclick="signup()"><i class="fas fa-user-plus"></i> Sign Up</button></li>
    <li><button onclick="login()"><i class="fas fa-sign-in-alt"></i> Login</button></li>
  </ul>

  <!-- Úvodní text -->
  <div>
    <h1>Vítejte na GameHub!</h1>
    <p>Zde můžete najít nejnovější hry.</p>
  </div>

  <!-- Pop-up pro Sign Up -->
  <div class="popup" id="popupSignup">
    <button class="popClose" onclick="signup(true)">X</button>
    <form id="signupForm" method="post" action="../sign-up.php">
      <input type="text" placeholder="Username" required>
      <input type="email" placeholder="Email" required>
      <div id='pasdiv' class='pasdiv'><input type="password" placeholder="Password" id='signpas' required><button
          onclick='passhow(document.getElementById("signpas"))' class='swbtn'><img src='../assets/eye.png'></button>
      </div>
      <input type="submit" class="submitbtn" value="Sign Up">
    </form>
    <button onclick="login()" class='svitch'>Login</button>
  </div>

  <!-- Pop-up pro Login -->
  <div class="popup" id="popupLogin">
    <button class="popClose" onclick="login(true)">X</button>
    <form id="loginForm" method="post" action="../login.php">
      <input type="email" placeholder="Email" required>
      <div id='pasdiv' class='pasdiv'><input type="password" placeholder="Password" id='logpas' required><button
          onclick='passhow(document.getElementById("logpas"))' class='swbtn'><img src='../assets/eye.png'></button>
      </div>
      <input type="submit" class="submitbtn" value="Login">
    </form>
    <button onclick="signup()" class='svitch'>Sign Up</button>
  </div>

  <script src="../assets/script.js"></script>
  <script src="https://kit.fontawesome.com/865012b7e6.js" crossorigin="anonymous"></script>

  </script>

</body>

</html>