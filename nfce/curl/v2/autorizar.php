<?php
// Você deve definir isso globalmente para sua aplicação
// Para ambiente de produção use a variável abaixo:
// $server = "https://api.focusnfe.com.br";
$server = "http://homologacao.acrasnfe.acras.com.br";
// Substituir pela sua identificação interna da nota
$ref = "12345";
$login = "token_enviado_pelo_suporte";
$password = "";
$nfe = array (
   "cnpj_emitente" => "51916585000125",
   "data_emissao" => "2017-12-07 12:40:10",
   "indicador_inscricao_estadual_destinatario" => "9",
   "modalidade_frete" => "9",
   "local_destino" => "1",
   "presenca_comprador" => "1",
   "natureza_operacao" => "VENDA AO CONSUMIDOR",
  "itens" => array(
    array(
      "numero_item" => "1",
         "codigo_ncm" => "62044200",
         "quantidade_comercial" => "1.00",
         "quantidade_tributavel" => "1.00",
         "cfop" => "5102",
         "valor_unitario_tributavel" => "79.00",
         "valor_unitario_comercial" => "79.00",
         "valor_desconto" => "0.00",
         "descricao" => "NOTA FISCAL EMITIDA EM AMBIENTE DE HOMOLOGACAO - SEM VALOR FISCAL",
         "codigo_produto" => "251887",
         "icms_origem" => "0",
         "icms_situacao_tributaria" => "102",
         "unidade_comercial" => "un",
         "unidade_tributavel" => "un",
         "valor_total_tributos" => "24.29"
    )
  ),
  "formas_pagamento" => array(
    array(
         "forma_pagamento" => "03",
         "valor_pagamento" => "79.00",
         "nome_credenciadora" => "Cielo",
         "bandeira_operadora" => "02",
         "numero_autorizacao" => "R07242"
     )
  ),
);
// Inicia o processo de envio das informações usando o cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $server."/v2/nfce?ref=" . $ref);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($nfe));
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
$body = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//as três linhas abaixo imprimem as informações retornadas pela API, aqui o seu sistema deverá
//interpretar e lidar com o retorno
print($http_code."\n");
print($body."\n\n");
print("");
curl_close($ch);
?>