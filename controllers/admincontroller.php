<?php
class AdminController {
    private $userModel;

    public function __construct($userModel) {
        $this->userModel = $userModel;
    }

    // Tableau de bord de l'administrateur
    public function dashboard() {
        $users = $this->userModel->getAllUsers();
        require_once 'views/admin/dashboard.php';
    }

    // Supprimer un utilisateur
    public function deleteUser($id) {
        $this->userModel->deleteUser($id);
        header('Location: /admin/dashboard');
        exit();
    }
}
?>
