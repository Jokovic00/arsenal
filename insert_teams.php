<?php
require_once 'config.php';
require_once 'PremierLeagueTable.php';

$db = new Database();
$conn = $db->connect();

$table = new PremierLeagueTable($conn);
$table->createTable(); // vytvorenie tabuľky, ak ešte neexistuje

// Vloženie všetkých 20 tímov Premier League 2025/26
$teams = [
    "Arsenal",
    "Aston Villa",
    "Bournemouth",
    "Brentford",
    "Brighton & Hove Albion",
    "Burnley",
    "Chelsea",
    "Crystal Palace",
    "Everton",
    "Fulham",
    "Leeds United",
    "Liverpool",
    "Manchester City",
    "Manchester United",
    "Newcastle United",
    "Nottingham Forest",
    "Sunderland",
    "Tottenham Hotspur",
    "West Ham United",
    "Wolverhampton Wanderers"
];

foreach ($teams as $name) {
    $table->insertTeam($name, 0, 0, 0, 0, 0, 0, 0);
}

echo "✅ Všetkých 20 tímov bolo vložených.";
?>
