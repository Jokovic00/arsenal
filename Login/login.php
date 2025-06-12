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
    $password = trim($_POST["password"]);

    if ($user->login($username, $password)) {
        header("Location: dashboard.php");
    } else {
        $error = "Nesprávne meno alebo heslo!";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Prihlásenie</title>
    <link rel="stylesheet" href="../style/style_login.css">
</head>
<body>
    <h2>Prihlásenie</h2>
    <?php if (isset($_GET['registered'])) echo "<p style='color:green'>Registrácia úspešná! Teraz sa prihláste.</p>"; ?>
    <?php if (isset($error)) echo "<p style='color:red'>$error</p>"; ?>
    <form method="POST">
        <input type="text" name="username" placeholder="Meno" required><br>
        <input type="password" name="password" placeholder="Heslo" required><br>
        <button type="submit">Prihlásiť sa</button>
    </form>
    <p>Nemáte účet? <a href="register.php">Zaregistrujte sa</a></p>
</body>
</html>