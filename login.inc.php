<?php 
require_once 'dbh.inc.php';

if(isset($_POST['submitlogin'])){
    $EMail = $_POST['EMailLogin'];
    $Passwort = $_POST['passwortLogin'];
    
    require_once 'functions.inc.php';

if(emptyInputLogin($EMail,$Passwort)!== false){
    header("location:../login.php?errorLogin=emptyInputLogin");
    exit();
}
if(invalidEmailLogin($EMail) !== false){
   header("location:../login.php?errorLogin=invalidEmailLogin");
    exit();
} 
if(loginUser($conn, $EMail, $Passwort) !== false){
    header("location:../signup.php?errorLogin=uidnotExists");
    exit();
}

}
else{
    header("location: ../login.php");
    exit();
}
