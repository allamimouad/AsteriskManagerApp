<?php

    require("controller/controller.php");


    if ($_SERVER['REQUEST_METHOD'] === 'GET') { // The request is using the POST method

        if (isset($_GET["action"])) {
        
            if ($_GET["action"] == "clients_list") {
            
                clients_list_conroller();

            } 
            elseif ($_GET["action"] == "add_client") {
            
                get_add_client_conroller();
            } 
            elseif ($_GET["action"] == "add_context") {
                
                
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

    }
    
    