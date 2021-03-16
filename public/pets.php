<?php 

require_once "./models/User.php";
require_once "./models/Pet.php";

$cpets = User::getCPets($_GET['id']);
$apets = User::getAPets($_GET['id']);

// echo "<pre>";
// var_dump($cpets);
// echo "</pre>";

// echo "<pre>";
// var_dump($apets);
// echo "</pre>";

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $pid = $_POST['pid'];
    // var_dump($pid);
    // exit;
    Pet::unAdoptPet($pid);
    header('Refresh:0');
}

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
                            <?php if(count($cpets) == 0) {?>
                                <div class="container">
                                    <h1>NO PETS YET</h1>
                                    <a class="btn btn-success" href="add.php?id=<?php echo $_SESSION['uid'] ?>">Place for adoption</a>
                                </div>
                            <?php } else {?>
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
                                                    <a href="update.php?id=<?php echo $cpet['id'] ?>" class="btn btn-secondary btn-sm">Edit</a>
                                                    <form action="delete.ini.php" method="POST" style="display: inline-block;">
                                                        <input type="number" name="pid" value=<?php echo $cpet['id'] ?> hidden>
                                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            <?php } ?>
                        </div>
                        <div id="added" data-tab-content >
                            <?php if(count($apets) == 0) { ?>
                                <div class="container">
                                    <h1>NO PETS YET</h1>
                                    <a href="index.php" class="btn btn-success">Adopt a pet</a>
                                </div>
                            <?php } else { ?>
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
                                                    <form action="" method="POST">
                                                        <input type="number" name="pid" value=<?php echo $apet['id'] ?> hidden>
                                                        <button type="submit" class="btn btn-danger btn-sm">Cancel adoption</button>
                                                    </form>
                                                    
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
<?php include_once "./includes/footer.php" ?>