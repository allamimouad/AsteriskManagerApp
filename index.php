<?php

    require("controller/controller.php");

    function chargerClasse($classe)
    {
      require "model/" . $classe . '.php'; // On inclut la classe correspondante au paramètre passé.
    }

    spl_autoload_register('chargerClasse');


    if ($_SERVER['REQUEST_METHOD'] === 'GET') { // The request is using the POST method

        if (isset($_GET["action"])) {
        
            if ($_GET["action"] == "clients_list") {
            
                contexts_list_conroller();

            } 
            elseif ($_GET["action"] == "add_client") {
            
                get_add_client_conroller();
            } 
            elseif ($_GET["action"] == "add_context") {
                
                get_create_context_conroller();
            }
            else{
                //echo "string";
            }
        }
        else{
            
            require("tester.php");
        }
        
    }
    elseif ($_SERVER['REQUEST_METHOD'] === 'POST') {
        
        if ( isset($_POST["v_username"]) && isset($_POST["v_password"]) && isset($_POST["v_context"]) && isset($_POST["v_Type_de_Protocole"]) ) {
        
            post_add_client_conroller( $_POST["v_username"] , $_POST["v_password"] , $_POST["v_context"] , $_POST["v_Type_de_Protocole"] );
        
        }
        elseif ( isset($_POST["v_id"]) && isset($_POST["v_username"]) && isset($_POST["v_password"]) && isset($_POST["v_Type_de_Protocole"]) ) {
        
            post_modify_client_conroller( $_POST["v_id"] , $_POST["v_username"] , $_POST["v_password"] , $_POST["v_Type_de_Protocole"] );
        
        }
        elseif ( isset($_POST["v_context"]) ) {
        
            post_create_context_conroller( $_POST["v_context"] );
        
        }

    }
    
    