<?php
class Review {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function getAll() {
        $stmt = $this->pdo->query('SELECT reviews.*, users.username AS user_name FROM reviews JOIN users ON reviews.user_id = users.id WHERE validated = 1');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getAllPending() {
        $stmt = $this->pdo->query('SELECT reviews.*, users.username AS user_name FROM reviews JOIN users ON reviews.user_id = users.id WHERE validated = 0');
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function create($user_id, $content) {
        $stmt = $this->pdo->prepare('INSERT INTO reviews (user_id, content) VALUES (?, ?)');
        return $stmt->execute([$user_id, $content]);
    }

    public function validate($id) {
        $stmt = $this->pdo->prepare('UPDATE reviews SET validated = 1 WHERE id = ?');
        return $stmt->execute([$id]);
    }

    public function delete($id) {
        $stmt = $this->pdo->prepare('DELETE FROM reviews WHERE id = ?');
        return $stmt->execute([$id]);
    }
}
?>
