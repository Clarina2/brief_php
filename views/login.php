<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Connexion</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center min-h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h2 class="text-2xl font-bold mb-6 text-center">Connexion</h2>
        <?php if (isset($error)): ?>
            <p class="text-red-500 mb-4"><?php echo $error; ?></p>
        <?php endif; ?>
        <form action="index.php?action =login" method="POST">
            <div class="mb-4">
                <input type="text" name="username" placeholder="Nom d'utilisateur" required class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-200">
            </div>
            <div class="mb-4">
                <input type="password" name="password" placeholder="Mot de passe" required class="w-full p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-200">
            </div>
            <button type="submit" class="w-full bg-blue-500 text-white p-2 rounded hover:bg-blue-600 transition duration-200">Se connecter</button>
        </form>
        <p class="mt-4 text-center">Pas encore inscrit ? <a href="index.php?action=register" class="text-blue-500 hover:underline">Inscrivez-vous ici</a></p>
    </div>
</body>
</html>
