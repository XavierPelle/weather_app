<?php

namespace PhpTest\Controllers;

use PhpTest\Services\WeatherService;
use Exception;

class WeatherController
{
    private WeatherService $weatherService;

    public function __construct(WeatherService $weatherService)
    {
        $this->weatherService = $weatherService;
    }

    public function getWeatherData()
    {
        try {
            
            if (empty($_GET)) {
                return ['tutorial' => true];
            }

            if (isset($_GET['city'])) {
                $weatherData = $this->weatherService->getWeatherByCityName($_GET['city']);
            } elseif (isset($_GET['city_id'])) {
                $weatherData = $this->weatherService->getWeatherByCityId((int)$_GET['city_id']);
            } elseif (isset($_GET['lat']) && isset($_GET['lon'])) {
                $weatherData = $this->weatherService->getWeatherByCoordinates((float)$_GET['lat'], (float)$_GET['lon']);
            } else {
                throw new Exception('Il faut fournir un nom de ville, un ID de ville ou des coordonnées géographiques.');
            }

            if ($weatherData === null || !isset($weatherData['main'])) {
                throw new Exception('Impossible de récupérer les données météo.');
            }

            return $weatherData;
        } catch (Exception $e) {
            return ['error' => $e->getMessage()];
        }
    }
}
