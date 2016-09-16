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
	//MÉTODO QUE VERIFICA SE O CAMPO ESTÁ VAZIO
	public function fieldNotEmpty($field){
		if (empty($field)) {
			echo '<span style="color: red;">Campo obrigatório!</span>';
		}
	}
	//MÉTODO PARA RETIRAR AS TAGS HTML DA STRING
	public function retiraTags($field){
		if (!empty($field)) {
			$fields = strip_tags($field);
			return $fields;	
		}
	}

	//MÉTODO PARA VALIDAR EMAIL
	public function validaEmail($email){
		if (!empty($email)) {
			if(!filter_var($email, FILTER_VALIDATE_EMAIL) === false)
			return $email;
		}else{
			echo '<span style="color: red;">Por favor informe um email válido!</span>';
		}
	}

}

?>