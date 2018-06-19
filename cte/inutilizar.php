<?php

// Para ambiente de produção use a variável abaixo:
// $server = "https://api.focusnfe.com.br";

$server = "http://homologacao.acrasnfe.acras.com.br";

$login = "Token_enviado_pelo_suporte";
$password = "";

$inutiliza = array (
  "cnpj" => "51916585000125",
  "serie" => "1",
  "numero_inicial" => "1",
  "numero_final" => "3",
  "justificativa" => "A sua justificativa de cancelamento aqui.",
  "modelo" => 67  
);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $server."/v2/cte/inutilizacao");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($inutiliza));
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

