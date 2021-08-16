<?php 
if(session_status() === PHP_SESSION_NONE) {
    session_start();
} 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pet Shop</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
    <script src="../design/js/app.js" defer></script>
    <link rel="stylesheet" href="../design/css/style.css">
</head>
<body>
    <header style="z-index: 2;">
        <div class="container">
            <nav class="navbar navbar-expand-lg ">
                <h3><a class="navbar-brand" href="index.php">Pet Shop</a></h3>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse navbar-text" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <?php if(isset($_SESSION['uid'])) { ?>
                                <a class="nav-link" href="account.php?id=<?php echo $_SESSION['uid'] ?>">Hi, <?php echo $_SESSION['uname'] ?></a>
                            <?php } else { ?>
                                <a class="nav-link" href="register.php">Register</a>
                            <?php } ?>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
                            Pets
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                <?php if(isset($_SESSION['uid'])) { ?>
                                    <a class="dropdown-item" href="pets.php?id=<?php echo $_SESSION['uid'] ?>">Your pets</a>
                                    <a class="dropdown-item" href="add.php?id=<?php echo $_SESSION['uid'] ?>">Place for adoption</a>
                                <?php } else { ?>
                                    <a class="dropdown-item" href="login.php">Your pets</a>
                                    <a class="dropdown-item" href="login.php">Place for adoption</a>
                                <?php }?>
                            </div>
                        </li>
                        <br>
                        <li class="nav-item">
                            <?php if(isset($_SESSION['uid'])) {?>
                                <a class="nav-link" href="logout.php">Log out</a>
                            <?php } else {?>
                                <a class="nav-link" href="login.php">Log in</a>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        
    </header>