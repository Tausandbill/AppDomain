<?php

if (isset($_POST["reset-request-submit"])) {

    $userEmail = $_POST["email"];
    $userName = $_POST["userName"];
    $pwd = $_POST["pwd"];
    $pwdRepeat = $_POST["pwdRepeat"];

    require "dbh.inc.php";

    //Checking for empty fields 
    if (empty($pwd) || empty($pwdRepeat) || empty($userEmail) || empty($userName)) {
        header("Location: ../website/reset-password.php?newpwd=empty");
        echo "<p>Fill in all the fields</p>";
        exit();
    }//Checking if password and repeat password match
    else if ($pwd !== $pwdRepeat) {
        header("Location: ../website/reset-password.php?newpwd=pwddontmatch");
        echo "<p>Passwords dont match</p>";
        exit();
    }
    else{
        //Updating database
        $sql = "UPDATE users SET pwd=? WHERE email=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "There was an error";
            exit();
        }    
        else {
            //Hashing new password
            $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt, "ss", $hashedPwd, $userEmail);
            mysqli_stmt_execute($stmt);
            header("Location: ../website/signup.php?newpwd=passwordupdated");
        }
    }  
} 










/*
    DONT PAY ATTENTION TO THIS!!!!!!!!!!!!!

    $selector = bin2hex(random_bytes(8));
    $token = random_bytes(32);

    $url = "http://accountingexpress.000webhostapp.com/create-new-password.php?selector=" . $selector . "&validator=" . bin2hex($token);

    $expires = date("U") + 1800;

    require "dbh.inc.php";


    $sql = "DELETE FROM pwdreset WHERE pwdResetEmail=?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error DELETE";
        exit();
    }
    else {
        mysqli_stmt_bind_param($stmt, "s", $userEmail);
        mysqli_stmt_execute($stmt);
    }

    $sql = "INSERT INTO pwdreset (pwdResetEmail, pwdResetSelector, pwdResetToken, pwdResetExpires) VALUES (?, ?, ?, ?);";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        echo "There was an error INSERT";
        exit();
    }
    else {
        $hashedToken = password_hash($token, PASSWORD_DEFAULT);
        mysqli_stmt_bind_param($stmt, "ssss", $userEmail, $selector, $hashedToken, $expires);
        mysqli_stmt_execute($stmt);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($conn);

    $to = $userEmail;

    $subject = "Password Reset";

    $message = '<p>Password reset request. The link to reset your password is below</p>' . '<p>Here is your password reset link: </br>';
    $message .= '<a href="' . $url . '">' . $url . '</a></p>';

    $headers = "From: accounting express <user12295598@us-imm-node7c.000webhost.io>\r\n";
    $headers .= "Reply-To: avillam1@students.kennesaw.edu\r\n";
    $headers .= "Content-type: text/html\r\n";

    mail($to, $subject, $message, $headers);

    header("Location: ../reset-password.php?reset=success");
    
}
else{
    header("Location: ../index.php");

*/