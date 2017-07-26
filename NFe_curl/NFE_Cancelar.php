<?php

$token = "Insira o seu token aqui"; //Substituir pelo token enviado pelo suporte
$ref = "Insira a sua referencia aqui"; //Substituir pela sua identificação interna da nota
// $server = "https://api.focusnfe.com.br/nfe2/"; // Servidor de produção
$server = "http://homologacao.acrasnfe.acras.com.br";
$justificativa = "Teste_de_Cancelamento_de_nota";
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $server. "/nfe2/cancelar?token=" . $token . "&ref=" . $ref . "&justificativa=" . $justificativa);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
$body = curl_exec($ch);
$result = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//as três linhas abaixo imprimem as informações retornadas pela API, aqui o seu sistema deverá 
//interpretar e lidar com o retorno
print("STATUS: ".$result."\n");
print("BODY: ".$body."\n\n");
print("");
curl_close($ch);
?>
