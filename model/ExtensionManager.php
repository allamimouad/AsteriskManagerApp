
<?php 

	/**
	 * 
	 */
	class ExtensionManager extends FileManager
	{

		function extension_exist( $context_name , $extension ){

			$contextmanager = new ContextManager();
			
			$context = $contextmanager->get_context( self::get_path_plus_file_name() , $context_name );

			foreach ($context->getExtensions() as $extension_tmp) {
				
				if ($extension_tmp->getExtension() == $extension->getExtension()) 
					return true;
				else
					return false;

			}

		}



		function create_extension( $context_name , $extension ){

			if ( !$this->extension_exist( $context_name , $extension ) ) {
				
				$file = fopen( self::get_path_plus_file_name() , 'r');

				$file_name_tmp = "extension2.conf";

				$new_file = fopen(self::get_path_to_file().$file_name_tmp, 'a+');

				while ($ligne = fgets($file)) {

					$context_added = fputs($new_file, $ligne);

					$ligne_tmp = substr($ligne,0, strlen( $ligne )-2) ; // to remove the space caracter added by fgets

					if ("[".$context_name."]" == $ligne_tmp) {

						$ext = "\r\nexten => ".$extension->getExtension().",1,Dial(PJSIP/".$extension->getClient()->getUsername().")\r\n";

						$context_added = fputs($new_file, $ext); 

					}
				}

				unlink ( self::get_path_plus_file_name() );
				rename ( self::get_path_to_file().$file_name_tmp , self::get_path_plus_file_name() );

				return true;
			}
			else
				return false;


		}


		function get_extensions( $context )
		{

		}


		
		function __construct()
		{
			
		}



	}