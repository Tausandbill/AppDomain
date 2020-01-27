<?php
if(isset($_POST["login-submit"])){

    require "dbh.inc.php";

    $userid = $_POST["userid"];
    $password = $_POST["pwd"];

    if(empty($userid) || empty($password)){
        header("Location: ../website/index.php?error=emptyfields&username=".$userid);
    exit();
    }
    else {
        $sql = "SELECT * FROM users WHERE userName=?;";
        $stmt = mysqli_stmt_init($conn);
        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location: ../website/index.php?error=sqlerror");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $userid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);
            if ($row = mysqli_fetch_assoc($result)) {
                $pwdcheck = password_verify($password, $row["pwd"]);
                if($pwdcheck == false){
                    header("Location: ../website/index.php?error=wrongpassword");
                    // Add wrong attempts

                    $sqlGetAtt = "SELECT passAttempt FROM users WHERE userName='$userid';";

                    if ($result = mysqli_query($conn, $sqlGetAtt)) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $attempts = $row["passAttempt"] + 1;
                        }
                    }

                    mysqli_free_result($result);

                    $sqlPostAtt = "UPDATE users SET passAttempt='$attempts' WHERE userName='$userid';";
                    mysqli_query($conn, $sqlPostAtt);
                    exit();
                }
                else if ($pwdcheck == true) {

                    $sqlGetPassAtt = "SELECT passAttempt FROM users WHERE userName='$userid';";
                    if ($result = mysqli_query($conn, $sqlGetPassAtt)) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $attempts = $row["passAttempt"];
                        }
                    }

                    if ($attempts >= 3) {
                        $sqlSetLocked = "UPDATE users SET active='0' WHERE userName='$userid';";
                        mysqli_query($conn, $sqlSetLocked);
                    }

                    $sqlGetAct = "SELECT active FROM users WHERE userName='$userid';";

                    if ($result = mysqli_query($conn, $sqlGetAct)) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            $active = $row["active"];
                        }
                    }

                    mysqli_free_result($result);

                    if (!($active == '1')) {
                        header("Location: ../website/index.php?login=failed-acct-locked");
                    }
                    else {

                        $sqlResetAtt = "UPDATE users SET passAttempt='0' WHERE userName='$userid';";
                        mysqli_query($conn, $sqlResetAtt);

                        session_start();
                        $_SESSION["userid"] = $row["userName"];
                        $_SESSION["mail"] = $row["email"];

                        $sqlGetIfAdmin = "SELECT admin FROM users WHERE userName='$userid';";
                        if ($result = mysqli_query($conn, $sqlGetIfAdmin)) {
                            while ($row = mysqli_fetch_assoc($result)) {
                                $admin = $row["admin"];
                            }
                        }

                        if ($admin == '1') {
                            header("Location: ../website/admin.php");
                        } else {
                            header("Location: ../website/index.php?login=success");
                        }
                    }
                exit();
                }
            }
            else {
                header("Location: ../website/index.php?error=nouser");
                exit();

            }
        }
    }
    mysqli_close($conn);
    

}
else{
    header("Location: ../website/index.php");
    exit();
}
