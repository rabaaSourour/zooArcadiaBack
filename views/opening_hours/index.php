<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Horaires d'ouverture</title>
</head>
<body>
    <h2>Horaires d'ouverture</h2>
    <a href="/opening_hours/create">Ajouter des horaires d'ouverture</a>
    <table>
        <thead>
            <tr>
                <th>Jour</th>
                <th>Heure d'ouverture</th>
                <th>Heure de fermeture</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($opening_hours as $opening_hour): ?>
                <tr>
                    <td><?php echo htmlspecialchars($opening_hour['day']); ?></td>
                    <td><?php echo htmlspecialchars($opening_hour['open_time']); ?></td>
                    <td><?php echo htmlspecialchars($opening_hour['close_time']); ?></td>
                    <td>
                        <a href="/opening_hours/edit?id=<?php echo $opening_hour['id']; ?>">Modifier</a>
                        <form method="POST" action="/delete_opening_hour" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $opening_hour['id']; ?>">
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
