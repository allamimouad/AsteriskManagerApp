

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

			return $contexts;

		}

		// check a context if exist or not
		function context_exist($path_to_file  , $context_name){

			$contexts = $this->get_all_contexts($path_to_file);

			return in_array ( $context_name , $contexts );
		}

		// create a new context
		function create_context( $path_to_file , $context_name)
		{	

			$context_added = false;

			if (preg_match("#^[0-9A-Za-z_-]+$#", $context_name )) {

				if ( !$this->context_exist( $path_to_file , $context_name)) {
									
					$file = fopen($path_to_file, 'a+');

					$context_added = fputs($file, "\r\n\r\n\r\n[".$context_name."]\r\n");
				}


			}

			return $context_added;

		}

	}



