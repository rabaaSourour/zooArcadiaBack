<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <h1>Connexion</h1>
    <form action="/login" method="POST">
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
        <br>
        <label for="role">Rôle :</label>
        <select id="role" name="role" required>
            <option value="employee">Employee</option>
            <option value="veterinaire">Veterinaire</option>
            <option value="admin">Admin</option>
        </select>
        <br>
        <button type="submit">Se connecter</button>
    </form>
</body>
</html>

