<?php
class VeterinaryReport {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query('SELECT * FROM veterinary_reports');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($animal_id, $status, $food, $food_quantity, $details, $last_check) {
        $stmt = $this->pdo->prepare('INSERT INTO veterinary_reports (animal_id, status, food, food_quantity, details, last_check) VALUES (?, ?, ?, ?, ?, ?)');
        return $stmt->execute([$animal_id, $status, $food, $food_quantity, $details, $last_check]);
    }

    public function getByAnimalId($animal_id) {
        $stmt = $this->pdo->prepare('SELECT * FROM veterinary_reports WHERE animal_id = ?');
        $stmt->execute([$animal_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>
