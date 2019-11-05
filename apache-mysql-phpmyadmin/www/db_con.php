	

<?php

// PARAMETROS PARA FAZER A CONEXÃO COM O bd

$hostname = 'localhost';
$username = 'root';
$userpwd = '';
$databasename = 'crud';

// FAZENDO CONEXÃO COM O BD

try
	{
	$dsn = 'mysql:host=localhost';
	$dbh = new PDO("mysql:host=localhost; dbname=" . $databasename . ";", "root", "");
	}

catch(PDOException $e)
	{
	echo 'ERROR: ' . $e->getMessage();
	}

?>