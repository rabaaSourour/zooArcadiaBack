<?php
class Animal {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query('SELECT a.*, h.name as habitat_name FROM animals a JOIN habitats h ON a.habitat_id = h.id');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($name, $species, $habitat_id, $image) {
        $stmt = $this->pdo->prepare('INSERT INTO animals (name, species, habitat_id, image) VALUES (?, ?, ?, ?)');
        return $stmt->execute([$name, $species, $habitat_id, $image]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM animals WHERE id = ?');
        return $stmt->execute([$id]);
    }
}
?>
