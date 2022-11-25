<?php


use App\WeatherData;

/** @var WeatherData $weatherData */

?>

<!doctype html>
<html lang="en">
<head>
    <base href="http://localhost:8000/index.php/?=Riga">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="../styles/styles.css"/>
</head>
<body>

<div class="container">
    <div class="city">
        <div>
            <a href="/?city=Vilnius">Vilnius</a>
            <a href="/?city=Riga">Riga</a>
            <a href="/?city=Tallinn">Tallinn</a>
        </div>
        <form action="/" method="get">
            <label>
                <input placeholder="City name" type="text" name="city" class"input-field">
            </label><br>

            <input type="submit">
        </form>
        <div><span>Weather in <?= $weatherData->getCity() ?></span></div>
    </div>
    <div class="day day-one">
        <div class="cool">
            <p><span>Today</span></p>
        </div>
        <div class="weather-data">
            <h1>
                <?=
                $weatherData->formatTemperature($weatherData->getCurrentTemp())
                ?>
            </h1>
            <p>Temperature</p>
            <h3>
                <?=
                $weatherData->formatTemperature($weatherData->getMaxTemp())
                ?>
            </h3>
            <p>Max Temperature</p>
            <h3>
                <?=
                $weatherData->formatTemperature($weatherData->getMinTemp())
                ?>
            </h3>
            <p>Min Temperature</p>
            <h3>
                <?=
                $weatherData->formatTemperature($weatherData->getHumidity())
                ?>
            </h3>
            <p>Humidity</p>
        </div>
    </div>
</div>


</body>


</html>
