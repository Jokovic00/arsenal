<?php
require_once "User.php";
session_start();

$user = new User();

if (!$user->isLoggedIn()) {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="../style/style_login.css">
</head>
<body>
    <h2>Vitajte, <?php echo $_SESSION['username']; ?>!</h2>
    <p>Toto je vaša chránená zóna.</p>
    <a href="logout.php">Odhlásiť sa</a>
    <a href="../index.php">HOME</a>

</body>
</html>