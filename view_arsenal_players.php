<?php
include('partials/header.php');
require_once 'config.php';
require_once 'ArsenalPlayers.php';

$db = new Database();
$conn = $db->connect();
$arsenal = new ArsenalPlayers($conn);
$players = $arsenal->getAllPlayers();
?>

<body>
<div class="container mt-5">
    <h2>Arsenal All‑Time Legends</h2>
    <table class="table table-striped table-hover mt-3">
        <thead class="table-dark">
        <tr>
            <th>#</th><th>Name</th><th>Position</th><th>Apps</th><th>Goals</th><th>Assists</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($players as $i => $pl): ?>
            <tr>
                <td><?= $i+1 ?></td>
                <td><?= htmlspecialchars($pl['name']) ?></td>
                <td><?= htmlspecialchars($pl['position']) ?></td>
                <td><?= $pl['appearances'] ?></td>
                <td><?= $pl['goals'] ?></td>
                <td><?= $pl['assists'] ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
</div>
</body>
<?php
include("partials/footer.php")

?>
</html>
