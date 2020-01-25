<?php
    require "header.php"
?>

    <main>
        <h1>Signup</h1>
        <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyfields") {
                    echo "<p>Fill in all the fields</p>";
                }
                else if ($_GET["error"] == "invalidpassword") {
                    echo "<p>Password does not meet requirements</p>";
                }
                else if ($_GET["error"] == "passwordcheck") {
                    echo "<p>Confirmation password does not match</p>";
                }
                else if ($_GET["error"] == "invalidmail") {
                    echo "<p>Invalid e-mail</p>";
                }
            }
        ?>
        <form action="../includes/signup.inc.php" method="post">
            <input type="text" name="firstName" placeholder="First Name">
            <br>
            <input type="text" name="lastName" placeholder="Last Name">
            <br>
            <input type="date" name="dob">
            <br>
            <input type="text" name="address" placeholder="Address">
            <br>
            <input type="email" name="mail" placeholder="E-Mail">
            <br>
            <input type="password" name="pwd" placeholder="Password">
            <br>
            <input type="password" name="pwdRepeat" placeholder="Repeat password">
            <br>
            <button type="submit" name="signup-submit">Submit</button>
        </form>

        <?php  
            if (isset($_GET["newpwd"])) {
                if ($_GET["newpwd"] == "passwordupdated") {
                    echo "<p>Your password has been reset!</p>";
                }                
            }
            /*
            <a href="reset-password.php">Forgot your password?</a> 
        */
        ?> 
        
    </main>

<?php
    require "footer.php"
?>