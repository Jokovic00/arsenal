<?php
class ArsenalPlayers {
    private $conn;
    private $table = 'arsenal_players_alltime';

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function createTable() {
        $sql = "CREATE TABLE IF NOT EXISTS {$this->table} (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(100) NOT NULL,
            position VARCHAR(50),
            appearances INT DEFAULT 0,
            goals INT DEFAULT 0,
            assists INT DEFAULT 0
        ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
        return $this->conn->query($sql);
    }

    public function insertPlayer($name, $position, $appearances, $goals, $assists) {
        $stmt = $this->conn->prepare("INSERT INTO {$this->table} (name, position, appearances, goals, assists) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("siiii", $name, $position, $appearances, $goals, $assists);
        return $stmt->execute();
    }

    public function getAllPlayers() {
        $sql = "SELECT * FROM {$this->table} ORDER BY appearances DESC";
        $result = $this->conn->query($sql);
        return $result->fetch_all(MYSQLI_ASSOC);
    }
}
?>
