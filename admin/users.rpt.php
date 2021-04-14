<?php
require_once "models/Admin.php";

$users = Admin::getAllUsers();


$fh = fopen("reports/users.csv", "w"); #open csv file

foreach($users as $user) {
    fputcsv($fh, $user); #write to csv file
}

fclose($fh);#close csv file

header("Location: users.php"); #redirect to events.php