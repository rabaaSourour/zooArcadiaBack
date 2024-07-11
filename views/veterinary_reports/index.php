<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Rapports Vétérinaires</title>
    <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <h1>Rapports Vétérinaires</h1>
    <a href="/veterinary_report/create">Créer un rapport vétérinaire</a>
    <ul>
        <?php foreach ($reports as $report): ?>
            <li>
                Animal ID: <?php echo htmlspecialchars($report['animal_id']); ?> - Statut: <?php echo htmlspecialchars($report['status']); ?> - Nourriture: <?php echo htmlspecialchars($report['food']); ?> - Quantité de nourriture: <?php echo htmlspecialchars($report['food_quantity']); ?> - Dernière vérification: <?php echo htmlspecialchars($report['last_check']); ?>
                <br>Détails: <?php echo htmlspecialchars($report['details']); ?>
            </li>
        <?php endforeach; ?>
    </ul>
</body>
</html>
