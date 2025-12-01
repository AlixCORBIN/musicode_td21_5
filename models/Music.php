<?php
require_once __DIR__ . '/../core/Model.php';

class Music extends Model {
    
    public function getAll() {
        try {
            $sql = "SELECT * FROM musics ORDER BY titre ASC";
            $stmt = $this->db->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            echo "Erreur SQL dans Music::getAll() : " . $e->getMessage();
            return [];
        }
    }

    public function create($titre, $artiste, $album, $duree) {
        $sql = "INSERT INTO musics (titre, artiste, album, duree) VALUES (:titre, :artiste, :album, :duree)";
        $stmt = $this->db->prepare($sql);
        
        return $stmt->execute([
            ':titre' => $titre,
            ':artiste' => $artiste,
            ':album' => $album,
            ':duree' => $duree
        ]);
    }
}