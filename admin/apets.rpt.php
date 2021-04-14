<?php
require_once "models/Admin.php";

$pets = Admin::getAdoptedPets();


$fh = fopen("reports/adoptedpets.csv", "w"); #open csv file

foreach($pets as $pet) {
    fputcsv($fh, $pet); #write to csv file
}

fclose($fh);#close csv file

header("Location: dashboard.php"); #redirect to events.php