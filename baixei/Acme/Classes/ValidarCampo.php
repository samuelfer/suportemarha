<?php

class ValidarCampo{

	public function fieldNotEmpty($field){
		if (!empty($field)) {
			echo $fields = $field;
		}else{
			echo '<span style="color: red;">Campo obrigatório!</span>';
		}
	}
}

?>