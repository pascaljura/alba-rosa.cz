<?php
include('assets/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
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
            // Přesměrování na login.php s předanými údaji
            header("Location: login.php?username=$username&email=$email&password=" . $_POST['password']);
            exit();
        } else {
            echo "Error inserting data into 'purpix' table: " . $conn->error;
        }
    } else {
        echo "Error inserting data into 'users' table: " . $conn->error;
    }
}

$conn->close();
?>