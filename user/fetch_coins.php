<?php error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE); ?>
<?php require '../login.php' ?>

<?php $id = $_SESSION['id'] ?>

<?php
$select_data = "select * from user where userid ='$id'";
$query_fire = mysqli_query($conn, $select_data);
$fetch_data = mysqli_fetch_array($query_fire);
$coins = $fetch_data[6];
?>

