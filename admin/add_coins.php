<?php include('session.php'); ?>
<?php include('header.php'); ?>
<?php include('../conn.php'); ?>
<?php include('crudroom_modal.php'); ?>
<?php include('modal.php'); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Coins</title>
    <!-- Bootstrap CSS -->

    <link rel="stylesheet" href="../css//styles.css">

</head>

<body>
    <?php include('navbar.php'); ?>
    <form method="POST" action="actions.php">
        <label>COINS</label>
        <input name="add_coins" type="number" placeholder="Enter Coins?" required>
        <label>Username</label>
        <input name="id" type="number" placeholder="Enter User ID" required>
        <input name="add" type="submit" value="ADD">

    </form>

    <div class="main-div">
        <h1>Users Information</h1>
        <div class="center-div">
            <div class="table-responsive">
                <table>
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Username</th>
                            <th>Coins</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php
                        $select_query = "select * from user";
                        $query_fire = mysqli_query($conn, $select_query);
                        while ($res = mysqli_fetch_array($query_fire)) {
                        ?>
                            <tr>
                                <td><?php echo $res['userid'] ?></td>
                                <td><?php echo $res['username'] ?></td>
                                <td><?php echo $res['coins'] ?> </td>
                            </tr>
                        <?php
                        }
                        ?>
                    </tbody>
                </table>

            </div>

        </div>

    </div>



    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="../js/dataTables.bootstrap.min.js"></script>
    <script src="../js/dataTables.bootstrap.min.js"></script>
    <script src="../js/dataTables.responsive.js"></script>
</body>

</html>