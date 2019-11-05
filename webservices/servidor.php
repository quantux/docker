<?php
include('lib/nusoap.php');

    $servidor = new nusoap_server();
    $servidor->configureWSDL('urn:Servidor');
    $servidor->wsdl->schemaTargetNamespace = 'urn:Servidor';

    function somar($num1, $num2){
        return($num1 + $num2);
    }

     function cadastrar($nome, $idade) {
        return('O '. $nome . ' tem ' .$idade . ' de idade');
    }

    $servidor->register(
        'somar', array('num1'=>'xsd:int',
                       'num2'=>'xsd:int'),
        array('retorno'=>'xsd:int'),
        'urn:Servidor.somar',
        'urn:Servidor.somar',
        'rpc',
        'encoded',
        'Apenas um exemplo utilizando o NuSOAP PHP.'
    );

    $servidor->register(
        'cadastrar', array('nome'=>'xsd:string',
                       'idade'=>'xsd:int'),
        array('retorno'=>'xsd:string'),
        'urn:Servidor.cadastrar',
        'urn:Servidor.cadastrar',
        'rpc',
        'encoded',
        'Apenas um exemplo utilizando o NuSOAP PHP.'
    );


     $HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) 
     ? $HTTP_RAW_POST_DATA 
     : file_get_contents("php://input");

     $servidor->service($HTTP_RAW_POST_DATA);
 ?>
