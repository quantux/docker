<link type="text/css" rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.css"> 
<link type="text/css" rel="stylesheet" href="style.css">

<?php
define('backIcon', '<i class="fa fa-arrow-left" aria-hidden="true"></i>');
$nome = $_GET['nome'];
$options = array(
	'uri' => 'http://127.0.0.1/ocean_CRUD/server.php',
	'location' => 'http://127.0.0.1/ocean_CRUD/server.php'
);
$client = new SoapClient(null, $options);
$usuario = ($client->retrieveUpdate($nome));

if (!empty($usuario))
	{
	foreach($usuario as $obj)
		{
		$nome = $obj->nome;
		$sobreNome = $obj->sobreNome;
		$idade = $obj->idade;
		$origem = $obj->origem;
		}
	}
  else
	{
	echo "Nada por aqui";
	}

$oldNome = $nome = $obj->nome;
echo '
<div class="centralize">
<form action="sendUpdate.php" method="POST">

  <input type="text" name="oldNome" value="' . $oldNome . '" hidden>
  
  Nome:<br />
  <input type="text" name="nome" value="' . $nome . '">
  <br />
  Nome:<br />
  <input type="text" name="sobreNome" value="' . $sobreNome . '">
  <br />
  Idade:<br />
  <input type="text" name="idade" value="' . $idade . '">
  <br />
  Origem:<br />
  <input type="text" name="origem" value="' . $origem . '">
  <br />
  <br /><br />
  <input type="submit" value="Atualizar">
</form>
<div>

';
echo '
<div class="centralize">
<a href="retrieve.php">' . backIcon . '</a>
</div>';
?>