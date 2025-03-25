<?php
    class Users {
        private $pdo;

        public function __construct( $pdo) {
            $this->pdo = $pdo;
        }

        public function create($username, $email, $password) {
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $stmt = $this->pdo->prepare("INSERT INTO users (username, email, password, role_id) VALUES (?, ?, ?, ?)");
            $stmt->execute([$username, $email, $hashedPassword, 2]); // 2 pour le rôle Client par défaut
        }
       

       
        public function find($username, $password) {
            // Préparation de la requête pour récupérer l'utilisateur par nom d'utilisateur
            $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = :username");
            $stmt->execute(['username' => $username]);
            $user = $stmt->fetch();
        
            // Vérification si l'utilisateur existe
            if ($user) {
                // Vérification du mot de passe
                if (password_verify($password, $user['password'])) {
                    // L'utilisateur est trouvé et le mot de passe est correct
                    // Redirection vers la page de profil
                    header("Location: views/profil.php");
                    exit();
                } else {
                    // Mot de passe incorrect
                    echo "Informations invalides.";
                }
            } else {
                // Utilisateur non trouvé
                echo "Informations invalides.";
            }
        }
        
        

        public function getAllUsers() {
            $stmt = $this->pdo->query("SELECT * FROM users");
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public function getUserById($id) {
            $stmt = $this->pdo->prepare("SELECT username, email, status, created_at FROM users WHERE id = :id");
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
    }
?>


