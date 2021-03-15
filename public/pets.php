<?php 

require_once "./models/User.php";
$cpets = User::getCPets($_GET['id']);
$apets = User::getAPets($_GET['id']);

// echo "<pre>";
// var_dump($cpets);
// echo "</pre>";

// echo "<pre>";
// var_dump($apets);
// echo "</pre>";

?>

<?php include_once "./includes/header.php" ?>
    <section class="pets">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <ul class="nav nav-pills">
                        <li class="nav-item" >
                            <a class="nav-link active" href="#created" data-tab-target="#created">Placed for adoption</a>
                        </li>
                        <li class="nav-item" >
                            <a class="nav-link" href="#added" data-tab-target="#added">Adopted</a>
                        </li>
                    </ul>
                </div>
                <div class="card-body">
                    <div class="tab-contents">
                        <div id="created" data-tab-content class="current">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Pet name</th>
                                        <th scope="col">Pet age</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Created On</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($cpets as $i => $cpet) {?>
                                        <tr>
                                            <th scope="row"><?php echo $i + 1 ?></th>
                                            <td><?php echo $cpet['pet_name'] ?></td>
                                            <td><?php echo $cpet['age'] ?></td>
                                            <td><?php echo $cpet['c_name'] ?></td>
                                            <td><?php echo $cpet['created_on'] ?></td>
                                            <td>
                                                <button class="btn btn-secondary btn-sm">Edit</button>
                                                <button class="btn btn-danger btn-sm">Delete</button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div id="added" data-tab-content >
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Pet name</th>
                                        <th scope="col">Pet age</th>
                                        <th scope="col">Category</th>
                                        <th scope="col">Created On</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach($apets as $i => $apet) {?>
                                        <tr>
                                            <th scope="row"><?php echo $i + 1 ?></th>
                                            <td><?php echo $apet['pet_name'] ?></td>
                                            <td><?php echo $apet['age'] ?></td>
                                            <td><?php echo $apet['c_name'] ?></td>
                                            <td><?php echo $apet['created_on'] ?></td>
                                            <td>
                                                <button class="btn btn-secondary btn-sm">Edit</button>
                                                <button class="btn btn-danger btn-sm">Delete</button>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include_once "./includes/footer.php" ?>