<?php
require "login-screen.php"
?>

    <main>
        <div>
            <section>
                <h1>Reset your password</h1>
                <form action="../includes/reset-request.inc.php" method="post">
                     <strong>Email:</strong>
                    <input type="text" name="email" placeholder="Enter your e-mail address...">
                    <strong>Username:</strong>
                    <input type="text" name="userName" placeholder="Enter your username...">
                    <br>
                    <br>
                     <strong>Password:</strong>
                    <input type="password" name="pwd" placeholder="Enter new password...">
                    <br>
                    <br>
                    <strong>Repeat Password:</strong>
                    <input type="password" name="pwdRepeat" placeholder="Repeat new password...">
                    <button style = background-color:red  type="submit" name="reset-request-submit">Submit</button>
                </form>
                <?php
                //Might delete this if stmt
            if (isset($_GET["reset"])) {
                if ($_GET["reset"] == "success") {
                    echo "<p>Check your e-mail</p>";
                }
            }
        ?>
            </section>
        </div>
    </main>

<?php
    require "footer.php"
?>
