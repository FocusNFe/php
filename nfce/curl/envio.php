<?php
// Você deve definir isso globalmente para sua aplicação
// Para ambiente de produção use a variável abaixo:
// $server = "https://api.focusnfe.com.br";
$server = "http://homologacao.acrasnfe.acras.com.br";
$token = "token_enviado_pelo_suporte";
//Substituir pela sua identificação interna da nota
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
  "data_emissao" => "2017-07-25T13:28:22-03:00",
  "modalidade_frete" => "9"
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $server . "/nfce.json?token=" . $token . "&ref=" . $ref);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($nfce));
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type=> application/json'));
$body = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
print($http_code."\n");
print($body."\n\n");
print("");
$arr_body = json_decode($body, true);
curl_close($ch);
?>
