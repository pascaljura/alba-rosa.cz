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
    if (isset($_POST['register'])) {
        // Zpracování registrace
        $username = ucfirst($_POST['username']);
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        // Vložení nového uživatele do tabulky "users"
        $insertUserQuery = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";

        if ($conn->query($insertUserQuery) === TRUE) {
            // Úspěšně vytvořeno
            $lastUserId = $conn->insert_id;

            // Vložení dat do tabulky "purpix"
            $insertPurpixQuery = "INSERT INTO purpix (users_id) VALUES ('$lastUserId')";

            if ($conn->query($insertPurpixQuery) === TRUE) {
                echo "success";
                header("Location: login.php");
                exit();
            } else {
                echo "Error inserting data into 'purpix' table: " . $conn->error;
            }
        } else {
            echo "Error";
        }
    }
}

$conn->close();
?>