<?php 
require_once "../db/dbo_config.php";

class Admin{
    public static function getAllPets() {
        $pdo = establishCONN();

        $stmt = $pdo->prepare("SELECT pets.id, pets.pet_name, pets.age, pets.pet_description, pets.created_on, pets.author_id, pets.buyer_id, category.c_name, users.username
        FROM pets, category, users
        WHERE pets.category_id = category.c_id AND users.id = pets.author_id
        ORDER BY pets.id DESC");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getAdoptedPets() {
        $pdo = establishCONN();

        $stmt = $pdo->prepare("SELECT * FROM adopted LEFT JOIN pets ON adopted.pet_id = pets.id LEFT JOIN users ON adopted.user_id = users.id LEFT JOIN category ON pets.category_id = c_id");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getAllUsers() {
        $pdo = establishCONN();

        $stmt = $pdo->prepare("SELECT * FROM users");
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    
}

?>