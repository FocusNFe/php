<?php
// Você deve definir isso globalmente para sua aplicação
$ch = curl_init();
$token = "token_enviado_pelo_suporte";
// Substituir pela sua identificação interna da nota
$ref   = "12345";
// Para ambiente de produção use a variável abaixo:
// $server = "https://api.focusnfe.com.br";
$server = "http://homologacao.acrasnfe.acras.com.br";
curl_setopt($ch, CURLOPT_URL, $server . "/nfse/" . $ref . "?token=" . $token);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$body = curl_exec($ch);
$result = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//as três linhas abaixo imprimem as informações retornadas pela API, aqui o seu sistema deverá
//interpretar e lidar com o retorno
print($result."\n");
print($body."\n\n");
print("");
curl_close($ch);
?>
