<?php
$ch = curl_init();
$token = "Insira seu token aqui"; //Substituir pelo token enviado pelo suporte
$ref   = "Insira sua referencia aqui"; //Substituir pela sua identificação interna da nota
curl_setopt($ch, CURLOPT_URL, "http://homologacao.acrasnfe.acras.com.br/nfse/" . $ref . "?token=" . $token);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$body = curl_exec($ch);
$result = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//as três linhas abaixo imprimem as informações retornadas pela API, aqui o seu sistema deverá
//interpretar e lidar com o retorno
print("STATUS: ".$result."\n");
print("BODY: ".$body."\n\n");
print("");
curl_close($ch);
?>
