 <?php
    require_once 'config.php';
    require_once 'models/users.php';

    
    session_start();
    class AuthController {
        private $pdo;
        private $users;
        
        

        public function __construct($pdo) {
            $this->pdo = $pdo;
            $this->users = new Users($this->pdo); 
        }
    
        public function register() {
            global $pdo;
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                // Récupération des données du formulaire
                $username = $_POST['username'];
                $email = $_POST['email'];
                $password = $_POST['password'];
                
                $users = new Users($pdo); // $pdo est votre instance PDO
                    $user = $users->create($username, $email, $password);

                    // Démarrer la session et stocker les informations de l'utilisateur
                    // session_start(); 
                    $_SESSION['username'] = $username;
                    $_SESSION['email'] = $email;

                    // Redirection vers la page de profil après inscription réussie
                    header("Location: views/profil.php");
                    exit();
                // Vérification si l'utilisateur existe déjà
                $stmt = $this->pdo->prepare("SELECT * FROM users WHERE username = :username OR email = :email");
                $stmt->execute([':username' => $username, ':email' => $email]);
                $user = $stmt->fetch();
    
                if ($user) {
                    
                    // L'utilisateur existe déjà, gérer l'erreur
                    echo "L'utilisateur ou l'email existe déjà.";
                } else {
                    // Hashage du mot de passe
                    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
    
                    // Insertion de l'utilisateur dans la base de données
                    $stmt = $this->pdo->prepare("INSERT INTO users (username, email, password) VALUES (:username, :email, :password)");
                    $stmt->execute([':username' => $username, ':email' => $email, ':password' => $hashedPassword]);
    
                    // Redirection ou message de succès
                    echo "Inscription réussie !";
                }
            } else {
                // Afficher le formulaire d'inscription si ce n'est pas une requête POST
                include 'views/register.php';
            }
        }
    
        public function login() {
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $username = $_POST['username'];
                $password = $_POST['password'];

                $user = $this->users->find($username, $password);
                if ($user) {
                    
                    $_SESSION['user_id'] = $user['id'];
                    $_SESSION['username'] = $user['username'];
                    header("Location: index.php?action=profil");
                    exit();
                    
                }else {
                    $error = "Identifiants invalides.";
                    include 'views/login.php';
                    
                }
            } else {
                include 'views/login.php';
            }
          
           
            
        }
    
    }

    
    
?> 

