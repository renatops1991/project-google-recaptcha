<?php
/**
 * Arquivo de envio de verificação utilizando a classe do GoogleRecaptcha
 */

/** chamada do autoload do composer */
require __DIR__ . '/../vendor/autoload.php';

/** @var  $postData
* Tratamento dos dados recebido via POST
 */
$postData = filter_input_array(INPUT_POST, FILTER_DEFAULT);

/** @var  $validate
 ** Chamada da classe com o metodo e enviando o campo requirido pelo o Google
 */
$validate = new \Source\Models\GoogleRecaptcha();
$validate->verifyRecaptcha($postData);