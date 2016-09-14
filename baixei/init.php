<?php  
$base = pathinfo($_SERVER['PHP_SELF']);
$base = $base['basename'];
$self = pathinfo(__FILE__);
$self = $self['basename'];

if ($self == $base){
    die('Este arquivo não pode ser acessado diretamente.');
}
?>