<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Journal d'alimentation</title>
</head>
<body>
    <h2>Journal d'alimentation</h2>
    <a href="/feeding_log/create">Ajouter un journal d'alimentation</a>
    <table>
        <thead>
            <tr>
                <th>Animal</th>
                <th>Utilisateur</th>
                <th>Nourriture</th>
                <th>Quantité</th>
                <th>Date et heure</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($feedingLogs as $log): ?>
                <tr>
                    <td><?php echo htmlspecialchars($log['animal_name']); ?></td>
                    <td><?php echo htmlspecialchars($log['user_name']); ?></td>
                    <td><?php echo htmlspecialchars($log['food']); ?></td>
                    <td><?php echo htmlspecialchars($log['quantity']); ?></td>
                    <td><?php echo htmlspecialchars($log['last-check']); ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
