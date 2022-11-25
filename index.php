<?php

require_once "vendor/autoload.php";

//$json = file_get_contents("https://api.openweathermap.org/data/2.5/weather?lat=56.97&lon=24.11&appid=0eba44821e927c8c8087abfd831e6f98");
//$data = json_decode($json, true);

$dispatcher = FastRoute\simpleDispatcher(function(FastRoute\RouteCollector $routes) {
    $routes->addRoute('GET', '/', ['App\Controllers\WeatherController', 'index']);
});

// Fetch method and URI from somewhere
$httpMethod = $_SERVER['REQUEST_METHOD'];
$uri = $_SERVER['REQUEST_URI'];

// Strip query string (?foo=bar) and decode URI
if (false !== $pos = strpos($uri, '?')) {
    $uri = substr($uri, 0, $pos);
}
$uri = rawurldecode($uri);

$routeInfo = $dispatcher->dispatch($httpMethod, $uri);
switch ($routeInfo[0]) {
    case FastRoute\Dispatcher::NOT_FOUND:
        // ... 404 Not Found
        break;
    case FastRoute\Dispatcher::METHOD_NOT_ALLOWED:
        $allowedMethods = $routeInfo[1];
        // ... 405 Method Not Allowed
        break;
    case FastRoute\Dispatcher::FOUND:
        $handler = $routeInfo[1];
        $vars = $routeInfo[2];

        [$controller, $method] = $handler;
        (new $controller)->{$method}();
        break;
}






//while (true) {
//
//    foreach ($menu as $key => $value) {
//        echo "<h1>" . $key . " - " . $value . "</h1>";
//    }
//
//    echo PHP_EOL;
//
//    $userInput = (int)readline("Your choice (0 - 1): ");
//
//    switch ($userInput) {
//        case 0:
//            echo PHP_EOL;
//            $apiCall = new WeatherAPI(readline("Enter city:"), readline("Enter country code:"));
//
//            echo PHP_EOL;
//
//            if ($apiCall->errorHandlingFromApi()) {
//                $weatherData = new WeatherData($apiCall->getData());
//                foreach ($weatherData->groupData() as $key => $value) {
//                    echo $key . ': ' . $value . PHP_EOL;
//                }
//
//            } else {
//                echo 'Wrong city or / and country, try again.' . PHP_EOL;
//
//            }
//
//            echo PHP_EOL;
//            break;
//
//
//        case 1:
//            exit;
//    }
//}


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
//
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
//
//temperature
//echo $data['main']['temp'];







