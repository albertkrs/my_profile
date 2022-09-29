<?php session_start();
if (!isset($_SESSION['username']) && !isset($_SESSION['id'])) {
    
    header("location: login.php");
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
</body>

</html>
