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
  <meta name="description" content="Our community is mainly made up of high school students interested in programming. We participate in the projects we share here (and elsewhere), and you, too, can share your projects here.">
  <meta property="og:title" content="Alba-rosa.cz">
  <meta property="og:description" content="Our community is mainly made up of high school students interested in programming. We participate in the projects we share here (and elsewhere), and you, too, can share your projects here.">
  <meta property="og:image" content="https://alba-rosa.cz/assets/icon.ico">
  <meta property="og:image:type" content="image/ico">
</head>
<body>
  <ul class="navbar">
    <li><a href="./" class="active"><i class="fas fa-home"></i> Home</a></li>
    <li><a href="./school-projects/"><i class="fa-solid fa-school"></i> School projects</a></li>
    <li><a href="./gamehub/"><i class="fas fa-gamepad"></i> GameHub</a></li>
    <li><a href="./other/"><i class="fas fa-project-diagram"></i> Other</a></li>
    <li><button onclick="location.href=\'logout.php\'" style="cursor: pointer;"><i class="fas fa-sign-in-alt"></i> Logout</button></li>
  </ul>
  <div>';
  echo "
    <h1>Welcome to our website, $username!</h1>";
  echo ' <p>  <p>We\'re glad you\'re here!<br>
  Our community is mainly made up of high school students interested in programming. <br>We participate in the
  projects we
  share here (and elsewhere), and you, too, can share your projects here.</p></p>
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
  <footer><p style="color:white;"><a href="https://discord.gg/ZeHnED2BCG" target="_blank" style="color: white;"><i class="fa-brands fa-discord"></i></a> | Jiří Boucník &#38; Matěj Kořalka | &#169; 2024</p></footer>
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
    content="Our community is mainly made up of high school students interested in programming. We participate in the projects we share here (and elsewhere), and you, too, can share your projects here.">
  <meta property="og:title" content="Alba-rosa.cz">
  <meta property="og:description"
    content="Our community is mainly made up of high school students interested in programming. We participate in the projects we share here (and elsewhere), and you, too, can share your projects here.">
  <meta property="og:image" content="https://alba-rosa.cz/assets/icon.ico">
  <meta property="og:image:type" content="image/ico">
</head>

<body>
  <ul class="navbar">
    <li><a href="./" class="active"><i class="fas fa-home"></i> Home</a></li>
    <li><a href="./school-projects/"><i class="fa-solid fa-school"></i> School projects</a></li>
    <li><a href="./other/"><i class="fas fa-project-diagram"></i> Other</a></li>
    <li><button onclick="signup()" style="cursor: pointer;"><i class="fas fa-user-plus"></i> Sign Up</button></li>
    <li><button onclick="login()" style="cursor: pointer;"><i class="fas fa-sign-in-alt"></i> Login</button></li>
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
  <h1>Welcome to our website!</h1>
  <p>We're glad you're here!<br>
    Our community is mainly made up of high school students interested in programming. <br>We participate in the
    projects we
    share here (and elsewhere), and you, too, can share your projects here.</p>
  </div>
  <div class="showcont">
    <div class="show" id="projshow" onclick="location.href = './school-projects/'" style="cursor: pointer">
      <div class="button-text">
        <h2><i class="fa-regular fa-folder"></i>Our school projects!</h2>
        <h></h>
      </div>
    </div>
    <div class="show" id="projshow" onclick="location.href = './other/'" style="cursor: pointer">
      <div class="button-text">
        <h2><i class="fa-regular fa-folder"></i>Other!</h2>
        <h>Unleash your creativity with our other things.</h>
      </div>
    </div>
  </div>
  <br>
  <div class="nolog" id="nolog">
    <h2> Ready to dive in? Log in now to unlock all of our game content! </h2>
  </div>

  <footer>
    <p style="color:white;"><a href="https://discord.gg/ZeHnED2BCG" style="color: white;" target="_blank"><i
          class="fa-brands fa-discord"></i></a> | Jiří Boucník &#38; Matěj
      Kořalka | &#169; 2024</p>
  </footer>
  <script src="./assets/script.js"></script>
  <script src="https://kit.fontawesome.com/865012b7e6.js" crossorigin="anonymous"></script>
  <a><script language="JavaScript" type="text/javascript" charset="utf-8">
<!--
document.write('<img src="https://toplist.cz/dot.asp?id=1811308&http='+
encodeURIComponent(document.referrer)+'&t='+encodeURIComponent(document.title)+'&l='+encodeURIComponent(document.URL)+
'&wi='+encodeURIComponent(window.screen.width)+'&he='+encodeURIComponent(window.screen.height)+'&cd='+
encodeURIComponent(window.screen.colorDepth)+'" width="1" height="1" border=0 alt="TOPlist" />');
//--></script><noscript><img src="https://toplist.cz/dot.asp?id=1811308&njs=1" border="0"
alt="TOPlist" width="1" height="1" /></noscript></a>
</body>

</html>