<?php
/*
*CLASSE PARA VALIDAÇÃO DOS CAMPOS (14/09/2016)
*@AUTOR Samuel Fernandes
*/
class ValidarCampo{

	//VERIFICANDO SE O CAMPO É VAZIO
	/*public function fieldNotEmpty($field){
		if (!empty($field)) {
			echo $fields = $field;
		}else{
			echo '<span style="color: red;">Campo obrigatório!</span>';
		}
	}*/

	public function fieldNotEmpty($field){
		if (empty($field)) {
			echo '<span style="color: red;">Campo obrigatório!</span>';
		}
	}
	//Retirando as tags html e espaços
	public function retiraTags($field){
		if (!empty($field)) {
			$fields = strip_tags($field);	
		}
	}

}

?>