<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Reviews du Zoo</title>
</head>
<body>
    <h2>Reviews du Zoo</h2>
    <a href="/review/create">Laisser un avis</a>
    <table>
        <thead>
            <tr>
                <th>Utilisateur</th>
                <th>Contenu</th>
                <th>Date</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reviews as $review): ?>
                <tr>
                    <td><?php echo htmlspecialchars($review['user_name']); ?></td>
                    <td><?php echo htmlspecialchars($review['content']); ?></td>
                    <td><?php echo htmlspecialchars($review['created_at']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
