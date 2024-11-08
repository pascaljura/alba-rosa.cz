<?php
session_start();
include ('../assets/config.php');
if (isset($_SESSION['idusers'])) {
  // Získání idusers z session
  $idusers = $_SESSION['idusers'];

  // Dotaz na databázi pro získání jména uživatele na základě idusers
  $query_username = "SELECT username FROM users_alba_rosa WHERE idusers = ?";
  $stmt_username = $conn->prepare($query_username);
  $stmt_username->bind_param("i", $idusers);
  $stmt_username->execute();
  $result_username = $stmt_username->get_result();

  if ($result_username) {
    $row_username = $result_username->fetch_assoc();
    $username = $row_username['username'];
    mysqli_free_result($result_username);
  } else {
    echo 'Chyba při provádění dotazu na jméno uživatele: ' . $conn->error;
  }

  // Dotaz na databázi pro získání školského přístupu na základě idusers
  $query_school_access = "SELECT school_access FROM users_alba_rosa WHERE idusers = ?";
  $stmt_school_access = $conn->prepare($query_school_access);
  $stmt_school_access->bind_param("i", $idusers);
  $stmt_school_access->execute();
  $result_school_access = $stmt_school_access->get_result();

  if ($result_school_access) {
    if ($result_school_access->num_rows > 0) {
      $row_school_access = $result_school_access->fetch_assoc();
      $school_access = $row_school_access['school_access'];
    } else {
      $school_access = 0;
    }
    mysqli_free_result($result_school_access);
  } else {
    echo 'Chyba při provádění dotazu na školský přístup: ' . $conn->error;
  }

  echo '
  <!DOCTYPE html>
<html lang="en">
<head>
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
<ul class="navbar">
  <li><a href="../" ><i class="fas fa-home"></i> Home</a></li>
  <li><a href="../school-projects/" class="active"><i class="fa-solid fa-school"></i> School projects</a></li>
  <li><a href="../gamehub/"><i class="fas fa-gamepad"></i> GameHub</a></li>
  <li><a href="../other/"><i class="fas fa-project-diagram"></i> Other</a></li>
  <li><button onclick="location.href=\'../logout.php\'" style="cursor: pointer;"><i class="fas fa-sign-in-alt"></i> Logout</button></li>
</ul>
  <div>';
  echo "
    <h1>Welcome to School projects, $username!</h1>";
  if ($school_access == 1) {
    $query = "SELECT * FROM school_alba_rosa";
    $result = $conn->query($query);
    if ($result->num_rows > 0) {
      echo '
      <p>Here you can find the latest school projects.</p>
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
      echo "<p>No school projects found in the school projects.</p>";
    }
  } else {
    echo '<p>Sorry, you don\'t have access :D</p>';
  }
  echo '
  <footer><p style="color:white;"><a href="https://discord.gg/ZeHnED2BCG" target="_blank" style="color: white;"><i class="fa-brands fa-discord"></i></a> | Jiří Boucník &#38; Matěj Kořalka | &#169; 2024</p></footer>
  <script src="https://kit.fontawesome.com/865012b7e6.js" crossorigin="anonymous"></script>
  <a><script language="JavaScript" type="text/javascript" charset="utf-8">
  <!--
  document.write("<img src="https://toplist.cz/dot.asp?id=1811308&http="+
  encodeURIComponent(document.referrer)+"&t="+encodeURIComponent(document.title)+"&l="+encodeURIComponent(document.URL)+
  "&wi="+encodeURIComponent(window.screen.width)+"&he="+encodeURIComponent(window.screen.height)+"&cd="+
  encodeURIComponent(window.screen.colorDepth)+"" width="1" height="1" border=0 alt="TOPlist" />");
  //--></script><noscript><img src="https://toplist.cz/dot.asp?id=1811308&njs=1" border="0"
  alt="TOPlist" width="1" height="1" /></noscript></a>
  </body>
</html>';
  exit();
} else {
  echo '
  <!DOCTYPE html>
<html lang="en">
<head>
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
<ul class="navbar">
  <li><a href="../" ><i class="fas fa-home"></i> Home</a></li>
  <li><a href="../school-projects/" class="active"><i class="fa-solid fa-school"></i> School projects</a></li>
  <li><a href="../other/"><i class="fas fa-project-diagram"></i> Other</a></li>
  <li><button onclick="signup()" style="cursor: pointer;"><i class="fas fa-user-plus"></i> Sign Up</button></li>
    <li><button onclick="login()" style="cursor: pointer;"><i class="fas fa-sign-in-alt"></i> Login</button></li>
  </ul>

  <div class="popup" id="popupSignup">
  <button class="popClose" onclick="signup(true)">X</button>
  <form id="signupForm" method="post" action="../sign-up.php">
    <h2>Sign Up</h2>
    <input type="text" name="username" placeholder="Username" required>
    <input type="email" name="email" placeholder="Email" required>
    <div id="pasdiv" class="pasdiv"><input type="password" name="password" placeholder="Password" id="signpas"
        required><button onclick="passhow(document.getElementById("signpas"))" class="swbtn"><img
          src="../assets/eye.png"></button></div>
    <input type="submit" class="submitbtn" value="Sign Up">
  </form>
</div>
<div class="popup" id="popupLogin">
  <button class="popClose" onclick="login(true)">X</button>
  <form id="loginForm" method="post" action="../login.php">
    <h2>Login</h2>
    <input type="email" name="email" placeholder="Email" required>
    <div id="pasdiv" class="pasdiv"><input type="password" name="password" placeholder="Password" id="logpas"
        required><button onclick="passhow(document.getElementById("logpas"))" class="swbtn"><img
          src="../assets/eye.png"></button></div>
    <input type="submit" class="submitbtn" value="Login">
  </form>
</div>  <div>';
  echo "
    <h1>Welcome to School projects!</h1>";
  $query = "SELECT * FROM school_alba_rosa";
  $result = $conn->query($query);
  if ($result->num_rows > 0) {
    echo '
      <p>Here you can find the latest school projects.</p>
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
    echo "<p>No school projects found in the school projects.</p>";
  }

  echo '
  </div><br>
  <div class="nolog" id="nolog">
  <h2> Ready to dive in? Log in now to unlock all of our game content! </h2>
</div>
  <footer><p style="color:white;"><a href="https://discord.gg/ZeHnED2BCG" target="_blank" style="color: white;"><i class="fa-brands fa-discord"></i></a> | Jiří Boucník &#38; Matěj Kořalka | &#169; 2024</p></footer>
  <script src="https://kit.fontawesome.com/865012b7e6.js" crossorigin="anonymous"></script>
<script async src="https://www.googletagmanager.com/gtag/js?id=G-KF6CNR83B8"></script>
  <script src="../assets/script.js"></script>
</body>
</html>';
  exit();
}
?>