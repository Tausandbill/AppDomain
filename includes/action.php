<?php

require "dbh.inc.php";

if ($_POST['action'] == 'edit' && $_POST['idUsers']) {
    $updateField='';
    if(isset($_POST['userName'])) {
        $updateField.= "userName='".$_POST['userName']."'";
    } else if(isset($_POST['fName'])) {
        $updateField.= "fName='".$_POST['fName']."'";
    } else if(isset($_POST['lName'])) {
        $updateField.= "lName='".$_POST['lName']."'";
    } else if(isset($_POST['dateOfBirth'])) {
        $updateField.= "dateOfBirth='".$_POST['dateOfBirth']."'";
    } else if(isset($_POST['address'])) {
        $updateField.= "address='".$_POST['address']."'";
    } else if(isset($_POST['email'])) {
        $updateField.= "email='".$_POST['email']."'";
    } else if(isset($_POST['admin'])) {
        $updateField.= "admin='".$_POST['admin']."'";
    } else if(isset($_POST['manager'])) {
        $updateField.= "manager='".$_POST['manager']."'";
    } else if(isset($_POST['accountant'])) {
        $updateField.= "accountant='".$_POST['accountant']."'";
    } else if(isset($_POST['active'])) {
        $updateField.= "active='".$_POST['active']."'";
    } else if(isset($_POST['suspendEnd'])) {
        $updateField.= "suspendEnd='".$_POST['suspendEnd']."'";
    } else if(isset($_POST['passAttempt'])) {
        $updateField.= "passAttempt='".$_POST['passAttempt']."'";
    }
    if($updateField && $_POST['idUsers']) {
        $sqlQuery = "UPDATE users SET $updateField WHERE idUsers='" . $_POST['idUsers'] . "'";
        mysqli_query($conn, $sqlQuery) or die("database error:". mysqli_error($conn));
        $data = array(
            "message"	=> "Record Updated",
            "status" => 1
        );
        echo json_encode($data);
    }
}
if ($_POST['action'] == 'delete' && $_POST['idUsers']) {
    $sqlQuery = "DELETE FROM users WHERE idUsers='" . $_POST['idUsers'] . "'";
    mysqli_query($conn, $sqlQuery) or die("database error:". mysqli_error($conn));
    $data = array(
        "message"	=> "Record Deleted",
        "status" => 1
    );
    echo json_encode($data);
}
?>
