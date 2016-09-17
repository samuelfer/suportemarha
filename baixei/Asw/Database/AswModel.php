<?php
namespace Asw\Database;
require_once 'Acme/Interfaces/Imodel.php';
require_once 'Asw/Database/AttributesCreate.php';
require_once 'Asw/Database/AttributesUpdate.php';
require_once 'Asw/Database/Connection.php';

use Acme\Interfaces\Imodel;

use Asw\Database\Connection;

use Asw\Database\Attributes;


use PDOException;

class AswModel implements Imodel{

	private $database;

	public function __construct(){

		$database = new Connection;

		$this->database = $database->connection();

		
	}

	public function create($attributes){

		$attributesCadastrar = new AttributesCreate;

		$fields = $attributesCadastrar->createFields($attributes);

		$values = $attributesCadastrar->createValues($attributes);
		
		$query = "INSERT INTO $this->table($fields) VALUES ($values)";
		
		$pdo = $this->database->prepare($query);
		$bindParameters = $attributesCadastrar->bindCreateParameters($attributes);
		
		try{
			$pdo->execute($bindParameters);
			return $this->database->lastInsertId();
		}catch(PDOException $e){
			echo $e->getMessage();
		}
	}

	public function read(){

		$query = "SELECT * FROM $this->table";

		$pdo = $this->database->prepare($query);

		try{

			$pdo->execute();
			return $pdo->fetchAll();

		}catch(PDOException $e){

			echo ($e->getMessage());
		}
	}

	//Read com limit para a paginacao
	public function readPagination($inicio, $limite){

		$query = "SELECT * FROM $this->table LIMIT $inicio, $limite";

		$pdo = $this->database->prepare($query);

		try{

			$pdo->execute();
			return $pdo->fetchAll();

		}catch(PDOException $e){

			echo ($e->getMessage());
		}
	}

	public function countRecords(){

		$query = "SELECT count(*) as total FROM $this->table";

		$pdo = $this->database->prepare($query);

		try{

			$pdo->execute();
			return $pdo->fetchAll();

		}catch(PDOException $e){

			echo ($e->getMessage());
		}
	}

	public function update($id, $attributes){
		$AttributesUpdate = new AttributesUpdate;

		$fields = $AttributesUpdate->updateFields($attributes);

		$query = "UPDATE $this->table SET $fields WHERE id = :id";

		$pdo = $this->database->prepare($query);

		$bindUpdateParameters = $AttributesUpdate->bindUpdateParameters($attributes);

		$bindUpdateParameters['id'] = $id;

		try{

			$pdo->execute($bindUpdateParameters);
			return $pdo->rowCount();

		}catch(PDOException $e){

			echo($e->getMessage());
		}
		
	}

	public function delete($name, $value){
		$query = "DELETE FROM $this->table WHERE $name = :$name";
		$pdo = $this->database->prepare($query);

		try{

			$pdo->bindParam(":$name", $value);
			$pdo->execute();
			return $pdo->rowCount();

		}catch(PDOException $e){

			dump($e->getMessage());
		}
	}

	public function findBy($name, $value){

		$query = "SELECT * FROM $this->table WHERE $name = $value";

		$pdo = $this->database->prepare($query);

		try{

			$pdo->execute();
			return $pdo->fetch();

		}catch(PDOException $e){

			echo $e->getMessage();
		}
	}

	//Método para comaparar valores em de id em duas tabelas e obter a descrição
	public function findByField($field, $name, $value){

		$query = "SELECT $field FROM $this->table WHERE $name = $value";

		$pdo = $this->database->prepare($query);

		try{

			$pdo->execute();
			return $pdo->fetch();

		}catch(PDOException $e){

			echo $e->getMessage();
		}
	}

	//Select usado antes de atualizar
	public function findById($name, $value, $id, $valId){

		$query = "SELECT * FROM $this->table WHERE $name = $value AND $id <> $valId" ;

		$pdo = $this->database->prepare($query);

		try{

			$pdo->execute();
			return $pdo->fetch();

		}catch(PDOException $e){

			echo $e->getMessage();
		}
	}

	//SELECT PARA VERIFICAR SE É POSSÍVEL LOGAR
	public function findByIdTeste($name1, $value1, $name2, $value2){

		$query = "SELECT * FROM $this->table WHERE $name1 = $value1 AND $name2 = $value2 AND ativado = '1' LIMIT 1" ;

		$pdo = $this->database->prepare($query);

		try{

			$pdo->execute();
			return $pdo->fetch();

		}catch(PDOException $e){

			echo $e->getMessage();
		}
	}

	//Select usado para fazer inner join
	public function findByIdInner($alias1, $tableInner, $alias2, $name, $value){

		$query = "SELECT * FROM $this->table $alias1, $tableInner $alias2 WHERE $alias1.$name = $alias2.$value" ;

		$pdo = $this->database->prepare($query);

		try{

			$pdo->execute();
			return $pdo->fetchAll();

		}catch(PDOException $e){

			echo $e->getMessage();
		}
	}



	public function selectAll($tabela){

		$query = "SELECT * FROM $tabela";

		$pdo = $this->database->prepare($query);

		try{

			$pdo->execute();
			return $pdo->fetch();

		}catch(PDOException $e){

			echo $e->getMessage();
		}
	}


}

?>
