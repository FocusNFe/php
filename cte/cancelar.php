<?php

$ch = curl_init();

// Substituir pela sua identificação interno do CTe.
$ref   = "12345";

// Para ambiente de produção use a variável abaixo:
// $server = "https://api.focusnfe.com.br";

$server = "https://homologacao.focusnfe.com.br";

$justificativa = array ("justificativa" => "A sua justificativa de cancelamento aqui.");

$login = "Token_enviado_pelo_suporte";
$password = "";

curl_setopt($ch, CURLOPT_URL, $server . "/v2/cte/" . $ref);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($justificativa));
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
$body = curl_exec($ch);
$result = curl_getinfo($ch, CURLINFO_HTTP_CODE);

//As três linhas abaixo imprimem as informações retornadas pela API, aqui o seu sistema devera interpretar e lidar com o retorno.
print($result."\n");
print($body."\n\n");
print("");
curl_close($ch);
?>
