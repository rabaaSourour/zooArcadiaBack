<?php
class Habitat {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query('SELECT * FROM habitats');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($name, $description, $image) {
        $stmt = $this->pdo->prepare('INSERT INTO habitats (name, description, image) VALUES (?, ?, ?)');
        return $stmt->execute([$name, $description, $image]);
    }

    public function update($id, $name, $description, $image) {
        $stmt = $this->pdo->prepare('UPDATE habitats SET name = ?, description = ?, image = ? WHERE id = ?');
        return $stmt->execute([$name, $description, $image, $id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM habitats WHERE id = ?');
        return $stmt->execute([$id]);
    }

    public function getById($id) {
        $stmt = $this->pdo->prepare('SELECT * FROM habitats WHERE id = ?');
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

