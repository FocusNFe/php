<?php

// Você deve definir isso globalmente para sua aplicação.
// Para ambiente de produção use a variável abaixo:
// $server = "https://api.focusnfe.com.br";
$server = "http://homologacao.acrasnfe.acras.com.br";
$token = "token_enviado_pelo_suporte";
// Substituir pela sua identificação interna da nota.
$ref = "12345";

// Montamos a URL com os parametros globais.
$parametros = new http\QueryString("token=".$token); 
$request = new http\Client\Request("GET", $server."/nfse/".$ref); 
$request -> setQuery($parametros); 

// Recomendamos que veja os dados antes do envio e compare com os dados descritos em nossa documentação.
// print($request);

// Aqui fazemos o envio dos dados para API e pegamos os dados de retorno da API.
$client = new http\Client;
$client -> enqueue($request)->send(); 
$resposta = $client->getResponse($request);

// Variáveis de retorno.
$status = $resposta->getResponseStatus();
$http_code = $resposta->getResponseCode();
$mensagem_retorno = $resposta->getBody();

print ($http_code." ".$status."<br />");

// Mostramos aqui a mensagem de retorno decodificada de JSON para objeto PHP.
var_dump (json_decode($mensagem_retorno));

?> 
