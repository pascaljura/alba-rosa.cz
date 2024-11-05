<?php
include('assets/config.php');
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = ucfirst($_POST['username']);
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $checkEmailQuery = "SELECT * FROM users_alba_rosa WHERE email='$email'";
    $result = $conn->query($checkEmailQuery);
    if ($result->num_rows > 0) {
        echo "E-mail already registered. Please use a different e-mail.";
    } else {
        $insertUserQuery = "INSERT INTO users_alba_rosa (username, email, password) VALUES ('$username', '$email', '$password')";
        if ($conn->query($insertUserQuery) === TRUE) {
            $lastUserId = $conn->insert_id;
            session_start();
            $_SESSION['idusers'] = $lastUserId;
            $_SESSION['username'] = $username;
            header("Location: index.php");
            exit();
        } else {
            echo "Error inserting data into 'users' table: " . $conn->error;
        }
    }
}
$conn->close();
?>
<!DOCTYPE html>
<html>

<body>
    <script src="./assets/script.js"></script>
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-KF6CNR83B8"></script>

</body>

</html>