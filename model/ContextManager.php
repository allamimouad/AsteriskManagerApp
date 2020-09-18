

<?php  

	/**
	 * 
	 */
	class ContextManager
	{
		
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

			$contexts = get_all_contexts($path_to_file);

			return in_array ( $context_name , $contexts );
		}

		// create a new context
		function create_context($path_to_file , $context_name)
		{	

			if (preg_match("#^[0-9A-Za-z_-]+$#", $context_name )) {
				
				$file = fopen($path_to_file, 'a+');

				fputs($monfichier, '\n'.$context_name.'\n');


			}

		}

	}



