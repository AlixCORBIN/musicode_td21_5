<?php
require_once __DIR__ . '/../core/Model.php';

class UserLibrary extends Model {

    public function getByUser($userId) {
        $sql = "SELECT m.*, ul.note 
                FROM user_library ul 
                JOIN musics m ON ul.music_id = m.id 
                WHERE ul.user_id = :user_id 
                ORDER BY ul.id DESC";
                
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':user_id' => $userId]);
        
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateNote($userId, $musicId, $note) {
        $sql = "UPDATE user_library SET note = :note WHERE user_id = :user_id AND music_id = :music_id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':note' => $note,
            ':user_id' => $userId,
            ':music_id' => $musicId
        ]);
    }

    public function remove($userId, $musicId) {
        $sql = "DELETE FROM user_library WHERE user_id = :user_id AND music_id = :music_id";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':user_id' => $userId,
            ':music_id' => $musicId
        ]);
    }
    
    public function add($userId, $musicId) {
        $sql = "INSERT IGNORE INTO user_library (user_id, music_id) VALUES (:user_id, :music_id)";
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':user_id' => $userId,
            ':music_id' => $musicId
        ]);
    }
}