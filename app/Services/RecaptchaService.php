<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Http;

class RecaptchaService {

    protected $client = null;

    public function __construct() {
        $this->client = new Client();
    }

    public function validate($response = null) {

        $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
            'secret' => config('captcha.secret_key'),
            'response' => $response,
        ]);

        return json_decode($response->getBody(), true);
    }

}