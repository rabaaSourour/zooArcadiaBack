<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Modifier les horaires d'ouverture</title>
</head>
<body>
    <h2>Modifier les horaires d'ouverture</h2>
    <form method="POST" action="/opening_hours/edit?id=<?php echo $opening_hour['id']; ?>">
        <div>
            <label for="day">Jour :</label>
            <input type="text" id="day" name="day" value="<?php echo htmlspecialchars($opening_hour['day']); ?>" required>
        </div>
        <div>
            <label for="open_time">Heure d'ouverture :</label>
            <input type="time" id="open_time" name="open_time" value="<?php echo htmlspecialchars($opening_hour['open_time']); ?>" required>
        </div>
        <div>
            <label for="close_time">Heure de fermeture :</label>
            <input type="time" id="close_time" name="close_time" value="<?php echo htmlspecialchars($opening_hour['close_time']); ?>" required>
        </div>
        <button type="submit">Mettre à jour</button>
    </form>
</body>
</html>
