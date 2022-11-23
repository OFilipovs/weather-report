<?php
//spl_autoload_register(function($className){
//    require_once __DIR__ . "/app/" . $className . ".php";
//});

require_once "vendor/autoload.php";
use App\{WeatherAPI, WeatherData, GeoApi};



$city = $_GET['city'] ?? "Riga";
$coordinates = new GeoApi($city);
$apiCall = new WeatherAPI($coordinates->getCoordinates());
$weatherData = new WeatherData($apiCall->getData());
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="styles/styles.css"/>
</head>
<body>

<div class="container">
    <div class="city">
        <form action="index.php" method="get">
            City name: <label>
                <input type="text" name="city">
            </label><br>

            <input type="submit">
        </form>
    </div>
    <div class="day day-one">
        <div class="cool">
            <p><span>Today</span></p>
        </div>
        <div class="weather-data">
            <h1><?= $weatherData->formatTemperature($weatherData->getCurrentTemp()) ?></h1>
    <p>Temperature</p>
    </div>
    <div class="weather-data">
        <h3><?= $weatherData->formatTemperature($weatherData->getMaxTemp()) ?></h3>
        <p>Max Temperature</p>
    </div>
    <div class="weather-data">
        <h3><?= $weatherData->formatTemperature($weatherData->getMinTemp()) ?></h3>
        <p>Min Temperature</p>
    </div>
    <div class="weather-data">
        <h3><?= $weatherData->formatTemperature($weatherData->getHumidity()) ?></h3>
        <p>Humidity</p>
    </div>
    </div>
    <div class="day day-two">
        <div class="cool">
            <p><span>Tomorrow</span></p>
        </div>
        <div class="weather-data">
            <h1>30</h1>
            <p>Temperature</p>
        </div>
        <div class="weather-data">
            <h3>30</h3>
            <p>Max Temperature</p>
        </div>
        <div class="weather-data">
            <h3>30</h3>
            <p>Min Temperature</p>
        </div>
        <div class="weather-data">
            <h3>30</h3>
            <p>Humidity</p>
        </div>
    </div>
    <div class="day day-three">
        <div class="cool">
            <p><span>After tomorrow</span></p>
        </div>
        <div class="weather-data">
            <h1>30</h1>
            <p>Temperature</p>
        </div>
        <div class="weather-data">
            <h3>30</h3>
            <p>Max Temperature</p>
        </div>
        <div class="weather-data">
            <h3>30</h3>
            <p>Min Temperature</p>
        </div>
        <div class="weather-data">
            <h3>30</h3>
            <p>Humidity</p>
        </div>
    </div>
    <div class="cities">
        <a href="/?city=Vilnius">Vilnius</a>
        <a href="/?city=Riga">Riga</a>
        <a href="/?city=Tallinn">Tallinn</a>
    </div>
</div>


</body>


</html>




<?php
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
?>






