<?php
// Solicite o seu token para realizar as requisições com nossa equipe de suporte.
 $login = "Token_enviado_pelo_Suporte";
 $chave = "Chave_de_identificação_da_NFe";

//Aqui enviamos o tipo de manifestação que desejamos realizar.
//Consulte nossa documentação, para conhecer os demais tipos possíveis: https://goo.gl/a9o7hm
 $tipo = array("tipo" => "confirmacao");

// Para ambiente de Produção, utilize a URL: https://api.focusnfe.com.br  
 $server = "http://homologacao.acrasnfe.acras.com.br/";

 $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $server."v2/nfes_recebidas/".$chave."/manifesto");
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_POST, json_encode($tipo));
   
// Métodos para realizar a autenticação básica do HTTP.
// Não é necessário informar campo senha, apenas o campo login. 
   curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
   curl_setopt($ch, CURLOPT_USERPWD, "$login");

 $body = curl_exec($ch);
 $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// Mostra na tela o HTTP Code da sua requisição.
   print($http_code);

// Mostra na tela a mensagem de retorno da API.   
   print($body);
   curl_close($ch);
?>