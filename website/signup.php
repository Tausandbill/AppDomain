<?php
require "header.php"
?>

    <main>
        <h1>Signup</h1>
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
    </main>

<?php
require "footer.php"
?>