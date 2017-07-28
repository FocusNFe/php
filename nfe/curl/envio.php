<?php
// Você deve definir isso globalmente para sua aplicação
// Para ambiente de produção use a variável abaixo:
// $server = "http://producao.acrasnfe.acras.com.br";
$server = "http://homologacao.acrasnfe.acras.com.br";
$token= "token_enviado_pelo_suporte";
// Substituir pela sua identificação interna da nota
$ref = "12345";
$nfe = array (
  "natureza_operacao" => "Remessa de Produtos",
  "forma_pagamento" => "0",
  "data_emissao" => "2017-07-26T13:55:00-03:00",
  "tipo_documento" => "1",
  "finalidade_emissao" => "1",
  "cnpj_emitente" => "51916585000125",
  "nome_destinatario" => "NF-E EMITIDA EM AMBIENTE DE HOMOLOGACAO - SEM VALOR FISCAL",
  "cnpj_destinatario" => "10812933000137",
  "inscricao_estadual_destinatario" => "0752048400170",
  "telefone_destinatario" => "6132332933",
  "logradouro_destinatario" => "SMAS 6580 PARKSHOPPING",
  "numero_destinatario" => "134",
  "bairro_destinatario" => "Zona Industrial Guara",
  "municipio_destinatario" => "Brasilia",
  "uf_destinatario" => "DF",
  "pais_destinatario" => "Brasil",
  "cep_destinatario" => "71219900",
  "icms_base_calculo" => "0",
  "icms_valor_total" => "0",
  "icms_base_calculo_st" => "0",
  "icms_valor_total_st" => "0",
  "icms_modalidade_base_calculo" => "0",
  "icms_valor" => "0",
  "valor_frete" => "0.0000",
  "valor_seguro" => "0",
  "valor_total" => "2241.66",
  "valor_produtos" => "2241.66",
  "valor_ipi" => "0",
  "modalidade_frete" => "0",
  "informacoes_adicionais_contribuinte" => "Não Incidência ICMS conforme Decisão...",
  "nome_transportador" => "BRASPRESS TRANSPORTES URGENTES LTDA SP",
  "cnpj_transportador" => "48740351000165",
  "endereco_transportador" => "RUA CORONEL MARQUES RIBEIRO, 225",
  "municipio_transportador" => "SÃO PAULO",
  "uf_transportador" => "SP",
  "inscricao_estadual_transportador" => "116945108113",
  "items" => array(
    array(
      "numero_item" => "1",
      "codigo_produto" => "9999999",
      "descricao" => "Perfume Polo Black",
      "cfop" => "6949",
      "unidade_comercial" => "un",
      "quantidade_comercial" => "5000",
      "valor_unitario_comercial" => "0.448332",
      "valor_unitario_tributavel" => "0.448332",
      "unidade_tributavel" => "un",
      "codigo_ncm" => "49111090",
      "quantidade_tributavel" => "5000",
      "valor_bruto" => "2241.66",
      "icms_situacao_tributaria" => "102",
      "icms_origem" => "0",
      "pis_situacao_tributaria" => "07",
      "cofins_situacao_tributaria" => "07",
      "ipi_situacao_tributaria" => "53",
      "ipi_codigo_enquadramento_legal" => "999"
    )
  ),
  "volumes" => array(
    array(
      "quantidade" => "2",
      "especie" => "Volumes",
      "peso_bruto" => "36",
      "peso_liquido" => "36"
    )
  ),
  "duplicatas" => array(
    array(
      "numero" => "Pagamento a vista",
      "valor" => "2241.66"
    )
  ),
);

$ch = curl_init(); // Inicia o processo de envio das informações usando o cURL
curl_setopt($ch, CURLOPT_URL, $server."/nfe2/autorizar.json?ref=" . $ref . "&token=" . $token);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($nfe));
$body = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//as três linhas abaixo imprimem as informações retornadas pela API, aqui o seu sistema deverá
//interpretar e lidar com o retorno
print($http_code."\n");
print($body."\n\n");
print("");
curl_close($ch);
?>
