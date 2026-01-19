<?php
include 'dbh.inc.php';

function emptyInputSignup($name,$EMail,$UName,$Passwort,$PWDPasswort){
    if(empty($name) || empty($EMail) || empty($UName) || empty($Passwort) || empty($PWDPasswort) ){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}
function rightName($UName){
    if (!preg_match('/^[a-zA-Z0-9]+$/', $UName)) {
        // Test123 geht
        // abc_123 geht nicht
        $result = true;
    } else {
        $result = false;
    }
    return $result;
}
function invalidEmail($EMail){
    if(!filter_var($EMail, FILTER_VALIDATE_EMAIL)){
        $result = true;
    } else{
        $result = false;
    }
    return $result;
}
function Pright($Passwort, $PWDPasswort){
    if($Passwort == $PWDPasswort){
        $result = true;
    } else{
        $result = false;
    }
    return $result;
}
function uidExists($conn, $UName, $EMail){
    $sql = "SELECT * FROM `users` WHERE Username = ? OR Email = ?;";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location:../signup.php?error=stmtFailed1");
        echo "SQL-Fehler: " . mysqli_error($conn);
        exit();
    }


    mysqli_stmt_bind_param($stmt, "ss", $UName, $EMail);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }else{
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn,$name,$UName,$EMail,$Passwort){
    $sql = "INSERT INTO users(usersName, Username, Email, Passwort) VALUES (?,?,?,?);";
 
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../signup.php?error=stmtfailed2");
        echo "SQL-Fehler: " . mysqli_error($conn);
        exit();
    }
    $hashedpasswort = password_hash($Passwort,PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt,"ssss",$name,$UName,$EMail,$hashedpasswort);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
}


function emptyInputLogin($EMail, $Passwort){
    if(empty($EMail) || empty($Passwort)) {
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidEmailLogin($EMail){
    if(!filter_var($EMail, FILTER_VALIDATE_EMAIL)){
        $result = true;
    } else{
        $result = false;
    }
    return $result;
}


function loginUser($conn, $EMail, $Passwort){
    $sql = "SELECT * FROM `users` WHERE Email = ? OR Passwort = ?;";

    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location:../signup.php?error=stmtFailed3");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "ss", $EMail, $hashedpasswort);
    mysqli_stmt_execute($stmt);
    $resultData = mysqli_stmt_get_result($stmt);

    if($row = mysqli_fetch_assoc($resultData)){
        $hashedpasswort = $row["Passwort"];
        $checkpwd = password_verify($Passwort,$hashedpasswort);

        if($checkpwd === false){
            header("location: ../login.php?errorLogin=wrongLogin");
            exit();
        }
        else if($checkpwd === true){
            session_start();
            $_SESSION["UName"] = $row["usersName"];
            $_SESSION["Username"] = $row["Username"];
            $_SESSION["type"] = $row["type"];

            header("location: ../index.php");
            exit(); 
        }

    }
    else{

        header("location: ../login.php?errorLogin=wrongLogin");
        exit();
    }
    mysqli_stmt_close($stmt);
}