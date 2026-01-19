<?php
session_start();  
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Loginsystem</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<nav>
    

    <div class="wrapper1">
        <a href="index.php"><img src="" alt=""></a>
        <ul>
            <li><a href="">Home</a></li>
            <li><a href="">Über Uns</a></li>
            <li><a href="">Blogs</a></li>
            <?php
                if(isset($_SESSION["UName"])){
                    echo "<li><a href='profile.php'>Ihre Profilseite!</a></li>";
                    echo "<li><a href='includes/logout.inc.php'>Log out</a></li>";
                }
                else{
                    echo "<li><a href='signup.php'>Sign up</a></li>";
                    echo "<li><a href='login.php'>Login</a></li>";
                }
                ?>
        </ul>
    </div>
</nav>
<div class="wrapper2">
