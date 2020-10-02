

<?php  


//require("model/Context.php");
//require("model/Extension.php");




	/**
	 * 
	 */
	class ContextManager extends FileManager
	{

		
		function __construct()
		{
			# code...
		}

		// will return an array contain all contexts
		function get_all_contexts_names()
		{
			$contexts_names = array();

			$file = fopen(self::get_path_plus_file_name(), 'r');

			while ($ligne = fgets($file)) {
				
				$ligne_tmp = substr($ligne,0, strlen( $ligne )-2) ; // fgets add a space caracter to the ligne automaticly so , this ligne to remove the space caracter added

				if (preg_match("#^\[[0-9A-Za-z_-]+\]$#", $ligne_tmp )) {

					$context_name = substr($ligne_tmp,1, strlen( $ligne_tmp )-2);

					if ($context_name != "general" && $context_name != "globals")
						$contexts_names[] = $context_name;

				}
			}

			fclose($file);

			return $contexts_names;

		}

		function get_all_contexts()
		{
			$contexts_names = $this->get_all_contexts_names();

			foreach ($contexts_names as $context_name) {
				
				$contexts[] = $this->get_context( $context_name );

			}

			return $contexts;

		}

		// check a context if exist or not
		function context_exist( $context_name ){

			$contexts = $this->get_all_contexts_names();

			return in_array ( $context_name , $contexts );
		}

		// create a new context
		function create_context( $context_name )
		{	

			$context_added = false;

			if (preg_match("#^[0-9A-Za-z_-]+$#", $context_name )) { // the context should not exist 

				if ( !$this->context_exist( $context_name ) ) {
									
					$file = fopen(self::get_path_plus_file_name(), 'a+');

					$context_added = fputs( $file , "\r\n\r\n\r\n[".$context_name."]\r\n");

					fclose($file);
				}

			}

			return $context_added;

		}

		function get_context( $context_name ){ 

			$extensions = array();

			$clients = array();

			$except_clients = array();

			$clientmanager = new ClientManager();


			if (preg_match("#^[0-9A-Za-z_-]+$#", $context_name )) { // verify that the variable $context_name is form of [contect]


			

				if ( $this->context_exist( $context_name ) ) { // the context should exist 
									
					$file = fopen( self::get_path_plus_file_name() , 'r');

					$continue = true; // this will be false when geting all extensions of a context ; when we finish lopping the context ; stoping the next while loop 

					while ( ($ligne = fgets($file)) && $continue) { 

						$ligne_tmp = substr($ligne,0, strlen( $ligne )-2) ; // to remove the space caracter added by fgets

						if ( "[".$context_name."]" == $ligne_tmp ) {
							
							$curent_context = true;


							while ( ($ligne = fgets($file)) && $curent_context ) {
								
								if (preg_match("#^exten ?=> ?[0-9a-zA-Z]+ ?, ?([1-9]+|n) ?, ?Dial\( ?#", $ligne )) {

									$reg_exps_array[] = "# ?(, ?[0-9]*)? ?\)#";
									$reg_exps_array[] = "#exten ?=> ?[0-9a-zA-Z]+ ?, ?([1-9]+|n) ?, ?Dial\( ?#";
									$reg_exps_array[] = "#^[0-9a-zA-Z]+/#";

									$replacement = "";

									$client_name = trim ( preg_replace( $reg_exps_array , $replacement , $ligne ));

									$client = $clientmanager->get_client($client_name);

									$reg_exps_array2[] = "#exten ?=> ?#";
									$reg_exps_array2[] = "# ?,.*#";

									$extension_name = preg_replace ( $reg_exps_array2 , $replacement , $ligne );

									$extension = new Extension( array( 'client' => $client , 'extension' => $extension_name ) );

									$client->setExtension($extension);

									$extensions[] = $extension;

									$clients[] = $client;

									$except_clients[] = $client_name; // clients that have extensions


								}
								elseif (preg_match("#^\[[0-9A-Za-z_-]+\]#", $ligne))  // new context accured
									$curent_context = false;

							}

							$continue = false;

						}
					}

					fclose($file);

					$other_clients = $clientmanager->get_all_client_except( $except_clients , $context_name );

					$clients = array_merge($clients, $other_clients);


					$context = new Context( array( 'context' => $context_name , 'extensions' => $extensions , 'clients' => $clients ) );

				}


			}


			return $context;

		}


	}



