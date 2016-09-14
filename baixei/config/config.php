<?php
if ( basename($_SERVER['SCRIPT_FILENAME'])== basename(__FILE__) ){
		exit( Header('Location: ../login.php') );
}
ini_set('display_errors',1);
require 'vendor/autoload.php';
?>
