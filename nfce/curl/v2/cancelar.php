<?php
// Você deve definir isso globalmente para sua aplicação
$ch = curl_init();
// Substituir pela sua identificação interna da nota
$ref   = "12345";
// Para ambiente de produção use a variável abaixo:
// $server = "https://api.focusnfe.com.br";
$server = "https://homologacao.focusnfe.com.br";
$justificativa = array ("justificativa" => "Teste de cancelamento de nota");
$login = "token_enviado_pelo_suporte";
$password = "";
curl_setopt($ch, CURLOPT_URL, $server . "/v2/nfce/" . $ref);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($justificativa));
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
$body = curl_exec($ch);
$result = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//as três linhas abaixo imprimem as informações retornadas pela API, aqui o seu sistema deverá
//interpretar e lidar com o retorno
print($result."\n");
print($body."\n\n");
print("");
curl_close($ch);
?>
