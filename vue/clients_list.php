<?php

	$title = "Clients list";
?>

<?php ob_start(); ?>

<?php
    while ($client = $clients->fetch())
    {
?>
        <div class="row">

            
            <div class="col-md-2 offset-2"> <?= $client["password"] ?> </div>
            <div class="col-md-2"> <?= $client["username"] ?> </div>
            <div class="col-md-2"> <?= $client["context"] ?> </div>
            <div class="col-md-2"> <?= $client["transport"] ?> </div>

        </div>
<?php

    }

$clients->closeCursor();
$container = ob_get_clean();

?>

<?php require('template/template.php'); ?>