<?php

namespace App\Services;

use GuzzleHttp\Client;
use Illuminate\Support\Facades\Redis;
use Predis\Connection\ConnectionException;

class WeatherService
{
    protected $client;

    public function __construct(Client $client)
    {
        $this->client = $client;

    }

    public function getWeather($city)
    {
        $apiKey = config('services.weather.api_key');
        $apiUrl = config('services.weather.api_url');
        $url = "{$apiUrl}{$city}?unitGroup=metric&key={$apiKey}";


        try {
            $cacheKey = "weather_{$city}";
            $cacheExpiration = 30; // 30 seconds
            // Check if weather data is already cached in Redis
            $weatherData = Redis::get($cacheKey);

            if ($weatherData) {
                // If cached data is found, decode and return it
                return [
                    'message' => "Weather data for {$city} was retrieved from the cache.",
                    'data' => json_decode($weatherData, true, 512, JSON_THROW_ON_ERROR)
                ];
            }

            $response = $this->client->get($url);
            $weatherData = json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR);
            Redis::setex($cacheKey, $cacheExpiration, json_encode($weatherData, JSON_THROW_ON_ERROR));

            // Check if the data is stored in Redis
            if (Redis::exists($cacheKey)) {
                return [
                    'message' => "Weather data for {$city} has been successfully cached.",
                    'data' => $weatherData
                ];
            }
        }
        catch (ConnectionException $e) {
            // Proceed without caching
            $response = $this->client->get($url);
            $weatherData = json_decode($response->getBody(), true, 512, JSON_THROW_ON_ERROR);

            return [
                'message' => "Failed to cache weather data: " . $e->getMessage(),
                'data' => $weatherData
            ];
        }
    }
}
