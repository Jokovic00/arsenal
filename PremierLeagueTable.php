<?php
class PremierLeagueTable {
    private $conn;
    private $table = 'premier_league';

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function createTable() {
        $sql = "CREATE TABLE IF NOT EXISTS {$this->table} (
            id INT AUTO_INCREMENT PRIMARY KEY,
            team_name VARCHAR(100) NOT NULL,
            played INT DEFAULT 0,
            wins INT DEFAULT 0,
            draws INT DEFAULT 0,
            losses INT DEFAULT 0,
            goals_for INT DEFAULT 0,
            goals_against INT DEFAULT 0,
            points INT DEFAULT 0
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
        return $this->conn->query($sql);
    }

    public function insertTeam($name, $played, $wins, $draws, $losses, $gf, $ga, $points) {
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} 
            (team_name, played, wins, draws, losses, goals_for, goals_against, points) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("siiiiiii", $name, $played, $wins, $draws, $losses, $gf, $ga, $points);
        return $stmt->execute();
    }

    public function getTable() {
        $sql = "SELECT * FROM {$this->table} ORDER BY points DESC, goals_for - goals_against DESC";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
