<?php

namespace PhpTest\Services;

use Exception;

/**
 * Class WeatherService
 *
 * Open Weather Api doc : https://openweathermap.org/api
 *
 * @package PhpTest
 */
class WeatherService
{
    /**
     * @var string
     */
    private string $apiKey;

    /**
     * @var string
     */
    private string $apiUrl;

    /**
     * WeatherService constructor.
     * @param string $apiKey
     * @param string $apiUrl
     */
    public function __construct(string $apiKey = OPENWEATHER_API_KEY, string $apiUrl = 'https://api.openweathermap.org/data/2.5/')
    {
        $this->apiKey = $apiKey;
        $this->apiUrl = $apiUrl;
    }

    /**
     * Get weather by city name.
     *
     * @param string $city
     * @return array
     * @throws Exception
     */
    public function getWeatherByCityName(string $city): array
    {
        $url = $this->apiUrl . 'weather?q=' . urlencode($city) . '&appid=' . $this->apiKey . '&units=metric';
        return $this->fetchWeatherData($url);
    }

    /**
     * Get weather by city ID.
     *
     * @param int $cityId
     * @return array
     * @throws Exception
     */
    public function getWeatherByCityId(int $cityId): array
    {
        $url = $this->apiUrl . 'weather?id=' . $cityId . '&appid=' . $this->apiKey . '&units=metric';
        return $this->fetchWeatherData($url);
    }

    /**
     * Get weather by geographic coordinates.
     *
     * @param float $lat
     * @param float $lon
     * @return array
     * @throws Exception
     */
    public function getWeatherByCoordinates(float $lat, float $lon): array
    {
        $url = $this->apiUrl . 'weather?lat=' . $lat . '&lon=' . $lon . '&appid=' . $this->apiKey . '&units=metric';
        return $this->fetchWeatherData($url);
    }

    /**
     * Fetch weather data from API.
     *
     * @param string $url
     * @return array
     * @throws Exception
     */
    private function fetchWeatherData(string $url): array
    {
        $response = @file_get_contents($url);
        if ($response === FALSE) {
            throw new Exception('Impossible de récupérer les données, vérifier le paramètre GET.');
        }

        $data = json_decode($response, true);
        if (isset($data['cod']) && $data['cod'] != 200) {
            throw new Exception($data['message']);
        }

        return $data;
    }
}
