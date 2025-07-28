<?php
session_start();
include 'db.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM users WHERE email='$email' AND password='$pass'";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) === 1) {
        $_SESSION['user'] = $email;
        header("Location: users.php");
        exit();
    } else {
        echo "<p style='color:red;'>Invalid email or password</p>";
    }
}
?>

<h2>🔐 Login Form</h2>
<form method="POST" action="">
    <input type="email" name="email" placeholder="Email" required><br><br>
    <input type="password" name="password" placeholder="Password" required><br><br>
    <button type="submit" name="login">Login</button>
</form>