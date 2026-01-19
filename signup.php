<?php
include_once 'header.php';
?>

<section class="singup-form">
    <h2>Sign up</h2>
    <form action="includes/signup.inc.php" class="sign-form" method="POST">
        <input type="text" name="Name" placeholder="Name">
        <input type="text" name="EMail" placeholder="E-Mail">
        <input type="text" name="UName" placeholder="Username">
        <input type="password" name="Passwort" placeholder="Passwort">
        <input type="password" name="PWDPasswort" placeholder="Passwort wiederholen">
        <button type="submit" name="submit">Sign up</button>
    </form>
</section>

<?php
if(isset($_GET['error'])){
    if($_GET['error']=="emptyInput"){
        echo "<p>Fülle alle Felder aus</p>";
    }
    if($_GET['error']=="invaliduid"){
        echo "<p>Bitte beachte die Username Anforderungen</p>";
    }
    if($_GET['error']=="invalidEmail"){
        echo "<p>Bitte beachte die Email Anforderungen</p>";
    }
    if($_GET['error']=="invalidRP"){
        echo "<p>Bitte beachte das das Passwort das selbe ist</p>";
    }
}
?>

<?php
include_once 'footer.php';
?>