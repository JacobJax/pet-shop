<?php

    function establishCONN() {
        // dev_db
        // $pdo = new PDO('mysql:host=localhost;port=3306;dbname=petshop_mgt', 'root', '');
        
        // prod_db
        $pdo = new PDO('mysql:host=b5g3c85iyr9rlahnbjka-mysql.services.clever-cloud.com;port=3306;dbname=b5g3c85iyr9rlahnbjka', 'us1l0idjdlkamwd3', 'tuSu4Wo6FMXFmugZ2gAm');

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }  
?>