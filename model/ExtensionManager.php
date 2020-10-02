
<?php 

	/**
	 * 
	 */
	class ExtensionManager extends FileManager
	{

		function extension_exist( $context_name , $extension ){

			$contextmanager = new ContextManager();
			
			$context = $contextmanager->get_context( $context_name );

			foreach ($context->getExtensions() as $extension_tmp) {
				
				if ( trim ($extension_tmp->getExtension()) == trim ($extension->getExtension()) ) 
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




		function delete_extensions( $context_name , $extension )
		{

			$extensionobj = new Extension(array('extension' => $extension));

			if ( $this->extension_exist( $context_name , $extensionobj ) ) {

				
				$file = fopen( self::get_path_plus_file_name() , 'r');

				$file_name_tmp = "extension2.conf";

				$new_file = fopen(self::get_path_to_file().$file_name_tmp, 'a+');

				while ( $ligne1 = fgets($file) ) {
					
					$context_added = fputs($new_file, $ligne1);

					$ligne_tmp = substr($ligne1,0, strlen( $ligne1 )-2) ; // to remove the space caracter added by fgets

					if ("[".$context_name."]" == $ligne_tmp) {

						while ( ($ligne2 = fgets($file)) ) {

							if (!preg_match("#^exten ?=> ?".$extension." ?, ?#", $ligne2 ))
								$context_added = fputs($new_file, $ligne2);
							
						}

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