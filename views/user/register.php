<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
</head>
<body>
    <h1>Inscription</h1>
    <form action="/register" method="POST">
        <label for="email">Email :</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="password">Mot de passe :</label>
        <input type="password" id="password" name="password" required>
        <br>
        <label for="role">Rôle :</label>
        <select id="role" name="role">
            <option value="employee">Employee</option>
            <option value="veterinaire">Veterinaire</option>
        </select>
        <br>
        <button type="submit">S'inscrire</button>
    </form>
</body>
</html>
