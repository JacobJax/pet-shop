<?php

require_once "models/Admin.php";

$pets = Admin::getAllPets();
$a_pets = Admin::getAdoptedPets();

?>
<?php include_once "includes/header.php" ?>
<div class="container">
    <h4 class="my-2">All pets</h4>
    <a href="pets.rpt.php" class="btn btn-primary my-2">Generate report</a><br>
    <table class="table table-striped my5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Pet name</th>
                <th scope="col">Category</th>
                <th scope="col">Date created</th>
                <th scope="col">User</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($pets as $i => $pet) {?>
                <tr>
                    <th scope="row"><?php echo $i + 1 ?></th>
                    <td><?php echo $pet["pet_name"] ?></td>
                    <td><?php echo $pet["c_name"] ?></td>
                    <td><?php echo $pet["created_on"] ?></td>
                    <td><?php echo $pet["username"] ?></td>
                <tr>
            <?php }?>
        </tbody>
    </table>
    <h4 class="my-2">Adopted pets</h4>
    <a href="apets.rpt.php" class="btn btn-primary my-2">Generate report</a><br>
    <table class="table table-striped my5">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Pet name</th>
                <th scope="col">Category</th>
                <th scope="col">Date created</th>
                <th scope="col">Adopted by:</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($a_pets as $i => $pet) {?>
                <tr>
                    <th scope="row"><?php echo $i + 1 ?></th>
                    <td><?php echo $pet["pet_name"] ?></td>
                    <td><?php echo $pet["c_name"] ?></td>
                    <td><?php echo $pet["created_on"] ?></td>
                    <td><?php echo $pet["username"] ?></td>
                <tr>
            <?php }?>
        </tbody>
    </table>
</div>