<?php  
session_start();
include('users/dbcon.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task Login</title>
    <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-style.css">
    <link rel="stylesheet" type="text/css" href="css/iofrm-theme9.css">
</head>
<body>
    <style>
        .form-content{
            background-color: grey;
        }
    </style>
    <div class="form-body">
        <div class="row">
            <div class="img-holder">
                <div class="info-holder">
                    <h3>Get more things done with Loggin platform.</h3>
                    <p>Access to the most powerfull tool in the entire design and web industry.</p>
                    <img src="images/graphic5.svg" alt="">
                </div>
            </div>
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <div class="page-links">
                            <a href="#" class="active">Login</a><!-- <a href="register9.html">Register</a> -->
                        </div>
                        <form method="post">
                            <input class="form-control" type="text" name="username" placeholder="username" required>
                            <input class="form-control" type="password" name="password" placeholder="Password" required>
                            <div class="form-button">
                                <button id="submit" type="submit" name="login" class="ibtn">Login</button><!--  <a href="forget9.html">Forget password?</a> -->
                            </div>
                        </form>
<!--                         <div class="other-links">
                            <span>Or login with</span><a href="#">Facebook</a><a href="#">Google</a><a href="#">Linkedin</a>
                        </div> -->
                    </div>
                </div>
            </div>
        </div>
    </div>
<script src="js/jquery.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/main.js"></script>
</body>
</html>

<?php 
if (isset($_POST['login'])) {
    $username=$_POST['username'];
    $password=$_POST['password'];
    $qry=mysqli_query($con,"SELECT * FROM `users` where `username`='$username' AND `password`='$password'");
    if (mysqli_num_rows($qry)>0) {
        $data=mysqli_fetch_assoc($qry);
        $_SESSION['userid']= $data['userid'];
        $_SESSION['name']= $data['name'];
        header('location:users/mytasks.php');
    }else{
        ?>
        <script type="text/javascript">
            alert('Username or Password Wrong');
        </script>
        <?php
    }
}



 ?>