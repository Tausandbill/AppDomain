<?php
if(isset($_POST["login-submit"])){

    require "dbh.inc.php";

    $userid = $_POST["userid"];
    $password = $_POST["pwd"];

    if(empty($userid) || empty($password)){
        header("Location: ../index.php?error=emptyfields&username=".$userid);
    exit();
    }
    else {
        $sql = "SELECT * FROM users WHERE userName=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../index.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $userid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdcheck = password_verify($password, $row["pwd"]);
                if($pwdcheck == false){
                    header("Location: ../index.php?error=wrongpassword");
                    exit();
                }
                else if ($pwdcheck == true) {
                    session_start();
                    $_SESSION["userid"] = $row["userName"];
                    $_SESSION["mail"] = $row["email"];

                    header("Location: ../index.php?login=success");
                exit();
                }
            }
            else {
                header("Location: ../index.php?error=nouser");
                exit();

            }
        }
    }
    

}
else{
    header("Location: ../index.php");
    exit();
}
