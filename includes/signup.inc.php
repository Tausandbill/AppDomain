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

    $userName = strtolower($firstName[0]).strtolower($lastName).date(m).date(y);


    if(empty($firstName) || empty($lastName) || empty($dateOfBirth) || empty($address) || empty($email) || empty($password) || empty($passwordRepeat)){
        header("location: ../signup.php?error=emptyfields&firstName=".$firstName."&lastName=".$lastName."&dob=".$dateOfBirth."&address=".$address."&mail=".$email);
        exit();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL) && !preg_match("/^[a-zA-Z0-9]*$/", $password)) {
        header("location: ../signup.php?error=invalidmail_password&firstName=".$firstName."&lastName=".$lastName."&dob=".$dateOfBirth."&address=".$address);       
        exit();
    }
    elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("location: ../signup.php?error=invalidmail&firstName=".$firstName."&lastName=".$lastName."&dob=".$dateOfBirth."&address=".$address);     
        exit();
   
    }
    elseif (!preg_match("/^[a-zA-Z0-9]*$/", $password)) {
        header("location: ../signup.php?error=invalidpassword&firstName=".$firstName."&lastName=".$lastName."&dob=".$dateOfBirth."&address=".$address."&mail=".$email);       
        exit(); 
    }
    elseif ($password !== $passwordRepeat) {
        header("location: ../signup.php?error=passwordcheck&firstName=".$firstName."&lastName=".$lastName."&dob=".$dateOfBirth."&address=".$address."&mail=".$email);
        exit();
    }
    else {
        $sql = "INSERT INTO users(userName, fName, lName, dateOfBirth, address, email, pwd) VALUES (?,?,?,?,?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../signup.php?error=sqlerror");
            exit();
        }
        else {
            $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

            mysqli_stmt_bind_param($stmt,sssssss, $userName, $firstName, $lastName, $dateOfBirth, $address, $email, $hashedPwd);
            mysqli_stmt_execute($stmt);
            header("location: ../signup.php?signup=success");
            exit();
        }
        
    }
    mysqli_stmt_close($stmt);
    mysqli_close($conn);

}
else {
    header("Location: ../signup-php");
    exit();
}