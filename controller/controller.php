<?php

	
	require("model/ClientManager.php");
	require("model/ContextManager.php");

	function clients_list_conroller(){

		$cm = new ClientManager();

		$clients = $cm->show_client();

		require("vue/clients_list.php");
	}

	function get_add_client_conroller(){
		
		$contextmanager = new ContextManager();

		$contexts = $contextmanager->get_all_contexts("asterisk/extentions.conf");
		
		require("vue/add_client_form.php");
	}

	function post_add_client_conroller( $_username , $_password , $_context , $_transport ){
		
		$cm = new ClientManager();

		$client_added = $cm->add_client( $_username , $_password , $_context , $_transport );
		
		require("vue/add_client_form.php");
	}