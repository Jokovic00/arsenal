<?php
include('partials/header.php');
require_once 'config.php';
require_once 'Forum.php';

// Inicializuj databázu a spojenie
$db = new Database();
$conn = $db->connect();

// Inicializuj objekt Forum a načítaj dáta
$forum = new Forum($conn);
$users = $forum->getAll();

$conn->close(); // Ukonči spojenie
?>

<body class="bg-light">
<div class="container py-5">
    <div class="card shadow rounded">
        <div class="card-body">
            <h1 class="card-title text-center mb-4">User List</h1>

            <div class="d-flex justify-content-between mb-3">
                <a href="create.php" class="btn btn-primary"> Add New User</a>
                <a href="index.php" class="btn btn-outline-dark"> Go Back</a>
            </div>

            <div class="table-responsive">
                <table class="table table-striped table-hover align-middle text-center">
                    <thead class="table-dark">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Message</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php if (!empty($users)): ?>
                        <?php foreach ($users as $user): ?>
                            <tr>
                                <td><?= htmlspecialchars($user['id']) ?></td>
                                <td><?= htmlspecialchars($user['name']) ?></td>
                                <td><?= htmlspecialchars($user['email']) ?></td>
                                <td><?= htmlspecialchars($user['message']) ?></td>
                                <td>
                                    <a href="update.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-warning me-1"> Edit</a>
                                    <a href="delete.php?id=<?= $user['id'] ?>" class="btn btn-sm btn-outline-danger"> Delete</a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="5" class="text-muted">No users found</td>
                        </tr>
                    <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</body>
<?php
include("partials/footer.php")

?>
</html>
