<?php
class AdminController {
    private $userModel;

    public function __construct($userModel) {
        $this->userModel = $userModel;
    }

    public function dashbord() {
        
        
        // if (!isset($_SESSION['user_id']) || $_SESSION['role'] !== 'admin') {
        //     header('Location: index.php?action=login');
        //     exit();
        // }
        global $pdo;
        $usermodel = new Users($pdo);
        $user = $usermodel->getAllUsers();
        require __DIR__.'/../views/dashbord.php';
    }
    
    // Supprimer un utilisateur
    public function deleteUser($id) {
        $this->users->deleteUser($id);
        header('Location: /dashbord');
        exit();
    }
}
?>
