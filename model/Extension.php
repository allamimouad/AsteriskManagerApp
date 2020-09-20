

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

		return $this->_id;
	}

	public function setId($clientid){

		$this->_id = $clientid;
	}
	public function setExtesion($extension){
		
		$this->_extension = $extension;
	}
	
	function __construct($clientid,$extension)
	{
		$this->setId($clientid);
		$this->setExtesion($extension);
	}
	

}
