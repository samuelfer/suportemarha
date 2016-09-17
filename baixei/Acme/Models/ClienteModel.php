<?php
namespace Acme\Models;
require_once($_SERVER['DOCUMENT_ROOT'].'/suportemarha/baixei/Asw/Database/AswModel.php');
//require_once 'Asw\Database\AswModel.php';
use Asw\Database\AswModel;

class ClienteModel extends AswModel{
	protected $table = 't_cliente';	
}

?>