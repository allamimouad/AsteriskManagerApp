<?php

	
	require("model/ClientManager.php");
	require("model/ContextManager.php");

	function clients_list_conroller(){

		$cm = new ClientManager();

		$clients = $cm->show_client();

		$navbar_active = "list clients";

		require("vue/clients_list.php");
	}

	function get_add_client_conroller(){
		
		$contextmanager = new ContextManager();

		$contexts = $contextmanager->get_all_contexts("asterisk/extentions.conf");

		$navbar_active = "add client";
		
		require("vue/add_client_form.php");
	}

	function post_add_client_conroller( $_username , $_password , $_context , $_transport ){
		
		$cm = new ClientManager();

		$client_added = $cm->add_client( $_username , $_password , $_context , $_transport );

		$navbar_active = "add client";
		
		require("vue/add_client_form.php");
	}

	function get_create_context_conroller(){

		$navbar_active = "create context";
		
		require("vue/add_context_form.php");
	}

	function post_create_context_conroller( $context_name ){
		
		$cm = new ContextManager();

		$context_added = $cm->create_context( ContextManager::$_path_to_file , $context_name);
		
		$navbar_active = "create context";

		require("vue/add_context_form.php");
	}




