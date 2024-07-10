<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier le service</title>
</head>
<body>
    <h2>Modifier le service</h2>
    <form method="POST" action="/service/edit?id=<?php echo $service['id']; ?>">
        <div>
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($service['name']); ?>" required>
        </div>
        <div>
            <label for="description">Description :</label>
            <textarea id="description" name="description" required><?php echo htmlspecialchars($service['description']); ?></textarea>
        </div>
        <div>
            <label for="image">Image :</label>
            <input type="text" id="image" name="image" value="<?php echo htmlspecialchars($service['image']); ?>" required>
        </div>
        <button type="submit">Mettre à jour</button>
    </form>
</body>
</html>
