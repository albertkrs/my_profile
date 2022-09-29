<?php
$serverName = "localhost";
$userName = "root";
$password = "";
$database = "ecommerce";

$connection = new mysqli($serverName, $userName, $password, $database);
session_start();

error_reporting(0);
if(isset($_SESSION['username'])){
    header("location: profile.php");
    }

if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql = "SELECT * FROM users WHERE email = '$email' AND password ='$password'";
    $result = mysqli_query($connection,$sql);
    if($result->num_rows>0){
        $row = mysqli_fetch_assoc($result);
        $_SESSION['username']= $row['username'];
    }else{
        echo "<script>alert('email or password wrong!')</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="main.css">
</head>

<body>
    <section class="landing">
        <div class="form-container">
            <form action="" method="POST" >
                <h3>LOGIN</h3>
                <input type="text" placeholder="Email" name="email" class="input">
                <input type="text" placeholder="Passowrd" name="password" class="input">
                <button name="submit" class="btn">Login</button>
                <p>you don't have an account ? <a href="">Register here</a></p>
            </form>
        </div>

    </section>
</body>

</html>
