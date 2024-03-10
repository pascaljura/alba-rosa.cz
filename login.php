<?php
include('assets/config.php');

// Kontrola, zda uživatel již není přihlášen
session_start();
if (isset($_SESSION['user_id'])) {
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "GET") {
    // Získání dat z URL parametrů
    $username = ucfirst($_GET['username']);
    $email = $_GET['email'];
    $password = $_GET['password'];

    // Prověření přihlašovacích údajů
    $loginQuery = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($loginQuery);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Úspěšné přihlášení
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

    // Prověření přihlašovacích údajů
    $loginQuery = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($loginQuery);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Úspěšné přihlášení
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
?>