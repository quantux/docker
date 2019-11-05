<link type="text/css" rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.css"> 
<link type="text/css" rel="stylesheet" href="style.css">

<?php
//APENAS SETANDO O ÍCONTE DE VOLTAR PARA UMA VARÍAVEL GLOBAL
define('backIcon', '<i class="fa fa-arrow-left" aria-hidden="true"></i>');
// RECEBENDO O NOME VIA GET
$nome = $_GET['nome'];
//INSTANCIANDO CLIENT_SOAP e SETANDO PARAMETROS DO SERVER
$options = array(
	'uri' => 'http://127.0.0.1/ocean_CRUD/server.php',
	'location' => 'http://127.0.0.1/ocean_CRUD/server.php'
);
$client = new SoapClient(null, $options);
//REQUISITANDO QUE O REGISTRO QUE CONTENHA O NOME 'X' SEJA DELETADO
$result = ($client->delete($nome));
//APENAS EXIBINDO O ÍCONE DE VOLTAR
echo '
<div class="centralize">
<h1>' . $result . '</h1>
<a href="retrieve.php">' . backIcon . '</a>
</div>';
?>