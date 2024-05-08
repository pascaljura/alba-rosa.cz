<?php
ob_start();
include ('assets/config.php');
session_start();
if (isset($_SESSION['idusers'])) {
    header("Location: index.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $username = ucfirst($_GET['username']);
    $email = $_GET['email'];
    $password = $_GET['password'];
    $loginQuery = "SELECT * FROM users_alba_rosa WHERE email='$email'";
    $result = $conn->query($loginQuery);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['idusers'] = $row['idusers'];
            $_SESSION['username'] = $row['username'];
            echo "success";
            header("Location: index.php");
            exit();
        } else {
            echo "Invalid password";
        }
    }
} else if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $password = $_POST['password'];
    $loginQuery = "SELECT * FROM users_alba_rosa WHERE email='$email'";
    $result = $conn->query($loginQuery);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['idusers'] = $row['idusers'];
            $_SESSION['username'] = $row['username'];
            echo "success";
            header("Location: index.php");
            exit();
        } else {
            echo "Invalid password";
        }
    } else {
        echo "User not found";
    }
}
$conn->close();
ob_end_flush();
?>
<!DOCTYPE html>
<html>
    <body>
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