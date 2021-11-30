<?php error_reporting(E_ERROR | E_WARNING | E_PARSE); ?>
<?php require './login.php' ?>


<?php
$userid = "select * from user where username ='$fusername' and password = '$fpassword'";
$query_fire = mysqli_query($conn, $userid);
$fetch_id = mysqli_fetch_array($query_fire);
$id = $fetch_id[2];
?>
