<?php
include('assets/config.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = ucfirst($_POST['username']);
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $checkEmailQuery = "SELECT * FROM users WHERE email='$email'";
    $result = $conn->query($checkEmailQuery);
    if ($result->num_rows > 0) {
        echo "E-mail already registered. Please use a different e-mail.";
    } else {
        $insertUserQuery = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        if ($conn->query($insertUserQuery) === TRUE) {
            $lastUserId = $conn->insert_id;
            $insertPurpixQuery = "INSERT INTO purpix (users_id) VALUES ('$lastUserId')";
            if ($conn->query($insertPurpixQuery) === TRUE) {
                header("Location: login.php?username=$username&email=$email&password=" . $_POST['password']);
                exit();
            } else {
                echo "Error inserting data into 'purpix' table: " . $conn->error;
            }
        } else {
            echo "Error inserting data into 'users' table: " . $conn->error;
        }
    }
}
$conn->close();
?>