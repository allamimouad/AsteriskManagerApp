<?php

class Manager{

	protected function db_connect(){

                try
                {

                        $bdd = new PDO('mysql:host=localhost;dbname=asterisk;charset=utf8', 'asterisk', 'YouNeedAReallyGoodPasswordHereToo', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));

                        return $bdd;
                }
                catch (Exception $e)
                {       

                        die('Erreur : ' . $e->getMessage());

                }


	}

}