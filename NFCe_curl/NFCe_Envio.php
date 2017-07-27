<?PHP
$data = array (
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
	"cnpj_emitente" => "Insira o seu cnpj aqui", 
	"cpf_destinatario" => "13635069434", 
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
	"data_emissao" => "2017-07-25T13:28:22-03:00",
	"modalidade_frete" => "9"
    );
$URL = "http://homologacao.acrasnfe.acras.com.br";
$TOKEN = "Insira o seu token aqui";
$ref = "Insira a sua referencia aqui";					
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $URL . "/nfce.json?token=" . $TOKEN . "&ref=" . $ref); 
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1); 
curl_setopt($ch, CURLOPT_POST, 1); 
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); 
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type=> application/json'));
$body = curl_exec($ch); 
$result = curl_getinfo($ch, CURLINFO_HTTP_CODE);
print("STATUS: ".$result."\n");
print("BODY: ".$body."\n\n");
print("");
$arr_body = json_decode($body, true);
curl_close($ch);
?> 
