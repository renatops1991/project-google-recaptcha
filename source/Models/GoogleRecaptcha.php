<?php

namespace Source\Models;

/**
 *  Class GoogleRecaptcha
 * @package Source\Models
 */
class GoogleRecaptcha
{
    /** @var string */
    private $url;

    /** @var string */
    private $secret_key;

    /**
     * GoogleRecaptcha constructor.
     */
    public function __construct()
    {
        $this->url = 'https://www.google.com/recaptcha/api/siteverify';
        $this->secret_key = 'YOUR_SECRET_KEY';
    }

    /**
     * @param array $data
     *  Verifica se o reCaptcha é válido e disparado o método post
     */
    public function verifyRecaptcha(array $data)
    {
        if (!$data['g-recaptcha-response']) {
            $json['message'] = 'reCaptcha não validado!';
            echo json_encode($json);
            return;
        }

        $this->post($data['g-recaptcha-response']);
    }

    /**
     * @param string $response
     * @return bool|null
     * Faz a ligação com o servidor do google e retorna se a secret key é válido!
     */
    private function post(string $response): ?bool
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $this->url . '?secret=' . $this->secret_key . '&response=' . $response);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $validateCaptcha = json_decode(curl_exec($ch));
        curl_close($ch);

        if ($validateCaptcha->success === false) {
            $json['message'] = 'Não foi possivel válidar o reCaptcha';
            echo json_encode($json);
            return false;
        }

        unset($response);
        return true;
    }
}