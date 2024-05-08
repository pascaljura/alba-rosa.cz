<?php
include ('assets/config.php');
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