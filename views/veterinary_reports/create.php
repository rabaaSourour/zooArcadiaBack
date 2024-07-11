<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Créer un Rapport Vétérinaire</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <h1>Créer un Rapport Vétérinaire</h1>
    <form action="/veterinary_report/create" method="post">
        <label for="animal_id">ID de l'animal:</label>
        <input type="number" name="animal_id" required><br>
        <label for="status">Statut:</label>
        <input type="text" name="status" required><br>
        <label for="food">Nourriture:</label>
        <input type="text" name="food" required><br>
        <label for="food_quantity">Quantité de nourriture:</label>
        <input type="number" name="food_quantity" required><br>
        <label for="details">Détails:</label>
        <textarea name="details" required></textarea><br>
        <label for="last_check">Dernière vérification:</label>
        <input type="date" name="last_check" required><br>
        <button type="submit">Créer</button>
    </form>
</body>
</html>
