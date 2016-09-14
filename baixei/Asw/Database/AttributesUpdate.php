<?php
namespace Asw\Database;

class AttributesUpdate{

	private function combineUpdateFields($attributes){
		$keys = array_keys($attributes);
		$separadoPorDoisPontos = ':'.implode('=:',$keys);
		$combine = array_combine($keys, explode('=',$separadoPorDoisPontos));
		return $combine;
	}

	public function updateFields($attributes){
		//['nome' => :nome, 'email' => :email]
		$combine = $this->combineUpdateFields($attributes);
		
		$query = null;
		///nome=:nome, email=:email
		foreach ($combine as $key => $value) {
			$query.=$key.'='.$value.',';
		}

		$novaQuery = rtrim($query,',');
		return $novaQuery;
	}


	public function bindUpdateParameters($attributes){

		$keys = array_keys($attributes);
		$separadoPorDoisPontos = ':'.implode(',:',$keys);
		$combineUpdate = array_combine(explode(',', $separadoPorDoisPontos), array_values($attributes));
		return $combineUpdate;
	}
}

?>