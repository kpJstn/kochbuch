<?php
include_once 'header.php';
?>

<section class="index-intro">
    <p>
    <?php 
    if(isset($_SESSION["UName"])){
        echo "Hallo". $_SESSION["UName"];
    }
    ?>
    </p>
    <?php
if(isset($_SESSION["type"]) && $_SESSION["type"] == 3){
?>  
<form action="./includes/rezept.inc.php" method="POST">
<input type="text" name="name" placeholder="Name...">
<button type="submit" name="submit">Rezept erstellen</button>
</form>

<?php
}
?>
</section>

<?php
include_once 'footer.php';
?>
