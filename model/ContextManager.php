

<?php  

	/**
	 * 
	 */
	class ContextManager
	{


		static $_path_to_file = "asterisk/extentions.conf";
		
		function __construct()
		{
			# code...
		}

		// will return an array contain all contexts
		function get_all_contexts($path_to_file)
		{
			$contexts = array();

			$file = fopen($path_to_file, 'r');

			while ($ligne = fgets($file)) {
				
				$ligne_tmp = substr($ligne,0, strlen( $ligne )-2) ; // fgets add a space caracter to the ligne automaticly so , this ligne to remove the space caracter added

				if (preg_match("#^\[[0-9A-Za-z_-]+\]$#", $ligne_tmp )) {

					$context_name = substr($ligne_tmp,1, strlen( $ligne_tmp )-2);

					if ($context_name != "general" && $context_name != "globals")
						$contexts[] = $context_name;

				}
			}

			fclose($file);

			return $contexts;

		}

		// check a context if exist or not
		function context_exist($path_to_file  , $context_name ){

			$contexts = $this->get_all_contexts($path_to_file);

			return in_array ( $context_name , $contexts );
		}

		// create a new context
		function create_context( $path_to_file , $context_name )
		{	

			$context_added = false;

			if (preg_match("#^[0-9A-Za-z_-]+$#", $context_name )) { // the context should not exist 

				if ( !$this->context_exist( $path_to_file , $context_name)) {
									
					$file = fopen($path_to_file, 'a+');

					$context_added = fputs($file, "\r\n\r\n\r\n[".$context_name."]\r\n");

					fclose($file);
				}


			}

			return $context_added;

		}

		function get_extensions( $path_to_file , $context_name ){ 

			$extensions = array();

			if (preg_match("#^[0-9A-Za-z_-]+$#", $context_name )) {

				if ( $this->context_exist( $path_to_file , $context_name)) { // the context should exist 
									
					$file = fopen($path_to_file, 'r');

					$continue = true; // this will be false when geting all extensions of a context ; stoping the next while loop 

					while ( ($ligne = fgets($file)) && $continue) { 

						$ligne_tmp = substr($ligne,0, strlen( $ligne )-2) ; // to remove the space caracter added by fgets

						if ( "[".$context_name."]" == $ligne_tmp ) {
							
							$curent_context = true;

							while ( ($ligne = fgets($file)) && $curent_context ) {
								
								if (preg_match("#^exten ?=> ?[0-9a-zA-Z]+ ?, ?([1-9]+|n) ?, ?Dial\( ?#", $ligne )) {

									$reg_exps_array = array();
									$reg_exps_array[] = "# ?(, ?[0-9])?\)#";
									$reg_exps_array[] = "#exten ?=> ?[0-9a-zA-Z]+ ?, ?([1-9]+|n) ?, ?Dial\( ?#";

									$replacement = "";

									$extension = preg_replace ( $reg_exps_array , "" , $ligne );

									$extensions[] = $extension;

								}
								elseif (preg_match("#^\[[0-9A-Za-z_-]+\]#", $ligne))  // new context accured
									$curent_context = false;

							}

							$continue = false;

						}
					}

				}


			}

			return $extensions;

		}




	}



