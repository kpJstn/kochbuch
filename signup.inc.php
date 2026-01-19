<?php
require_once 'functions.inc.php';
include 'dbh.inc.php';

if(isset($_POST['submit'])){
    $name = $_POST['Name'];
    $EMail = $_POST['EMail'];
    $UName = $_POST['UName'];
    $Passwort = $_POST['Passwort'];
    $PWDPasswort = $_POST['PWDPasswort'];
}


if(emptyInputSignup($name,$EMail,$UName,$Passwort,$PWDPasswort)!== false){
    header("location:../signup.php?error=emptyInput");
    exit();
}
if(rightName($UName) !== false){
    header("location:../signup.php?error=invaliduid");
    exit();
}
if(invalidEmail($EMail) !== false){
    header("location:../signup.php?error=invalidEmail");
    exit();
}
if(Pright($EMail,$PWDPasswort) !== false){
    header("location:../signup.php?error=invalidRP");
    exit();
}
if(uidExists($conn, $UName, $EMail) !== false){
    header("location:../signup.php?error=uidExists");
    exit();
}
else{
    createUser($conn,$name,$UName,$EMail,$Passwort);
    exit();
}
?>