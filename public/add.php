<?php 

require_once "./models/Pet.php";

$uid = $_GET['id'];

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $pname = $_POST['pname'];
    $p_age = $_POST['p_age'];
    $pdesc = $_POST['pdesc'];
    $pcatg = $_POST['pcatg']; 

    $pet = new Pet($pname, $p_age, $pcatg, $uid, $pdesc);
    $pet->addPet();
    
    header('Location: index.php');
}

?>

<?php include_once "./includes/header.php" ?>
<section class="add">
    <form action="" method="POST">
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
            <label for="p-age">Category id</label>
            <input type="number" class="form-control" name="pcatg">
            <small class="form-text text-muted"><b>1: Dog, 2: Cat, 3: Fish, 4: Bird, 5: Other</b></small>
        </div>
        <div class="form-group">
            <label for="p-age">Pet description</label>
            <textarea name="pdesc" class="form-control" rows="3"></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-block">Submit</button>
    </form>
</section>
<?php include_once "./includes/footer.php" ?>
