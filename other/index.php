<?php
session_start();
include('../assets/config.php');

if (isset($_SESSION['idusers'])) {
  $idusers = $_SESSION['idusers'];
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
  echo '
  <!DOCTYPE html>
<html lang="en">
<head>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8345853981011942"
     crossorigin="anonymous"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/style.css">
  <link rel="shortcut icon" href="../assets/icon.ico" type="image/x-icon">
  <title>Alba-rosa.cz</title>
  <meta name="author" content=\'Jiří Boucník & Matěj Kořalka\'>
  <meta name="application-name" content="Alba-rosa.cz">
  <meta name="description" content="Our community is mainly made up of high school students interested in programming. We participate in the projects we share here (and elsewhere), and you, too, can share your projects here.">
  <meta property="og:title" content="Alba-rosa.cz">
  <meta property="og:description" content="Our community is mainly made up of high school students interested in programming. We participate in the projects we share here (and elsewhere), and you, too, can share your projects here.">
  <meta property="og:image" content="https://alba-rosa.cz/assets/icon.ico">
  <meta property="og:image:type" content="image/ico">
</head>
<body>
<amp-auto-ads type="adsense"
        data-ad-client="ca-pub-8345853981011942">
</amp-auto-ads>
<ul class="navbar">
  <li><a href="../" ><i class="fas fa-home"></i> Home</a></li>
  <li><a href="../school-projects/"><i class="fa-solid fa-school"></i> School projects</a></li>
  <li><a href="../gamehub/"><i class="fas fa-gamepad"></i> GameHub</a></li>
  <li><a href="../other/" class="active"><i class="fas fa-project-diagram"></i> Other</a></li>
  <li><button onclick="location.href=\'../logout.php\'" style="cursor: pointer;"><i class="fas fa-sign-in-alt"></i> Logout</button></li>
</ul>
  <div>';
  echo "
    <h1>Welcome to Other, $username!</h1>";
  $query = "SELECT * FROM other_alba_rosa";
  $result = $conn->query($query);
  if ($result->num_rows > 0) {
    echo '
      <p>Here you can find the latest other things.</p>
            </div><div class="showcont">';
    while ($row = $result->fetch_assoc()) {
      $icon = $row['icon'];
      $name = $row['name'];
      $description = $row['description'];
      $web = $row['web'];
      $github = $row['github'];
      echo '
        <div class="show" id="projshow">
            <div class="button-text">
                <h2>' . $icon . '' . $name . '</h2>
                <h>' . $description . '</h>
            </div>
            <div class="button-container">
                <button class="project-button" onclick="window.open(\'' . $web . '\', \'_blank\');"><i class="fa-solid fa-up-right-from-square"></i>Web</button>
                <button class="project-button" onclick="window.open(\'' . $github . '\', \'_blank\');"><i class="fa-brands fa-github"></i>GitHub</button>
            </div>
        </div>';
    }
  } else {
    echo "<p>No other things found in the other things.</p>";
  }
  echo '
  <footer><p style="color:white;"><a href="https://discord.gg/ZeHnED2BCG" target="_blank" style="color: white;"><i class="fa-brands fa-discord"></i></a> | Jiří Boucník &#38; Matěj Kořalka | &#169; 2024</p></footer>
  <script src="https://kit.fontawesome.com/865012b7e6.js" crossorigin="anonymous"></script>
 <script src="../assets/script.js"></script>
  </body>
</html>';
  exit();
} else {
  echo '
  <!DOCTYPE html>
<html lang="en">
<head>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8345853981011942"
     crossorigin="anonymous"></script>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/style.css">
  <script src="../assets/script.js"></script>
  <link rel="shortcut icon" href="../assets/icon.ico" type="image/x-icon">
  <title>Alba-rosa.cz</title>
  <meta name="author" content=\'Jiří Boucník & Matěj Kořalka\'>
  <meta name="application-name" content="Alba-rosa.cz">
  <meta name="description" content="Our community is mainly made up of high school students interested in programming. We participate in the projects we share here (and elsewhere), and you, too, can share your projects here.">
  <meta property="og:title" content="Alba-rosa.cz">
  <meta property="og:description" content="Our community is mainly made up of high school students interested in programming. We participate in the projects we share here (and elsewhere), and you, too, can share your projects here.">
  <meta property="og:image" content="https://alba-rosa.cz/assets/icon.ico">
  <meta property="og:image:type" content="image/ico">
</head>
<body>
<amp-auto-ads type="adsense"
        data-ad-client="ca-pub-8345853981011942">
</amp-auto-ads>
<ul class="navbar">
  <li><a href="../" ><i class="fas fa-home"></i> Home</a></li>
  <li><a href="../school-projects/"><i class="fa-solid fa-school"></i> School projects</a></li>

  <li><a href="../other/" class="active"><i class="fas fa-project-diagram"></i> Other</a></li>
  <li><button onclick="signup()" style="cursor: pointer;"><i class="fas fa-user-plus"></i> Sign Up</button></li>
    <li><button onclick="login()" style="cursor: pointer;"><i class="fas fa-sign-in-alt"></i> Login</button></li>
 </ul>
  <div class="popup" id="popupSignup">
    <button class="popClose" onclick="signup(true)">X</button>
    <form id="signupForm" method="post" action="sign-up.php">
      <h2>Sign Up</h2>
      <input type="text" name="username" placeholder="Username" required>
      <input type="email" name="email" placeholder="Email" required>
      <div class="form-input-wrapper">
        <input type="password" class="form-input password-input" id="signpas" name="password" placeholder="1234"
          required>
        <span class="toggle-password" id="toggle_pwd_sign" onclick="togglePassword_sign()"><i
            class="fa fa-eye"></i></span></input>
      </div><br>
      <input type="submit" class="submitbtn" value="Sign Up">
    </form>
  </div>
  <div class="popup" id="popupLogin">
    <button class="popClose" onclick="login(true)">X</button>
    <form id="loginForm" method="post" action="../login.php">
      <h2>Login</h2>
      <input type="email" name="email" placeholder="Email" required>
      <div class="form-input-wrapper">
        <input type="password" class="form-input password-input" id="logpas" name="password" placeholder="1234"
          required>
        <span class="toggle-password" id="toggle_pwd_log" onclick="togglePassword_log()"><i class="fa fa-eye"></i></span>
      </div><br>
      <input type="submit" class="submitbtn" value="Login">
    </form>
  </div>  <div>';
  echo "
    <h1>Welcome to Other!</h1>";
  $query = "SELECT * FROM other_alba_rosa";
  $result = $conn->query($query);
  if ($result->num_rows > 0) {
    echo '
      <p>Here you can find the latest other things.</p>
            </div><div class="showcont">';
    while ($row = $result->fetch_assoc()) {
      $icon = $row['icon'];
      $name = $row['name'];
      $description = $row['description'];
      $web = $row['web'];
      $github = $row['github'];
      echo '
        <div class="show" id="projshow">
            <div class="button-text">
                <h2>' . $icon . '' . $name . '</h2>
                <h>' . $description . '</h>
            </div>
            <div class="button-container">
                <button class="project-button" onclick="window.open(\'' . $web . '\', \'_blank\');"><i class="fa-solid fa-up-right-from-square"></i>Web</button>
                <button class="project-button" onclick="window.open(\'' . $github . '\', \'_blank\');"><i class="fa-brands fa-github"></i>GitHub</button>
            </div>
        </div>';
    }
  } else {
    echo "<p>No other things found in the other things.</p>";
  }
  echo '  </div><br>
  <div class="nolog" id="nolog">
  <h2> Ready to dive in? Log in now to unlock all of our game content! </h2>
</div>
  <footer><p style="color:white;"><a href="https://discord.gg/ZeHnED2BCG" target="_blank" style="color: white;"><i class="fa-brands fa-discord"></i></a> | Jiří Boucník &#38; Matěj Kořalka | &#169; 2024</p></footer>
  <script src="https://kit.fontawesome.com/865012b7e6.js" crossorigin="anonymous"></script>
 <script src="../assets/script.js"></script>
  </body>
</html>';
  exit();
}
?>