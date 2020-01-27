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
<body style="text-align: center" >
    <header>
        <nav>
            <div class="logoimg" >
                <a href="index.php">
                   <img src="../img/logo.jpg" alt="logo" width="300" height="300" >
                </a>
            </div>
            <ul>
                <!--<li><a href="index.php">Home</a></li>-->
            </ul>
            <div>
            <?php
            if (!isset($_SESSION["userid"])) {
                echo '<form action="../includes/login.inc.php" method="post" >
                <strong>Username:</strong>
                <input type="text" name="userid" placeholder="Username">
                <br><br>
                <strong>Password:</strong>
                <input type="password" name="pwd" placeholder="Password">
                <br><br>
                
               <button style=" background-color: chartreuse; height: 30px; width: 100px;type="button" name="login-submit">Login</button>
               
                
                <br>
                <br>
                &nbsp<a href="reset-password.php"><span style="color: #00bfff;">Forgot your password?</a>
                
            </form>
       
             &nbsp&nbsp<a href="signup.php"><span style="color: #00bfff;">Signup</a>';
            }
            else {
                echo '<form action="../includes/logout.inc.php" method="post">
                <button type="submit" name="logout-submit">Logout</button>
            </form>';
            }
            ?>


                
            </div>
        </nav>
    </header>
