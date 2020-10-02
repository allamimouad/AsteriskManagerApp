<?php

	
	//require("model/ClientManager.php");
	//require("model/ContextManager.php");

	function contexts_list_conroller(){

		$contextmanager = new ContextManager();

		$contexts = $contextmanager->get_all_contexts();

		$navbar_active = "list contexts";

		require("vue/clients_list.php");
	}

	function get_add_client_conroller(){
		
		$contextmanager = new ContextManager();

		$contexts = $contextmanager->get_all_contexts_names();

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

		$context_added = $contextmanager->create_context( $context_name);
		
		$navbar_active = "create context";

		require("vue/add_context_form.php");
	}

	function post_modify_client_conroller( $_id , $_username , $_password , $_transport ){
		
		$clientmanager = new ClientManager();

		$client_added = $clientmanager->modify_client( $_id , $_username , $_password , $_transport );
		
		header("Location: /?action=clients_list");
		die();
	}


	function post_add_extension_conroller( $_id , $_extension )
	{
		$tmp_id = trim($_id);
		$tmp_extension = trim($_extension);

		$clientmanager = new ClientManager();
		$extensionmanager = new ExtensionManager();

		$client = $clientmanager->get_client($tmp_id);

		$extensionobj = new Extension(array('extension' => $tmp_extension));

		$tmp_context = trim($client->getContext());

		$clientmanager->delete_client_extension($tmp_id);

		$client->setExtension($extensionobj);
		$extensionobj->setClient($client);

		$extensionmanager->create_extension( $tmp_context , $extensionobj );

		header("Location: /?action=clients_list");
		die();

	}


	function get_reload_dialplan_conroller()
	{
		$dialplan_reloaded = trim(shell_exec ( "asterisk -rx 'dialplan reload'" ));

		//exit($dialplan_reloaded);

		$contextmanager = new ContextManager();

		$contexts = $contextmanager->get_all_contexts();

		$navbar_active = "list contexts";

		require("vue/clients_list.php");

	}


	function post_delet_client(){

		

	}




