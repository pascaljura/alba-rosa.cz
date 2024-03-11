<?php
session_start();
if (isset($_SESSION['user_id'])) {
  // Uživatel je přihlášen, zobrazíte požadovaný obsah
  $username = $_SESSION['username'];
  echo "";
  echo '<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/style.css">
  <link rel="shortcut icon" href="./assets/icon.ico" type="image/x-icon">
  <title>Alba-rosa.cz</title>
  <meta name="author" content=\'Jiří Boucník & Matěj Kořalka\'>
  <meta name="application-name" content="Alba-rosa.cz">
  <meta name="description" content="Naše komunita je složená hlavně ze studentů středních škol věnujících se programování. Podílíme se na projektech, které tu (i jinde) sdílíme, a i ty, zde můžeš sdílet své projekty.">
  <meta property="og:title" content="Alba-rosa.cz">
  <meta property="og:description" content="Naše komunita je složená hlavně ze studentů středních škol věnujících se programování. Podílíme se na projektech, které tu (i jinde) sdílíme, a i ty, zde můžeš sdílet své projekty.">
  <meta property="og:image" content="https://alba-rosa.cz/assets/icon.ico">
  <meta property="og:image:type" content="image/ico">
</head>
<body>
  <ul class="navbar">
    <li><a href="./" class="active"><i class="fas fa-home"></i> Home</a></li>
    <li><a href="./school-projects/"><i class="fa-solid fa-school"></i> School projects</a></li>
    <li><a href="./gamehub/"><i class="fas fa-gamepad"></i> GameHub</a></li>
    <li><a href="./other/"><i class="fas fa-project-diagram"></i> Other</a></li>
    <li><button onclick="location.href=\'logout.php\'"><i class="fas fa-sign-in-alt"></i> Logout</button></li>
  </ul>
  <div>';
  echo "
    <h1>Welcome to our website, $username!</h1>";
  echo ' <p>Here you can find the latest school projects, games and other.</p>
  </div>';
  echo '<div class="showcont">';
  echo '
  <div class="show" id="projshow" onclick="window.open(\'./school-projects/\');" style="cursor: pointer">
    <div class="button-text" >
      <h2><i class="fa-regular fa-folder"></i>Our school projects!</h2>
      <h></h>
    </div>
  </div>';
  echo '
  <div class="show" id="projshow" onclick="window.open(\'./gamehub/\');" style="cursor: pointer">
    <div class="button-text">
      <h2><i class="fa-regular fa-folder"></i>Our GameHub!</h2>
      <h>Immerse yourself in our captivating game collection.</h>
    </div>
  </div>';
  echo '
  <div class="show" id="projshow" onclick="window.open(\'./other/\');" style="cursor: pointer">
    <div class="button-text">
      <h2><i class="fa-regular fa-folder"></i>Other!</h2>
      <h>Unleash your creativity with our other things.</h>
    </div>
  </div>';
  echo '</div>
  <script src="./assets/script.js"></script>
  <script src="https://kit.fontawesome.com/865012b7e6.js" crossorigin="anonymous"></script>
  <footer><p style="color:white;">Jiří Boucník &#38; Matěj Kořalka | &#169; 2024</p></footer>
</body>
</html>';
  exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="./assets/style.css">
  <link rel="shortcut icon" href="./assets/icon.ico" type="image/x-icon">
  <title>Alba-rosa.cz</title>
  <meta name="author" content="Jiří Boucník & Matěj Kořalka">
  <meta name="application-name" content="Alba-rosa.cz">
  <meta name="description"
    content="Naše komunita je složená hlavně ze studentů středních škol věnujících se programování. Podílíme se na projektech, které tu (i jinde) sdílíme, a i ty, zde můžeš sdílet své projekty.">
  <meta property="og:title" content="Alba-rosa.cz">
  <meta property="og:description"
    content="Naše komunita je složená hlavně ze studentů středních škol věnujících se programování. Podílíme se na projektech, které tu (i jinde) sdílíme, a i ty, zde můžeš sdílet své projekty.">
  <meta property="og:image" content="https://alba-rosa.cz/assets/icon.ico">
  <meta property="og:image:type" content="image/ico">
</head>

<body>
  <ul class="navbar">
    <li><a href="./" class="active"><i class="fas fa-home"></i> Home</a></li>
    <li><button onclick="signup()"><i class="fas fa-user-plus"></i> Sign Up</button></li>
    <li><button onclick="login()"><i class="fas fa-sign-in-alt"></i> Login</button></li>
  </ul>
  <div class="popup" id="popupSignup">
    <button class="popClose" onclick="signup(true)">X</button>
    <form id="signupForm" method="post" action="sign-up.php">
      <h2>Sign Up</h2>
      <input type="text" name="username" placeholder="Username" required>
      <input type="email" name="email" placeholder="Email" required>
      <div id='pasdiv' class='pasdiv'><input type="password" name="password" placeholder="Password" id='signpas'
          required><button onclick='passhow(document.getElementById("signpas"))' class='swbtn'><img
            src='./assets/eye.png'></button></div>
      <input type="submit" class="submitbtn" value="Sign Up">
    </form>
    <button onclick="login()" class='svitch'>Login</button>
  </div>
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
  <div class="nolog" id="nolog">
    <h2> Ready to dive in? Log in now to unlock all of our content! </h2>
  </div>
  <footer>
    <p style="color:white;">Jiří Boucník &#38; Matěj Kořalka | &#169; 2024</p>
  </footer>
  <script src="./assets/script.js"></script>
  <script src="https://kit.fontawesome.com/865012b7e6.js" crossorigin="anonymous"></script>
</body>

</html>