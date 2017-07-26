<?php

// Você deve definir isso globalmente para sua aplicação.
$server = "http://homologacao.acrasnfe.acras.com.br";
// URl de produção: http://producao.acrasnfe.acras.com.br
$token = "token_enviado_pelo_suporte";
$ref = "12345";

$nfe = array (
            "natureza_operacao" => "Remessa de Produtos",
            "forma_pagamento" => "0",
            "data_emissao" => "2017-07-25T11:00:00-03:00",
            "tipo_documento" => "1",
            "finalidade_emissao" => "1",
            "cnpj_emitente" => "77623353000172",
            "nome_destinatario" => "NF-E EMITIDA EM AMBIENTE DE HOMOLOGACAO - SEM VALOR FISCAL",
            "cnpj_destinatario" => "10812933000137",
            "inscricao_estadual_destinatario" => "0752048400170",
            "telefone_destinatario" => "6132332933",
            "logradouro_destinatario" => "SMAS 6580 PARKSHOPPING",
            "numero_destinatario" => "134",
            "bairro_destinatario" => "Zona Industrial Guara",
            "municipio_destinatario" => "Brasilia",
            "uf_destinatario" => "DF",
            "pais_destinatario" => "Brasil",
            "cep_destinatario" => "71219900",
            "icms_base_calculo" => "0",
            "icms_valor_total" => "0",
            "icms_base_calculo_st" => "0",
            "icms_valor_total_st" => "0",
            "icms_modalidade_base_calculo" => "0",
            "icms_valor" => "0",
            "valor_frete" => "0.0000",
            "valor_seguro" => "0",
            "valor_total" => "2241.66",
            "valor_produtos" => "2241.66",
            "valor_ipi" => "0",
            "modalidade_frete" => "0",
            "informacoes_adicionais_contribuinte" => "Não Incidência ICMS conforme Decisão...",
            "nome_transportador" => "BRASPRESS TRANSPORTES URGENTES LTDA SP",
            "cnpj_transportador" => "48740351000165",
            "endereco_transportador" => "RUA CORONEL MARQUES RIBEIRO, 225",
            "municipio_transportador" => "SÃO PAULO",
            "uf_transportador" => "SP",
            "inscricao_estadual_transportador" => "116945108113",
            "items" => array(
                            array(
                                "numero_item" => "1",
                                "codigo_produto" => "9999999",
                                "descricao" => "Perfume Polo Black",
                                "cfop" => "6949",
                                "unidade_comercial" => "un",
                                "quantidade_comercial" => "5000",
                                "valor_unitario_comercial" => "0.448332",
                                "valor_unitario_tributavel" => "0.448332",
                                "unidade_tributavel" => "un",
                                "codigo_ncm" => "49111090",
                                "quantidade_tributavel" => "5000",
                                "valor_bruto" => "2241.66",
                                "icms_situacao_tributaria" => "102",
                                "icms_origem" => "0",
                                "pis_situacao_tributaria" => "07",
                                "cofins_situacao_tributaria" => "07",
                                "ipi_situacao_tributaria" => "53",
                                "ipi_codigo_enquadramento_legal" => "999"
                                )
                            ),
            "volumes" => array(
                              array(
                                  "quantidade" => "2",
                                  "especie" => "Volumes",
                                  //"marca" => "",
                                  //"numero" => "",
                                  "peso_bruto" => "36",
                                  "peso_liquido" => "36"
                                    )
                              ),
            "duplicatas" => array(
                              array(
                                   "numero" => "Pagamento a vista",
                                   "valor" => "2241.66"
                                   )
                                 )
            );
// Transforma a váriavel em objeto JSON.
$json = json_encode($nfe);

// Montamos a URL com os parametros globais e adicionamos o arquivo JSON a requisição.
$parametros = new http\QueryString("token=".$token."&ref=".$ref); 
$request = new http\Client\Request("POST", $server."/nfe2/autorizar"); 
$request -> setQuery($parametros); 
$request -> getBody()->append($json); 

// Recomendamos que veja os dados antes do envio e compare com os dados descritos em nossa documentação.
// print($request);

// Aqui fazemos o envio dos dados para API e pegamos os dados de retorno da API.
$client = new http\Client;
$client -> enqueue($request)->send(); 
$response = $client->getResponse($request); 

// Para ver apenas o http code de retorno e descrição.Exemplo: HTTP/1.1 200 OK
print ($response->getInfo()); 

// Para ver o retorno completo, remova a função getInfo().
// print ($response);
?>
