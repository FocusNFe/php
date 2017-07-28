<?php
// Você deve definir isso globalmente para sua aplicação
$TOKEN = "Insira o seu token aqui";
$ref = "Insira a sua referencia aqui"; //Substituir pela sua identificação interna da nota
$SERVER = "http://homologacao.acrasnfe.acras.com.br"; // Servidor de homologação
//$SERVER = "http://producao.acrasnfe.acras.com.br"; // Servidor de produção
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $SERVER."/nfe2/consultar.json?ref=" . $ref . "&token=" . $TOKEN);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array()); 
$body = curl_exec($ch);
$result = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//as três linhas abaixo imprimem as informações retornadas pela API, aqui o seu sistema deverá 
//interpretar e lidar com o retorno
print("STATUS: ".$result."\n");
print("BODY: ".$body."\n\n");
print("");
curl_close($ch);
?>
