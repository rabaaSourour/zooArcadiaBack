<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter un journal d'alimentation</title>
</head>
<body>
    <h2>Ajouter un journal d'alimentation</h2>
    <form method="POST" action="/feeding_log/create">
        <div>
            <label for="animal_id">Animal :</label>
            <select id="animal_id" name="animal_id" required>
                <?php foreach ($animals as $animal): ?>
                    <option value="<?php echo $animal['id']; ?>"><?php echo htmlspecialchars($animal['name']); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="food">Nourriture :</label>
            <input type="text" id="food" name="food" required>
        </div>
        <div>
            <label for="quantity">Quantité :</label>
            <input type="text" id="quantity" name="quantity" required>
        </div>
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>
