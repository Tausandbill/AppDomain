<?php
    session_start();
?>
<!DOCTYPE html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Accounting</title>
    <link rel="stylesheet" href="css/stylesheet.css">
</head>
<body>
    <header>
        <nav>
            <div class="logoimg">
                <a href="index.php">
                    <img src="img/logo.jpg" alt="logo" >
                </a>
            </div>
            <ul>
                <!--<li><a href="index.php">Home</a></li>-->
            </ul>
            <div>
            <?php
            if (!isset($_SESSION["userid"])) {
                echo '<form action="includes/login.inc.php" method="post">
                <input type="text" name="userid" placeholder="Username">
                <input type="password" name="pwd" placeholder="Password">
                <button type="submit" name="login-submit">Login</button>
            </form>
            <a href="signup.php">Singup</a>';
            }
            else {
                echo '<form action="includes/logout.inc.php" method="post">
                <button type="submit" name="logout-submit">Logout</button>
            </form>';
            }
            ?>
                

                
            </div>
        </nav>
    </header>
