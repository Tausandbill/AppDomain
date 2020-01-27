<?php
include("table-settings.php");
if(!isset($_SERVER['HTTP_REFERER'])){ // Redirect if attempt to access page directly from url.
    // Must login to gain access.
    header('location:../website/index.php');
    exit;
}

require "../website/admin-header.php";

if(isset($_POST["show-all-user"])) {


}
?>



<style>
    table {
        background-color: #181818;
        border-spacing: 5px;
    }
    table, .table {
        color: #fff;
    }
</style>
<div class="container">
    <div class="row">
        <?php
        require "dbh.inc.php";
        $sql = "SELECT * FROM users;";
        $resultSet = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
        ?>
        <table id="editableTable" class="table table-bordered" cellspacing="5" cellpadding="15">
            <thead>
            <tr>
                <th>Id</th>
                <th>User-Name</th>
                <th>fName</th>
                <th>lName</th>
                <th>DOB</th>
                <th>Address</th>
                <th>Email</th>
                <th>Admin</th>
                <th>Manager</th>
                <th>Accountant</th>
                <th>Active</th>
                <th>SuspendEnd</th>
                <th>Password-Attempts</th>
            </tr>
            </thead>
            <tbody>

            <?php while( $user = mysqli_fetch_assoc($resultSet) ) { ?>
                <tr idUsers="<?php echo $user ['idUsers']; ?>">
                    <td><?php echo $user ['idUsers']; ?></td>
                    <td><?php echo $user ['userName']; ?></td>
                    <td><?php echo $user ['fName']; ?></td>
                    <td><?php echo $user ['lName']; ?></td>
                    <td><?php echo $user ['dateOfBirth']; ?></td>
                    <td><?php echo $user ['address']; ?></td>
                    <td><?php echo $user ['email']; ?></td>
                    <td><?php echo $user ['admin']; ?></td>
                    <td><?php echo $user ['manager']; ?></td>
                    <td><?php echo $user ['accountant']; ?></td>
                    <td><?php echo $user ['active']; ?></td>
                    <td><?php echo $user ['suspendEnd']; ?></td>
                    <td><?php echo $user ['passAttempt']; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script src="../plugin/bootstable.js"></script>
<script src="../js/editable.js"></script>