<?php

// Você deve definir isso globalmente para sua aplicação.
$server = "http://homologacao.acrasnfe.acras.com.br";
// URl de produção: http://producao.acrasnfe.acras.com.br
$token = "token_enviado_pelo_suporte";
$ref = "12345";

$nfse = array (
  "data_emissao" => "2017-07-25T15:10:00-03:00",
  "incentivador_cultural" => "false",
  "natureza_operacao" => "1",
  "optante_simples_nacional" => "false",
  "status" => "1",
  "prestador" => array (
    "cnpj" => "13140705000156",
    "inscricao_municipal" => "184441",
    "codigo_municipio" => "3518800"
    ),
  "servico" => array (
     "aliquota" => "0.05",
     "base_calculo" => "200.0",
     "discriminacao" => "Servico de hospedagem de sites",
     "iss_retido" => "2",
     "item_lista_servico" => "801",
     "valor_iss" => "10.0",
     "valor_liquido" => "200.0",
     "valor_servicos" => "200.0"
    ),
  "tomador" => array (
    "cpf" => "06270388795",
    "razao_social" => "Global Negocios e Publicidade Eireli",
    "endereco" => array (
       "bairro" => "Centro",
       "cep" => "07040010",
       "codigo_municipio" => "3518800",
       "logradouro" => "Rua Nove de Julho",
       "numero" => "582",
       "uf" => "SP"
       ),
    )
  );

// Transforma a váriavel em objeto JSON.
$json = json_encode($nfse);

// Montamos a URL com os parametros globais e adicionamos o arquivo JSON a requisição.
$paramentros = new http\QueryString("token=".$token."&ref=".$ref); 
$request = new http\Client\Request("POST", $server."/nfse"); 
$request -> setQuery($paramentros); 
$request -> getBody()->append($json); 

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
