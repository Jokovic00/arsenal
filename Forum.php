<?php
class Forum {
    private $conn;
    private $table = "Forum";
    

    // Konstruktor
    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function create($name, $email, $message) {
        $stmt = $this->conn->prepare("INSERT INTO $this->table (name, email, message) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $name, $email, $message);
        return $stmt->execute();
    }

    // Získaj všetkých používateľov
    public function getAll() {
        $result = $this->conn->query("SELECT * FROM $this->table ORDER BY id DESC");
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }

    // Získaj jedného podľa ID
    public function getById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    // Aktualizuj používateľa
    public function update($id, $name, $email, $message) {
        $stmt = $this->conn->prepare("UPDATE $this->table SET name = ?, email = ?, message = ? WHERE id = ?");
        $stmt->bind_param("sssi", $name, $email, $message, $id);
        return $stmt->execute();
    }
    




    // Vymaž používateľa
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM $this->table WHERE id = ?");
        $stmt->bind_param("i", $id);
        return $stmt->execute();
    }
}
?>
