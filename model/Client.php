

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


		
		

		function __construct(argument)
		{
					
		}


	}


