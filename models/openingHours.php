<?php
class OpeningHours {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query('SELECT * FROM opening_hours');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($day, $open_time, $close_time) {
        $stmt = $this->pdo->prepare('INSERT INTO opening_hours (day, open_time, close_time) VALUES (?, ?, ?)');
        return $stmt->execute([$day, $open_time, $close_time]);
    }

    public function update($id, $day, $open_time, $close_time) {
        $stmt = $this->pdo->prepare('UPDATE opening_hours SET day = ?, open_time = ?, close_time = ? WHERE id = ?');
        return $stmt->execute([$day, $open_time, $close_time, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM opening_hours WHERE id = ?');
        return $stmt->execute([$id]);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM opening_hours WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}
?>
