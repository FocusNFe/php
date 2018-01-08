<?php
// Você deve definir isso globalmente para sua aplicação
// Para ambiente de produção use a variável abaixo:
// $server = "http://producao.acrasnfe.acras.com.br";
$server = "http://homologacao.acrasnfe.acras.com.br";
// Substituir pela sua identificação interna da nota
$ref = "12345";
$login = "token_enviado_pelo_suporte";
$password = "";
$nfe = array (
  "natureza_operacao" => "Remessa",
  "data_emissao" => "2017-11-30",
  "data_entrada_saida" => "2017-11-30",
  "tipo_documento" => "1",
  "finalidade_emissao" => "1",
  "cnpj_emitente" => "51916585000125",
  "nome_emitente" => "ACME LTDA",
  "nome_fantasia_emitente" => "ACME LTDA",
  "logradouro_emitente" => "R. Padre Natal Pigato",
  "numero_emitente" => "100",
  "bairro_emitente" => "Santa Felicidade",
  "municipio_emitente" => "Curitiba",
  "uf_emitente" => "PR",
  "cep_emitente" => "82320030",
  "inscricao_estadual_emitente" => "101942171617",
  "nome_destinatario" => "NF-E EMITIDA EM AMBIENTE DE HOMOLOGACAO - SEM VALOR FISCAL",
  "cpf_destinatario" => "51966818092",
  "telefone_destinatario" => "1196185555",
  "logradouro_destinatario" => "Rua S\u00e3o Janu\u00e1rio",
  "numero_destinatario" => "99",
  "bairro_destinatario" => "Crespo",
  "municipio_destinatario" => "Manaus",
  "uf_destinatario" => "AM",
  "pais_destinatario" => "Brasil",
  "cep_destinatario" => "69073178",
  "valor_frete" => "0.0",
  "valor_seguro" => "0",
  "valor_total" => "47.23",
  "valor_produtos" => "47.23",
  "modalidade_frete" => "0",
  "items" => array(
    array(
      "numero_item" => "1",
      "codigo_produto" => "1232",
      "descricao" => "Cartu00f5es de Visita",
      "cfop" => "6923",
      "unidade_comercial" => "un",
      "quantidade_comercial" => "100",
      "valor_unitario_comercial" => "0.4723",
      "valor_unitario_tributavel" => "0.4723",
      "unidade_tributavel" => "un",
      "codigo_ncm" => "49111090",
      "quantidade_tributavel" => "100",
      "valor_bruto" => "47.23",
      "icms_situacao_tributaria" => "400",
      "icms_origem" => "0",
      "pis_situacao_tributaria" => "07",
      "cofins_situacao_tributaria" => "07"
    )
  ),
);
// Inicia o processo de envio das informações usando o cURL
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $server."/v2/nfe?ref=" . $ref);
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

