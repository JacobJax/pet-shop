<?php

require_once "models/Admin.php";

$users = Admin::getAllUsers();

?>
<?php include_once "includes/header.php" ?>
<div class="container">
    <h4 class="my-2">All users</h4>
    <a href="users.rpt.php" class="btn btn-primary my-2">Generate report</a><br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">First name</th>
                <th scope="col">Last name</th>
                <th scope="col">Email</th>
                <th scope="col">Phone</th>
                <th scope="col">Location</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($users as $i => $user) {?>
                <tr>
                    <th scope="row"><?php echo $i + 1 ?></th>
                    <td><?php echo $user["first_name"] ?></td>
                    <td><?php echo $user["last_name"] ?></td>
                    <td><?php echo $user["email"] ?></td>
                    <td><?php echo $user["phone"] ?></td>
                    <td><?php echo $user["location"] ?></td>
                <tr>
            <?php }?>
        </tbody>
    </table>
   
</div>