<?php
session_start();
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accounting</title>
    <link rel="stylesheet" href="../css/stylesheet.css">
</head>
<body>
<header>
    <nav>
        <div class="profimg">
            <a href="index.php">
                <img src="../img/profile_picture.jpg" alt="profimg" >
            </a>
        </div>
        <ul>
            <!--<li><a href="index.php">Home</a></li>-->
        </ul>
        <div>
            <?php
            echo '<form action="../includes/logout.inc.php" method="post">
            <button type="submit" name="logout-submit">Logout</button>
            </form>';

            echo '<form action="../website/create-user.php" method="post">
            <button type="submit" name="create user">Create User</button>
            </form>';

            echo '<form action="../includes/admin-edit-user-form.inc.php" method="post">
            <button type="submit" name="edit-user">Edit User</button>
            </form>';

            echo '<form action="../includes/admin-show-all-user.inc.php" method="post">
            <button type="submit" name="show-all-user">All Users</button>
            </form>';

            echo '<form action="../includes/admin-show-exp-pass.inc.php" method="post">
            <button type="submit" name="show-all-exp-pass">Expired Passwords</button>
            </form>';

            ?>



        </div>
    </nav>
</header>
