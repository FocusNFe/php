<?php

// Para ambiente de produção use a variável abaixo:
// $server = "https://api.focusnfe.com.br";

$server = "http://homologacao.acrasnfe.acras.com.br";

// Substituir pela sua identificação interno do CTe.
$ref = "12345";

$login = "Token_enviado_pelo_suporte";
$password = "";

$correcao = array (
  "campo_corrigido" => "uf_inicio",
  "valor_corrigido" => "PR"
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $server . "/v2/cte/" . $ref  . "/carta_correcao");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($correcao));
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
$body = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

//As três linhas abaixo imprimem as informações retornadas pela API, aqui o seu sistema devera interpretar e lidar com o retorno.
print($http_code."\n");
print($body."\n\n");
print("");
curl_close($ch);
?>