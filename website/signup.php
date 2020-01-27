<?php
    require "header.php"
?>

    <main>
        <h1>Signup</h1>
        <?php
            if (isset($_GET["error"])) {
                if ($_GET["error"] == "emptyfields") {
                    echo "<p>Fill in all the fields</p>";
                } else if ($_GET["error"] == "invalidpassword") {
                    echo "<p>Password does not meet requirements</p>";
                } else if ($_GET["error"] == "passwordcheck") {
                    echo "<p>Confirmation password does not match</p>";
                } else if ($_GET["error"] == "invalidmail") {
                    echo "<p>Invalid e-mail</p>";
                }
            }
        ?>
        <form action="../includes/signup.inc.php" method="post">
            <strong>Firstname:</strong>
            <input type="text" name="firstName" placeholder="First Name">
            <br><br>
            <strong>Lastname:</strong>
            <input type="text" name="lastName" placeholder="Last Name">
            <br><br>
            <strong>Date of birth:</strong>
            <input type="date" name="dob">
            <br><br>
            <strong>Address:</strong>
            <input type="text" name="address" placeholder="Address">
            <br><br>
            <strong>Email:</strong>
            <input type="email" name="mail" placeholder="E-Mail">
            <br><br>
            <strong>Password:</strong>
            <input type="password" name="pwd" placeholder="Password">
            <br><br>
            <strong>Repeat Password:</strong>
            <input type="password" name="pwdRepeat" placeholder="Repeat password">
            <br><br>
            <INPUT TYPE = 'Radio' Name ='type'  value= 'accountant' >Accountant
            <INPUT TYPE = 'Radio' Name ='type'  value= 'manager' >Manager
            <br>
            <button style = "background-color: deepskyblue" type="submit" name="signup-submit">Submit</button>
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
