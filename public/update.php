<?php 

require_once "./models/Pet.php";

$pid = $_GET['id'];
$pet = Pet::getSinglePet($pid);

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pname = $_POST['pname'];
    $p_age = $_POST['p_age'];
    $pdesc = $_POST['pdesc'];
    $pcatg = $_POST['pcatg']; 

    Pet::updatePet($pid, $pname, $p_age, $pcatg, $pdesc);

    session_start();
    header('Location: pets.php?id=' . $_SESSION['uid']);
}

?>

<?php include_once "./includes/header.php" ?>
<section class="add">
    <form action="" method="POST" class="i-form">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="pname">Pet name</label>
                <input type="text" class="form-control" name="pname" value=<?php echo $pet['pet_name'] ?> >
            </div>
            <div class="form-group col-md-6">
                <label for="p-age">Pet age <b>(in Months)</b></label>
                <input type="number" class="form-control" name="p_age" value=<?php echo $pet['age'] ?> >
            </div>
        </div>
        <div class="form-group">
            <label for="p-age">Category id</label>
            <input type="number" class="form-control" name="pcatg" value=<?php echo $pet['category_id'] ?> >
            <small class="form-text text-muted"><b>1: Dog, 2: Cat, 3: Fish, 4: Bird, 5: Other</b></small>
        </div>
        <div class="form-group">
            <label for="p-age">Pet description</label>
            <textarea name="pdesc" class="form-control" rows="3" ><?php echo $pet['pet_description'] ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
    </form>
</section>
<?php include_once "./includes/footer.php" ?>
