<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Services</title>
</head>
<body>
    <h2>Services</h2>
    <a href="/service/create">Ajouter un service</a>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Description</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($services as $service): ?>
                <tr>
                    <td><?php echo htmlspecialchars($service['name']); ?></td>
                    <td><?php echo htmlspecialchars($service['description']); ?></td>
                    <td><img src="<?php echo htmlspecialchars($service['image']); ?>" alt="Image du service"></td>
                    <td>
                        <a href="/service/edit?id=<?php echo $service['id']; ?>">Modifier</a>
                        <form method="POST" action="/delete_service" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $service['id']; ?>">
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
