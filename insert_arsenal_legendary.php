<?php
require_once 'config.php';
require_once 'ArsenalPlayers.php';

$db = new Database();
$conn = $db->connect();

$arsenal = new ArsenalPlayers($conn);
$arsenal->createTable();

$players = [
    ["Thierry Henry", "Forward", 377, 228, 106],
    ["Tony Adams", "Defender", 669, 32, 9],
    ["Dennis Bergkamp", "Forward", 423, 120, 94],
    ["Ian Wright", "Forward", 288, 185, 50],
    ["Patrick Vieira", "Midfielder", 406, 46, 29],
    ["Robert Pires", "Midfielder", 284, 62, 66],
    ["Liam Brady", "Midfielder", 435, 132, 75],
    ["David Seaman", "Goalkeeper", 564, 0, 0],
    ["Frank McLintock", "Defender", 344, 35, 10],
    ["Lee Dixon", "Defender", 619, 22, 45]
];

foreach ($players as $p) {
    $arsenal->insertPlayer($p[0], $p[1], $p[2], $p[3], $p[4]);
}

echo "✅ Významní hráči boli vložení.";
?>
