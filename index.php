<?php
//spl_autoload_register(function($className){
//    require_once __DIR__ . "/app/" . $className . ".php";
//});

require_once "app/WeatherData.php";
require_once "app/WeatherAPI.php";

use App\{WeatherAPI, WeatherData};

$menu = ['Get current weather', 'Exit'];

while (true) {

    foreach ($menu as $key => $value) {
        echo $key . ' - ' . $value . PHP_EOL;
    }

    echo PHP_EOL;

    $userInput = (int)readline("Your choice (0 - 1): ");

    switch ($userInput) {
        case 0:
            echo PHP_EOL;
            $apiCall = new WeatherAPI(readline("Enter city:"), readline("Enter country code:"));

            echo PHP_EOL;

            if ($apiCall->errorHandlingFromApi()) {
                $weatherData = new WeatherData($apiCall->getData());
                foreach ($weatherData->groupData() as $key => $value) {
                    echo $key . ': ' . $value . PHP_EOL;
                }

            } else {
                echo 'Wrong city or / and country, try again.' . PHP_EOL;

            }

            echo PHP_EOL;
            break;


        case 1:
            exit;
    }
}

// ? is json a string type? use set or constructor? switch statement evaluates wrong input as true
// pieslegt API
// pilsētas izvēle
// php get data from API
// generate API keys, primitivi ielikt php faila
// Units janomaina default no kelvin uz metric
// clouds? high and low t, current t, wind , humidity , feels like?
//get JSON

//$apiCall = new WeatherAPI("Riga", "LV");
//$apiCall->setApiLink();

//$weatherData = new WeatherData($apiCall->getApiLink());

//foreach ($weatherData->groupData() as $key => $value){
//    echo $key . ': ' . $value . PHP_EOL;
//}
//echo $data['list'][0]['main']['feels_like'] . PHP_EOL;
//echo $data['list'][0]['main']['temp_min'] . PHP_EOL;
//echo $data['list'][0]['main']['temp_max'] . PHP_EOL;
//echo $data['list'][0]['main']['humidity'] . PHP_EOL;
//echo $data['list'][0]['wind']['speed'] . PHP_EOL;
//echo $data['list'][0]['weather'][0]['description'] . PHP_EOL;

//temperature
//echo $data['main']['temp'];

