<?php

	$title = "Clients list";
?>

<?php ob_start(); ?>

<?php 

    
    foreach ($clients as $client ) {
?>
        <div class="row">
            
            <div class="col-md-2"> <?= $client->getUsername() ?> </div>
            <div class="col-md-2 offset-2"> <?= $client->getPassword() ?> </div>
            <div class="col-md-2"> <?= $client->getContext() ?> </div>
            <div class="col-md-2"> <?= $client->getTransport() ?> </div>
            <div class="col-md-2"> <?= $client->getTransport() ?> </div>
            
        </div>
<?php

    }


$container = ob_get_clean();

?>

<?php require('template/template.php'); ?>