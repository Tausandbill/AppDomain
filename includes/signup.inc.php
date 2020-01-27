<?php
if(isset($_POST["signup-submit"])){

    require 'dbh.inc.php';

    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $dateOfBirth = $_POST["dob"];
    $address = $_POST["address"];
    $email = $_POST["mail"];
    $password = $_POST["pwd"];
    $passwordRepeat = $_POST["pwdRepeat"];
    $admin = 0;
    $manager = 0;
    $accountant = 0;
    if ($_POST['type'] == 'accountant') {
        $accountant = 1;
    }
    else {
        $manager = 1;
    }
    $active = 1;
    $suspendEnd = date("Y.m.d");
    $passAttempt = 0;
    $pictureLocation = "";

    $userName = strtolower($firstName[0]).strtolower($lastName).date(m).date(y);


    if(empty($firstName) || empty($lastName) || empty($dateOfBirth) || empty($address) || empty($email) || empty($password) || empty($passwordRepeat)){
        header("location: ../website/signup.php?error=emptyfields&firstName=".$firstName."&lastName=".$lastName."&dob=".$dateOfBirth."&address=".$address."&mail=".$email);
        exit();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $password)) {
        header("location: ../website/signup.php?error=invalidmail_password&firstName=".$firstName."&lastName=".$lastName."&dob=".$dateOfBirth."&address=".$address);
         exit();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("location: ../website/signup.php?error=invalidmail&firstName=".$firstName."&lastName=".$lastName."&dob=".$dateOfBirth."&address=".$address);
        exit();   
    }
    //Checking if password meets requirements
    elseif (!preg_match('/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%.]{8,30}$/', $password) /*|| $password[0]!= "/^[a-zA-Z]$/"*/) {
        header("location: ../website/signup.php?error=invalidpassword&firstName=".$firstName."&lastName=".$lastName."&dob=".$dateOfBirth."&address=".$address."&mail=".$email);
        exit(); 
    }
    elseif ($password !== $passwordRepeat) {
        header("location: ../website/signup.php?error=passwordcheck&firstName=".$firstName."&lastName=".$lastName."&dob=".$dateOfBirth."&address=".$address."&mail=".$email);
        exit();
    }    
    else {
        $sql = "INSERT INTO users(userName, fName, lName, dateOfBirth, address, email, pwd, admin, manager, accountant, active, suspendEnd, passAttempt, pictureLocation) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../website/signup.php?error=sqlerror");
            exit();
        }
        else {
            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt,sssssssiiiisis, $userName, $firstName, $lastName, $dateOfBirth, $address, $email, $hashedPwd, $admin, $manager, $accountant, $active, $suspendEnd, $passAttempt, $pictureLocation);
            mysqli_stmt_execute($stmt);

            // Adding password to db

            $sqlNew = "SELECT idUsers FROM users WHERE userName='$userName'";

            if ($result = mysqli_query($conn, $sqlNew)) {
                while ($row = mysqli_fetch_assoc($result)) {
                    $uid = $row["idUsers"];
                }
            }
            else {
                header("location: ../website/signup.php?error=sqlgetIDfail");
                exit();
            }

            mysqli_free_result($result);

            $isCurrent = 1;
            $isExpired = 0;

            $activeDate = date_create()->format('Y-m-d');
            $inactiveDate = date('Y-m-d',strtotime(date("Y-m-d", mktime()) . " + 365 day"));

            $sqlPWD = "INSERT INTO password(pwd, userId, isCurrent, activeDate, inactiveDate, isExpired) VALUES ('$hashedPwd', '$uid', '$isCurrent', '$activeDate', '$inactiveDate', '$isExpired')";

            if (!mysqli_query($conn, $sqlPWD)) {
                header("location: ../website/signup.php?error=sqlerrorInsertPass");
                exit();
            }

            mysqli_stmt_close($stmt);
            mysqli_close($conn);

            // end add password


            header("location: ../website/signup.php?signup=success");
            exit();
        }
        
    }

}
else {
    header("Location: ../website/signup.php");
    exit();
}