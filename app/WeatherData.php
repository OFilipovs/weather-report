<?php

namespace App;
class WeatherData
{
    private array $data;
    private string $currentTemp;
    private string $maxTemp;
    private string $minTemp;
    private string $feelsLike;
    private string $humidity;
    private string $windSpeed;
    private string $clouds;


    public function __construct(array $dataFromApi)
    {

        $this->data = $dataFromApi;
        $this->currentTemp = $this->data['list'][0]['main']['temp'];
        $this->maxTemp = $this->data['list'][0]['main']['temp_max'];;
        $this->minTemp = $this->data['list'][0]['main']['temp_min'];;
        $this->feelsLike = $this->data['list'][0]['main']['feels_like'];;
        $this->humidity = $this->data['list'][0]['main']['humidity'];;
        $this->windSpeed = $this->data['list'][0]['wind']['speed'];
        $this->clouds = $this->data['list'][0]['weather'][0]['description'];
    }

    /**
     * @return string
     */
    public function getCurrentTemp(): string
    {
        return $this->currentTemp;
    }

    /**
     * @return string
     */
    public function getMaxTemp(): string
    {
        return $this->maxTemp;
    }

    /**
     * @return string
     */
    public function getMinTemp(): string
    {
        return $this->minTemp;
    }

    /**
     * @return string
     */
    public function getFeelsLike(): string
    {
        return $this->feelsLike;
    }

    /**
     * @return string
     */
    public function getJson(): string
    {
        return $this->json;
    }

    /**
     * @return string
     */
    public function getHumidity(): string
    {
        return $this->humidity;
    }

    /**
     * @return string
     */
    public function getWindSpeed(): string
    {
        return $this->windSpeed;
    }

    /**
     * @return string
     */
    public function getClouds(): string
    {
        return $this->clouds;
    }

    public function groupData(): array
    {
        return [
            'current temperature (℃)' => $this->formatTemperature($this->getCurrentTemp()),
            'max temperature (℃)' => $this->formatTemperature($this->getMaxTemp()),
            'min temperature (℃)' => $this->formatTemperature($this->getMinTemp()),
            'feels like (℃)' => $this->formatTemperature($this->getFeelsLike()),
            'humidity (%)' => $this->getHumidity(),
            'wind speed (km/h)' => $this->getWindSpeed(),
            'sky visibility' => $this->getClouds()
        ];
    }

    public function formatTemperature(string $temp): float
    {
        return round(floatval($temp));
    }
}