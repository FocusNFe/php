<?php
// Você deve definir isso globalmente para sua aplicação
// Para ambiente de produção use a variável abaixo:
// $server = "https://api.focusnfe.com.br";
$server = "http://homologacao.acrasnfe.acras.com.br";
$token = "token_enviado_pelo_suporte";
//Substituir pela sua identificação interna da nota
$ref = "12345";
$justificativa = "Teste_de_cancelamento_de_nota";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $server . "/nfce/" . $ref . "?token=" . $token . "&justificativa=" . $justificativa);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_HTTPHEADER,     array());
$body = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//as três linhas abaixo imprimem as informações retornadas pela API, aqui o seu sistema deverá
//interpretar e lidar com o retorno
print($http_code"\n");
print($body."\n\n");
print("");
curl_close($ch);
?> 
