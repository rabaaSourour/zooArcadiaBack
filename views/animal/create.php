<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des animaux</title>
</head>
<body>
    <h2>Liste des animaux</h2>
    <a href="/animal/create">Ajouter un nouvel animal</a>
    <table>
        <thead>
            <tr>
                <th>Nom</th>
                <th>Espèce</th>
                <th>Habitat</th>
                <th>Image</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($animals as $animal): ?>
                <tr>
                    <td><?php echo htmlspecialchars($animal['name']); ?></td>
                    <td><?php echo htmlspecialchars($animal['breed']); ?></td>
                    <td><?php echo htmlspecialchars($animal['habitat_name']); ?></td>
                    <td><img src="<?php echo htmlspecialchars($animal['image']); ?>" alt="<?php echo htmlspecialchars($animal['name']); ?>" style="width:100px;"></td>
                    <td>
                        <form method="POST" action="/delete_animal" style="display:inline;">
                            <input type="hidden" name="id" value="<?php echo $animal['id']; ?>">
                            <button type="submit">Supprimer</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
