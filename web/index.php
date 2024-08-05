<?php

use PhpTest\Controllers\WeatherController;
use PhpTest\Services\WeatherService;

require __DIR__ . '/../vendor/autoload.php';

$weatherService = new WeatherService(OPENWEATHER_API_KEY);
$weatherController = new WeatherController($weatherService);
$weatherData = $weatherController->getWeatherData();

$tutorial = isset($weatherData['tutorial']) ? $weatherData['tutorial'] : false;
$error = isset($weatherData['error']) ? $weatherData['error'] : null;

if (isset($weatherData['error'])) {
    $error = $weatherData['error'];
}

include __DIR__ . '/../src/templates/weather.php';
