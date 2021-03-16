<?php

require_once "./models/Pet.php";

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pid = $_POST['pid'];
    Pet::deletePet($pid);

    session_start();
    header('Location: pets.php?id=' . $_SESSION['uid']);
}

?>