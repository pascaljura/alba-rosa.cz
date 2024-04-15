<?php
session_start();
include ('./assets/config.php');
if (isset($_SESSION['idusers'])) {
  $idusers = $_SESSION['idusers'];
  $query = "SELECT username FROM users_alba_rosa WHERE idusers = $idusers";
  $result = mysqli_query($conn, $query);
  if ($result) {
    // Získáme řádek s výsledkem dotazu
    $row = mysqli_fetch_assoc($result);

    // Získáme jméno uživatele z výsledku dotazu
    $username = $row['username'];

    // Uvolníme výsledek dotazu
    mysqli_free_result($result);
  } else {
    echo 'Chyba při provádění dotazu: ' . mysqli_error($conn);
  }

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
  <div class="show" id="projshow" onclick="location.href = \'./school-projects/\';" style="cursor: pointer">
    <div class="button-text" >
      <h2><i class="fa-regular fa-folder"></i>Our school projects!</h2>
      <h></h>
    </div>
  </div>';
  echo '
  <div class="show" id="projshow" onclick="location.href = \'./gamehub/\';" style="cursor: pointer">
    <div class="button-text">
      <h2><i class="fa-regular fa-folder"></i>Our GameHub!</h2>
      <h>Immerse yourself in our captivating game collection.</h>
    </div>
  </div>';
  echo '
  <div class="show" id="projshow" onclick="location.href = \'./other/\';" style="cursor: pointer">
    <div class="button-text">
      <h2><i class="fa-regular fa-folder"></i>Other!</h2>
      <h>Unleash your creativity with our other things.</h>
    </div>
  </div>';
  echo '</div>
  <script src="./assets/script.js"></script>
  <script src="https://kit.fontawesome.com/865012b7e6.js" crossorigin="anonymous"></script>
  <footer><p style="color:white;"><a href="https://discord.gg/ZeHnED2BCG" style="color: white;"><i class="fa-brands fa-discord"></i></a> | Jiří Boucník &#38; Matěj Kořalka | &#169; 2024</p></footer>
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
  </div>
  <div class="nolog" id="nolog">
    <h2> Ready to dive in? Log in now to unlock all of our content! </h2>
  </div>
  <footer>
    <p style="color:white;"><a href="https://discord.gg/ZeHnED2BCG" style="color: white;"><i class="fa-brands fa-discord"></i></a> | Jiří Boucník &#38; Matěj
      Kořalka | &#169; 2024</p>
  </footer>
  <script src="./assets/script.js"></script>
  <script src="https://kit.fontawesome.com/865012b7e6.js" crossorigin="anonymous"></script>
</body>

</html>