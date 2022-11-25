<?php
namespace App\Controllers;
use App\{WeatherAPI, WeatherData, GeoApi};

class WeatherController
{
    public function index(){
        $city = $_GET['city'] ?? "Riga";
        $coordinates = new GeoApi($city);
        $apiCall = new WeatherAPI($coordinates->getCoordinates());
        $weatherData = new WeatherData($apiCall->getData());
        require "views/index.view.php";
    }
}
