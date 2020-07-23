<?php

namespace Coingecko;

class Coingecko {
    protected const BASE_URL = 'https://api.coingecko.com/api/v3/';

    private $curl;

    public function __construct(){
        $this->curl = curl_init();
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curl, CURLOPT_HTTPHEADER, array(
            'Accept: application/json'
        ));
    }

    public function getCurrencyInfo(string $currency) {
        if($currency) {
            $url = self::BASE_URL.'/coins/'.$currency;
            curl_setopt($this->curl, CURLOPT_URL, $url);
            $result = curl_exec($this->curl);
            $answer_code = curl_getinfo($this->curl,CURLINFO_RESPONSE_CODE);

            switch($answer_code) {
                case 200:
                    return json_decode($result,true);
                break;
                default:
                    throw new Exception('Unknown currency');
            }
        } else {
            throw new Exception('Invalid currency');
        }
    }
}