<?php


	require("model/ContextManager.php");
	//echo $_SERVER['DOCUMENT_ROOT'];

	

/*	$contextmanager = new ContextManager();

	$contextmanager->get_all_contexts("asterisk/extentions.conf");

private $_username;
		private $_password;
		private $_context;
		private $_transport;
		private $_extension;


	*/


	require("model/Client.php");

	$array = array('username' => 'mouad' , 'password' => 'notsecure' , 'context' => 'testcontext' , 'transport' => 'udp' , 'extension' => '120' );

	$client = new Client($array);

	$client->test = 'nen,';

	if ( !$client->getExtension()==null) {
		echo "heheheh";
	}

	print_r($client);









