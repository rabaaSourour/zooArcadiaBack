<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Laisser un avis</title>
</head>
<body>
    <h2>Laisser un avis</h2>
    <form method="POST" action="/review/create">
        <div>
            <label for="content">Contenu :</label>
            <textarea id="content" name="content" required></textarea>
        </div>
        <button type="submit">Soumettre</button>
    </form>
</body>
</html>
