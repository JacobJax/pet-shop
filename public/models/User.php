<?php
    require_once "../db/dbo_config.php";

    class User{

        private string $f_name;
        private string $l_name;
        private string $username;
        private string $email;
        private string $phone;
        private string $location;
        private string $password;

        public function __construct($fname, $lname, $uname, $e_mail, $p_hone, $l_ocation, $pwd){

            $this->f_name = $fname;
            $this->l_name = $lname;
            $this->username = $uname;
            $this->email = $e_mail;
            $this->phone = $p_hone;
            $this->location = $l_ocation;
            $this->password = $pwd;

        }

        public function register() {

            $pdo = establishCONN();

            $stmt = $pdo->prepare("INSERT INTO users (first_name, last_name, username, email, phone, location, password )  VALUES (:fname, :lname, :uname, :email, :phone, :location, :pwd )" );

            $stmt->bindValue(':fname', $this->f_name);
            $stmt->bindValue(':lname', $this->l_name);
            $stmt->bindValue(':uname', $this->username);
            $stmt->bindValue(':email', $this->email);
            $stmt->bindValue(':phone', $this->phone);
            $stmt->bindValue(':location', $this->location);
            $stmt->bindValue(':pwd', password_hash($this->password, PASSWORD_DEFAULT));

            $stmt->execute();
        }

        public static function getUsers() {
            $pdo = establishCONN();

            $stmt = $pdo->prepare("SELECT * FROM users");
            $stmt->execute();

            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public static function getSingleUser($id) {
            $pdo = establishCONN();

            $stmt = $pdo->prepare("SELECT * FROM users  WHERE id = :id");
            $stmt->bindValue(':id', $id);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        private static function getWithEmail($email) {
            $pdo = establishCONN();

            $stmt = $pdo->prepare("SELECT * FROM users  WHERE email LIKE :email");
            $stmt->bindValue(':email', $email);
            $stmt->execute();

            return $stmt->fetch(PDO::FETCH_ASSOC);
        }

        public static function logIn($email, $password) {
            $user = User::getWithEmail($email);
            $h_pwd = $user['password'];

            return [
                'isLogged' => password_verify($password, $h_pwd),
                'userObject' => $user
            ];
        }

        public static function getCPets($id) {
            $pdo = establishCONN();
    
            $stmt = $pdo->prepare(
                "SELECT pets.id, pets.pet_name, pets.age, pets.pet_description, pets.created_on, pets.author_id, pets.buyer_id, category.c_name, users.username
                FROM pets, category, users
                WHERE pets.author_id = :id AND pets.category_id = category.id AND users.id = pets.author_id"
            );
            $stmt->bindValue(':id', $id);
            $stmt->execute();
    
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public static function getAPets($id) {
            $pdo = establishCONN();
    
            $stmt = $pdo->prepare(
                "SELECT pets.id, pets.pet_name, pets.age, pets.pet_description, pets.created_on, pets.author_id, pets.buyer_id, category.c_name, users.username
                FROM pets, category, users
                WHERE pets.buyer_id = :id AND pets.category_id = category.id AND users.id = pets.author_id"
            );
            $stmt->bindValue(':id', $id);
            $stmt->execute();
    
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

    }