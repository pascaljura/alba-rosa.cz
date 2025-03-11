<?php
ob_start();
include('assets/config.php');
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
    <script src="./assets/script.js"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-KF6CNR83B8"></script>
</body>

</html>