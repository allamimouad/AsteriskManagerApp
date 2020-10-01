<?php

	$title = "Clients list";


    $noextension = '<svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-telephone-plus " fill="red" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.568 17.568 0 0 0 4.168 6.608 17.569 17.569 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.678.678 0 0 0-.58-.122l-2.19.547a1.745 1.745 0 0 1-1.657-.459L5.482 8.062a1.745 1.745 0 0 1-.46-1.657l.548-2.19a.678.678 0 0 0-.122-.58L3.654 1.328zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.678.678 0 0 0 .178.643l2.457 2.457a.678.678 0 0 0 .644.178l2.189-.547a1.745 1.745 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.634 18.634 0 0 1-7.01-4.42 18.634 18.634 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877L1.885.511zM12.5 1a.5.5 0 0 1 .5.5V3h1.5a.5.5 0 0 1 0 1H13v1.5a.5.5 0 0 1-1 0V4h-1.5a.5.5 0 0 1 0-1H12V1.5a.5.5 0 0 1 .5-.5z"/>
                    </svg>';

        $trash = '<svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-trash" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                    <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z"/>
                    <path fill-rule="evenodd" d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4L4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z"/>
                  </svg>';

        $Modify = '<svg width="1.2em" height="1.2em" viewBox="0 0 16 16" class="bi bi-gear" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z"/>
                        <path fill-rule="evenodd" d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z"/>
                    </svg>';


?>




<?php ob_start(); ?>


<script type="text/javascript" src="javascript/client_list_bootstrap_models.js"></script>

<?php $customjavascript = ob_get_clean(); ?>




<?php ob_start(); ?>



<div class="modal fade" id="modifiyClient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">hello</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="myform" action="/" method="POST">
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">user name:</label>
                        <input name="v_username" type="text" class="form-control" placeholder="User Name" id="name" required>
                        <input type="hidden" id="hiddenid" name="v_id" >
                    </div>
                    <div class="form-group">
                        <label for="recipient-name" class="col-form-label">password:</label>
                        <input name="v_password" type="text" class="form-control" placeholder="Password" id="password" required>
                    </div>

                    <div class="form-group row">
                        <legend class="col-form-label col-sm-12 pt-0 pb-0">Type de Protocole : </legend>
                        <div class="form-check form-check-inline offset-lg-1">
                            <input class="form-check-input" type="radio" name="v_Type_de_Protocole" id="inlineRadio1" value="transport-tls">
                            <label class="form-check-label" for="inlineRadio1">TLS</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="v_Type_de_Protocole" id="inlineRadio2" value="transport-udp">
                            <label class="form-check-label" for="inlineRadio2">UDP</label>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" form="myform" value="OK" class="btn btn-info" />
            </div>
        </div>
    </div>
</div>


<?php $model = ob_get_clean(); ?>









<?php ob_start(); ?>

<?php 
    
    $i = 0;
    
    foreach ($contexts as $context ) {
        
?>
        <div class="row  border border-dark rounded">

            
            <div class="col-md-2 justify-content-center align-self-center offset-1"> <?= $context->getContext() ?> </div>
            <div class="col-md-9 "> 

            <?php

            foreach ($context->getClients() as $client) {

                $i++; // this is the ID of clients

            ?>

                <div class="row" id="<?= $i ?>">

                    <div class="col-md-2 justify-content-center align-self-center" id="name<?= $i ?>"> <?= $client->getUsername() ?> </div>
                    <div class="col-md-3 justify-content-center align-self-center" id="password<?= $i ?>"> <?= $client->getPassword() ?> </div>
                    <div class="col-md-2 justify-content-center align-self-center" id="transport<?= $i ?>"> <?= $client->getTransport() ?> </div>
                    <div class="col-md-2 justify-content-center align-self-center text-success ">
                        <div class="row">
                            <div class="col-md-4 justify-content-center align-self-center"> 
                                    <?= $client->getExtension() == null ? $noextension : $client->getExtension()->getExtension() ?>
                            </div>
                            <div class="col-md-4">
                                <button type="button" class="btn btn-outlign-primary" data-toggle="modal" data-target="#modifiyClient" data-client="<?= $i ?>">
                                    <?=$Modify ?>
                                </button> 
                            </div>
                            <div class="col-md-4"> 
                                <button type="button" class="btn btn-outlign-primary" data-toggle="modal" data-target="#exampleModal" data-clientID="@fat">
                                    <?=$trash ?>
                                </button> 
                            </div>
                        </div>
                    </div>
                
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


