<?php

// Você deve definir isso globalmente para sua aplicação.
// Para ambiente de produção use a variável abaixo:
// $server = "https://api.focusnfe.com.br";
$server = "http://homologacao.acrasnfe.acras.com.br";
$token = "token_enviado_pelo_suporte";
// Substituir pela sua identificação interna da nota.
$ref = "12345";

$nfce = array (
    "natureza_operacao" => "Venda ao Consumidor",
	"formas_pagamento" => array(
		array(
			"forma_pagamento"=> "1",
			"valor_pagamento"=> "1.00"
			)
		),
	"forma_pagamento" => "0", 
	"tipo_documento" => "1", 
	"consumidor_final" => "1", 
	"finalidade_emissao" => "1",
	"presenca_comprador" => "1",
	"cnpj_emitente" => "51916585000125",
	"cpf_destinatario" => "51966818092",
	"nome_destinatario" => "NF-E EMITIDA EM AMBIENTE DE HOMOLOGACAO - SEM VALOR FISCAL",
	"items"=> array(
		array(
			"numero_item"=> "1",
			"codigo_produto"=> "293656",
			"descricao"=> "NOTA FISCAL EMITIDA EM AMBIENTE DE HOMOLOGACAO - SEM VALOR FISCAL",
			"codigo_ncm"=> "39269090",
			"cfop"=> "5101",
			"unidade_comercial"=> "PC",
			"valor_unitario_comercial"=> "1.00",
			"valor_bruto"=> "1.00",
			"unidade_tributavel"=> "PC",
			"quantidade_tributavel"=> "1.00",
			"quantidade_comercial"=> "1.00",
			"valor_unitario_tributavel"=> "1.00",
			"icms_origem"=> "0",
			"icms_situacao_tributaria"=> "102"
			)
		),
	"valor_produtos" => "1.00",
	"valor_total" => "1.00",
	"data_emissao" => "2017-07-25T17:28:22-03:00",
	"modalidade_frete" => "9"
);

// Transforma a váriavel em objeto JSON.
$json = json_encode($nfce); 

// Montamos a URL com os parametros globais e adicionamos o arquivo JSON a requisição.
$parametros = new http\QueryString("token=".$token."&ref=".$ref); 
$request = new http\Client\Request("POST", $server."/nfce.json");
$request -> setQuery($parametros); 
$request -> getBody()->append($json); 

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
