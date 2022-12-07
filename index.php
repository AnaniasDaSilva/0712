<?php


// criação de token jwt (que será reutilizado no futuro)

function base64UrlEncode($data){
    return str_replace(['+','/','='],['-','-',''], base64_Encode($data));
}   

//cabeçalho
$header = base64UrlEncode('{"alg":"HS256" , "typ": "jwt"}');
//variavel que armazenará dados do usuario (login,senha,chave pix)
$payload = base64UrlEncode(
    '{
       "sub":"'.md5(time()).'",
      "name": "AnaniasDaSilva",
      "iat": '.time().'
    }'
    );
    //ASSINATURA
    $signature = base64UrlEncode(
        hash_hmac('sha256', $header.'.' .$payload, 'confirma', true)

    );

    echo $header.'.'.$payload.'.'.$signature;


?>