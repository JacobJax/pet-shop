<?php 

require_once "./models/User.php";

if($_SERVER['REQUEST_METHOD'] === 'POST') {

    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $uname = $_POST['uname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $location = $_POST['location'];
    $pwd = $_POST['pwd'];
    $cpwd = $_POST['cpwd'];

    $user = new User($fname, $lname, $uname, $email, $phone, $location, $pwd);
    $user->register();

    header('Location: login.php');

}

?>

<?php include_once "./includes/header.php" ?>
<section class="add">
    <div class="container">
        <form action="" method="POST" class="i-form">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="fname">First Name</label>
                    <input type="text" class="form-control" name="fname">
                </div>
                <div class="form-group col-md-6">
                    <label for="lname">Last Name</label>
                    <input type="text" class="form-control" name="lname">
                </div>
            </div>
            
            <div class="form-group">
                <label for="uname">Userame</label>
                <input type="text" class="form-control" name="uname">
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="email">Email address</label>
                    <input type="email" class="form-control" name="email">
                </div>
                <div class="form-group col-md-6">
                    <label for="phone">Phone</label>
                    <input type="tel" class="form-control" name="phone">
                </div>
            </div>
            
            <div class="form-group">
                <label for="lcation">Location</label>
                <input type="text" class="form-control" name="location">
            </div>

            <div class="form-group form-row">
                <div class="form-group col-md-6">
                    <label for="pwd">Password</label>
                    <input type="password" class="form-control" name="pwd">
                </div>
                <div class="form-group col-md-6">
                    <label for="pwd">Confirm Password</label>
                    <input type="password" class="form-control" name="cpwd">
                </div>
            </div>
           
            <div class="form-group">
                <small><p>Already have an account? <a href="login.php" style="color: blue;">Log in here</a></p></small>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Register</button>
        </form>
    </div>
</section>
<?php include_once "./includes/footer.php" ?>
