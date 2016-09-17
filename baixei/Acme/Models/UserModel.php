<?php
namespace Acme\Models;
require_once($_SERVER['DOCUMENT_ROOT'].'/suportemarha/baixei/Asw/Database/AswModel.php');
//require_once 'Asw\Database\AswModel.php';
use Asw\Database\AswModel;

class UserModel extends AswModel{
	protected $table = 't_usuarios';	
}

?>