<?php 

require_once "./models/User.php";

session_start();
if(isset($_SESSION['uid'])) {
    session_destroy();
}

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    $checkLog = User::logIn($email, $pwd);

    if($checkLog['isLogged']) {

        session_start();

        $_SESSION['uid'] = $checkLog['userObject']['id'];
        $_SESSION['uname'] = $checkLog['userObject']['username'];
        $_SESSION['email'] = $checkLog['userObject']['email'];

        header('Location: index.php');
    }
}

?>

<?php include_once "./includes/header.php" ?>
<section class="add">
    <div class="container">
        <form action="" method="POST" class="i-form">
            <div class="form-group">
                <label for="exampleInputEmail1">Email address</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Password</label>
                <input type="password" class="form-control" name="pwd">
            </div>
            <div class="form-group">
                <small><p>Dont have an account? <a href="register.php" style="color: blue;">Register here</a></p></small>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Log in</button>
        </form>
    </div>
</section>
<?php include_once "./includes/footer.php" ?>
