<?php

class UserController {
    private $users = []; // Tableau pour stocker les utilisateurs

    // Ajouter un nouvel utilisateur
    public function addUser($username, $email, $password) {
        // Validation des données
        if (empty($username) || empty($email) || empty($password)) {
            return "Tous les champs sont requis.";
        }

        // Création d'un nouvel utilisateur
        $user = [
            'id' => count($this->users) + 1, // ID auto-incrémenté
            'username' => $username,
            'email' => $email,
            'password' => password_hash($password, PASSWORD_DEFAULT) // Hash du mot de passe
        ];

        $this->users[] = $user; // Ajout de l'utilisateur au tableau
        return "Utilisateur ajouté avec succès.";
    }

    // Modifier un utilisateur existant
    public function updateUser($id, $username, $email, $password) {
        foreach ($this->users as &$user) {
            if ($user['id'] === $id) {
                // Mise à jour des données
                $user['username'] = $username;
                $user['email'] = $email;
                if (!empty($password)) {
                    $user['password'] = password_hash($password, PASSWORD_DEFAULT);
                }
                return "Utilisateur mis à jour avec succès.";
            }
        }
        return "Utilisateur non trouvé.";
    }

    // Supprimer un utilisateur
    public function deleteUser($id) {
        foreach ($this->users as $key => $user) {
            if ($user['id'] === $id) {
                unset($this->users[$key]); // Suppression de l'utilisateur
                return "Utilisateur supprimé avec succès.";
            }
        }
        return "Utilisateur non trouvé.";
    }

    // Lister tous les utilisateurs
    public function listUsers() {
        return $this->users;
    }

    public function profil() {
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }

        if (!isset($_SESSION['user_id'])) {
            header('Location: index.php?action=login');
            exit();
        }

        $user = $this->userModel->getUserById($_SESSION['user_id']);
        
        if (!$user) {
            die("Utilisateur non trouvé");
        }

        require_once __DIR__ . '/../views/profil.php';
    }
}




?>