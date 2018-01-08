<?php
// Solicite o seu token para realizar as requisições com nossa equipe de suporte.
 $login = "Token_enviado_pelo_Suporte";
 $chave = "Chave_de_identificação_da_NFe";

// Para ambiente de Produção, utilize a URL: https://api.focusnfe.com.br  
 $server = "http://homologacao.acrasnfe.acras.com.br/";
 $ch = curl_init();
   curl_setopt($ch, CURLOPT_URL, $server."v2/nfes_recebidas/".$chave.".xml");
   curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
   curl_setopt($ch, CURLOPT_HTTPHEADER, array());

// Métodos para realizar a autenticação básica do HTTP.
// Não é necessário informar campo senha, apenas o campo login.   
   curl_setopt($ch, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
   curl_setopt($ch, CURLOPT_USERPWD, "$login");

 $body = curl_exec($ch);
 $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// Mostra na tela o HTTP Code da sua requisição.
   print($http_code);

// Converte os dados de XML para objeto, mostrando o retorno bruto.
   var_dump(simplexml_load_string($body));
   curl_close($ch);
?>