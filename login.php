<?php
include_once 'header.php';
?>

<section class="Login-form">
    <h2>Login</h2>
    <form action="includes/login.inc.php" class="sign-form" method="POST">
        <input type="text" name="EMailLogin" placeholder="E-Mail">
        <input type="text" name="passwortLogin" placeholder="Passwort">
        <button type="submit" name="submitlogin">Login</button>
    </form>
</section>

<?php
if(isset($_GET['errorLogin'])){
    if($_GET['errorLogin']=="emptyInputLogin"){
        echo "<p>Fülle alle Felder aus</p>";
    }
    if($_GET['errorLogin']=="invalidEmailLogin"){
        echo "<p>Bitte beachte die Email Anforderungen</p>";
    }
}
?>

<?php
include_once 'footer.php';
?>