<?php 

require_once "./models/Pet.php";

$uid = $_GET['id'];

$categories = Pet::getCategories();

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pname = $_POST['pname'];
    $p_age = $_POST['p_age'];
    $pdesc = $_POST['pdesc'];
    $pcatg = $_POST['pcatg']; 

    $pet = new Pet($pname, $p_age, $pcatg, $uid, $pdesc);
    $pet->addPet();
    
    session_start();
    header("Location: pets.php?id=" . $_SESSION['uid'] . "#created");
}

?>

<?php include_once "./includes/header.php" ?>
<section class="add">
    <form action="" method="POST" class="i-form">
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="pname">Pet name</label>
                <input type="text" class="form-control" name="pname">
            </div>
            <div class="form-group col-md-6">
                <label for="p-age">Pet age <b>(in Months)</b></label>
                <input type="number" class="form-control" name="p_age">
            </div>
        </div>
        <div class="form-group">
            <label for="p-age">Pet Category</label>
            <select class="form-control" name="pcatg">
                <?php foreach($categories as $type) { ?>
                        <option value=<?php echo $type["c_id"] ?> ><?php echo $type["c_name"] ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group">
            <label for="p-age">Pet description</label>
            <textarea name="pdesc" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
    </form>
</section>
<?php include_once "./includes/footer.php" ?>
