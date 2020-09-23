<?php

	
	//require("model/ClientManager.php");
	//require("model/ContextManager.php");

	function contexts_list_conroller(){

		$contextmanager = new ContextManager();

		$contexts = $contextmanager->get_all_contexts("asterisk/extentions.conf");

		$navbar_active = "list contexts";

		require("vue/clients_list.php");
	}

	function get_add_client_conroller(){
		
		$contextmanager = new ContextManager();

		$contexts = $contextmanager->get_all_contexts_names("asterisk/extentions.conf");

		$navbar_active = "add client";
		
		require("vue/add_client_form.php");
	}

	function post_add_client_conroller( $_username , $_password , $_context , $_transport ){
		
		$clientmanager = new ClientManager();

		$client_added = $clientmanager->add_client( $_username , $_password , $_context , $_transport );

		$navbar_active = "add client";
		
		require("vue/add_client_form.php");
	}

	function get_create_context_conroller(){

		$navbar_active = "create context";
		
		require("vue/add_context_form.php");
	}

	function post_create_context_conroller( $context_name ){
		
		$contextmanager = new ContextManager();

		$context_added = $contextmanager->create_context( ContextManager::$_path_to_file , $context_name);
		
		$navbar_active = "create context";

		require("vue/add_context_form.php");
	}




