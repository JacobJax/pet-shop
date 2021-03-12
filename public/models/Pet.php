<?php
require_once "../db/dbo_config.php";


Class Pet{

    private string $name;
    private int $age;
    private int $category_id;
    private int $author_id;
    private string $pet_desc;

    public function __construct($p_name, $p_age, $p_category_id, $p_author_id, $pet_ds) {

        $this->name = $p_name;
        $this->age = $p_age;
        $this->category_id = $p_category_id;
        $this->author_id = $p_author_id;
        $this->pet_desc = $pet_ds;

    }

    public function addPet() {
        $pdo = establishCONN();

        $stmt = $pdo->prepare("INSERT INTO pets (pet_name, category_id, age, author_id, pet_description) VALUES (:pname, :pcategory, :age, :author_id, :pet_desc)" );
        $stmt->bindValue(':pname', $this->name);
        $stmt->bindValue(':pcategory', $this->category_id);
        $stmt->bindValue(':age', $this->age);
        $stmt->bindValue(':author_id', $this->author_id);
        $stmt->bindValue(':pet_desc', $this->pet_desc);
        
        $stmt->execute();
    }

    public static function getPets() {
        $pdo = establishCONN();

        $stmt = $pdo->prepare(
            "SELECT pets.id, pets.pet_name, pets.age, pets.pet_description, pets.created_on, category.c_name, users.username
            FROM pets, category, users
            WHERE pets.status = false AND pets.category_id = category.id AND users.id = pets.author_id
            ORDER BY pets.id DESC"
        );
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function getSinglePet($id) {
        $pdo = establishCONN();

        $stmt = $pdo->prepare(
            "SELECT pets.id, pets.pet_name, pets.age, pets.pet_description, pets.created_on, category.c_name, users.username
            FROM pets, category, users
            WHERE pets.id = :id AND pets.category_id = category.id AND users.id = pets.author_id"
        );
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function adoptPet($pid, $uid) {
        $pdo = establishCONN();

        $stmt = $pdo->prepare("INSERT INTO adopted (pet_id, user_id) VALUES (:pid, :uid)");
        $stmt->bindValue(':pid', $pid);
        $stmt->bindValue(':uid', $uid);

        $stmt->execute();

        Pet::changeAdoptStatus($pid);
    }

    private static function changeAdoptStatus($pid) {
        $pdo = establishCONN();

        $stmt = $pdo->prepare("UPDATE pets SET status = :st WHERE id = :id");
        $stmt->bindValue(':st', true);
        $stmt->bindValue(':id', $pid);
    }

}