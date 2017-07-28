<?php
$ch = curl_init();
$token = "Insira o seu token aqui"; //Substituir pelo token enviado pelo suporte
$ref = "Insira a sua referencia aqui"; //Substituir pela sua identificação interna da nota
$justificativa = "Teste_de_cancelamento_de_nota";
$server = "http://homologacao.acrasnfe.acras.com.br";
curl_setopt($ch, CURLOPT_URL, $server . "/nfce/" . $ref . "?token=" . $token . "&justificativa=" . $justificativa);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_HTTPHEADER,     array());
$body = curl_exec($ch);
$result = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//as três linhas abaixo imprimem as informações retornadas pela API, aqui o seu sistema deverá 
//interpretar e lidar com o retorno
print("STATUS: ".$result."\n");
print("BODY: ".$body."\n\n");
print("");
curl_close($ch);
?>
