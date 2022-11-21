<?php

namespace App;
class WeatherAPI
{
    private const TOKEN = '0eba44821e927c8c8087abfd831e6f98';
    private const UNITS = 'metric';
    private string $city;
    private string $country;
    private string $apiLink;
    private string $json;
    private array $data;

    /**
     * @param string $city
     * @param string $country
     */
    public function __construct(string $city, string $country)
    {
        $this->city = $city;
        $this->country = $country;
        $this->apiLink = 'http://api.openweathermap.org/data/2.5/find?q=' . $this->city . ',' . $this->country . '&units=' . self::UNITS . '&type=accurate&mode=json&appid=' . self::TOKEN;
        $this->json = file_get_contents($this->apiLink);
        $this->data = json_decode($this->json, true);

    }

    /**
     * @param string $apiLink
     */
    public function setApiLink(): void
    {
        $this->apiLink = 'http://api.openweathermap.org/data/2.5/find?q=' . $this->city . ',' . $this->country . '&units=' . self::UNITS . '&type=accurate&mode=json&appid=' . self::TOKEN;

    }

    public function getData(): array
    {
        return $this->data;
    }

    public function getApiLink(): string
    {
        return $this->apiLink;
    }

    public function errorHandlingFromApi()
    {
        return $this->data['count'] > 0;
    }

}