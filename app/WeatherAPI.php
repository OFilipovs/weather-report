<?php

namespace App;
class WeatherAPI
{
    private const TOKEN = '0eba44821e927c8c8087abfd831e6f98';
    private const UNITS = 'metric';
    private const LINK = "https://api.openweathermap.org/data/2.5/weather?";
    private string $apiLink;
    private string $json;
    private array $data;

    public function __construct(array $data)
    {

        $this->apiLink = self::LINK . "lat=" . $data["lat"] . "&lon=" . $data["lon"] . '&units=' . self::UNITS . '&type=accurate&mode=json&appid=' . self::TOKEN;
        $this->json = file_get_contents($this->apiLink);
        $this->data = json_decode($this->json, true);

    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getApiLink(): string
    {
        return $this->apiLink;
    }


}