<?php
//DEFININDO ARRAY DE PARAMETROS PARA CHAMADA DA CLASSE SOAP-SERVER
$options = array(
	'uri' => 'http://127.0.0.1/ocean_CRUD/server.php'
);
//INSTANCIANDO OBJETO SOAP-SERVER
$server = new SoapServer(null, $options);

class crud

	{

	// RETRIEVE

	public

	function retrieve()
		{
        //CARREGANDO O ARQUIVO DE CONEXÃO COM O BD
		require ('db_con.php');
        //PREPARANDO A SQL QUE SERÁ EXECUTADA
		$query = $dbh->prepare('SELECT * FROM usuarios');
        //EXECUTANDO A QUERY
		$query->execute();
        //RECEBENDO O RESULTADO 
		$dados = $query->fetchAll(PDO::FETCH_OBJ);
        //RETORNANDO O RESULTADO
		return $dados;
		}

	// CREATE

	public function create($nome, $sobreNome, $idade, $origem)
		{
        //CARREGANDO O ARQUIVO DE CONEXÃO COM O BD
		require ('db_con.php');
         //PREPARANDO A SQL QUE SERÁ EXECUTADA
		$query = $dbh->prepare(' INSERT INTO usuarios (nome, sobreNome, idade, origem ) VALUES(?,?,?,?) ');
		try
			{ //EXECUTANDO A QUERY
			$query->execute(Array(
				$nome,
				$sobreNome,
				$idade,
				$origem
			));
			$result = "Dados Inseridos com sucesso!";
			}

		catch(PDOException $e)
			{
			$result = $e->getMessage();
			}
        //RETORNANDO RESULTADO
		return $result;
		}

	// RETRIEVE UPDATE

	public

	function retrieveUpdate($nome)
		{
        //CARREGANDO O ARQUIVO DE CONEXÃO COM O BD
		require ('db_con.php');
         //PREPARANDO A SQL QUE SERÁ EXECUTADA
		$query = $dbh->prepare('SELECT * FROM usuarios WHERE nome = ?');
        //EXECUTANDO A QUERY
		$query->execute(Array(
			$nome
		));
        //RECEBENDO O RESULTADO 
		$dados = $query->fetchAll(PDO::FETCH_OBJ);
        //RETORNANDO O RESULTADO 
		return $dados;
		}

	// UPDATE

	public

	function update($nome, $sobreNome, $idade, $origem, $oldNome)
		{
        //CARREGANDO O ARQUIVO DE CONEXÃO COM O BD
		require 'db_con.php';
         //PREPARANDO A SQL QUE SERÁ EXECUTADA
		$query = $dbh->prepare(' UPDATE usuarios SET nome = "' . $nome . '", sobreNome = "' . $sobreNome . '", idade = ' . $idade . ', origem = "' . $origem . '" WHERE nome = "' . $oldNome . '" ');
		try
			{
             //EXECUTANDO A QUERY
			$query->execute();
            // ARMAZENANDO STRING DE CONFIRMAÇÃO
			$result = $nome . "&nbsp;" . $sobreNome . "&nbsp;" . $idade . "&nbsp;" . $origem;
			}

		catch(PDOException $e)
			{
			$result = $e->getMessage();
			}
         //RETORNANDO O RESULTADO 
		return $result;
		}

	// DELETE

	public

	function delete($nome)
		{
        //CARREGANDO O ARQUIVO DE CONEXÃO COM O BD
		require 'db_con.php';
        //PREPARANDO A SQL QUE SERÁ EXECUTADA
		$query = $dbh->prepare('DELETE FROM usuarios WHERE nome = ? ');
        //EXECUTANDO A QUERY
		$query->execute(Array($nome));
        //RETORNANDO O RESULTADO
		return "Dados apagados com sucesso!";
		}

	// RETRIEVE LOGIN

	public

	function retrieveLogin()
		{
        //CARREGANDO O ARQUIVO DE CONEXÃO COM O BD
		require ('db_con.php');
        //PREPARANDO A SQL QUE SERÁ EXECUTADA
		$query = $dbh->prepare('SELECT * FROM login');
        //EXECUTANDO A QUERY
		$query->execute();
        //RECEBENDO O RESULTADO
		$dados = $query->fetchAll(PDO::FETCH_OBJ);
        //RETORNANDO O RESULTADO
		return $dados;
		}
	}
//ESPECIFICANDO AO SERVER NOSSA CLASSE 'CRUD'
$server->setObject(new crud());
//PEDINDO PARA GERENCIAR ESSE NOVO OBJETO
$server->handle();
?>