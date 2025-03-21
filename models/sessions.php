<?php
class SessionModel {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    // Enregistrer une session
    public function logSession($user_id, $ip_address) {
        $stmt = $this->pdo->prepare("INSERT INTO sessions (user_id, ip_address) VALUES (:user_id, :ip_address)");
        return $stmt->execute(['user_id' => $user_id, 'ip_address' => $ip_address]);
    }

    // Lire l'historique des sessions d'un utilisateur
    public function getUserSessions($user_id) {
        $stmt = $this->pdo->prepare("SELECT * FROM sessions WHERE user_id = :user_id ORDER BY created_at DESC");
        $stmt->execute(['user_id' => $user_id]);
        return $stmt->fetchAll();
    }
}
?>
