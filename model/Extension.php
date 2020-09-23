

<?php 


/**
 * 
 */
class Extension
{

	private $_client;
	private $_extension;

	public function getClient(){

		return $this->_client;
	}

	public function getExtension(){

		return $this->_extension;
	}

	public function setClient($client){

		$this->_client = $client;
	}
	public function setExtension($extension){
		
		$this->_extension = $extension;
	}
	
	function __construct(array $extension_array)
	{
		$this->hydrate($extension_array);
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
