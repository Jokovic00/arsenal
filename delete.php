<?php
require_once 'config.php';
require_once 'Forum.php';

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);

    $db = new Database();
    $conn = $db->connect();

    $forum = new Forum($conn);

    if ($forum->delete($id)) {
        header("Location: admin.php");
        exit;
    } else {
        echo "Error deleting record.";
    }

    $conn->close();
} else {
    header("Location: admin.php");
    exit;
}
?>
