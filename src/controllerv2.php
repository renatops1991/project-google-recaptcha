<?php
/**
 * Arquivo de envio de verificação direta do reCaptcha do Google
 */

$postData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

if(!$postData['g-recaptcha-response']){
    $json['message'] = 'reCaptcha não validado!';
    echo json_encode($json);
}

$url = 'https://www.google.com/recaptcha/api/siteverify?secret=YOUR_SECRET_KEY&response=' . $postData['g-recaptcha-response'];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

$validateRecaptcha = json_decode(curl_exec($ch));
curl_close($ch);

if($validateRecaptcha->success === false){
    $json['message'] = 'Não foi possivel válidar o reCaptcha';
    echo json_encode($json);
}else{
    $json['message'] = 'Dados enviados com sucesso!';
    echo json_encode($json);
}


unset($postData['g-recaptcha-response']);