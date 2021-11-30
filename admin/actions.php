<?php require '../conn.php'; ?>
<?php

if (isset($_POST['add'])) {
    $coins = $_POST['add_coins'];
    $id = $_POST['id'];

    //UPDATE `login` SET `id`='[value-1]',`username`='[value-2]',`password`='[value-3]',`coins`='[value-4]' WHERE 1
    $select_query = "select * from user where userid='$id'";
    $query = mysqli_query($conn, $select_query);
    $fetch = mysqli_fetch_array($query);
    $coin = $fetch[6];
    $added_coins = (int)$coins + (int)$coin;
    $update_query = "update user set coins = '$added_coins' where userid = '$id'";
    $query_fire = mysqli_query($conn, $update_query);

    if ($query_fire) {
?>
        <script>
            alert("COINS ADDED");
            location.replace("./add_coins.php")
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("COINS NOT ADDED");
        </script>
<?php
    }
}


?>


<?php

if (isset($_POST['remove'])) {
    $coins = $_POST['add_coins'];
    $id = $_POST['id'];

    //UPDATE `login` SET `id`='[value-1]',`username`='[value-2]',`password`='[value-3]',`coins`='[value-4]' WHERE 1
    $select_query = "select * from user where userid='$id'";
    $query = mysqli_query($conn, $select_query);
    $fetch = mysqli_fetch_array($query);
    $coin = $fetch[6];
    $added_coins = (int)$coin - (int)$coins;
    $update_query = "update user set coins = '$added_coins' where userid = '$id'";
    $query_fire = mysqli_query($conn, $update_query);

    if ($query_fire) {
?>
        <script>
            alert("COINS REMOVED");
            location.replace("./remove_coins.php")
        </script>
    <?php
    } else {
    ?>
        <script>
            alert("COINS NOT REMOVED");
        </script>
<?php
    }
}


?>