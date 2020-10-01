<?php

////require("model/Client.php");
//require("model/ContextManager.php");
/**
 * this class will manage client (add/remove/modify..etc)
 */
class ClientManager extends Manager
{
	
	function __construct()
	{
		# code...
	}

	function get_all_client(){

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
    		$client = new Client($clients_array);

    		//$client->setExtension($extension);

    		$clients[] = $client;
    	}

		$clients_table->closeCursor();

		return $clients;

	}

	function get_all_client_of_context( $context ){

		$bdd = $this->db_connect();

		$clients_table = $bdd->prepare('SELECT au.id,
										 au.password,
										 au.username,
										 pnt.context,
										 pnt.transport
								  FROM ps_auths au
								  INNER JOIN ps_endpoints pnt ON au.id = pnt.auth
								  WHERE pnt.context = ?
								  ');
		$clients_table->execute(array( $context ));

		$clients = array();

		while ($clients_array = $clients_table->fetch())
    	{
    		$client = new Client($clients_array);

    		//$client->setExtension($extension);

    		$clients[] = $client;
    	}

		$clients_table->closeCursor();

		return $clients;

	}

	function get_all_client_except( array $except_clients , $context){

		if (empty($except_clients)) {
			return $this->get_all_client_of_context( $context );
		}

		$bdd = $this->db_connect();
		
		$statment = 'SELECT au.id,
							au.password,
							au.username,
							pnt.context,
							pnt.transport
					FROM ps_auths au
					INNER JOIN ps_endpoints pnt ON au.id = pnt.auth
					WHERE pnt.context = ? AND au.id != ?
					';

		$arrayLength = count($except_clients);

		$i = 1; 

		while ($i < $arrayLength)
        {
            $statment = $statment.' AND au.id != ?';
            $i++;
        }

		$clients_table = $bdd->prepare( $statment );

		$parameters = array_merge( array( $context ) , $except_clients);

		$clients_table->execute($parameters);

		$clients = array();

		while ($clients_array = $clients_table->fetch())
    	{
    		$client = new Client($clients_array);

    		//$client->setExtension($extension);

    		$clients[] = $client;
    	}

		$clients_table->closeCursor();

		return $clients;

	}

	function get_client($client_id){

		$bdd = $this->db_connect();

		$clients_table = $bdd->prepare('SELECT au.id,
											   au.password,
											   au.username,
											   pnt.context,
											   pnt.transport
										FROM ps_auths au
								  		INNER JOIN ps_endpoints pnt ON au.id = pnt.auth
								  		WHERE au.username = ?
								  	');

		//echo $client_id."sss";

		$clients_table->execute(array($client_id));

		$client_array = $clients_table->fetch();

		//print_r($client_array);

		$client = new Client($client_array);

		$clients_table->closeCursor();

		return $client;

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


	function client_have_extension($client_id)
	{

		$client = $this->get_client(trim($client_id));

		$contexmanager = new ContextManager();


		$context = $contexmanager->get_context(FileManager::get_path_plus_file_name() , $client->getContext());

		foreach ($context->getClients() as $client ) {
			
			if ( trim($client->getUsername()) == trim($client_id)) {
				
				return $client->getExtension() == null ? false : true;

			}

		}
	}



	function modify_client( $_id , $_username , $_password , $_transport ){

		$bdd = $this->db_connect();

		$tmp_username = trim($_username);
		$tmp_password = trim($_password);
		$tmp_transport = trim($_transport);
		$tmp_id = trim($_id);


		// we should remove the extension because maybe we change the name of the client
		// another thing , we should reemove it before changing the name cause if we changed the name we get an extension
		// of a deleted client 
		if ($this->client_have_extension($tmp_id)) {

			$contexmanager = new ContextManager();

			$client = $this->get_client($tmp_id);

			$context_name = trim($client->getContext());


			$context = $contexmanager->get_context(FileManager::get_path_plus_file_name() , $context_name);

			foreach ($context->getClients() as $client ) {
				
				if ( trim($client->getUsername()) == trim($tmp_id)) {
					
					$extension = trim($client->getExtension()->getExtension()) ;
					break;

				}

			}

			$extensionmanager = new ExtensionManager();

			$extensionmanager->delete_extensions( trim($context_name) , trim($extension) );
			//exit("context_name".$context_name."extension".$extension);


		}

		$req = $bdd->prepare("UPDATE ps_endpoints 
							  SET 
							  	  id = :username,
    							  transport = :transport,
    							  aors = :username,
    							  auth = :username
							  WHERE
    							  id = :id");

		$req->execute(array(
								'username' => $tmp_username, 
								'transport' => $tmp_transport,
								'id' => $tmp_id
							));


		
		$req = $bdd->prepare("UPDATE ps_aors 
							  SET 
					    		  id = :username
							  WHERE
					    		  id = :id");

		$req->execute(array(
								'username' => $tmp_username,
								'id' => $tmp_id
							));



		$req = $bdd->prepare("UPDATE ps_auths 
							  SET 
					    	  	  id = :username,
					    	  	  username = :username,
					    	  	  password = :password
							  WHERE
					    		  id = :id");

		$req->execute(array(
							'username' => $tmp_username,
							'password' => $tmp_password,
							'id' => $tmp_id
							));

		

	}



}