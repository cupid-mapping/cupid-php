<?php 
namespace App;

use GuzzleHttp\Psr7;

class Cupid {
    const URL = "https://api.cupid.travel/api";
    private $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function uploadInventory(
        string $file,
        string $name,
        int $header_id,
        int $header_name,
        int $header_address,
        int $header_city,
        int $header_country_code,
        int $header_latitude,
        int $header_longitude
    ){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', self::URL . '/inventories/upload', [
            'headers' => [
                'Accept'    => 'application/json',
                'x-api-key' => $this->apiKey
            ],
            'multipart' => [
                [
                    'name'     => 'name',
                    'contents' => $name,
                ],
                [
                    'name'     => 'header_id',
                    'contents' => $header_id,
                ],
                [
                    'name'     => 'header_name',
                    'contents' => $header_name,
                ],
                [
                    'name'     => 'header_address',
                    'contents' => $header_address,
                ],
                [
                    'name'     => 'header_city',
                    'contents' => $header_city,
                ],
                [
                    'name'     => 'header_country_code',
                    'contents' => $header_country_code,
                ],
                [
                    'name'     => 'header_latitude',
                    'contents' => $header_latitude,
                ],
                [  'name'     => 'header_longitude',
                    'contents' => $header_longitude,
                ],
                [
                    'name'     => 'file',
                    'contents' => file_get_contents($file),
                    'filename' => $file
                ],
            ]
        ]);


       return json_decode($response->getBody());
    }
    
    public function listInventories(){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', self::URL . '/inventories', [
            'headers' => [
                'Accept'    => 'application/json',
                'x-api-key' => $this->apiKey
            ]
        ]);


       return json_decode($response->getBody());
    }

    public function inventoryDetails($inventoryId){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', self::URL . '/inventories/'.$inventoryId, [
            'headers' => [
                'Accept'    => 'application/json',
                'x-api-key' => $this->apiKey
            ]
        ]);


       return json_decode($response->getBody());
    }

    public function mapHotels(array $data){
        $client = new \GuzzleHttp\Client();
        $response = $client->request('POST', self::URL . '/map-hotels', [
            'headers' => [
                'Accept'    => 'application/json',
                'x-api-key' => $this->apiKey
            ],
            'json' => $data
        ]);


       return json_decode($response->getBody());
    }
}