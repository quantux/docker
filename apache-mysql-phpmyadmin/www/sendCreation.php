<link type="text/css" rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.css"> 
<link type="text/css" rel="stylesheet" href="style.css">

<?php
//APENAS SETANDO O ÍCONE DE VOLTAR PARA UMA VARIAVEL GLOBAL
define('backIcon', '<i class="fa fa-arrow-left" aria-hidden="true"></i>');
?>


<?php
//DEFININDO PARAMENTROS PARA A INSTANCIA DO OBJETO CLIENTE-SOAP
$options = array(
	'uri' => 'http://127.0.0.1/ocean_CRUD/server.php',
	'location' => 'http://127.0.0.1/ocean_CRUD/server.php'
);
//INSTANCIANDO UM OBJETO CLIENT-SOAP 
$client = new SoapClient(null, $options);
//RECEBENDO VIA OS DADOS A SEREM PROCESSADOS PELO SERVER
$nome = $_POST['nome'];
$sobreNome = $_POST['sobreNome'];
$idade = $_POST['idade'];
$origem = $_POST['origem'];
//REQUISITANDO AO SERVER, A CRIAÇÃO DE UM NOVO REGISTRO COM OS DADOS INSERIDOS
$result = ($client->create($nome, $sobreNome, $idade, $origem));
//APENAS EXIBINDO O BOTÃO DE VOLTAR
echo '
<div class="centralize">
<h1>' . $result . '</h1>
<a href="retrieve.php">' . backIcon . '</a>
</div>';
?>