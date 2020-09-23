

<?php 


/**
 * 
 */
class Context
{

	private $_context;
	private $_extensions;
	private $_clients;



	public function setContext($context){

		$this->_context = $context ;
	}


	public function setExtensions($extensions){

		$this->_extensions = $extensions ;
	}


	public function setClients($clients){

		$this->_clients = $clients ;
	}


	public function getContext(){

		return $this->_context ;
	}


	public function getExtensions(){

		return $this->_extensions ;
	}


	public function getClients(){

		return $this->_clients ;
	}





	function __construct($data)
	{
		$this->hydrate($data);
	}


	function hydrate(array $data){

		foreach ($data as $key => $value) {
			$methode = "set".ucfirst($key);

			if (method_exists($this, $methode)) {
				
				$this->$methode($value);

			}
		}
	}



}
























