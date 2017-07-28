<?php
$ch = curl_init();
$token = "insira seu token aqui"; //Substituir pelo token enviado pelo suporte
$ref   = "insira sua referencia aqui"; //Substituir pela sua identificação interna da nota
$server = "http://homologacao.acrasnfe.acras.com.br";
$justificativa = "Teste de cancelamento de nota";
curl_setopt($ch, CURLOPT_URL, $server . "/nfse/" . $ref . "?token=" . $token . "&justificativa=" $justificativa);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
$body = curl_exec($ch);
$result = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//as três linhas abaixo imprimem as informações retornadas pela API, aqui o seu sistema deverá 
//interpretar e lidar com o retorno
print("STATUS: ".$result."\n");
print("BODY: ".$body."\n\n");
print("");
curl_close($ch);
?>
