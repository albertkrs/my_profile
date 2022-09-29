
<?php
@include 'config.php';
 error_reporting(0);

if (isset($_POST['submit'])){
  $username=$_POST['username'];
  $email=$_POST['email'];
  $password=md5($_POST['password']);
  $cpassword=md5($_POST['cpassword']);
  
  if($password!=$cpassword) {
 
          echo "<script>alert('password not matched');</script>";
        }

 else {  
    ///verification email 
            $sql="SELECT *FROM user WHERE email='$email' AND password='$password'";
           $result=mysqli_query($connect,$sql);
            if (mysqli_num_rows($result)>0){
                echo "<script>alert('email deja exist');</script>";
            }
              
 

  else {
 ///inser in database
    $sql="INSERT INTO user(username,email,password) 
  VALUES('$username','$email','$password')";
    $result=mysqli_query($connect,$sql);

    if ($result) {
     
        echo "<script>alert('Woow  Wser Registration complete  ');</script>";}
    else  
    echo "<script>alert('Wooops  something Wrong');</script>"; 
    }
      
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
            <form action="" method="post" >

                <h3>REGISTER</h3>
                <input type="text" placeholder="Username" name="username" class="input" required>

                <input type="text" placeholder="Email" name="email" class="input" required>
         
                <input type="text" placeholder="Passowrd" name="password" class="input" required>
                <input type="text" placeholder="Confirm Passowrd" name="cpassword" class="input" required>
                
                <button name="submit" class="btn">REGISTER</button>

                <p>you aleready have an account ? <a href="">login here</a></p>
             
            </form>
        </div>

    </section>
</body>

</html>
