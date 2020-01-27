<?php
// This is the create user form
if(!isset($_SERVER['HTTP_REFERER'])){ // Redirect if attempt to access page directly from url.
    // Must login to gain access.
    header('location:../website/index.php');
    exit;
}


require "../website/admin-header.php";

require "../includes/dbh.inc.php";

?>

<main>
    <h1>Create User</h1>
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
    <form action="../includes/create-user-admin.inc.php" method="post">
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
        <INPUT TYPE = 'Radio' Name ='type'  value= 'accountant' >Accountant
        <INPUT TYPE = 'Radio' Name ='type'  value= 'manager' >Manager
        <INPUT TYPE = 'Radio' Name ='type'  value= 'admin' >Admin
        <br>
        <button type="submit" name="create-user-submit">Submit</button>
    </form>

<!--    --><?php
//    if (isset($_GET["newpwd"])) {
//        if ($_GET["newpwd"] == "passwordupdated") {
//            echo "<p>Your password has been reset!</p>";
//        }
//    }
    /*
    <a href="reset-password.php">Forgot your password?</a>
*/
    ?>

</main>
