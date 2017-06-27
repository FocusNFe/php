<?php

//Abaixo há a montagem do arquivo de envio, substituir pelos dados reais da nota
$data = <<<EOT
data_emissao: 2013-05-31T12:00:00-03:00
incentivador_cultural: false
natureza_operacao: "1"
optante_simples_nacional: false
prestador:
 cnpj: 20975609000193
 inscricao_municipal: 080204613599
 codigo_municipio: 4106902
servico:
 aliquota: 0.05
 base_calculo: 200.0
 discriminacao: "Servico de hospedagem de sites"
 iss_retido: "2"
 item_lista_servico: "801"
 valor_iss: 10.0
 valor_liquido: 200.0
 valor_servicos: 200.0
status: "1"
tomador:
 cpf: 03055054912
 endereco:
   bairro: Centro
   cep: "19900070"
   codigo_municipio: "4106902"
   logradouro: "Rua Nove de Julho"
   numero: "582"
   uf: SP
 razao_social: "Global Negocios e Publicidade Eireli"
EOT;

$token = "aaOqeu3poIWHM1VksU7EzVKPsai9RxGyM" //Substituir pelo token enviado pelo suporte
$ref   = 12345 //Substituir pela sua identificação interna da nota

$ch = curl_init();

curl_setopt($ch, CURLOPT_URL, "http://homologacao.acrasnfe.acras.com.br/nfse?token=".$token."&ref=" . $ref);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST,           1);
curl_setopt($ch, CURLOPT_POSTFIELDS,     $data);
curl_setopt($ch, CURLOPT_HTTPHEADER,     array('Content-Type: text/plain'));

$body = curl_exec($ch);
$result = curl_getinfo($ch, CURLINFO_HTTP_CODE);

//as três linhas abaixo imprimem as informações retornadas pela API, aqui o seu sistema deverá
//interpretar e lidar com o retorno
print("STATUS: ".$result."\n");
print("BODY: ".$body."\n\n");
print("");

curl_close($ch);

?>
