<?php
include("table-settings.php");
if(!isset($_SERVER['HTTP_REFERER'])){ // Redirect if attempt to access page directly from url.
    // Must login to gain access.
    header('location:../website/index.php');
    exit;
}

require "../website/admin-header.php";

if(isset($_POST["show-all-exp-pass"])) {


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
        $sql = "SELECT * FROM password WHERE isExpired='1';";
        $resultSet = mysqli_query($conn, $sql) or die("database error:" . mysqli_error($conn));
        ?>
        <table id="editableTable" class="table table-bordered" cellspacing="5" cellpadding="15">
            <thead>
            <tr>
                <th>Id</th>
                <th>User-Id</th>
                <th>isExpired</th>
                <th>isCurrent</th>
                <th>Active-Date</th>
                <th>Inactive-Date</th>
            </tr>
            </thead>
            <tbody>

            <?php while( $user = mysqli_fetch_assoc($resultSet) ) { ?>
                <tr idUsers="<?php echo $user ['passId']; ?>">
                    <td><?php echo $user ['passId']; ?></td>
                    <td><?php echo $user ['userId']; ?></td>
                    <td><?php echo $user ['isExpired']; ?></td>
                    <td><?php echo $user ['isCurrent']; ?></td>
                    <td><?php echo $user ['activeDate']; ?></td>
                    <td><?php echo $user ['inactiveDate']; ?></td>
                </tr>
            <?php } ?>
            </tbody>
        </table>
    </div>
</div>

<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.5/jquery.min.js"></script>
<script src="../plugin/bootstable.js"></script>
<script src="../js/editablePass.js"></script>