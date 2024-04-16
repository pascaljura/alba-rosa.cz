<?php
session_start();
include ('../assets/config.php');
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
<meta name="description" content="Naše komunita je složená hlavně ze studentů středních škol věnujících se programování. Podílíme se na projektech, které tu (i jinde) sdílíme, a i ty, zde můžeš sdílet své projekty.">
<meta property="og:title" content="Alba-rosa.cz">
<meta property="og:description" content="Naše komunita je složená hlavně ze studentů středních škol věnujících se programování. Podílíme se na projektech, které tu (i jinde) sdílíme, a i ty, zde můžeš sdílet své projekty.">
<meta property="og:image" content="https://alba-rosa.cz/assets/icon.ico">
<meta property="og:image:type" content="image/ico">
</head>
<body>
  <!-- Menu -->
  <ul class="navbar">
  <li><a href="../"><i class="fas fa-home"></i> Home</a></li>
  <li><a href="../school-projects/"><i class="fa-solid fa-school"></i> School projects</a></li>
  <li><a href="../gamehub/"  class="active"><i class="fas fa-gamepad"></i> GameHub</a></li>
  <li><a href="../other/"><i class="fas fa-project-diagram"></i> Other</a></li>
  <li><button onclick="location.href=\'../logout.php\'"><i class="fas fa-sign-in-alt"></i> Logout</button></li>
</ul>
  <!-- Úvodní text -->
  <div>';
  echo "
    <h1>Welcome to GameHub, $username!</h1>";
  $query = "SELECT * FROM gamehub_public_alba_rosa";
  $result = $conn->query($query);
  if ($result->num_rows > 0) {
    echo '
    <p>Here you can find the latest games.</p>
          </div>   <div class="showcont">';
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
    echo "<p>No games found in the gamehub.</p>";
  }
  echo '</div>
  <footer><p style="color:white;"><a href="https://discord.gg/ZeHnED2BCG" style="color: white;"><i class="fa-brands fa-discord"></i></a> | Jiří Boucník &#38; Matěj Kořalka | &#169; 2024</p></footer>
  <script src="https://kit.fontawesome.com/865012b7e6.js" crossorigin="anonymous"></script>
</body>
</html>';
  exit();
}

else {
  header("Location: ../index.php");
  exit();
};
?>