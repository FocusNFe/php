<?php
// Você deve definir isso globalmente para sua aplicação
$token = "token_enviado_pelo_suporte";
//Substituir pela sua identificação interna da nota
$ref = "12345";
// Para ambiente de produção use a variável abaixo:
// $server = "https://api.focusnfe.com.br/nfe2/";
$server = "http://homologacao.acrasnfe.acras.com.br";
$justificativa = "Teste_de_Cancelamento_de_nota";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $server. "/nfe2/cancelar?token=" . $token . "&ref=" . $ref . "&justificativa=" . $justificativa);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
$body = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//as três linhas abaixo imprimem as informações retornadas pela API, aqui o seu sistema deverá
//interpretar e lidar com o retorno
print($http_code."\n");
print($body."\n\n");
print("");
curl_close($ch);
?>
