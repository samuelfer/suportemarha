<?php
/**
* CLASSE RESPONSÁVEL PELOS DADOS DO USUÁRIO
*/
class Usuario{
	
	private $Data;
	private $Msg;
	private $Result;

	//Nome da tabela
	const Entity = 'usuarios';

	public function ExeCreate(array $Data){
		$this->Data = $Data;
		$this->checkData();
		if ($this->Result) {
			$this->Create();
		}
	}

	public function getResult(){
		return $this->Result;
	}

	private function checkData(){
		$this->Data = array_map('strip_tags', $this->Data);
		$this->Data = array_map('trim', $this->Data);
		if (in_array('', $this->Data)) {
			$this->Result = false;
			$this->Msg = "<p>O usuario {} nao foi cadastrado no sistema!</p>";
		}
	}

	private function Create(){
		$Create = new Create;
		$Create->ExeCreate(self::Entity, $this->Data);
		if ($Create->getResult()) {
			$this->Result = $Create->getResult();
			$this->Msg = "<p>O usuario {} foi cadastrado com sucesso!</p>";
		}
	}
}
?>