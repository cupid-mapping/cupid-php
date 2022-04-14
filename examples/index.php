<?php
require "../vendor/autoload.php";


//use \App\Cupid;

$cupid = new App\Cupid('2a761826-75fd-484d-6508-37cc6abfc3e7');


$array = [
    [
        "address" => "123 main street",
        "country_code"=> "US",
        "hotel_code"=> "1256",
        "latitude"=> 36.18743350322336,
        "longitude"=> -115.15064193665704,
        "name"=> "hotel name"
    ]
];
$mapHotels = $cupid->mapHotels($array);
print_r($mapHotels);

?>