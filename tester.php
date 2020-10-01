<?php


	//require("model/ContextManager.php");
	//echo $_SERVER['DOCUMENT_ROOT'];

    require("controller/controller.php");

    function chargerClasse($classe)
    {
      require "model/" . $classe . '.php'; // On inclut la classe correspondante au paramètre passé.
    }

    spl_autoload_register('chargerClasse');

	

/*	$contextmanager = new ContextManager();

	$contextmanager->get_all_contexts("asterisk/extentions.conf");

private $_username;
		private $_password;
		private $_context;
		private $_transport;
		private $_extension;


	*/


	/*require("model/Client.php");

	$array = array('username' => 'mouad' , 'password' => 'notsecure' , 'context' => 'testcontext' , 'transport' => 'udp' );

	$client = new Client($array);

	$client->test = 'nen,';

	if ( $client->getExtension()==null) {
		echo "heheheh";
	}


	print_r($client);*/


/*$contextmanager = new ContextManager();

$extensions = $contextmanager->get_context("asterisk/extentions.conf","sets");

print_r($extensions);*/

/*$reg_s[] = "#hello#";
$reg_s[] = "#123#";*/




/*$reg_exps_array[] = "# ?(, ?[0-9]*)? ?\)#";
$reg_exps_array[] = "#exten ?=> ?[0-9a-zA-Z]+ ?, ?([1-9]+|n) ?, ?Dial\( ?#";

$replacement = "";

$ligne = 'exten => 102,1,Dial(UserA_SoftPhone,15)';

$extension = preg_replace ( $reg_exps_array , " " , $ligne );

echo $ligne."<br>";

echo $extension."<br><br>";

$reg_exps_array2[] = "#exten ?=> ?#";
$reg_exps_array2[] = "# ?,.*#";

$extension = preg_replace ( $reg_exps_array2 , " " , $ligne );

echo $ligne."<br>";

echo $extension;*/

/*$stt = "hellobbhelloohhhh123pp";
$stt2 = preg_replace ( $reg_s , "" , $stt );
echo $stt2;*/




/*$extensionmanager = new ExtensionManager();

$clientmanager = new ClientManager();

$client = $clientmanager->get_client('mouad123');

$extension = new Extension( array( 'extension' => 160 , 'client' => $client ));

$added = $extensionmanager->create_extension( 'sets2' , $extension );

echo $added ? "added" : "not added" ;*/

//asterisk -rx 'core show channels'
//sudo usermod -a -G asterisk apache


//echo shell_exec ( "ls -l /etc/asterisk" );

/*echo shell_exec ( "asterisk -rx 'pjsip show endpoints'" )."<br>";

echo shell_exec ( "whoami" );*/




$extensionmanager = new ExtensionManager();

$extensionmanager->delete_extensions( 'GI2' , '160' );
$extensionmanager->delete_extensions( 'sets' , '100' );

$extension = new Extension(array('extension' => '100'));
$extension2 = new Extension(array('extension' => '160'));

echo $extensionmanager->extension_exist( 'sets' , $extension ) ? 'true' : 'false';
echo $extensionmanager->extension_exist( 'GI2' , $extension2 ) ? 'true' : 'false';


/*$contextmanager = new ContextManager();

$extensions = $contextmanager->get_context("asterisk/extentions.conf","GI2");

print_r($extensions);*/






/*
function print_n_ligne($n , $path_to_file){

	$file = fopen($path_to_file, 'r');

	$counter = 1;

	while ($ligne = fgets($file)) {

		if ($counter <= $n)
			echo $ligne."\r\n";
		
	}
}


print_n_ligne(20 , "C:\\Users\\nieuwe eigenaar\\Desktop\word list\\Wordlist TNCAP\\TNCAP by Simo\\Tncap100m.txt");*/




