<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Validation des avis</title>
</head>
<body>
    <h2>Validation des avis</h2>
    <table>
        <thead>
            <tr>
                <th>Utilisateur</th>
                <th>Contenu</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($reviews as $review): ?>
                <tr>
                    <td><?php echo htmlspecialchars($review['user_name']); ?></td>
                    <td><?php echo htmlspecialchars($review['content']); ?></td>
                    <td><?php echo htmlspecialchars($review['created_at']); ?></td>
                    <td>
                        <form method="POST" action="/review/validate" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $review['id']; ?>">
                            <button type="submit">Valider</button>
                        </form>
                        <form method="POST" action="/review/delete" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $review['id']; ?>">
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
