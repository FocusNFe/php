<?php
// Você deve definir isso globalmente para sua aplicação
// Para ambiente de produção use a variável abaixo:
// $server = "https://api.focusnfe.com.br";
$server = "http://homologacao.acrasnfe.acras.com.br";
$token = "token_enviado_pelo_suporte"
//Substituir pela sua identificação interna da nota
$ref   = "12345";
$nfse = array (
	"data_emissao" => "2017-07-24T13:30:00-03:00",
	"incentivador_cultural" => "false",
	"natureza_operacao" => "1",
	"optante_simples_nacional" => "false",
	"status" => "1",
	"prestador" => array (
		"cnpj" => "51916585000125",
		"inscricao_municipal" => "777777",
		"codigo_municipio" => "4106902"
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
		"cpf" => "51966818092",
		"razao_social" => "ACME LTDA",
		"endereco" => array (
			"bairro" => "Centro",
			"cep" => "19900070",
			"codigo_municipio" => "4106902",
			"logradouro" => "Rua Nove de Julho",
			"numero" => "582",
			"uf" => "SP"
		),
	),
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $server . "/nfse" . "?ref=" . $ref . "&token=" . $token);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST,           1);
curl_setopt($ch, CURLOPT_POSTFIELDS,     $nfse);
$http_code = curl_exec($ch);
$result = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//as três linhas abaixo imprimem as informações retornadas pela API, aqui o seu sistema deverá
//interpretar e lidar com o retorno
print($http_code."\n");
print($body."\n\n");
print("");
curl_close($ch);
?>
