<?php
require "accountant-header.php"
?>

<?php
if(!isset($_SERVER['HTTP_REFERER'])){ // Redirect if attempt to access page directly from url.
    // Must login to gain access.
    header('location:../website/index.php');
    exit;
}

echo "Accountant Account";

?>

    <main>
        <?php
        if (!isset($_SESSION["userid"])) {
            echo "<p>You are logged out</p>";
        }
        else {
            echo "<p>You are logged in</p>";
        }
        ?>
    </main>

<?php
require "footer.php"
?>