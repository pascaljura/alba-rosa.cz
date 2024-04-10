<?php
ob_start();
include ('assets/config.php');
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}
if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $username = ucfirst($_GET['username']);
    $email = $_GET['email'];
    $password = $_GET['password'];
    $loginQuery = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($loginQuery);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['user_id'] = $row['id'];
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
    $loginQuery = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($loginQuery);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            session_start();
            $_SESSION['user_id'] = $row['id'];
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
<?php
include './assets/php/config.php';
session_start();

if (isset($_SESSION['user_id'])) {
    header("Location: ./main.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $enteredUsername = $_POST["username"];
    $enteredPassword = $_POST["password"];

    $stmt = $conn->prepare("SELECT id, username FROM users WHERE username = ? AND password = ?");
    $stmt->bind_param("ss", $enteredUsername, $enteredPassword);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($userId, $username);
        $stmt->fetch();

        // Uložení přihlášení do tabulky logins
        $insertLogin = $conn->prepare("INSERT INTO logins (user_id) VALUES (?)");
        $insertLogin->bind_param("i", $userId);
        $insertLogin->execute();
        $insertLogin->close();

        $_SESSION['user_id'] = $userId;
        $_SESSION['username'] = $username;
        header("Location: ./main.php");
        exit();
    } else {
        $loginError = "Nesprávné přihlašovací údaje!";
    }

    $stmt->close();
}

$conn->close();
?>