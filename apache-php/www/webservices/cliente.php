 <?php
    include('lib/nusoap.php');
    $cliente = new nusoap_client('http://localhost/webservices/servidor.php?wsdl');
    
    $parametros = array('nome'=>'Fabio', 
                        'idade'=>21);

    $params = array('num1' => 1, 'num2' => 2);
    
    # $resultado = $cliente->call('somar', $parametros);
	$resultado = $cliente->call('somar', $params);
    
    echo utf8_encode($resultado);
 ?>
