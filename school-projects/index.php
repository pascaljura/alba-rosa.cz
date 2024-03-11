<!DOCTYPE html>
<?php
session_start();
include('../assets/config.php');
if (isset($_SESSION['user_id'])) {
  $user_id = $_SESSION['user_id'];
  $username = $_SESSION['username'];
  $query = "SELECT school_access FROM users WHERE id = $user_id";
  $result = $conn->query($query);
  if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $school_access = $row['school_access'];
  } else {
    $school_access = 0;
  }
  echo '
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../assets/style.css">
  <link rel="shortcut icon" href="../assets/icon.ico" type="image/x-icon">
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
  <li><a href="../" ><i class="fas fa-home"></i> Home</a></li>
  <li><a href="../school-projects/" class="active"><i class="fa-solid fa-school"></i> School projects</a></li>
  <li><a href="../gamehub/"><i class="fas fa-gamepad"></i> GameHub</a></li>
  <li><a href="../other/"><i class="fas fa-project-diagram"></i> Other</a></li>
  <li><button onclick="location.href=\'../logout.php\'"><i class="fas fa-sign-in-alt"></i> Logout</button></li>
</ul>
  <div>';
  echo "
    <h1>Welcome to School projects, $username!</h1>";
  if ($school_access == 1) {
    $query = "SELECT * FROM school";
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
  <footer><p style="color:white;">Jiří Boucník &#38; Matěj Kořalka | &#169; 2024</p></footer>
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
  <link rel="shortcut icon" href="../assets/icon.ico" type="image/x-icon">
  <title>Alba-rosa.cz</title>
  <meta name="author" content="Jiří Boucník & Matěj Kořalka">
  <meta name="application-name" content="Alba-rosa.cz">
  <meta name="description" content="Naše komunita je složená hlavně ze studentů středních škol věnujících se programování. Podílíme se na projektech, které tu (i jinde) sdílíme, a i ty, zde můžeš sdílet své projekty.">
  <meta property="og:title" content="Alba-rosa.cz">
  <meta property="og:description" content="Naše komunita je složená hlavně ze studentů středních škol věnujících se programování. Podílíme se na projektech, které tu (i jinde) sdílíme, a i ty, zde můžeš sdílet své projekty.">
  <meta property="og:image" content="https://alba-rosa.cz/assets/icon.ico">
  <meta property="og:image:type" content="image/ico">
</head>
<body>
  <ul class="navbar">
    <li><a href="../"><i class="fas fa-home"></i> Home</a></li>
    <li><button onclick="signup()"><i class="fas fa-user-plus"></i> Sign Up</button></li>
    <li><button onclick="login()"><i class="fas fa-sign-in-alt"></i> Login</button></li>
  </ul>
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
  <footer>
    <p style="color:white;">Jiří Boucník &#38; Matěj Kořalka | &#169; 2024</p>
  </footer>
  <script src="../assets/script.js"></script>
  <script src="https://kit.fontawesome.com/865012b7e6.js" crossorigin="anonymous"></script>
</body>

</html>