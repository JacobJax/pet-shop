<?php
require_once "models/Admin.php";

$pets = Admin::getAllPets();


$fh = fopen("reports/pets.csv", "w"); #open csv file

foreach($pets as $pet) {
    fputcsv($fh, $pet); #write to csv file
}

fclose($fh);#close csv file

header("Location: dashboard.php"); #redirect to events.php