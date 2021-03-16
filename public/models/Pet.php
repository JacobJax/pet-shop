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
            "SELECT pets.id, pets.pet_name, pets.age, pets.pet_description, pets.created_on, pets.author_id, pets.buyer_id, category.c_name, users.username
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
            "SELECT pets.id, pets.pet_name, pets.age, pets.pet_description, pets.created_on, pets.author_id, pets.buyer_id, pets.category_id, category.c_name, users.username
            FROM pets, category, users
            WHERE pets.id = :id AND pets.category_id = category.id AND users.id = pets.author_id"
        );
        $stmt->bindValue(':id', $id);
        $stmt->execute();

        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function adoptPet($pid, $uid) {

        Pet::changeAdoptStatus($pid, $uid);

        $pdo = establishCONN();

        $stmt = $pdo->prepare("INSERT INTO adopted (pet_id, user_id) VALUES (:pid, :uid)");
        $stmt->bindValue(':pid', $pid);
        $stmt->bindValue(':uid', $uid);

        $stmt->execute();
        
    }

    private static function changeAdoptStatus($pid, $uid) {
        $pdo = establishCONN();

        $stmt = $pdo->prepare("UPDATE pets SET status = :st, buyer_id = :uid WHERE id = :pid");
        $stmt->bindValue(':st', true);
        $stmt->bindValue(':uid', $uid);
        $stmt->bindValue(':pid', $pid);

        $stmt->execute();
    }

    public static function unAdoptPet($pid) {
        $pdo = establishCONN();

        $stmt = $pdo->prepare("UPDATE pets SET status = :st, buyer_id = :uid WHERE id = :pid");
        $stmt->bindValue(':st', false);
        $stmt->bindValue(':uid', NULL);
        $stmt->bindValue(':pid', $pid);

        $stmt->execute();
        Pet::removeFromAdopt($pid);
    }

    public static function updatePet($id, $name, $age, $cid, $desc) {
        $pdo = establishCONN();

        $stmt = $pdo->prepare(
            "UPDATE pets
            SET pet_name = :name, category_id = :cid, age = :age, pet_description = :desc
            WHERE id = :id"
        );
        $stmt->bindValue(':name', $name);
        $stmt->bindValue(':cid', $cid);
        $stmt->bindValue(':age', $age);
        $stmt->bindValue(':desc', $desc);
        $stmt->bindValue(':id', $id);

        $stmt->execute();
    }

    private static function removeFromAdopt($id) {
        $pdo = establishCONN();

        $stmt = $pdo->prepare("DELETE FROM adopted WHERE pet_id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

    public static function deletePet($id) {
        $pdo = establishCONN();

        $stmt = $pdo->prepare("DELETE FROM pets WHERE id = :id");
        $stmt->bindValue(':id', $id);
        $stmt->execute();
    }

}