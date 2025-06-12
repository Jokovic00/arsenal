<?php
include('partials/header.php');
require_once 'config.php';
require_once 'PremierLeagueTable.php';

$db = new Database();
$conn = $db->connect();
$table = new PremierLeagueTable($conn);
$teams = $table->getTable();
?>

<body>
<div class="container mt-5">
    <h2 class="mb-4">Premier League Table</h2>
    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>#</th>
                <th>Team</th>
                <th>Played</th>
                <th>W</th>
                <th>D</th>
                <th>L</th>
                <th>GF</th>
                <th>GA</th>
                <th>Points</th>
            </tr>
        </thead>
        <tbody>
        <?php foreach ($teams as $index => $team): ?>
            <tr>
                <td><?= $index + 1 ?></td>
                <td><?= htmlspecialchars($team['team_name']) ?></td>
                <td><?= $team['played'] ?></td>
                <td><?= $team['wins'] ?></td>
                <td><?= $team['draws'] ?></td>
                <td><?= $team['losses'] ?></td>
                <td><?= $team['goals_for'] ?></td>
                <td><?= $team['goals_against'] ?></td>
                <td><strong><?= $team['points'] ?></strong></td>
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
