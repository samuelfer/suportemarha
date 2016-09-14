<?php
/*QUANDO USO PROTECTED STATIC, 
*PRA CHAMAR NA PRÓPRIA CLASSE
*USO O SELF::, EM OUTRA CLASSE QUE EXTENDE ESSA,
*USO PARENT::
*/

abstract class Conexao{

	const USER = "root";
	const PASS = "";

	private static $instance = null;
	private static function conectar(){

		try {
			if (self::$instance == null) {
				$dsn = "mysql:host=localhost;dbname=crm";
				self::$instance = new PDO($dsn, self::USER, self::PASS);
				self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			}
		} catch (PDOException $e) {
			echo 'Erro: '.$ee->getMessage();
		}
		return self::$instance;
	}

	protected static function getDB(){
		return self::conectar();
	}
} 


?>