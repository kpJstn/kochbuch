<?php
 require_once 'dbh.inc.php';
 if (isset($_POST["submit"])) {
    $name = $_POST["name"];
 }

function createrezept($conn,$name){
    $sql = "INSERT INTO rezepte (Rezeptname) VALUES(?);";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        // header("location: ../signup.php?error=stmtfailed");
        // exit();
    }


    mysqli_stmt_bind_param($stmt,'s',$name);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

}

createrezept($conn,$name);