
<?php
// Você deve definir isso globalmente para sua aplicação
//Substituir pela sua identificação interna da nota
$ref = "12345";
$login = "token_enviado_pelo_suporte";
$password = "";
// Para ambiente de produção use a variável abaixo:
// $server = "https://api.focusnfe.com.br";
$server = "https://homologacao.focusnfe.com.br"; // Servidor de homologação
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $server."/v2/nfe/" . $ref);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_HTTPHEADER, array());
curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
curl_setopt($ch, CURLOPT_USERPWD, "$login:$password");
$body = curl_exec($ch);
$http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
//as três linhas abaixo imprimem as informações retornadas pela API, aqui o seu sistema deverá
//interpretar e lidar com o retorno
print($http_code."\n");
print($body."\n\n");
print("");
curl_close($ch);
?>
