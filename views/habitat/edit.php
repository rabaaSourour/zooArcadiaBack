<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier l'habitat</title>
</head>
<body>
    <h2>Modifier l'habitat</h2>
    <form method="POST" action="/habitat/edit?id=<?php echo $habitat['id']; ?>">
        <div>
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($habitat['name']); ?>" required>
        </div>
        <div>
            <label for="description">Description :</label>
            <textarea id="description" name="description" required><?php echo htmlspecialchars($habitat['description']); ?></textarea>
        </div>
        <div>
            <label for="image">Image :</label>
            <input type="text" id="image" name="image" value="<?php echo htmlspecialchars($habitat['image']); ?>" required>
        </div>
        <button type="submit">Mettre à jour</button>
    </form>
</body>
</html>
