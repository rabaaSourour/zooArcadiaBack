<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Habitats</title>
</head>
<body>
    <h2>Habitats</h2>
    <a href="/habitat/create">Ajouter un habitat</a>
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
            <?php foreach ($habitats as $habitat): ?>
                <tr>
                    <td><?php echo htmlspecialchars($habitat['name']); ?></td>
                    <td><?php echo htmlspecialchars($habitat['description']); ?></td>
                    <td><img src="<?php echo htmlspecialchars($habitat['image']); ?>" alt="Image de l'habitat"></td>
                    <td>
                        <a href="/habitat/edit?id=<?php echo $habitat['id']; ?>">Modifier</a>
                        <form method="POST" action="/delete_habitat" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $habitat['id']; ?>">
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>

