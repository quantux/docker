<?php
    include('lib/nusoap.php');
    $cliente = new nusoap_client('http://localhost/webservices/servidor.php?wsdl');
    
    $parametros = array('nome'=>'Fabio', 
                        'idade'=>21);
    
    $resultado = $cliente->call('cadastrar', $parametros);
    
    echo utf8_encode($resultado);
 ?>