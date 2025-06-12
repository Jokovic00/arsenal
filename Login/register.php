<?php
require_once "User.php";
session_start();

$user = new User();

if ($user->isLoggedIn()) {
    header("Location: dashboard.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = trim($_POST["username"]);
    $email = trim($_POST["email"]);
    $password = trim($_POST["password"]);

    if ($user->register($username, $email, $password)) {
        header("Location: login.php?registered=1");
    } else {
        $error = "Registrácia zlyhala!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Registrácia</title>
    <link rel="stylesheet" href="../style/style_login.css">
</head>
<body>
    <h2>Registrácia</h2>
    <?php if (isset($error)) echo "<p style='color:red'>$error</p>"; ?>
    <form method="POST">
        <input type="text" name="username" placeholder="Meno" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="password" name="password" placeholder="Heslo" required><br>
        <button type="submit">Registrovať</button>
    </form>
    <p>Máte účet? <a href="login.php">Prihláste sa</a></p>
</body>
</html>