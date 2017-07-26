<?php

// Você deve definir isso globalmente para sua aplicação.
$server = "http://homologacao.acrasnfe.acras.com.br";
// URl de produção: http://producao.acrasnfe.acras.com.br
$token = "token_enviado_pelo_suporte";
$ref = "12345";

$justificativa = "Teste de justificativa";

// Montamos a URL com os parametros globais.
$parametros = new http\QueryString("token=".$token."&"."justificativa=".$justificativa); 
$request = new http\Client\Request("DELETE", $server."/nfse/".$ref); 
$request -> setQuery($parametros); 

// Recomendamos que veja os dados antes do envio e compare com os dados descritos em nossa documentação.
// print($request);

// Aqui fazemos o envio dos dados para API e pegamos os dados de retorno da API.
$client = new http\Client;
$client -> enqueue($request)->send(); 
$response = $client->getResponse($request); 

// Para ver apenas o http code de retorno e descrição.Exemplo: HTTP/1.1 200 OK
print ($response->getInfo()); 

// Para ver o retorno completo, remova a função getInfo().
// print ($response);

?>
