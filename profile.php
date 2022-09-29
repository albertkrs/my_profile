<?php session_start();
if (!isset($_SESSION['username']) && !isset($_SESSION['id'])) {
    
    header("location: login.php");
}
?>
<?php


@include 'config.php';


if (isset($_POST['submit_message'])){
$user_id=$_SESSION['id'];
$text=$_POST['text'];
$sql="INSERT INTO message (user_id ,text) 
VALUES('$user_id','$text')";
  $result=mysqli_query($connect,$sql);

}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>profile</title>
</head>

<body>
    <?php echo "welcome " . $_SESSION['username']; ?>
    <br>
    <a href="logout.php">Logout</a>
    <br>
    <form action="" method="post" >  
                <input type="text" placeholder="what's on your mind" name="message" class="input" required>
                <button name="submit_message" class="btn">POST</button>

            </form>
    
     <?php
    @include 'config.php';

    $user_id=$_SESSION['id'];
    $sql = "SELECT * FROM message WHERE user_id='$user_id'";
    $result = mysqli_query($connect,$sql);
    if($result->num_rows<1){
        echo "<p>there are no messages to show</p>";
    }else{

        while($row = $result->fetch_assoc()){
            echo " <p>$row[text]  <br></p>";
    }
    }
    ?>
</body>

</html>
