<?php 
require_once "config.php";
require_once "controllers/AdminController.php";
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau de Bord</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

    <!-- En-tête -->
    <header class="bg-blue-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">Tableau de Bord</h1>
            <nav>
                <ul class="flex space-x-4">
                    <li><a href="#" class="hover:underline">Accueil</a></li>
                    <li><a href="#" class="hover:underline">Déconnexion</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <div class="container mx-auto p-6">
        <h2 class="text-xl font-semibold mb-4">Utilisateurs Enregistrés</h2>
        
        <!-- Tableau des utilisateurs -->
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-200 text-gray-600">
                   <th class="py-2 px-4 border">id</th>
                    <th class="py-2 px-4 border">Nom</th>
                    <th class="py-2 px-4 border">Email</th>
                    
                    <th class="py-2 px-4 border">Statut</th>
                    <th class="py-2 px-4 border">Actions</th>
                </tr>
            </thead>
            <tbody>
            <?php foreach ($user as $users) : ?>
                    <tr>
                        <td class="px-6 py-4"><?= htmlspecialchars($users['id']); ?></td>
                        <td class="px-6 py-4"><?= htmlspecialchars($users['username']); ?></td>
                        <td class="px-6 py-4"><?= htmlspecialchars($users['email']); ?></td>
                        <td class="px-6 py-4"><?= htmlspecialchars($users['status']); ?></td>
                        <td class="px-6 py-4">
                            <form method="POST" action="index.php?action=deleteUser" class="inline">
                                <input type="hidden" name="user_id" value="<?= htmlspecialchars($users['id']); ?>">
                                <button type="submit" class="text-red-500 hover:text-red-700">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
                <!-- Ajoutez d'autres utilisateurs ici -->
            </tbody>
        </table>

        <!-- Section pour la gestion des droits et rôles -->
        <h2 class="text-xl font-semibold mt-6 mb-4">Gestion des Droits et Rôles</h2>
        <div class="bg-white p-4 border border-gray-300 rounded shadow-md">
            <p>Gérez les rôles et les droits des utilisateurs ici.</p>
            <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Ajouter un Rôle</button>
        </div>

        <!-- Consultation des logs de connexion -->
        <h2 class="text-xl font-semibold mt-6 mb-4">Logs de Connexion</h2>
        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-md">
            <thead>
                <tr class="bg-gray-200 text-gray-600">
                    <th class="py-2 px-4 border">Utilisateur</th>
                    <th class="py-2 px-4 border">Date de Connexion</th>
                    <th class="py-2 px-4 border">Statut</th>
                </tr>
            </thead>
            <tbody>
                <tr class="hover:bg-gray-100">
                    <td class="py-2 px-4 border"></td>
                    <td class="py-2 px-4 border"></td>
                    <td class="py-2 px-4 border"></td>
                </tr>
                <tr class="hover:bg-gray-100">
                    <td class="py-2 px-4 border"></td>
                    <td class="py-2 px-4 border"></td>
                    <td class="py-2 px-4 border"></td>
                </tr>
                <!-- Ajoutez d'autres logs ici -->
            </tbody>
        </table>
    </div>

    <!-- Pied de page -->
    <footer class="bg-blue-600 text-white p-4 mt-4">
        <div class="container mx-auto text-center">
            <p>&copy; 2025 Mon Application. Tous droits réservés.</p>
        </div>
    </footer>

</body>
</html>
