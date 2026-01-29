<?php

namespace Psat;

use Cache;
use Carbon\Carbon;

class Fixerio implements CurrenciesApi  {

    protected $apiClient;
    protected $apiKey;
    protected $baseUrl = 'https://data.fixer.io/api/';

    public function __construct(\GuzzleHttp\Client $guzzle, $apiKey = null) {
        $this->apiClient = $guzzle;
        $this->apiKey = $apiKey ?: env('FIXER_API_KEY', '');
    }

    public function getCurrencies() {
        $data = $this->collectDataCurrency();
        if ($data === null) {
            return [];
        }
        return $this->castToArray($data);  
    }


    private function collectDataCurrency() {
        $cacheKey = 'currenciesFor' . date('Y-m-d');
        if (Cache::has($cacheKey)) {
             return Cache::get($cacheKey);
        }

        $url = $this->baseUrl . 'latest?' . http_build_query([
            'access_key' => $this->apiKey
        ]);

        $result = $this->apiClient->request('GET', $url);
        $response = json_decode($result->getBody());

        if (!isset($response->success) || !$response->success) {
            return null;
        }

        $expiresAt = Carbon::now()->addMinutes(4600);
        Cache::put($cacheKey, $response, $expiresAt);

        return $response;
    }

    /**
     * @param $response
     * @return array
     */
    private function castToArray($response)
    {
        $currencies = get_object_vars($response->rates);
        $currencies[$response->base] = 1;
        ksort($currencies);

        foreach($currencies as $key => $value) {
            $currencies[$key] = $key;
        }
        return $currencies;
    }

    public function convertCurrencies( $baseCurrency ,$quantityCurrecny , $calculateCurrency )
    {
        $url = $this->baseUrl . 'latest?' . http_build_query([
            'access_key' => $this->apiKey,
            'base' => $baseCurrency,
            'symbols' => $calculateCurrency
        ]);

        $result = $this->apiClient->request('GET', $url);
        $response = json_decode($result->getBody());
        
        if (!isset($response->success) || !$response->success) {
            return null;
        }
        
        $equal = get_object_vars($response->rates)[$calculateCurrency] * $quantityCurrecny;
       
        return $equal;
    }

}
