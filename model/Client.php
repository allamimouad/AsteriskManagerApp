

<?php 

	/**
	 * 
	 */
	class Client
	{
		
		private $_username;
		private $_password;
		private $_context;
		private $_transport;
		private $_extension;



		public function setUsername($username){

			$this->_username = $username ;
		}


		public function setPassword($password){

			$this->_password = $password ;
		}


		public function setContext($context){

			$this->_context = $context ;
		}


		public function setTransport($transport){

			$this->_transport = $transport ;
		}


		public function setExtension($extension){

			$this->_extension = $extension ;
		}



		public function getUsername(){

			return $this->_username;
		}


		public function getPassword(){

			return $this->_password;
		}


		public function getContext(){

			return $this->_context;
		}


		public function getTransport(){

			return $this->_transport;
		}


		public function getExtension(){

			return $this->_extension ;
		}


		public function hydrate(array $donnees){

			foreach ($donnees as $key => $value)
			{
				// On récupère le nom du setter correspondant à l'attribut.
				$method = 'set'.ucfirst($key);
	        
	    		// Si le setter correspondant existe.
				if (method_exists($this, $method))
				{
					// On appelle le setter.
					$this->$method($value);
				}
			}
		}
		
		

		function __construct(array $client_array)
		{
			$this->hydrate($client_array);
		}


	}


