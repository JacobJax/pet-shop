<?php 

require_once "./models/Pet.php";
$pets = Pet::getPets();

?>

<?php include_once "./includes/header.php" ?>
    <section class="pets">
        <div class="pet-container">

            <?php foreach($pets as $pet) {?>
            <div class="pet">
                <a href="
                    <?php if(isset($_SESSION['uid'])) { ?>
                        <?php echo 'pet.php?id= ' . $pet['id'] ?>
                    <?php } else {?>
                        <?php echo 'login.php' ?>
                    <?php }?>
                ">
                    <div class="pet-header">
                        <div class="header-left">
                            <h3><?php echo $pet['pet_name'] ?></h3>
                            <small><p class="innactive pill"><?php echo $pet['c_name'] ?></p></small>    
                        </div>
                        <p class="author"><b><?php echo $pet['username'] ?></b></p>
                    </div>
                    <div class="description">
                        <p><?php echo $pet['pet_description'] ?></p>
                    </div>
                    <div class="pet-footer">
                        <p>Created on: <?php echo $pet['created_on'] ?></p>
                    </div>
                </a>
                <a href="
                <?php if(isset($_SESSION['uid'])) { ?>
                    <?php echo 'pet.php?id= ' . $pet['id'] ?>
                <?php } else {?>
                    <?php echo 'login.php' ?>
                <?php }?>
                " class="btn-adopt">Adopt</a>
            </div>         
            <?php } ?>
        </div>
    </section>
<?php include_once "./includes/footer.php" ?>