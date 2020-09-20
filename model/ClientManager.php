<?php

require("model/Manager.php");
require("model/Client.php");
/**
 * this class will manage client (add/remove/modify..etc)
 */
class ClientManager extends Manager
{
	
	function __construct()
	{
		# code...
	}

	function show_client(){

		$bdd = $this->db_connect();

		$clients_table = $bdd->prepare('SELECT au.id,
										 au.password,
										 au.username,
										 pnt.context,
										 pnt.transport
								  FROM ps_auths au
								  INNER JOIN ps_endpoints pnt ON au.id = pnt.auth
								  ');
		$clients_table->execute(array());

		$clients = array();

		while ($clients_array = $clients_table->fetch())
    	{
    		$clients[] = new Client($clients_array);
    	}


		$clients_table->closeCursor();

		return $clients;

	}

	function add_client( $_username , $_password , $_context , $_transport ){

		$bdd = $this->db_connect();

		$req = $bdd->prepare("INSERT INTO ps_endpoints(id,transport,aors,auth,context,disallow,allow)
							  VALUES (:username , :transport , :username , :username , :context ,'all','ulaw')");
		$req->execute(array(
								'username' => $_username, 
								'transport' => $_transport,
								'context' => $_context
							));

		$req = $bdd->prepare("INSERT INTO ps_aors(id,max_contacts)
							  VALUES (:username,2)");
		$req->execute(array(
								'username' => $_username
							));

		$req = $bdd->prepare("INSERT INTO ps_auths(id,auth_type,password,username)
							  VALUES (:username,'userpass',:password,:username)");
		$req->execute(array(
							'username' => $_username,
							'password' => $_password
							));


	}


}