<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Ajouter des horaires d'ouverture</title>
</head>
<body>
    <h2>Ajouter des horaires d'ouverture</h2>
    <form method="POST" action="/opening_hours/create">
        <div>
            <label for="day">Jour :</label>
            <input type="text" id="day" name="day" required>
        </div>
        <div>
            <label for="open_time">Heure d'ouverture :</label>
            <input type="time" id="open_time" name="open_time" required>
        </div>
        <div>
            <label for="close_time">Heure de fermeture :</label>
            <input type="time" id="close_time" name="close_time" required>
        </div>
        <button type="submit">Ajouter</button>
    </form>
</body>
</html>
