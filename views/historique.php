<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Historique des connexions</title>
</head>
<body>
    <h1>Historique des connexions</h1>
    <table>
        <thead>
            <tr>
                <th>Date</th>
                <th>Adresse IP</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($sessions as $session) : ?>
                <tr>
                    <td><?php echo $session['created_at']; ?></td>
                    <td><?php echo $session['ip_address']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
