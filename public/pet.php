<?php 

require_once "./models/Pet.php";

$pid = $_GET['id'];
$pet = Pet::getSinglePet($pid);

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $uid = $_POST['uid'];
    Pet::adoptPet((int)$pid, (int)$uid);

    header("Location: index.php");
}
?>

<?php include_once "./includes/header.php" ?>
    <section class="pets">
        <div class="pet-container">
            <div class="card">
                <div class="card-header">
                    Adopt Pet | category: <?php echo $pet['c_name'] ?>
                </div>
                <div class="card-body">

                    <h5 class="card-title">Pet Name: <?php echo $pet['pet_name'] ?></h5>
                    <p class="card-text">Pet age: <?php echo $pet['age'] ?></p>
                    <p class="card-text">Placed for adopt by: <?php echo $pet['username'] ?></p>
                    <p class="card-text">Pet description: <?php echo $pet['pet_description'] ?></p>

                    <form action="" method="POST">
                        <input type="number" name="uid" value="<?php echo $_SESSION['uid'] ?>" hidden>
                        <button class="btn btn-primary btn-block">Confirm Adoption</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
<?php include_once "./includes/footer.php" ?>