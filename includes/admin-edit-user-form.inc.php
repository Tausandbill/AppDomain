<?php
// This is the edit user form
if(!isset($_SERVER['HTTP_REFERER'])){ // Redirect if attempt to access page directly from url.
    // Must login to gain access.
    header('location:../website/index.php');
    exit;
}


require "../website/admin-header.php";

require "dbh.inc.php";

?>

<main>
    <h1>Enter Username</h1>

    <form action="../includes/admin-edit-user.inc.php" method="post">
        <input type="text" name="userName" placeholder="User Name">
        <br>
        <button type="submit" name="edit-user-submit">Submit</button>
    </form>

</main>

