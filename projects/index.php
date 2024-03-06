<!DOCTYPE html>
<?php
session_start();

if (isset($_SESSION['user_id'])) {
  // Uživatel je přihlášen, zobrazíte požadovaný obsah
  $username = $_SESSION['username'];
  echo "";
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

  <!-- Menu -->
  <ul class="navbar">
    <li><a href="../" ><i class="fas fa-home"></i> Home</a></li>
    <li><a href="../projects/" class="active"><i class="fas fa-project-diagram"></i> Projects</a></li>
    <li><a href="../games/"><i class="fas fa-gamepad"></i> GameHub</a></li>
    <li><button onclick="location.href=\'../logout.php\'"><i class="fas fa-sign-in-alt"></i> Logout</button></li>
  </ul>

  <!-- Úvodní text -->
  <div>';
  echo "
    <h1>Vítejte, $username na Projects!</h1>";
  echo ' <p>Zde můžete najít nejnovější projekty.</p>
  </div>';
  echo '<div class="showcont">';
  echo '  <div class="show" id="projshow" onclick="window.open(\'../bezier/\');">';
  echo '    <i class="fa-solid fa-up-right-from-square"></i>';
  echo "    <h2>Bezier's curve!</h2>";
  echo "    <h>A simple program to calculate a bezier's curve with unlimited points.";
  echo '    </h>';
  echo '  </div>';
  echo '  <div class="show" id="gameshow" onclick="window.open(\'../parlament/\')">';
  echo '    <i class="fa-solid fa-up-right-from-square"></i>';
  echo '    <h2>Parlament!</h2>';
  echo '    <h>Exclusive site for our school parlament to store all records.';
  echo '    </h>';
  echo '  </div>';
  echo '  <div class="show" id="gameshow" onclick="window.open(\'../qr/\')">';
  echo '    <i class="fa-solid fa-up-right-from-square"></i>';
  echo '    <h2>Qr code!</h2>';
  echo '    <h>A simple QR code generator for all of your needs.';
  echo '    </h>';
  echo '  </div>';
  echo '</div>
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
    <li><a href="../games/"><i class="fas fa-gamepad"></i> GameHub</a></li>
    <li><button onclick="signup()"><i class="fas fa-user-plus"></i> Sign Up</button></li>
    <li><button onclick="login()"><i class="fas fa-sign-in-alt"></i> Login</button></li>
  </ul>

  <!-- Úvodní text -->
  <div>
    <h1>Vítejte na Projects!</h1>
    <p>Zde můžete najít nejnovější projekty.</p>
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