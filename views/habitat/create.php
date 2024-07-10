<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un habitat</title>
</head>
<body>
    <h2>Ajouter un habitat</h2>
    <form method="POST" action="/habitat/create">
        <div>
            <label for="name">Nom :</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="description">Description :</label>
            <textarea id="description" name="description" required></textarea>
        </div>
        <div>
            <label for="image">Image :</label>
            <input type="text" id="image" name="image" required>
        </div>
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>

