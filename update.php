<?php
require_once 'config.php';
require_once 'Forum.php';

$db = new Database();
$conn = $db->connect();
$forum = new Forum($conn);

// Načítaj existujúce dáta
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $row = $forum->getById($id);
    if (!$row) {
        header("Location: admin.php");
        exit;
    }
} else {
    header("Location: admin.php");
    exit;
}

// Spracovanie aktualizácie
if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    if ($forum->update($id, $name, $email, $message)) {
        header("Location: admin.php");
        exit;
    } else {
        echo "Error updating record.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit User</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container">
    <h1 class="mt-5">Edit User</h1>
    <form method="post" action="update.php?id=<?= $row['id'] ?>" class="mt-3">
        <input type="hidden" name="id" value="<?= htmlspecialchars($row['id']) ?>">

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" class="form-control" name="name" value="<?= htmlspecialchars($row['name']) ?>" required>
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" name="email" value="<?= htmlspecialchars($row['email']) ?>" required>
        </div>

        <div class="form-group">
            <label for="message">Message</label>
            <textarea class="form-control" name="message" required><?= htmlspecialchars($row['message']) ?></textarea>
        </div>

        <button type="submit" class="btn btn-primary mt-3" name="update">Update</button>
        <a href="admin.php" class="btn btn-secondary mt-3">Cancel</a>
    </form>
</div>
</body>
</html>
