<?php


	require("model/ContextManager.php");
	//echo $_SERVER['DOCUMENT_ROOT'];

	

	$contextmanager = new ContextManager();

	$contextmanager->get_all_contexts("asterisk/extentions.conf");


