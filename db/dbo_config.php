<?php

    function establishCONN() {
        // dev_db
        // $pdo = new PDO('mysql:host=localhost;port=3306;dbname=petshop_mgt', 'root', '');
        
        // prod_db
        $db_host = getenv('DB_HOST');
        $db_port = getenv('DB_PORT');
        $db_name = getenv('DB_NAME');
        $db_user = getenv('DB_USER');
        $db_pwd = getenv('DB_PWD');

        $pdo = new PDO("mysql:host=$db_host;port=$db_port;dbname=$db_name", "$db_user" , "$db_pwd");

        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }  
?>