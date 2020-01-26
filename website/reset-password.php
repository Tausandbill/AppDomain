<?php
    require "header.php"
?>

    <main>
        <div>
            <section>
                <h1>Reset your password</h1>
                <form action="includes/reset-request.inc.php" method="post">
                <input type="text" name="email" placeholder="Enter your e-mail address...">                    
                    <input type="text" name="userName" placeholder="Enter your username...">
                    <br>
                    <br>
                    <input type="text" name="pwd" placeholder="Enter new password...">
                    <br>
                    <br>
                    <input type="text" name="pwdRepeat" placeholder="Repeat new password...">
                    <button type="submit" name="reset-request-submit">Submit</button>
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