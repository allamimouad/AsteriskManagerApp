<?php

	$title = "Clients list";
?>

<?php ob_start(); ?>

<?php 

    
    foreach ($contexts as $context ) {
?>
        <div class="row  border border-dark rounded">

            
            <div class="col-md-2 justify-content-center align-self-center offset-1"> <?= $context->getContext() ?> </div>
            <div class="col-md-9"> 

            <?php

            foreach ($context->getClients() as $client) {
            ?>

                <div class="row">

                    <div class="col-md-2 "> <?= $client->getUsername() ?> </div>
                    <div class="col-md-3"> <?= $client->getPassword() ?> </div>
                    <div class="col-md-2"> <?= $client->getTransport() ?> </div>
                    <div class="col-md-2"> <?= $client->getExtension() == null ? "" : $client->getExtension()->getExtension() ?> </div>
                
                </div>


            <?php

            }

            ?>
                

            </div>
            
        </div>
<?php

    }


$container = ob_get_clean();

?>

<?php require('template/template.php'); ?>









            <!-- <div class="col-md-2"> <?= $client->getUsername() ?> </div>
            <div class="col-md-2 offset-2"> <?= $client->getPassword() ?> </div>
            <div class="col-md-2"> <?= $client->getContext() ?> </div>
            <div class="col-md-2"> <?= $client->getTransport() ?> </div>
            <div class="col-md-2"> <?= $client->getTransport() ?> </div> -->