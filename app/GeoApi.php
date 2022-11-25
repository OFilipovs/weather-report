<?php

namespace App;

class GeoApi
{
    private const LINK = "https://api.openweathermap.org/geo/1.0/direct?q=;";
    private const TOKEN = "0eba44821e927c8c8087abfd831e6f98";
    private string $json;
    private string $cityName;
    private array $data;

    public function __construct(string $cityName)
    {
        $this->cityName = $cityName;
        $this->json = file_get_contents(self::LINK . $cityName . "&appid=" . self::TOKEN);
        $this->data = json_decode($this->json, true);
    }

    public function getCoordinates(): ?array{
        if(count($this->data) === 0){
            return ["lat" => 56.97, "lon" => 24.11];
        } else {
            return ["lat" => $this->data[0]["lat"], "lon" => $this->data[0]["lon"]];
        }
    }


}