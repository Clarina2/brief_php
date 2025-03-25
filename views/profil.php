<?php
require '../models/users.php';
require '../config.php';
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
// if (!isset($user)) {
//     die("Données utilisateur non disponibles");
// }
// if (!isset($_SESSION['user_id'])) {
//     header('Location: index.php?action=login');
//     exit();
// }
$utilisateur = new Users($pdo);
$user =$utilisateur->getUserById($_SESSION['user_id']);
?>


<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Interface Utilisateur</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    </head>

    <body class="bg-white">

        <!-- En-tête -->
        <header class="bg-blue-600 text-white p-4">
            <div class="container mx-auto flex justify-between items-center">
                <h1 class="text-2xl font-bold">Mon Profil</h1>
                <nav>
                    <ul class="flex space-x-4">
                        <!-- <li><a href="#" class="hover:underline">Accueil</a></li>
                        <li><a href="#" class="hover:underline">À propos</a></li>
                        <li><a href="#" class="hover:underline">Contact</a></li> -->
                        <li><a href="#" class="hover:underline">Déconnexion</a></li>
                    </ul>
                </nav>
            </div>
        </header>

        <div class="flex">
            <!-- Bande verticale verte -->
            <aside class="bg-green-500 text-white w-1/4 p-6">
                <h2 class="text-xl font-bold mb-4">Informations Personnelles</h2>
                <p><strong>Nom :</strong> </p><?= htmlspecialchars($_SESSION['username']) ?>
                <!-- <p><strong>Prénom :</strong>  </p> -->
                <p><strong>Email :</strong>  </p><?= htmlspecialchars($_SESSION['email']) ?>
            
            </aside>

            <!-- Contenu principal -->
            <main class="flex-grow p-6">
                <h2 class="text-xl font-semibold mb-4">Mon Profil</h2>
                <div class="flex items-center mb-4">
                    <img src="https://via.placeholder.com/150" alt="Photo de Profil" class="rounded-full border-2 border-gray-300" />
                </div>
                <div class="flex space-x-2">
                    <button class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">Modifier</button>
                    <button class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">Mettre à jour</button>
                </div>
            </main>
        </div>

        <!-- Pied de page -->
        <footer class="bg-blue-600 text-white p-4 mt-4">
            <div class="container mx-auto text-center">
                <p>&copy; 2025 Mon Application. Tous droits réservés.</p>
            </div>
        </footer>

</body>
</html>

    

