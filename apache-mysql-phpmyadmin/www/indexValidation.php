<link type="text/css" rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.css"> 
<link type="text/css" rel="stylesheet" href="style.css">
<?php
define('backIcon', '<i class="fa fa-arrow-left" aria-hidden="true"></i>');

// CAPTURANDO USUARIO E SENHA DIGITADOS NO FORMULARIO

$userLocal = $_POST['user'];
$passwordLocal = $_POST['password'];

// VERIFICANDO SE O FORM NÃO SE ENCONTRA VAZIO

if (empty($userLocal) || empty($passwordLocal))
	{
	$msg = "Existem campos em branco";
	}
  else
	{

	// TRAZENDO USUARIO E SENHA DO BANCO
	$options = array(
		'uri' => 'http://127.0.0.1/ocean_CRUD/server.php',
		'location' => 'http://127.0.0.1/ocean_CRUD/server.php'
	);
	$client = new SoapClient(null, $options);
	$result = ($client->retrieveLogin());
	if (!empty($result))
		{
        //CONVERTENDO ARRAY QUE VEIO DO SERVER, PARA OBJETO
		foreach($result as $obj)
			{
			$userBD = $obj->user;
			$passwordBD = $obj->password;
			}
		}
	  else
          //CASO NÃO EXISTA LOGINS CADASTRADOS NO BANCO
		{
		$msg = "Não existem admins registrados";
		}
          //VERIFICANDO SE O FORMULARIO DE LOGIN CONFERE COM OS DADOS DO BANCO
	if ($userLocal == $userBD && $passwordLocal == $passwordBD)
		{
        //CASO O USUARIO E SENHA ESTEJAM CORRETOS
		header('Location: retrieve.php');
		}
	  else
		{
		$msg = "Login ou senha incorretos";
		}
	}
//CASO ACONTEÇA ALGUM PROBLEMA, EXIBE A MENSAGEM E O BOTÃO PARA VOLTAR
echo "<h1 class='centralize'> " . $msg . "</h1>";
echo '
<div class = "centralize">
<a href="index.php">' . backIcon . '</a>
</div';
?>
