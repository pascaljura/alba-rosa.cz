<?php
include('assets/config.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

    // Vložení nového uživatele do tabulky "users"
    $insertUserQuery = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
    
    if ($conn->query($insertUserQuery) === TRUE) {
        // Úspěšně vytvořeno
        $lastUserId = $conn->insert_id;

        // Vložení dat do tabulky "purpix"
        $insertPurpixQuery = "INSERT INTO purpix (user_id, username) VALUES ('$lastUserId', '$username')";
        
        if ($conn->query($insertPurpixQuery) === TRUE) {
            echo "success";
        } else {
            echo "Error inserting data into 'purpix' table: " . $conn->error;
        }
    } else {
        echo "Error inserting data into 'users' table: " . $conn->error;
    }
}

$conn->close();
?>
