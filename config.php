<?php
$connect =mysqli_connect('localhost','root','','my_profile');
if (!$connect) {
    echo "<script>alert('connection failed.')</script>";
}

?>