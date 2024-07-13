<?php
class FeedingLog {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query('SELECT animal_foods.*, animals.name AS animal_name, users.username AS user_name FROM animal_foods JOIN animals ON animal_foods.animal_id = animals.id JOIN users ON animal_foods.user_id = users.id');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($animal_id, $user_id, $food, $quantity) {
        $stmt = $this->pdo->prepare('INSERT INTO animal_foods (animal_id, user_id, food, quantity) VALUES (?, ?, ?, ?)');
        return $stmt->execute([$animal_id, $user_id, $food, $quantity]);
    }
}
?>
