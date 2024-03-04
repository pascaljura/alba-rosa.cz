<?php
include '../assets/config.php';
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../assets/signup.php");
    exit();
}
if (isset($_POST['logout'])) {
    // Získání ID uživatele, který se odhlašuje
    $userId = $_SESSION['user_id'];

    // Uložení odhlášení do tabulky logouts
    $insertLogout = $conn->prepare("INSERT INTO logouts (user_id) VALUES (?)");
    $insertLogout->bind_param("i", $userId);
    $insertLogout->execute();
    $insertLogout->close();

    // Zrušení relace a přesměrování na úvodní stránku
    session_unset();
    session_destroy();
    header("Location: ../assets/login.php");
    exit();
}
$userId = $_SESSION['user_id'];
$stmt = $conn->prepare("SELECT username FROM users WHERE id = ?");
$stmt->bind_param("i", $userId);
$stmt->execute();
$stmt->bind_result($username);
$stmt->fetch();
$stmt->close();
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="../style.css">
  <link rel="icon" href="www.alba-rosa.cz/logo.png" type="icon">
  <title>Alba-rosa.cz</title>
</head>

<body>

  <ul>
    <li><a href="../">Home</a></li>
    <li><a href="../projects/">Projects</a></li>
    <li><a href="#">GameHub</a></li>
    <li><div onclick="signup()">sign up</div></li>
    <li><div onclick="login()">login</div></li>
  </ul>

  <script src="script.js">
    document.addEventListener('contextmenu', preventDefault);
    document.addEventListener('keydown', preventKeyCombination);
    function preventDefault(e) {
      e.preventDefault();
    }

    function preventKeyCombination(e) {
      if (e.key === 'F12' || (e.ctrlKey && e.key === 'u')) {
        e.preventDefault();
      }
    }

  </script>

</body>

</html>